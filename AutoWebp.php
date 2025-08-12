<?php
/**
 * OnManagerPageBeforeRender
 * OnWebPagePrerender
 * OnSiteRefresh
 * 
 * Generate Webp image format
 * 
 * Uses either Imagick or imagewebp to generate webp image
 * 
 * @param string $file Path to image being converted.
 * @param int $compression_quality Quality ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file).
 * 
 * @return false|string Returns path to generated webp image, otherwise returns false.
 */


if(
    $modx->event->name == 'OnSiteRefresh'
) {
    $options= [xPDO::OPT_CACHE_KEY=>'webp_on_page']; // Clear webp modx cache
    $modx->cacheManager->clean($options);
}

function jcphp01_modx_custom_generate_webp_image($file, $compression_quality = 80)
{
    
    
    $fileWithBasePath = preg_replace("~\/(?!.*\/)(.*)~", '', MODX_BASE_PATH) . $file;
    
    // check if file exists
    if (!file_exists($fileWithBasePath)) {
        return false;
    }

    // If output file already exists return path
    $output_file = $file . '.webp';
    $outputFileWithBasePath = $fileWithBasePath . '.webp';
    
    if (file_exists($outputFileWithBasePath)) {
        return $output_file;
    }
    
    
    $file_type = strtolower(pathinfo($fileWithBasePath, PATHINFO_EXTENSION));

    if (function_exists('imagewebp')) {
        
        switch ($file_type) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($fileWithBasePath);
                break;

            case 'png':
                $image = imagecreatefrompng($fileWithBasePath);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;

            case 'gif':
                $image = imagecreatefromgif($fileWithBasePath);
                break;
            default:
                return false;
        }

        // Save the image
        $result = imagewebp($image, $outputFileWithBasePath, $compression_quality);
        if (false === $result) {
            return false;
        }

        // Free up memory
        imagedestroy($image);

        return $output_file;
    } elseif (class_exists('Imagick')) {
        $image = new Imagick();
        $image->readImage($fileWithBasePath);

        if ($file_type === 'png') {
            $image->setImageFormat('webp');
            $image->setImageCompressionQuality($compression_quality);
            $image->setOption('webp:lossless', 'true');
        }

        $image->writeImage($outputFileWithBasePath);
        return $output_file;
    }

    return false;
}





function check_image_file_for_webp_converter_custom($img_real, &$webp_on_page){
    static $uniq_imgs= [];
    

    $img_real= trim($img_real);
    if(in_array($img_real, $uniq_imgs)) return;
    $uniq_imgs[]= $img_real;
    
    $ext= strtolower(pathinfo($img_real, PATHINFO_EXTENSION));
    if(
        $ext == 'jpg' ||
        $ext == 'jpeg' ||
        $ext == 'png' 
    ) {
        $abs= jcphp01_modx_custom_generate_webp_image($img_real);
        $abs_base= str_replace('//', '/', MODX_BASE_PATH.$abs);

        if( file_exists($abs_base)){
            $webp_on_page[$img_real]= $abs;
        }
    }
}


try{

    if( // replace jpg and png images to webp
        $modx->event->name == 'OnWebPagePrerender' && 
        stripos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false
    ){
        
        if($disable_replacing_for_logged_user && $modx->user->hasSessionContext('mgr')) return ''; 
        
        $options= [xPDO::OPT_CACHE_KEY=>'webp_on_page'];
        $cache_key= md5(MODX_SITE_URL.$_SERVER['REQUEST_URI']);
    
        $cached_webp_on_page= $modx->cacheManager->get($cache_key, $options);
        $output= &$modx->resource->_output;
    
        
    
        if( empty($cached_webp_on_page) ){
            $webp_on_page= [];
            
            preg_match_all('/<img[^>]+>/i', $output, $result);
            
            if(count($result)){ // Search images in img tag
                foreach($result[0] as $img_tag) {
                    $img_tag= str_replace("'", '"', $img_tag); // src
                    preg_match('/(src)=("[^"]*")/i', $img_tag, $img[$img_tag]);                     
                    $img_real= str_replace('"', '', $img[$img_tag][2]);
                    check_image_file_for_webp_converter_custom($img_real, $webp_on_page);
                    
                    preg_match('/(data-src)=("[^"]*")/i', $img_tag, $img[$img_tag]); // data-src                    
                    $img_real= str_replace('"', '', $img[$img_tag][2]);
                    check_image_file_for_webp_converter_custom($img_real, $webp_on_page);
                    
                    preg_match('/(srcset)=("[^"]*")/i', $img_tag, $img[$img_tag]); // srcset
                    $srcset= explode(',', str_replace('"', '', $img[$img_tag][2]));
                    foreach($srcset as $src_item){
                        $src_a= explode(' ', $src_item);
                        if(isset($src_a[0]) && !empty($src_a[0])) {
                            check_image_file_for_webp_converter_custom($src_a[0], $webp_on_page);
                        } else {
                            if(isset($src_a[1]) && !empty($src_a[1])) {
                                check_image_file_for_webp_converter_custom($src_a[1], $webp_on_page);
                            }
                        }
                    }
                }
            }
    
            preg_match_all('/url\(([^)]*)"?\)/iu', $output, $result);
            if(count($result)){ // Search images in url css rules
                foreach($result[1] as $img_tag) {
                    if(stripos($img_real, 'data:')) continue;
                    $img_real= str_replace(['"',"'"], '', $img_tag);
                    check_image_file_for_webp_converter_custom($img_real, $webp_on_page);
                }
            }
            
            $webp_on_page['/webp/webp/']= '/webp/';
            $webp_on_page['//webp/']= '/webp/';
            $webp_on_page['.webp.webp']= '.webp';
            
            if(count($webp_on_page)) $output= str_replace(array_keys($webp_on_page), array_values($webp_on_page), $output);
            $modx->cacheManager->set($cache_key, serialize($webp_on_page), 0, $options);
        } else {
            $webp_on_page= unserialize($cached_webp_on_page);
            if(count($webp_on_page)){
                $output= str_replace(array_keys($webp_on_page), array_values($webp_on_page), $output);
            }
        }
        return '';
    }
    
} catch (Exception $e){
    $modx->log(1, $e);
}