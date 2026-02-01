# Project Structure - RentFlow Pro

This document provides a comprehensive overview of the RentFlow Pro project structure and organization.

## Directory Structure

```
rentflow-pro/
├── app/                        # Application core files
│   ├── Http/                   # HTTP layer
│   │   ├── Controllers/        # Route controllers
│   │   │   ├── Admin/         # Admin panel controllers
│   │   │   ├── Auth/          # Authentication controllers
│   │   │   ├── Controller.php
│   │   │   └── ProfileController.php
│   │   ├── Middleware/        # HTTP middleware
│   │   └── Requests/          # Form request validation
│   ├── Models/                # Eloquent models
│   │   ├── Asset.php
│   │   ├── Booking.php
│   │   ├── Building.php
│   │   ├── Checkout.php
│   │   ├── Collection.php
│   │   ├── Company.php
│   │   ├── Customer.php
│   │   ├── CustomerExtra.php
│   │   ├── Designation.php
│   │   ├── DueLog.php
│   │   ├── Employee.php
│   │   ├── Floor.php
│   │   ├── Location.php
│   │   ├── Room.php
│   │   ├── RoomType.php
│   │   └── User.php
│   ├── Policies/              # Authorization policies
│   │   ├── AssetPolicy.php
│   │   ├── BookingPolicy.php
│   │   ├── BuildingPolicy.php
│   │   ├── CheckoutPolicy.php
│   │   ├── CollectionPolicy.php
│   │   ├── EmployeePolicy.php
│   │   ├── FloorPolicy.php
│   │   ├── LocationPolicy.php
│   │   ├── RoomTypePolicy.php
│   │   └── UserPolicy.php
│   ├── Providers/             # Service providers
│   │   ├── AppServiceProvider.php
│   │   └── AuthServiceProvider.php
│   └── View/                  # View composers and components
│       └── Components/
├── bootstrap/                 # Application bootstrap
│   ├── app.php
│   ├── providers.php
│   └── cache/
├── config/                    # Configuration files
│   ├── app.php               # Application config
│   ├── auth.php              # Authentication config
│   ├── cache.php             # Cache config
│   ├── database.php          # Database config
│   ├── filesystems.php       # File storage config
│   ├── logging.php           # Logging config
│   ├── mail.php              # Mail config
│   ├── pdf.php               # PDF generation config
│   ├── permission.php        # Spatie permissions config
│   ├── queue.php             # Queue config
│   ├── services.php          # Third-party services
│   └── session.php           # Session config
├── database/                  # Database files
│   ├── factories/            # Model factories
│   │   └── UserFactory.php
│   ├── migrations/           # Database migrations
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2024_08_27_071106_create_room_types_table.php
│   │   ├── 2024_08_27_102855_create_floors_table.php
│   │   ├── 2024_08_27_105520_create_locations_table.php
│   │   ├── 2024_08_27_113955_create_employees_table.php
│   │   ├── 2024_08_27_174250_create_buildings_table.php
│   │   ├── 2024_08_29_081753_create_permission_tables.php
│   │   ├── 2024_08_29_162332_create_roles_table.php
│   │   ├── 2024_08_29_162945_create_designations_table.php
│   │   ├── 2024_09_01_044638_create_assets_table.php
│   │   ├── 2024_09_01_072239_create_rooms_table.php
│   │   ├── 2024_09_04_192106_create_customers_table.php
│   │   ├── 2024_09_05_044314_create_customer_extras_table.php
│   │   ├── 2024_09_24_084641_create_collections_table.php
│   │   ├── 2024_09_26_181918_create_checkouts_table.php
│   │   ├── 2024_09_28_041426_add_status_to_users_table.php
│   │   ├── 2024_10_08_055444_create_due_logs_table.php
│   │   └── 2024_10_27_102625_create_companies_table.php
│   ├── seeders/              # Database seeders
│   │   └── DatabaseSeeder.php
│   └── rental.sql            # Sample database (optional)
├── public/                    # Public web root
│   ├── index.php             # Entry point
│   ├── robots.txt
│   ├── admin/                # Admin panel assets
│   └── fonts/                # Font files
├── resources/                 # Raw resources
│   ├── css/                  # CSS source files
│   ├── js/                   # JavaScript source files
│   └── views/                # Blade templates
│       ├── admin/            # Admin views
│       ├── auth/             # Authentication views
│       ├── components/       # Blade components
│       ├── errors/           # Error pages
│       ├── layouts/          # Layout templates
│       ├── profile/          # Profile management views
│       ├── dashboard.blade.php
│       └── welcome.blade.php
├── routes/                    # Route definitions
│   ├── auth.php              # Authentication routes
│   ├── console.php           # Console routes
│   └── web.php               # Web routes
├── storage/                   # Storage files
│   ├── app/                  # Application storage
│   │   ├── public/           # Public files (accessible via storage link)
│   │   └── private/          # Private files
│   ├── framework/            # Framework cache and session files
│   │   ├── cache/
│   │   ├── sessions/
│   │   ├── testing/
│   │   └── views/
│   └── logs/                 # Application logs
│       └── laravel.log
├── tests/                     # Test files
│   ├── Feature/              # Feature tests
│   ├── Unit/                 # Unit tests
│   └── TestCase.php
├── vendor/                    # Composer dependencies
├── .editorconfig             # Editor configuration
├── .env.example              # Environment example file
├── .gitattributes            # Git attributes
├── .gitignore                # Git ignore rules
├── artisan                   # Artisan CLI
├── composer.json             # PHP dependencies
├── composer.lock             # Locked PHP dependencies
├── package.json              # Node dependencies
├── package-lock.json         # Locked Node dependencies
├── phpunit.xml               # PHPUnit configuration
├── postcss.config.js         # PostCSS configuration
├── tailwind.config.js        # TailwindCSS configuration
├── vite.config.js            # Vite configuration
├── README.md                 # Project documentation
├── CONTRIBUTING.md           # Contribution guidelines
├── CHANGELOG.md              # Version history
├── LICENSE                   # MIT License
├── SECURITY.md               # Security policy
├── INSTALLATION.md           # Installation guide
└── API_DOCUMENTATION.md      # API documentation
```

