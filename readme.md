# ⚡ WebP Auto-Converter — Problem-Solving Plugin For MODX

---

## 📜 Description

**MODX WebP Auto-Converter** is a **universal image optimization plugin** designed to **automatically convert PNG/JPEG to WebP** during page rendering.  
Built for **MODX** but works with **any PHP-based project** with minimal tweaks.  

✅ Works **even on shared hosting**  
✅ **No external APIs or paid services**  
✅ **Google PageSpeed friendly**  
✅ Fully **automated** once installed  

---

## 🚨 The Problem

Without WebP automation, websites suffer from:

| ❌ Problem | 💥 Impact |
|-----------|----------|
| Large PNG/JPEG files | Slow page load, higher bounce rate |
| Poor Google PageSpeed score | Lower SEO rankings |
| Manual image conversion | Time-consuming and error-prone |
| Shared hosting restrictions | Cannot install heavy packages |
| Serving old formats to modern browsers | Missed performance gains |

---

## 🛠 How This Plugin Fixes It

| ✅ Feature | 🚀 Benefit |
|-----------|-----------|
| Scans HTML `<img>`, `srcset`, `data-src` and CSS `url(...)` | Finds all images automatically |
| Generates WebP on the fly | No need for manual conversion |
| Uses GD or Imagick (if available) | Works on any hosting setup |
| Serves WebP only to supported browsers | 100% compatibility |
| Caches replacements | Minimal server load |
| Supports `OnSiteRefresh` | Clears all WebP cache in one click |

---

## ⚙️ Installation

1. **In MODX**: Go to **Elements → Plugins → Create**.
2. Name it **WebP Auto-Converter**.
3. Paste the code from this repository.
4. Enable events:
   * `OnManagerPageBeforeRender`
   * `OnWebPagePrerender`
   * `OnSiteRefresh`
5. Save → Clear MODX cache → Done! 🎉

---

## 📈 Results You Can Expect

After installing:

- 🚀 **20–60% faster** page loads
- 📊 **+10–20 points** in Google PageSpeed
- 🕒 Zero time spent on manual conversions
- 🌍 Works with **any site** — blog, e-commerce, portfolio
- 🔄 Fully automated & future-proof

---

## 📌 Tech Overview

| Component | Details |
|-----------|---------|
| Language | PHP 7.0+ |
| Libraries | GD, Imagick |
| Server | Apache / Nginx |
| CMS | MODX Revolution (tested), adaptable to others |
| Caching | Built-in PHP caching |
| Browser Support | Chrome, Firefox, Edge, Opera, Safari (partial WebP) |

---

## 💻 Tech Stack

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Imagick](https://img.shields.io/badge/Imagick-%2300BFFF.svg?style=for-the-badge&logo=imagemagick&logoColor=white)
![GD Library](https://img.shields.io/badge/GD%20Library-%230092FF.svg?style=for-the-badge&logo=php&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)
![Nginx](https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&logo=nginx&logoColor=white)
![MODX](https://img.shields.io/badge/MODX-%2300AEEF.svg?style=for-the-badge&logo=modx&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![Regex](https://img.shields.io/badge/regex-%2300B4AB.svg?style=for-the-badge&logo=regex&logoColor=white)
![Shared Hosting](https://img.shields.io/badge/shared_hosting-%23FFA500.svg?style=for-the-badge&logo=server&logoColor=white)
![Google PageSpeed](https://img.shields.io/badge/PageSpeed%20Insights-%2300A4EF.svg?style=for-the-badge&logo=google&logoColor=white)
![SEO Friendly](https://img.shields.io/badge/SEO%20Friendly-%234CAF50.svg?style=for-the-badge&logo=google&logoColor=white)
![Cache](https://img.shields.io/badge/Cache%20Optimized-%23F5A623.svg?style=for-the-badge&logo=cache&logoColor=white)

---

## 📦 License

MIT — free to use and modify.

---

### ⭐ If you find this plugin useful, star the repository and share it with other MODX developers!
