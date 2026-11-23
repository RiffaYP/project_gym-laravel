# ✅ Pre-Deployment Checklist

Gunakan checklist ini sebelum deploy ke production untuk memastikan semua siap.

---

## 🔐 Security Checklist

- [ ] `.env` tidak ter-commit ke GitHub
- [ ] `APP_DEBUG=false` di production `.env`
- [ ] `APP_ENV=production` di production `.env`
- [ ] Strong `APP_KEY` generated (32 characters)
- [ ] Strong MySQL password (min 12 characters, mixed case, numbers, symbols)
- [ ] Default admin password akan diganti setelah first login
- [ ] `.htaccess` files prepared (root & public)
- [ ] Error pages created (404, 500, 503)
- [ ] No hardcoded credentials in code
- [ ] All routes protected with auth middleware

---

## 🗄️ Database Checklist

- [ ] MySQL database created
- [ ] MySQL user created & assigned
- [ ] Database credentials tested
- [ ] `gym_management_schema.sql` ready to import
- [ ] Admin user akan di-seed
- [ ] Sample packages data (optional) ready

---

## 📦 Build & Optimize Checklist

- [ ] `composer install --optimize-autoloader --no-dev` done
- [ ] `npm run build` done (production assets)
- [ ] `php artisan config:cache` done
- [ ] `php artisan route:cache` done
- [ ] `php artisan view:cache` done
- [ ] All vendor dependencies up to date
- [ ] No development dependencies in vendor/

---

## 📁 Files & Folders Checklist

- [ ] `storage/` folder exists with correct structure
- [ ] `bootstrap/cache/` folder exists
- [ ] `.htaccess` in root (redirect to public)
- [ ] `.htaccess` in public/ (Laravel routes)
- [ ] `public/build/` contains compiled assets
- [ ] No `.env` file uploaded (manual upload after editing)
- [ ] No `node_modules/` uploaded
- [ ] No `.git/` uploaded
- [ ] No `tests/` uploaded

---

## ⚙️ Configuration Checklist

**`.env` file must contain:**
- [ ] `APP_NAME` set correctly
- [ ] `APP_URL` matches production domain
- [ ] `DB_HOST` correct (sqlXXX.infinityfreeapp.com)
- [ ] `DB_DATABASE` correct (epizXXXX_gymapp)
- [ ] `DB_USERNAME` correct
- [ ] `DB_PASSWORD` correct
- [ ] `LOG_CHANNEL=daily`
- [ ] `LOG_LEVEL=error`
- [ ] `QUEUE_CONNECTION=sync`
- [ ] `CACHE_STORE=file`
- [ ] `SESSION_DRIVER=file`

---

## 🔧 Server Configuration Checklist

- [ ] PHP version 8.2+ available
- [ ] Required PHP extensions installed:
  - [ ] BCMath
  - [ ] Ctype
  - [ ] Fileinfo
  - [ ] JSON
  - [ ] Mbstring
  - [ ] OpenSSL
  - [ ] PDO
  - [ ] PDO_MySQL
  - [ ] Tokenizer
  - [ ] XML
- [ ] `mod_rewrite` enabled (Apache)
- [ ] File upload max size: 10MB+
- [ ] PHP memory limit: 128MB+
- [ ] PHP execution time: 60 seconds

---

## 📤 Upload Checklist

**Via FTP to `/htdocs/`:**
- [ ] All project files uploaded (except excluded)
- [ ] `.htaccess` in root uploaded
- [ ] `public/` folder uploaded completely
- [ ] `vendor/` folder uploaded completely
- [ ] `storage/` folder structure uploaded
- [ ] `bootstrap/cache/` uploaded
- [ ] `.env` uploaded manually (after editing)

---

## 🔑 Permissions Checklist

**Set via cPanel File Manager:**
- [ ] `storage/` → 755 (recursive)
- [ ] `storage/framework/` → 755
- [ ] `storage/logs/` → 755
- [ ] `bootstrap/cache/` → 755

---

## 🧪 Testing Checklist

**After deployment:**
- [ ] Website accessible via browser
- [ ] Homepage loads without errors
- [ ] Login page accessible
- [ ] Admin login successful
- [ ] Dashboard loads correctly
- [ ] Create member works
- [ ] Create package works
- [ ] Create transaction works
- [ ] Edit operations work
- [ ] Delete operations work
- [ ] Logout works
- [ ] All CSS/JS loads correctly
- [ ] No console errors (F12 Developer Tools)
- [ ] Mobile responsive works

---

## 🧹 Post-Deployment Cleanup

- [ ] `clear.php` deleted (if used)
- [ ] Default admin password changed
- [ ] Test user accounts deleted (if any)
- [ ] Error logs checked
- [ ] Laravel logs checked (`storage/logs/`)

---

## 🔄 Rollback Plan

**If deployment fails:**
1. [ ] Backup current files via FTP
2. [ ] Export database via phpMyAdmin
3. [ ] Restore previous version
4. [ ] Check error logs for diagnosis
5. [ ] Fix issues locally
6. [ ] Re-deploy with fixes

---

## 📊 Performance Checklist

- [ ] Opcache enabled (if available)
- [ ] Config cached
- [ ] Routes cached
- [ ] Views cached
- [ ] Assets minified (npm run build)
- [ ] Images optimized
- [ ] CDN for static assets (optional)

---

## 📝 Documentation Checklist

- [ ] Admin credentials documented securely
- [ ] Database credentials documented securely
- [ ] FTP credentials documented securely
- [ ] Deployment date recorded
- [ ] Change log updated
- [ ] Team notified of deployment

---

## 🆘 Support Resources

**If issues occur:**
- [ ] Check InfinityFree error logs (cPanel)
- [ ] Check Laravel logs (`storage/logs/laravel.log`)
- [ ] Check browser console (F12)
- [ ] Read `DEPLOYMENT.md` troubleshooting section
- [ ] Search InfinityFree forum
- [ ] Check GitHub issues

---

## ✅ Final Sign-Off

**Before going live:**
- [ ] All checklist items above completed
- [ ] Stakeholders notified
- [ ] Maintenance window scheduled (if needed)
- [ ] Backup created
- [ ] Monitoring setup (optional)

**Deployed by:** _______________  
**Date:** _______________  
**Time:** _______________  
**Production URL:** _______________

---

**Status:**
- [ ] ✅ Ready for deployment
- [ ] ⚠️ Issues found (see notes below)
- [ ] ❌ Not ready

**Notes:**
_____________________________________________
_____________________________________________
_____________________________________________

---

Print & check off each item during deployment!