## Key Directories Explained

### `/app` Directory

The core application code resides here.

#### `/app/Http/Controllers/Admin`
Contains all admin panel controllers:
- **AssetController**: Manages rental units/apartments
- **BookingController**: Handles booking workflow
- **BuildingController**: Building management
- **CheckoutController**: Tenant checkout process
- **CollectionController**: Rent collection
- **CollectionReportController**: Collection reports
- **CustomerController**: Customer/tenant management
- **DesignationController**: Employee designations
- **EmployeeController**: Employee management
- **FloorController**: Floor management
- **LocationController**: Location management
- **PermissionController**: Permission management
- **ReportController**: Various reports
- **RoleController**: Role management
- **RoomtypeController**: Room type definitions
- **UserController**: User management
- **WebSettingController**: Application settings

#### `/app/Models`
Eloquent models representing database tables:
- **Asset**: Rental properties/units
- **Booking**: Rental bookings
- **Building**: Buildings/complexes
- **Checkout**: Tenant departures
- **Collection**: Rent payments
- **Customer**: Tenants/clients
- **Employee**: Staff members
- **Location**: Geographic locations
- **Room**: Individual rooms in assets
- **User**: System users

#### `/app/Policies`
Authorization policies for each model:
- Define who can `view`, `create`, `update`, `delete` resources
- Used with Laravel's `authorize()` method
- Integrated with Spatie Permission package

### `/database` Directory

#### `/database/migrations`
Database schema definitions in chronological order:
1. Core tables (users, cache, jobs)
2. Room types and locations
3. Buildings and floors
4. Employees and designations
5. Assets and rooms
6. Customers and bookings
7. Collections and checkouts
8. Permission tables

Each migration can be rolled back independently.

### `/resources/views` Directory

Blade templates organized by feature:

```
views/
├── admin/
│   ├── asset/              # Asset management views
│   ├── booking/            # Booking views
│   ├── building/           # Building views
│   ├── checkout/           # Checkout views
│   ├── collection/         # Collection views
│   ├── customer/           # Customer views
│   ├── employee/           # Employee views
│   ├── floor/              # Floor views
│   ├── location/           # Location views
│   ├── reports/            # Report views
│   ├── roles/              # Role management views
│   ├── users/              # User management views
│   └── dashboard.blade.php
├── auth/                   # Authentication views
├── components/             # Reusable components
├── layouts/                # Base layouts
│   ├── app.blade.php       # Main application layout
│   └── guest.blade.php     # Guest layout
└── profile/                # User profile views
```

