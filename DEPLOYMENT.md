# 🚀 Deployment Guide - InfinityFree Hosting

## 📋 Prerequisites

1. **InfinityFree Account** - Sign up at https://infinityfree.net
2. **FTP Client** - FileZilla atau WinSCP
3. **GitHub Account** - Untuk version control
4. **Local Environment** - PHP 8.2+, Composer

---

## 🔧 Step 1: Prepare InfinityFree Account

### 1.1 Create Account & Get Credentials
- Sign up di InfinityFree
- Create new website
- Catat credentials:
  - **FTP Host**: `ftpupload.net` atau `ftp.yourdomain.com`
  - **FTP Username**: `epizXXXX_XXXXXX`
  - **FTP Password**: (dari email)
  - **MySQL Host**: `sqlXXX.infinityfreeapp.com`
  - **MySQL Database**: `epizXXXX_gymapp`
  - **MySQL Username**: `epizXXXX_user`
  - **MySQL Password**: (buat strong password)

### 1.2 Create MySQL Database
- Login ke cPanel InfinityFree
- MySQL Databases → Create Database
- Buat database: `epizXXXX_gymapp`
- Buat user & assign ke database

---

## 📦 Step 2: Build Production Assets

### 2.1 Install Dependencies
```bash
cd D:\gym-app
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

### 2.2 Optimize Laravel
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## ⚙️ Step 3: Configure Environment

### 3.1 Create `.env` for Production
Copy `.env.production.example` → `.env` dan edit:

```env
APP_NAME="Gym Management"
APP_ENV=production
APP_KEY=base64:GENERATE_THIS_ON_SERVER
APP_DEBUG=false
APP_URL=https://yourdomain.infinityfreeapp.com

DB_CONNECTION=mysql
DB_HOST=sqlXXX.infinityfreeapp.com
DB_PORT=3306
DB_DATABASE=epizXXXX_gymapp
DB_USERNAME=epizXXXX_user
DB_PASSWORD=your_mysql_password

LOG_CHANNEL=daily
LOG_LEVEL=error

QUEUE_CONNECTION=sync
CACHE_STORE=file
SESSION_DRIVER=file
```

**IMPORTANT:** Generate APP_KEY setelah upload:
```bash
php artisan key:generate
```

---

## 📤 Step 4: Upload Files via FTP

### 4.1 Connect FTP
- Open FileZilla
- Host: `ftpupload.net`
- Username: `epizXXXX_XXXXXX`
- Password: (from email)
- Port: 21

### 4.2 Upload Structure
```
/htdocs/
  ├── .htaccess              ← Root redirect
  ├── public/
  │   ├── .htaccess          ← Laravel routes
  │   ├── index.php
  │   ├── build/             ← Vite assets
  │   └── ...
  ├── app/
  ├── bootstrap/
  ├── config/
  ├── database/
  ├── resources/
  ├── routes/
  ├── storage/
  ├── vendor/
  ├── .env                   ← UPLOAD MANUALLY
  ├── artisan
  └── composer.json
