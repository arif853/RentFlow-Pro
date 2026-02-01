# Quick Start Guide - RentFlow Pro

Get up and running with RentFlow Pro in minutes! This guide provides the fastest path to a working development environment.

## Prerequisites (5 minutes)

Ensure you have these installed:

```bash
# Check versions
php --version        # Should be 8.2+
composer --version   # Should be 2.5+
node --version       # Should be 18+
npm --version        # Should be 9+
mysql --version      # Should be 8.0+
```

## Installation (10 minutes)

### 1. Clone and Install
```bash
# Clone repository
git clone https://github.com/yourusername/rentflow-pro.git
cd rentflow-pro

# Install dependencies
composer install
npm install
```

### 2. Configure Environment
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Edit .env file with your database credentials
# DB_DATABASE=rental_management
# DB_USERNAME=your_username
# DB_PASSWORD=your_password
```

### 3. Set Up Database
```bash
# Create database
mysql -u root -p -e "CREATE DATABASE rental_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Run migrations
php artisan migrate

# Create storage link
php artisan storage:link
```

### 4. Start Development
```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite dev server
npm run dev
```

Visit: **http://localhost:8000** 🎉

## First Login (5 minutes)

### Create Admin User
```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'status' => '1'
]);

exit
```

**Login with:**
- Email: `admin@example.com`
- Password: `password`

⚠️ **Change this password immediately after first login!**

## Initial Setup (10 minutes)

Follow this order to set up your system:

### 1. Create Roles & Permissions
```
Dashboard → Users → Roles → Create New Role
```
Create these roles:
- Super Admin
- Admin
- Manager
- Employee

```
Dashboard → Users → Permissions → Create Permissions
```
Create basic permissions:
- view-assets, create-assets, update-assets, delete-assets
- view-bookings, create-bookings, approve-bookings
- view-collections, create-collections
- view-reports

Assign permissions to roles:
```
Dashboard → Users → Roles → [Select Role] → Give Permissions
```

### 2. Set Up Basic Data

#### Locations
```
Dashboard → Locations → Add New
```
Example: Downtown, Suburb, City Center

#### Designations
```
Dashboard → Designation → Add New
```
Example: Manager, Supervisor, Caretaker

#### Employees
```
Dashboard → Employee → Add New
```
Add at least one employee for building management

#### Room Types
```
Dashboard → Room Type → Add New
```
Example: Bedroom, Bathroom, Kitchen, Living Room

#### Buildings
```
Dashboard → Building → Add New
```
Add your first building with:
- Location
- Building code
- Assigned employee
- Number of floors

#### Floors
```
Dashboard → Floors → Add New
```
Add floors for your building

#### Assets (Rental Units)
```
Dashboard → Asset → Add New
```
Create your first rental unit with:
- Unit name and code
- Building and floor
- Rent amount
- Available date
- Rooms (optional)

## Common Tasks

### Add a New Booking
```
Dashboard → Booking → Create New Booking
```
1. Select location, building, and asset
2. Enter customer details
3. Add family members (optional)
4. Review and submit
5. Approve from approval list

### Collect Rent
```
Dashboard → Collection → Create Collection
```
1. Select building and asset
2. Enter collection month
3. Enter amounts (rent, utilities, etc.)
4. System calculates dues automatically
5. Print receipt

### Generate Reports
```
Dashboard → Reports → [Select Report Type]
```
- Booking Report: View all bookings by building
- Collection Report: Client/Month/Year-wise
- Asset Report: Property status
- Checkout Report: Tenant departures

### Process Checkout
```
Dashboard → Checkout → Create Checkout
```
1. Select asset and customer
2. Enter checkout date
3. System shows due amount
4. Submit for approval
5. Approve from approval list

## Development Workflow

### Making Changes

1. **Create feature branch**
   ```bash
   git checkout -b feature/my-new-feature
   ```

2. **Make changes**
   ```bash
   # Edit files
   # Test locally
   ```

3. **Run code quality checks**
   ```bash
   ./vendor/bin/pint  # Format code
   php artisan test   # Run tests
   ```

4. **Commit and push**
   ```bash
   git add .
   git commit -m "feat: add new feature"
   git push origin feature/my-new-feature
   ```

### Useful Artisan Commands

```bash
# Clear all caches
php artisan optimize:clear