### `/routes` Directory

#### `web.php`
All web routes organized by feature:
- Dashboard
- Asset management routes
- Booking workflow routes
- Collection routes
- Checkout routes
- Report generation routes
- User/Role/Permission management
- Utility routes (cache clear, storage link)

#### `auth.php`
Authentication routes provided by Laravel Breeze:
- Login, Register, Logout
- Password Reset
- Email Verification

### `/config` Directory

Configuration files for all application aspects:
- **app.php**: Core application settings
- **database.php**: Database connections
- **permission.php**: Spatie Permission settings
- **pdf.php**: PDF generation settings
- **mail.php**: Email configuration

## File Naming Conventions

### Controllers
- PascalCase: `AssetController.php`
- Suffix with `Controller`
- Located in: `app/Http/Controllers/`

### Models
- PascalCase: `Asset.php`
- Singular form
- Located in: `app/Models/`

### Migrations
- Snake_case with timestamp: `2024_08_27_071106_create_room_types_table.php`
- Descriptive action name
- Located in: `database/migrations/`

### Views
- Kebab-case: `manage-asset.blade.php`
- `.blade.php` extension
- Organized by feature folders

### Routes
- Kebab-case URLs: `/dashboard/room-type`
- RESTful naming
- Grouped by feature

## Key Design Patterns

### MVC Pattern
- **Models**: Data and business logic
- **Views**: Presentation layer
- **Controllers**: Request handling and coordination

### Repository Pattern (Implicit)
- Models act as data repositories
- Eloquent ORM abstracts database operations

### Policy Pattern
- Authorization logic separated from controllers
- Reusable across application

### Service Provider Pattern
- `AppServiceProvider`: Application bootstrapping
- `AuthServiceProvider`: Policy registration

## Database Relationships

### One-to-Many
```
Location → Buildings
Building → Floors
Building → Assets
Asset → Rooms
Asset → Bookings
Asset → Collections
Customer → Bookings
```

### Belongs To
```
Asset → Building
Asset → Location
Asset → Floor
Booking → Customer
Collection → Customer
```

### Many-to-Many
```
User ↔ Roles ↔ Permissions
(via Spatie Permission package)
```

## Middleware Stack

1. **Web Middleware**: Sessions, CSRF, cookies
2. **Auth Middleware**: Authentication check
3. **Verified Middleware**: Email verification
4. **Is_user_active Middleware**: User status check
5. **Permission Middleware**: Authorization (Spatie)

## Asset Pipeline

### Development
```bash
npm run dev
```
- Vite development server
- Hot module replacement
- Source maps enabled

### Production
```bash
npm run build
```
- Minified CSS/JS
- Optimized for production
- Versioned assets

## Configuration Priority

1. Environment variables (`.env`)
2. Configuration files (`config/`)
3. Default values in code

## Logging

Logs are stored in `storage/logs/laravel.log`:
- Application errors
- Database queries (when enabled)
- Custom log entries
- Authentication attempts

## Testing Structure

```
tests/
├── Feature/        # Integration tests
│   └── *Test.php
├── Unit/           # Unit tests
│   └── *Test.php
└── TestCase.php    # Base test case
```

Run tests:
```bash
php artisan test
```

## Deployment Checklist

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Run `composer install --no-dev`
- [ ] Run `npm run build`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Set proper file permissions
- [ ] Configure web server
- [ ] Set up SSL certificate
- [ ] Configure database backups

## Performance Considerations

### Database
- Indexes on foreign keys
- Eager loading relationships
- Query optimization

### Caching
- Route caching (production)
- Config caching (production)
- View caching (production)
- Query result caching (optional)

### Assets
- Minified CSS/JS
- Image optimization
- CDN usage (optional)

## Security Layers

1. **Input Validation**: Laravel validation
2. **CSRF Protection**: Token verification
3. **XSS Prevention**: Blade auto-escaping
4. **SQL Injection Prevention**: Eloquent ORM
5. **Authorization**: Policy-based access control
6. **Authentication**: Laravel Breeze
7. **Password Hashing**: Bcrypt
8. **Session Security**: Secure cookies

---

This structure follows Laravel best practices and conventions, ensuring maintainability and scalability.
