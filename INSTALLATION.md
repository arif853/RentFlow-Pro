# Installation Guide - RentFlow Pro

This comprehensive guide will walk you through the installation process of RentFlow Pro step by step.

## Table of Contents

1. [System Requirements](#system-requirements)
2. [Pre-Installation Checklist](#pre-installation-checklist)
3. [Installation Steps](#installation-steps)
4. [Post-Installation Configuration](#post-installation-configuration)
5. [Troubleshooting](#troubleshooting)
6. [Production Deployment](#production-deployment)

## System Requirements

### Minimum Requirements

- **Operating System**: Windows 10/11, macOS 10.15+, Linux (Ubuntu 20.04+)
- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **PHP**: 8.2 or higher
- **Database**: MySQL 8.0+ or MariaDB 10.5+
- **Node.js**: 18.x or higher
- **NPM**: 9.x or higher
- **Composer**: 2.5 or higher
- **RAM**: 2GB minimum (4GB recommended)
- **Disk Space**: 500MB minimum (1GB recommended)

### PHP Extensions Required

- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON
- BCMath
- Fileinfo
- GD or Imagick (for PDF generation)

### Check PHP Extensions

```bash
php -m
```

## Pre-Installation Checklist

Before starting, ensure you have:

- [ ] Git installed
- [ ] Composer installed globally
- [ ] Node.js and NPM installed
- [ ] MySQL server running
- [ ] A database created for the application
- [ ] Database user with proper privileges
- [ ] Command line access
- [ ] Text editor or IDE

## Installation Steps

### Step 1: Clone the Repository

```bash
# Clone the repository
git clone https://github.com/yourusername/rentflow-pro.git

# Navigate to project directory
cd rentflow-pro
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

**Note**: If you encounter memory limit issues:
```bash
COMPOSER_MEMORY_LIMIT=-1 composer install
```

### Step 3: Install Node.js Dependencies

```bash
npm install
```

Or if you prefer Yarn:
```bash
yarn install
```

### Step 4: Environment Configuration

#### Copy Environment File
```bash
cp .env.example .env
```

#### Edit .env File

Open `.env` in your text editor and configure:

```env
APP_NAME="RentFlow Pro"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental_management
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

# Cache & Session
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

# Mail Configuration (Optional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@rentflowpro.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

This will generate a unique encryption key for your application.

### Step 6: Create Database

#### Using MySQL Command Line:
```bash
mysql -u root -p
```

```sql
CREATE DATABASE rental_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'rentflow_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON rental_management.* TO 'rentflow_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### Or Using phpMyAdmin:
1. Open phpMyAdmin
2. Click "New" to create a database
3. Name it `rental_management`
4. Select `utf8mb4_unicode_ci` collation
5. Click "Create"

### Step 7: Run Database Migrations

```bash
php artisan migrate
```

This will create all necessary tables in your database.

#### If you want to start fresh later:
```bash
php artisan migrate:fresh
```

### Step 8: (Optional) Import Sample Data

If you have the sample SQL file:

```bash
mysql -u your_username -p rental_management < database/rental.sql
```

Or use phpMyAdmin to import the SQL file.

### Step 9: Create Storage Symbolic Link

```bash
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public`.

### Step 10: Publish Spatie Permission Config

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### Step 11: Build Frontend Assets

For development (with hot reload):
```bash
npm run dev
```

For production (minified):
```bash
npm run build
```

### Step 12: Start Development Server

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

### Step 13: Access the Application

Open your browser and navigate to:
```
http://localhost:8000
```

## Post-Installation Configuration

### 1. Create First Admin User

#### Using Tinker:
```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'status' => '1'
]);
```

Press `Ctrl+D` to exit Tinker.

### 2. Set Up Roles and Permissions

1. Login with your admin account
2. Navigate to `/dashboard/users/roles`
3. Create roles:
   - Super Admin
   - Admin
   - Manager
   - Employee
   - Accountant

4. Navigate to `/dashboard/users/permissions`
5. Create necessary permissions (examples):
   - view-assets, create-assets, update-assets, delete-assets
   - view-bookings, create-bookings, update-bookings, delete-bookings
   - view-collections, create-collections, update-collections
   - view-reports, generate-reports
   - view-users, create-users, update-users, delete-users

6. Assign permissions to roles at `/dashboard/users/roles/{role_id}/give-permissions`

### 3. Initial Data Setup

Set up in this order:

1. **Locations**: Create geographical locations
2. **Designations**: Create employee designations
3. **Employees**: Add employees
4. **Room Types**: Define room types (Bedroom, Bathroom, Kitchen, etc.)
5. **Buildings**: Add buildings with assigned employees
6. **Floors**: Create floors for each building
7. **Assets**: Add rental units/apartments

### 4. Configure Web Settings

Navigate to `/dashboard/websetting` to configure:
- Company information
- Logo
- Contact details
- System preferences

## Troubleshooting

### Issue: "Class not found" errors

**Solution**: 
```bash
composer dump-autoload
```

### Issue: Permission denied errors

**Solution**: Set proper permissions (Linux/Mac)
```bash
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

For Windows, give full control to the `storage` and `bootstrap/cache` folders.

### Issue: Database connection error

**Solution**:
1. Check database credentials in `.env`
2. Ensure MySQL service is running
3. Test connection:
   ```bash
   php artisan tinker
   DB::connection()->getPdo();
   ```

### Issue: "419 Page Expired" on form submission

**Solution**:
1. Clear cache:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   ```
2. Check if `APP_KEY` is set in `.env`
3. Ensure CSRF token is included in forms

### Issue: Assets not loading (CSS/JS)

**Solution**:
```bash
npm run build
php artisan optimize:clear
```

### Issue: PDF not generating

**Solution**:
1. Check PHP GD extension is installed:
   ```bash
   php -m | grep gd
   ```
2. Install if missing:
   - Ubuntu: `sudo apt-get install php8.2-gd`
   - Windows: Enable in `php.ini`

### Issue: Storage link error

**Solution**:
```bash
# Remove existing link if present
rm public/storage

# Create new link
php artisan storage:link
```

## Production Deployment

### 1. Environment Configuration

Update `.env` for production:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Use secure session driver
SESSION_DRIVER=database
CACHE_DRIVER=redis

# Configure production database
DB_HOST=your_production_host
DB_DATABASE=your_production_db
DB_USERNAME=your_production_user
DB_PASSWORD=your_secure_password

# Configure mail
MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=587
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
```

### 2. Optimize for Production

```bash
# Install production dependencies only
composer install --optimize-autoloader --no-dev

# Build production assets
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

### 3. Set Proper Permissions

```bash
# Linux/Mac
sudo chown -R www-data:www-data /path/to/rentflow-pro
sudo chmod -R 755 /path/to/rentflow-pro
sudo chmod -R 775 /path/to/rentflow-pro/storage
sudo chmod -R 775 /path/to/rentflow-pro/bootstrap/cache
```

### 4. Configure Web Server

#### Apache

Create VirtualHost configuration:

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    ServerAlias www.yourdomain.com
    DocumentRoot /path/to/rentflow-pro/public

    <Directory /path/to/rentflow-pro/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/rentflow-error.log
    CustomLog ${APACHE_LOG_DIR}/rentflow-access.log combined
</VirtualHost>
```

Enable required modules:
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

#### Nginx

Create server block:

```nginx
server {
    listen 80;
    server_name yourdomain.com www.yourdomain.com;
    root /path/to/rentflow-pro/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 5. Set Up SSL (Let's Encrypt)

```bash
sudo apt-get install certbot python3-certbot-apache
sudo certbot --apache -d yourdomain.com -d www.yourdomain.com
```

### 6. Set Up Queue Worker (Optional)

```bash
# Install supervisor
sudo apt-get install supervisor

# Create configuration
sudo nano /etc/supervisor/conf.d/rentflow-worker.conf
```

Add:
```ini
[program:rentflow-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /path/to/rentflow-pro/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/path/to/rentflow-pro/storage/logs/worker.log
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start rentflow-worker:*
```

### 7. Set Up Automated Backups

Create backup script:

```bash
#!/bin/bash
DATE=$(date +%Y-%m-%d-%H%M%S)
BACKUP_DIR="/path/to/backups"
DB_NAME="rental_management"
DB_USER="your_user"
DB_PASS="your_password"

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup database
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/db-$DATE.sql

# Backup files
tar -czf $BACKUP_DIR/files-$DATE.tar.gz /path/to/rentflow-pro

# Delete backups older than 7 days
find $BACKUP_DIR -type f -mtime +7 -delete
```

Add to crontab:
```bash
crontab -e
```

```
0 2 * * * /path/to/backup-script.sh
```

## Next Steps

After successful installation:

1. Review [README.md](README.md) for usage instructions
2. Check [API_DOCUMENTATION.md](API_DOCUMENTATION.md) for API details
3. Read [CONTRIBUTING.md](CONTRIBUTING.md) if you plan to contribute
4. Set up monitoring and logging
5. Configure regular backups
6. Test all features thoroughly

## Support

If you encounter issues:

1. Check this documentation
2. Review [Troubleshooting](#troubleshooting) section
3. Search existing GitHub issues
4. Create a new issue with detailed information

---

**Congratulations!** 🎉 You have successfully installed RentFlow Pro.
