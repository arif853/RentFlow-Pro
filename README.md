# 🏢 RentFlow Pro - Property & Rental Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge" alt="License">
</p>

<p align="center">
  <strong>A comprehensive property and rental management system built with Laravel</strong>
</p>

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [System Architecture](#system-architecture)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [API Documentation](#api-documentation)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## 🎯 Overview

**RentFlow Pro** is a full-featured property and rental management system designed for property managers, real estate companies, and landlords. It streamlines the entire rental lifecycle from property listing to tenant checkout, including rent collection, reporting, and comprehensive asset management.

### Key Highlights

- 🏗️ **Multi-Property Management** - Manage multiple buildings, locations, and floors
- 👥 **Tenant Management** - Complete customer/tenant lifecycle management
- 💰 **Rent Collection** - Automated rent collection with due tracking
- 📊 **Advanced Reporting** - Comprehensive reports for bookings, collections, and assets
- 🔐 **Role-Based Access Control** - Secure multi-user system with granular permissions
- 📄 **PDF Generation** - Generate professional invoices and reports
- 📱 **Responsive Design** - Works seamlessly on desktop, tablet, and mobile

## ✨ Features

### 🏢 Property Management
- **Location Management**: Organize properties by geographical locations
- **Building Management**: Track multiple buildings with detailed information
  - Building codes and types
  - Security guard details
  - Gate timings
  - Floor-wise organization
- **Asset Management**: Comprehensive unit/apartment management
  - Unit specifications (size, view, room types)
  - Utility management (gas, electricity, water)
  - Service charges and fees
  - Availability tracking
  - Employee assignments

### 👥 Customer & Employee Management
- **Customer Management**: 
  - Complete tenant profiles
  - Additional family member tracking
  - Booking history
  - Payment records
- **Employee Management**:
  - Designation-based hierarchy
  - Building/property assignments
  - Contact information
  - Performance tracking

### 📅 Booking System
- **Multi-Step Booking Process**:
  - Asset selection with availability check
  - Customer information collection
  - Final booking confirmation
- **Booking Approval Workflow**
- **Booking Status Tracking**
- **PDF Form Generation** (DMP forms)
- **Automated availability calculation**

### 💵 Collection & Payment Management
- **Rent Collection**:
  - Monthly rent tracking
  - Utility bill collection (gas, electricity, water)
  - Service charges
  - Additional charges (internet, dish, security)
- **Due Management**:
  - Automatic due calculation
  - Due payment tracking
  - Due logs and history
- **Collection Reports**:
  - Client-wise collection reports
  - Month-wise collection reports
  - Year-wise collection reports
  - PDF export functionality

### 🚪 Checkout Management
- **Tenant Checkout Process**
- **Approval Workflow**
- **Final settlement calculation**
- **Asset status update**

### 📊 Reports & Analytics
- **Booking Reports**: Track all bookings by building
- **Checkout Reports**: Monitor tenant departures
- **Asset Reports**: Property status and availability
- **Collection Reports**: Financial tracking and analysis
- **PDF Export**: Professional report generation

### 🔐 User Management & Security
- **Role-Based Access Control (RBAC)**:
  - Powered by Spatie Laravel Permission
  - Custom roles and permissions
  - Granular access control
- **User Management**:
  - User creation and editing
  - User activation/deactivation
  - Profile management
- **Authentication**:
  - Secure login with Laravel Breeze
  - Password reset functionality
  - Session management

### 🛠️ Additional Features
- **Room Type Management**: Define different room configurations
- **Floor Management**: Organize properties by floors
- **Web Settings**: Configurable application settings
- **Cache Management**: Built-in cache clearing utilities
- **Storage Management**: Automatic file storage handling

## 🛠️ Tech Stack

### Backend
- **Framework**: Laravel 11.x
- **Language**: PHP 8.2+
- **Database**: MySQL 8.0+
- **Authentication**: Laravel Breeze
- **Authorization**: Spatie Laravel Permission

### Frontend
- **CSS Framework**: TailwindCSS 3.x
- **JavaScript**: Alpine.js 3.x
- **Build Tool**: Vite 5.x
- **PDF Generation**: 
  - DomPDF 3.0
  - mPDF 8.2
  - Laravel PDF

### Development Tools
- **Testing**: PHPUnit 11.x
- **Code Quality**: Laravel Pint
- **API Testing**: Laravel Tinker
- **Dependency Management**: Composer

## 🏗️ System Architecture

### Model Relationships

```
Location → Building → Floor → Asset
    ↓          ↓                ↓
Employee → Building        Asset → Room (Multiple)
                               ↓
                        Customer → Booking
                               ↓
                         Collection → DueLog
                               ↓
                           Checkout
```

### Core Models

1. **Location**: Geographic areas where properties are located
2. **Building**: Individual buildings/complexes
3. **Floor**: Building floors
4. **Asset**: Rental units/apartments
5. **Room**: Individual rooms within an asset
6. **RoomType**: Room configurations (bedroom, bathroom, etc.)
7. **Employee**: Staff managing properties
8. **Customer**: Tenants/clients
9. **Booking**: Rental bookings
10. **Collection**: Rent payments
11. **Checkout**: Tenant departure records
12. **DueLog**: Payment due tracking
13. **User**: System users with roles

## 📦 Installation

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL >= 8.0
- Git

### Step-by-Step Installation

1. **Clone the Repository**
```bash
git clone https://github.com/yourusername/rentflow-pro.git
cd rentflow-pro
```

2. **Install PHP Dependencies**
```bash
composer install
```

3. **Install Node Dependencies**
```bash
npm install
```

4. **Environment Configuration**
```bash
cp .env.example .env
```

5. **Generate Application Key**
```bash
php artisan key:generate
```

6. **Configure Database**

Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. **Run Migrations**
```bash
php artisan migrate
```

8. **Optional: Import Sample Data**
```bash
mysql -u your_username -p rental_management < database/rental.sql
```

9. **Create Storage Link**
```bash
php artisan storage:link
```

10. **Install Spatie Permissions**
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

11. **Build Frontend Assets**
```bash
npm run build
```

For development:
```bash
npm run dev
```

12. **Start Development Server**
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## ⚙️ Configuration

### Permissions Setup

After installation, set up roles and permissions:

1. Access `/dashboard/users/roles` to create roles
2. Access `/dashboard/users/permissions` to define permissions
3. Assign permissions to roles
4. Assign roles to users

### Default Roles (Recommended)

- **Super Admin**: Full system access
- **Admin**: Property and tenant management
- **Manager**: Building management and collections
- **Employee**: Limited access to assigned properties
- **Accountant**: Financial reports and collections

### Cache Configuration

Clear application cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

Or visit: `/cache_clear` route (when logged in)

## 📱 Usage

### Dashboard Access

Default login credentials (if using sample data):
```
Email: admin@example.com
Password: password
```

**⚠️ Important**: Change default credentials immediately after first login!

### Workflow

#### 1. Initial Setup
1. Create Locations
2. Add Buildings to locations
3. Define Floor structures
4. Set up Room Types
5. Add Employees and Designations
6. Create Assets (rental units)

#### 2. Property Management
1. Navigate to **Assets** section
2. Add property details including:
   - Unit specifications
   - Utility information
   - Pricing structure
   - Assign responsible employee

#### 3. Booking Process
1. Go to **Bookings** → **Create New Booking**
2. **Step 1**: Select location, building, and asset
3. **Step 2**: Enter customer details and family members
4. **Step 3**: Review and confirm booking
5. Approve booking from approval list

#### 4. Collection Management
1. Navigate to **Collections**
2. Select building and asset
3. Enter collection details:
   - Month
   - Rent amount
   - Utility charges
   - Additional charges
4. System automatically calculates dues
5. Print receipt

#### 5. Reports Generation
1. Access **Reports** section
2. Choose report type:
   - Booking reports by building
   - Collection reports (client/month/year-wise)
   - Asset reports by location/building/floor
   - Checkout reports
3. Filter as needed
4. Export to PDF

#### 6. Checkout Process
1. Go to **Checkout** section
2. Select asset and customer
3. Enter checkout details
4. System calculates final settlement
5. Approve from checkout approval list

## 🗄️ Database Schema

### Key Tables

#### Assets Table
- `id`, `unit_name`, `asset_code`
- `building_id`, `location_id`, `floor_id`
- Utility fields (gas, electricity, water)
- Pricing fields (rent, service charge, others)
- `status`, `available_from`

#### Bookings Table
- `id`, `location_id`, `building_id`, `floor_id`
- `asset_id`, `customer_id`
- `status` (pending, approved, rejected)

#### Collections Table
- `id`, `building_id`, `asset_id`, `customer_id`
- `collection_date`, `month`
- `payable_amount`, `collection_amount`, `due_amount`
- Utility amounts (water, gas, electricity)
- Additional charges (internet, dish, guard)

#### Checkouts Table
- `id`, `booking_id`, `asset_id`, `customer_id`
- `checkout_date`, `final_amount`
- `status` (pending, approved)

### Entity Relationships

```sql
-- One to Many Relationships
Location → Buildings
Building → Floors
Building → Assets
Asset → Rooms
Asset → Bookings
Asset → Collections
Customer → Bookings
Customer → Collections

-- Belongs To Relationships
Asset → Building
Asset → Location
Asset → Floor
Asset → Employee
Booking → Customer
Collection → Customer
```

## 📚 API Documentation

### Key Routes

#### Dashboard
```
GET /dashboard - Main dashboard with statistics
```

#### Asset Management
```
GET    /dashboard/asset          - List all assets
GET    /dashboard/asset/create   - Create asset form
POST   /dashboard/asset          - Store new asset
GET    /dashboard/asset/{id}     - View asset details
GET    /dashboard/asset/{id}/edit - Edit asset form
PUT    /dashboard/asset/{id}     - Update asset
DELETE /dashboard/asset/{id}     - Delete asset
```

#### Booking Management
```
GET  /dashboard/booking                      - List bookings
POST /dashboard/booking                      - Create booking (Step 1)
GET  /dashboard/booking/{id}/second-step     - Customer details (Step 2)
GET  /dashboard/booking/{customer}/last-step - Confirmation (Step 3)
POST /dashboard/booking/{customer}/final-step - Submit booking
GET  /dashboard/booking/approval/list        - Approval queue
GET  /dashboard/booking/status/{id}/update   - Approve booking
```

#### Collection Management
```
GET  /dashboard/collection              - List collections
POST /dashboard/collection              - Create collection
GET  /dashboard/collection/{id}/print   - Print receipt
GET  /dashboard/collection/due/list     - Due list
POST /dashboard/collection/due/payment  - Pay dues
```

#### Reports
```
GET /dashboard/report/booking                      - Booking report
GET /dashboard/report/asset                        - Asset report
GET /dashboard/collectionreport/clientwise         - Client-wise collection
GET /dashboard/collectionreport/monthwise          - Month-wise collection
GET /dashboard/collectionreport/yearwise           - Year-wise collection
```

#### User Management
```
GET    /dashboard/users/index          - List users
POST   /dashboard/users/store          - Create user
PUT    /dashboard/users/update         - Update user
DELETE /dashboard/users/{id}/delete    - Delete user
GET    /dashboard/users/roles          - Manage roles
GET    /dashboard/users/permissions    - Manage permissions
```

## 🖼️ Screenshots

*(Add your screenshots here)*

```
/screenshots
  ├── dashboard.png
  ├── asset-management.png
  ├── booking-process.png
  ├── collection-form.png
  └── reports.png
```

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

See [CONTRIBUTING.md](CONTRIBUTING.md) for detailed guidelines.

## 🔄 Development Roadmap

### Planned Features
- [ ] SMS/Email notifications for rent due dates
- [ ] Tenant portal for self-service
- [ ] Online rent payment integration
- [ ] Mobile application (React Native)
- [ ] Maintenance request tracking
- [ ] Document management system
- [ ] Advanced analytics dashboard
- [ ] Multi-language support
- [ ] RESTful API for third-party integrations

## 🐛 Known Issues

- None reported yet. Please report issues on GitHub.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Arif Hossen**
- GitHub: [@arif853](https://github.com/arif853)
- LinkedIn: [Arif Hossen](https://www.linkedin.com/in/arif-hossen853/)
- Email: info@arifhossen.site
- Portfolio: [arifhossen.site](https://arifhossen.site)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) - Role and Permission Management
- [TailwindCSS](https://tailwindcss.com) - CSS Framework
- [Alpine.js](https://alpinejs.dev) - JavaScript Framework
- All contributors who have helped this project grow

## 📞 Support

If you encounter any issues or have questions:

1. Check the [documentation](#table-of-contents)
2. Search [existing issues](https://github.com/arif853/rentflow-pro/issues)
3. Create a [new issue](https://github.com/arif853/rentflow-pro/issues/new)
4. Contact via email: info@arifhossen.site

## ⭐ Star History

If you find this project useful, please consider giving it a star! ⭐

---

<p align="center">Made with ❤️ using Laravel</p>
<p align="center">© 2026 RentFlow Pro. All rights reserved.</p>
