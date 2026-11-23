# 🏋️ Gym Management System

Modern web application untuk manajemen gym berbasis Laravel 12 dengan Tailwind CSS.

![Laravel](https://img.shields.io/badge/Laravel-12.0-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![Tailwind](https://img.shields.io/badge/Tailwind-3.0-cyan)
![License](https://img.shields.io/badge/License-MIT-green)

## ✨ Features

### 👥 Member Management
- CRUD member (nama, telepon, alamat)
- Search & filter member
- Validasi input (phone unique)
- History transaksi per member

### 📦 Package Management
- CRUD paket membership
- Multiple durasi (harian)
- Pricing flexible
- Status active/inactive

### 💳 Transaction Management
- Catat pembelian paket
- Auto-calculate start & end date
- Filter: Active / Expired / Expired Soon
- Search by member name
- Edit & delete transactions

### 📊 Dashboard
- Total statistics (members, packages, transactions)
- Recent members & transactions
- Today's transactions & revenue
- Chart transaksi bulanan (Chart.js)
- Quick navigation cards

### 🔐 Authentication & Security
- Laravel Breeze authentication
- Input validation (Form Requests)
- Auth middleware protection
- CSRF protection
- Mass assignment protection
- Production-ready security

## 🛠️ Tech Stack

**Backend:**
- Laravel 12
- PHP 8.2+
- MySQL/MariaDB (production)
- SQLite (development)

**Frontend:**
- Tailwind CSS 3.x
- Alpine.js 3.x
- Chart.js 4.x
- Vite

**Development:**
- Composer
- NPM
- Laravel Pint (code style)
- PHPUnit (testing)

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL (for production)

### Local Development

1. **Clone repository**
```bash
git clone https://github.com/RiffaYP/project_gym-laravel.git
cd project_gym-laravel
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database setup**
```bash
# Edit .env for database config
php artisan migrate
php artisan db:seed
```

5. **Build assets**
```bash
npm run dev
# or for production
npm run build
```

6. **Run development server**
```bash
composer run dev
# This will start: server, queue, logs, and vite
```

7. **Login**
- URL: `http://localhost:8000`
- Email: `admin@gymapp.com`
- Password: `admin123`

## 🚀 Deployment

Lihat [DEPLOYMENT.md](DEPLOYMENT.md) untuk panduan lengkap deployment ke:
- InfinityFree (shared hosting)
- VPS/Dedicated server
- Railway.app
- Heroku

## 📁 Project Structure

```
gym-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── MemberController.php
│   │   │   ├── PackageController.php
│   │   │   └── TransactionController.php
│   │   └── Requests/
│   │       ├── StoreMemberRequest.php
│   │       ├── UpdateMemberRequest.php
│   │       ├── StorePackageRequest.php
│   │       └── UpdatePackageRequest.php
│   └── Models/
│       ├── Member.php
│       ├── Package.php
│       ├── Transaction.php
│       └── User.php
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── gym_management_schema.sql
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── dashboard.blade.php
│       ├── members/
│       ├── packages/
│       ├── transactions/
│       └── errors/
├── routes/
│   ├── web.php
│   └── auth.php
├── public/
├── .env.example
├── .env.production.example
├── DEPLOYMENT.md
└── README.md
```

## 🔧 Configuration

### Environment Variables

**Development:**
```env
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=sqlite
```

**Production:**
```env
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=mysql
LOG_LEVEL=error
QUEUE_CONNECTION=sync
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=MemberTest

# Code style check
./vendor/bin/pint --test
```

## 🎨 UI/UX Features

- 🌙 Modern dark theme (zinc color palette)
- 📱 Fully responsive (mobile, tablet, desktop)
- ⚡ Fast page transitions
- 🎯 Intuitive navigation with active states
- 🔍 Real-time search (Alpine.js)
- 📊 Interactive charts
- 🎭 Smooth animations & micro-interactions
- ♿ Accessibility compliant

## 🔒 Security Features

- ✅ Input validation (server-side)
- ✅ CSRF protection
- ✅ SQL injection prevention (Eloquent ORM)
- ✅ XSS protection (Blade escaping)
- ✅ Mass assignment protection
- ✅ Authentication required for all CRUD
- ✅ Password hashing (bcrypt)
- ✅ Secure session management
- ✅ Production environment hardening

## 📝 Database Schema

**Users**
- id, name, email, password, timestamps

**Members**
- id, name, phone (unique), address, timestamps

**Packages**
- id, name, duration (days), price, timestamps

**Transactions**
- id, member_id, package_id, price, start_date, end_date, timestamps
- Foreign keys: member_id → members, package_id → packages

## 🤝 Contributing

1. Fork the project
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**RiffaYP**
- GitHub: [@RiffaYP](https://github.com/RiffaYP)
- Repository: [project_gym-laravel](https://github.com/RiffaYP/project_gym-laravel)

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Alpine.js
- Chart.js
- InfinityFree Hosting

## 📞 Support

Jika ada pertanyaan atau issues:
- Open issue di GitHub
- Check [DEPLOYMENT.md](DEPLOYMENT.md) untuk troubleshooting

---

**Last Updated:** November 2026
**Version:** 1.0.0
