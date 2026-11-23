# 🚀 Quick Start - Deploy ke InfinityFree (5 Langkah)

Panduan super cepat untuk deploy gym-app ke InfinityFree dalam 15-30 menit.

---

## 📋 Yang Anda Butuhkan

- Akun InfinityFree (gratis)
- FileZilla atau FTP client
- Akses ke project ini

---

## ⚡ Langkah 1: Setup InfinityFree (5 menit)

1. **Daftar di https://infinityfree.net** (gratis)
2. **Create website baru**
   - Pilih subdomain atau gunakan domain sendiri
   - Contoh: `mygym.infinityfreeapp.com`
3. **Catat credentials** (ada di email welcome):
   ```
   FTP Host: ftpupload.net
   FTP Username: epizXXXX_XXXXXX
   FTP Password: ********
   ```
4. **Buat MySQL Database**:
   - Login cPanel → MySQL Databases
   - Create database: `epizXXXX_gymapp`
   - Create user & assign ke database
   - Catat:
     ```
     MySQL Host: sqlXXX.infinityfreeapp.com
     MySQL Database: epizXXXX_gymapp
     MySQL Username: epizXXXX_user
     MySQL Password: ********
     ```

---

## ⚡ Langkah 2: Prepare Files Lokal (5 menit)

```bash
cd D:\gym-app

# Install & build
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Cache untuk speed
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

✅ **Files siap di-upload!**

---

## ⚡ Langkah 3: Upload via FTP (10 menit)

### Open FileZilla:
- **Host:** `ftpupload.net`
- **Username:** `epizXXXX_XXXXXX`
- **Password:** (dari email)
- **Port:** 21

### Upload ke `/htdocs/`:
```
✅ Upload semua folder & files KECUALI:
   ❌ .env (nanti manual)
   ❌ .git/
   ❌ node_modules/
   ❌ database/database.sqlite
   ❌ tests/
```

**Struktur akhir di server:**
```
/htdocs/
  ├── .htaccess              ← PENTING!
  ├── public/
  │   ├── .htaccess          ← PENTING!
  │   ├── index.php
  │   └── build/
  ├── app/
  ├── vendor/
  ├── storage/               ← Set permission 755!
  ├── bootstrap/cache/       ← Set permission 755!
  └── ...
```

### Set Permissions via cPanel:
- File Manager → Select `storage/` → Change Permissions → **755** (recursive)
- Select `bootstrap/cache/` → Change Permissions → **755**

---

## ⚡ Langkah 4: Setup Database (5 menit)

### Via phpMyAdmin (cPanel):
1. Login cPanel → phpMyAdmin
2. Select database: `epizXXXX_gymapp`
3. Click **SQL** tab
4. Copy-paste dari `database/gym_management_schema.sql`
5. Click **Go**

✅ **Database ready dengan admin user & sample data!**

---

## ⚡ Langkah 5: Configure .env (5 menit)

### Buat `.env` di server:
1. Via cPanel File Manager → `/htdocs/`
2. Create New File → `.env`
3. Edit & paste:

```env
APP_NAME="Gym Management"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://mygym.infinityfreeapp.com

DB_CONNECTION=mysql
DB_HOST=sqlXXX.infinityfreeapp.com
DB_PORT=3306
DB_DATABASE=epizXXXX_gymapp
DB_USERNAME=epizXXXX_user
DB_PASSWORD=your_mysql_password_here

LOG_CHANNEL=daily
LOG_LEVEL=error
QUEUE_CONNECTION=sync
CACHE_STORE=file
SESSION_DRIVER=file
```

**⚠️ GENERATE APP_KEY:**

**Option A - Local (Recommended):**
```bash
php artisan key:generate --show
# Copy output ke .env di server
```

**Option B - Via clear.php:**
1. Upload file `clear.php` ke `/htdocs/public/`
2. Access: `https://mygym.infinityfreeapp.com/clear.php`
3. Copy generated key
4. Paste ke `.env`
5. **DELETE clear.php setelah selesai!**

**clear.php content:**
```php
<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "Generating key...<br>";
$kernel->call('key:generate', ['--show' => true, '--force' => true]);
echo "<br>Copy key above to .env<br>";
echo "<strong>DELETE THIS FILE NOW!</strong>";
```

---

## 🎉 SELESAI! Testing

### Access website:
```
https://mygym.infinityfreeapp.com
```

### Login:
- **Email:** `admin@gymapp.com`
- **Password:** `admin123`

### ✅ Test checklist:
- [ ] Homepage loads
- [ ] Login works
- [ ] Dashboard shows
- [ ] Create member works
- [ ] Create package works
- [ ] Create transaction works
- [ ] Edit/delete works

---

## 🔧 Troubleshooting Cepat

### Error 500?
1. Check `.htaccess` ada di root & public
2. Check `storage/` permission 755
3. Check `.env` valid (no typo)

### Error database connection?
1. Check MySQL credentials di `.env`
2. Ping MySQL host dari local
3. Check user assigned ke database

### CSS/JS tidak load?
1. Check `APP_URL` di `.env` match domain
2. Check `public/build/` folder ter-upload
3. Clear browser cache

### Cannot login?
1. Check database user sudah ter-seed
2. Reset password via phpMyAdmin
3. Check session driver di `.env`

---

## 🔐 Security - WAJIB!

**Setelah login pertama kali:**

1. **Ganti password admin:**
   - Profile → Update Password
   - Minimal 12 karakter

2. **Verifikasi .env:**
   - `APP_DEBUG=false` ✅
   - `APP_ENV=production` ✅

3. **Delete temporary files:**
   - Hapus `clear.php` jika ada

---

## 📞 Butuh Bantuan?

- **Full guide:** Baca `DEPLOYMENT.md`
- **Checklist:** Lihat `PRE-DEPLOYMENT-CHECKLIST.md`
- **Issues:** GitHub Issues
- **Forum:** https://forum.infinityfree.net

---

## 🎯 Next Steps

Setelah sukses deploy:

1. **Backup rutin:**
   - Export database weekly (phpMyAdmin)
   - Download files via FTP

2. **Monitor:**
   - Check error logs di cPanel
   - Check `storage/logs/laravel.log`

3. **Update:**
   - Pull changes dari GitHub
   - Upload via FTP
   - Run migrations if needed

4. **Optimize:**
   - Setup CDN (optional)
   - Enable opcache (if available)
   - Setup monitoring

---

**🎊 Congratulations! Gym app Anda sudah live di internet!**

**Production URL:** ___________________________  
**Admin Email:** `admin@gymapp.com`  
**Admin Password:** `admin123` (⚠️ GANTI SEKARANG!)

---

*Last updated: November 23, 2026*
