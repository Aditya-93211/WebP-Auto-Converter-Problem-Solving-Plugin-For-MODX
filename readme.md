# 🛡 MODX Shield — SafeTV & 404 Cache Killer — Problem-Solving Plugin

---

## 📜 Description

**MODX Shield** is a **two-in-one** plugin that protects your site from two common MODX issues that can **overload the server**, **waste disk space**, and **hurt SEO**:  

✅ **SafeTV** — prevents fatal errors when `$modx->resource` is missing  
✅ **Disable404Cache** — stops caching of 404 pages entirely  

Works in **both standard chunks** and **Fenom templates**, requires **no external services**, and is **safe for shared hosting**.  

---

## 🚨 The Problem

| ❌ Problem | 💥 Impact |
|-----------|----------|
| Calling TVs when `$modx->resource` is missing | Fatal errors, broken pages |
| 404 pages cached like normal content | Thousands of duplicate cache files |
| Cache bloat from bots & invalid URLs | Increased disk usage, slower site |
| SEO pollution from indexed 404s | Lower search rankings |
| Higher hosting bills (Railway, Vercel, etc.) | Wasted storage & bandwidth |

---

## 🛠 How This Plugin Fixes It

| ✅ Feature | 🚀 Benefit |
|-----------|-----------|
| **SafeTV** — safely handles missing `$modx->resource` | No fatal errors, stable templates |
| **Empty return for missing TVs** | Clean output without breaking layout |
| **Detects 404 by error_page ID & HTTP code** | 100% reliable detection |
| **Disables cache for 404s** | Stops duplicate cache creation |
| **Automatic cleanup of existing 404 cache files** | Frees disk space instantly |
| **Reduces disk I/O** | Faster page loads and better hosting efficiency |

---

## ⚙️ Installation

1. **In MODX**: Go to **Elements → Plugins → Create**.
2. Name it **MODX Shield — SafeTV & 404 Cache Killer**.
3. Paste the plugin code from this repository.
4. Enable events:
   * `OnWebPageInit`
   * `OnLoadWebDocument`
   * `OnWebPagePrerender`
5. Save → Clear MODX cache → Done! 🎉

---

## 📈 Results You Can Expect

After installing:

- 🚀 No more TV-related errors in chunks/Fenom
- 🗑 **Immediate stop** to 404 cache bloat
- ⚡ Faster site performance due to reduced disk usage
- 📉 Lower hosting bills on **usage-based platforms**
- 🛡 Stable, SEO-friendly MODX setup

---

## 📌 Tech Overview

| Component | Details |
|-----------|---------|
| Language | PHP 7.0+ |
| CMS | MODX Revolution |
| Hosting | Works on shared, VPS, or cloud |
| Cache Control | Built-in MODX + custom logic |
| Compatibility | Chunks, Snippets, Fenom templates |
| 404 Detection | `error_page` ID + HTTP status code |

---

## 💻 Tech Stack

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MODX](https://img.shields.io/badge/MODX-%2300AEEF.svg?style=for-the-badge&logo=modx&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)
![Nginx](https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&logo=nginx&logoColor=white)
![Fenom](https://img.shields.io/badge/Fenom%20Templates-%2300BFFF.svg?style=for-the-badge&logo=template&logoColor=white)
![Shared Hosting](https://img.shields.io/badge/shared_hosting-%23FFA500.svg?style=for-the-badge&logo=server&logoColor=white)
![Cache Optimized](https://img.shields.io/badge/Cache%20Optimized-%23F5A623.svg?style=for-the-badge&logo=cache&logoColor=white)
![SEO Friendly](https://img.shields.io/badge/SEO%20Friendly-%234CAF50.svg?style=for-the-badge&logo=google&logoColor=white)
![Error Handling](https://img.shields.io/badge/Error%20Handling-%23C41E3A.svg?style=for-the-badge&logo=bug&logoColor=white)
![404 Protection](https://img.shields.io/badge/404%20Protection-%2300A4EF.svg?style=for-the-badge&logo=shield&logoColor=white)

---

## 📦 License

MIT — free to use and modify.

---

### ⭐ If you find this plugin useful, **star the repository** and share it with the MODX community!