# Or individually:
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Database operations
php artisan migrate          # Run migrations
php artisan migrate:fresh    # Fresh database (WARNING: deletes data)
php artisan migrate:rollback # Rollback last migration
php artisan db:seed         # Run seeders

# Create new files
php artisan make:controller MyController
php artisan make:model MyModel -m
php artisan make:migration create_my_table
php artisan make:policy MyPolicy --model=MyModel

# Interactive shell
php artisan tinker

# Run tests
php artisan test
php artisan test --filter MyTest
```

### Working with Database

```bash
# Open tinker for quick queries
php artisan tinker
```

```php
// Get all users
User::all();

// Find specific record
Asset::find(1);

// Create new record
Location::create(['location_name' => 'New Location', 'status' => '1']);

// Update record
$asset = Asset::find(1);
$asset->status = '0';
$asset->save();

// Query with relationships
Asset::with('building', 'location')->get();
```

## Troubleshooting Quick Fixes

### Problem: 404 on routes after changes
```bash
php artisan route:clear
php artisan optimize:clear
```

### Problem: CSS/JS not updating
```bash
# Stop npm run dev (Ctrl+C)
npm run build
# Restart npm run dev
```

### Problem: Permission denied errors
```bash
# Windows (Run as Administrator)
icacls storage /grant Users:F /t
icacls bootstrap/cache /grant Users:F /t

# Linux/Mac
sudo chmod -R 775 storage bootstrap/cache
```

### Problem: Database connection error
```bash
# Check MySQL is running
# Windows: Check Services
# Linux/Mac:
sudo systemctl status mysql

# Verify .env credentials
# Test connection in tinker:
php artisan tinker
DB::connection()->getPdo();
```

### Problem: Class not found
```bash
composer dump-autoload
```

## Environment-Specific Tips

### Development
```env
APP_ENV=local
APP_DEBUG=true
LOG_LEVEL=debug
```

### Production
```env
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=error

# Run optimizations
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## API Testing

### Using Browser
Most operations can be tested through the web interface.

### Using cURL
```bash
# Get CSRF token from page source first

# Example: Create location
curl -X POST http://localhost:8000/dashboard/locations \
  -H "Cookie: laravel_session=YOUR_SESSION" \
  -H "X-CSRF-TOKEN: YOUR_TOKEN" \
  -d "location_name=Test Location" \
  -d "status=1"
```

### Using Postman
1. Import routes from `routes/web.php`
2. Get session cookie by logging in through browser
3. Copy `laravel_session` cookie to Postman
4. Include CSRF token in requests

## Keyboard Shortcuts (VS Code)

```
Ctrl/Cmd + P       - Quick file open
Ctrl/Cmd + Shift + F - Search in files
Ctrl/Cmd + `       - Toggle terminal
F12                - Go to definition
Alt + Up/Down      - Move line
Ctrl/Cmd + /       - Toggle comment
```

## Helpful Extensions (VS Code)

- Laravel Blade Snippets
- Laravel Extra Intellisense
- PHP Intelephense
- Tailwind CSS IntelliSense
- GitLens
- Thunder Client (API testing)

## Next Steps

1. ✅ Read [README.md](README.md) for complete features
2. ✅ Check [API_DOCUMENTATION.md](API_DOCUMENTATION.md) for API details
3. ✅ Review [PROJECT_STRUCTURE.md](PROJECT_STRUCTURE.md) to understand architecture
4. ✅ Read [CONTRIBUTING.md](CONTRIBUTING.md) before contributing
5. ✅ See [SECURITY.md](SECURITY.md) for security best practices

## Getting Help

- 📖 [Full Documentation](README.md)
- 🐛 [Report Issues](https://github.com/yourusername/rentflow-pro/issues)
- 💬 [Discussions](https://github.com/yourusername/rentflow-pro/discussions)
- 📧 Email: support@rentflowpro.com

## Useful Links

- [Laravel Documentation](https://laravel.com/docs)
- [TailwindCSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev)
- [Spatie Permission Docs](https://spatie.be/docs/laravel-permission)

---

**You're all set! Happy coding!** 🚀

*Need more details? Check the full documentation files in the project root.*