```

**⚠️ JANGAN UPLOAD:**
- `.env` (upload manual setelah edit)
- `.git/`
- `node_modules/`
- `tests/`
- `database/database.sqlite`

### 4.3 Set Folder Permissions
Via cPanel File Manager, set permission:
- `storage/` → **755** (recursive)
- `storage/logs/` → **755**
- `bootstrap/cache/` → **755**

---

## 🗄️ Step 5: Setup Database

### 5.1 Upload & Run via phpMyAdmin
- Login ke cPanel → phpMyAdmin
- Select database `epizXXXX_gymapp`
- Import SQL structure:

**Option A: Manual SQL (Recommended)**

Jalankan query ini satu per satu di phpMyAdmin:

```sql
-- Users table
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Members table
CREATE TABLE members (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL UNIQUE,
    address TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Packages table
CREATE TABLE packages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    duration INT UNSIGNED NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Transactions table
CREATE TABLE transactions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member_id BIGINT UNSIGNED NOT NULL,
    package_id BIGINT UNSIGNED NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE,
    FOREIGN KEY (package_id) REFERENCES packages(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sessions table
CREATE TABLE sessions (
    id VARCHAR(255) PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    ip_address VARCHAR(45) NULL,
    user_agent TEXT NULL,
    payload LONGTEXT NOT NULL,
    last_activity INT NOT NULL,
    INDEX sessions_user_id_index (user_id),
    INDEX sessions_last_activity_index (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Cache table
CREATE TABLE cache (
    `key` VARCHAR(255) PRIMARY KEY,
    value MEDIUMTEXT NOT NULL,
    expiration INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE cache_locks (
    `key` VARCHAR(255) PRIMARY KEY,
    owner VARCHAR(255) NOT NULL,
    expiration INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Jobs table
CREATE TABLE jobs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    queue VARCHAR(255) NOT NULL,
    payload LONGTEXT NOT NULL,
    attempts TINYINT UNSIGNED NOT NULL,
    reserved_at INT UNSIGNED NULL,
    available_at INT UNSIGNED NOT NULL,
    created_at INT UNSIGNED NOT NULL,
    INDEX jobs_queue_index (queue)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Password reset tokens
CREATE TABLE password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Failed jobs
CREATE TABLE failed_jobs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid VARCHAR(255) UNIQUE NOT NULL,
    connection TEXT NOT NULL,
    queue TEXT NOT NULL,
    payload LONGTEXT NOT NULL,
    exception LONGTEXT NOT NULL,
    failed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Admin User
INSERT INTO users (name, email, email_verified_at, password, created_at, updated_at) 
VALUES ('Admin', 'admin@gymapp.com', NOW(), '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5Gy1t4J1GJSWm', NOW(), NOW());
-- Password: admin123
```

---

## 🎯 Step 6: Final Configuration

### 6.1 Generate APP_KEY (Via Terminal SSH if available)
```bash
php artisan key:generate
```

**Jika tidak ada SSH access:**
- Generate locally: `php artisan key:generate --show`
- Copy key ke `.env` di server via FTP

### 6.2 Clear All Cache (via browser)
Buat file `clear.php` di `/htdocs/public/`:

```php
<?php
// HAPUS FILE INI SETELAH SELESAI!
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "Clearing cache...<br>";
$kernel->call('cache:clear');
echo "Cache cleared!<br>";

$kernel->call('config:clear');
echo "Config cleared!<br>";

$kernel->call('view:clear');
echo "View cleared!<br>";

$kernel->call('route:clear');
echo "Route cleared!<br>";

echo "<br><strong>Done! DELETE THIS FILE NOW!</strong>";
```

Access: `https://yourdomain.com/clear.php`

**⚠️ WAJIB HAPUS `clear.php` SETELAH SELESAI!**

---

## ✅ Step 7: Testing

### 7.1 Access Website
```
https://yourdomain.infinityfreeapp.com
```

### 7.2 Login Admin
- Email: `admin@gymapp.com`
- Password: `admin123`

### 7.3 Test Features
- ✅ Dashboard loading
- ✅ Create member
- ✅ Create package
- ✅ Create transaction
- ✅ Edit/Delete operations
- ✅ Logout/Login

---

## 🔒 Security Checklist

- ✅ `APP_DEBUG=false` di `.env`
- ✅ `APP_ENV=production` di `.env`
- ✅ Strong `APP_KEY` generated
- ✅ Strong MySQL password
- ✅ Change default admin password setelah login
- ✅ `.env` tidak ter-commit ke GitHub
- ✅ Hapus `clear.php` setelah deployment
- ✅ Folder `storage/` permission 755
- ✅ File `.htaccess` sudah ter-upload

---

## 🐛 Troubleshooting

### Error: "500 Internal Server Error"
1. Check `.htaccess` ada di root & public
2. Check storage/ permissions (755)
3. Check `.env` configuration
4. Check error logs di cPanel

### Error: "SQLSTATE[HY000] [2002]"
1. Verify MySQL credentials di `.env`
2. Check DB host correct
3. Ensure database created & user assigned

### Error: "419 Page Expired" saat login
1. Clear browser cache
2. Access `/clear.php` untuk clear session
3. Check `SESSION_DOMAIN` di `.env` (set null)

### CSS/JS tidak load
1. Check `APP_URL` di `.env` match domain
2. Run `npm run build` locally
3. Re-upload `public/build/` folder

### "Route not found"
1. Check `.htaccess` di public/
2. Enable mod_rewrite di cPanel (biasanya sudah aktif)

---

## 🔄 Update Deployment

Untuk update code setelah development:

1. **Local:**
```bash
git pull origin main
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

2. **Upload via FTP:**
- Upload changed files only
- Upload `public/build/` jika ada perubahan CSS/JS

3. **Clear Cache:**
- Access `/clear.php` atau
- Delete `bootstrap/cache/*.php` via FTP

---

## 📞 Support

Jika ada masalah:
1. Check error logs: cPanel → Error Logs
2. Check Laravel logs: `storage/logs/laravel.log` (download via FTP)
3. InfinityFree Forum: https://forum.infinityfree.net

---

## ⚠️ InfinityFree Limitations

- ❌ No SSH access
- ❌ No Cron jobs (alternative: external cron service)
- ❌ No queue workers (use `QUEUE_CONNECTION=sync`)
- ❌ Limited PHP extensions
- ⏱️ Script execution timeout: 60 seconds
- 💾 Storage: 5GB (free plan)

**Recommended Upgrade:** Jika traffic tinggi, consider paid hosting atau VPS.

---

**Deployment Checklist:**
- [ ] Database created & configured
- [ ] `.env` file uploaded with correct credentials
- [ ] All files uploaded via FTP
- [ ] Permissions set (storage, bootstrap/cache)
- [ ] APP_KEY generated
- [ ] Database tables created
- [ ] Admin user seeded
- [ ] Website accessible
- [ ] Login successful
- [ ] All features tested
- [ ] `clear.php` deleted
- [ ] Admin password changed

**🎉 Deployment Complete!**
