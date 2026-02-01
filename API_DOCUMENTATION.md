# API Documentation - RentFlow Pro

## Overview

This document provides detailed information about the RentFlow Pro API endpoints, request/response formats, and usage examples.

## Base URL

```
http://localhost:8000
```

## Authentication

RentFlow Pro uses Laravel Breeze for authentication with session-based authentication.

### Login
```http
POST /login
Content-Type: application/x-www-form-urlencoded

email=user@example.com
password=yourpassword
```

### Logout
```http
POST /logout
```

## API Endpoints

### Dashboard

#### Get Dashboard
Returns dashboard overview with statistics and recent assets.

```http
GET /dashboard
Authorization: Required
```

**Response:**
```json
{
  "assets": [...],
  "availableunitCount": 10
}
```

---

## Location Management

### List All Locations
```http
GET /dashboard/locations
Authorization: Required
Permission: view-locations
```

### Create Location
```http
POST /dashboard/locations
Authorization: Required
Permission: create-locations

Parameters:
- location_name: string (required)
- status: enum ['0', '1'] (required)
```

### Update Location
```http
PUT /dashboard/locations/{id}
Authorization: Required
Permission: update-locations

Parameters:
- location_name: string (required)
- status: enum ['0', '1'] (required)
```

### Delete Location
```http
DELETE /dashboard/locations/{id}
Authorization: Required
Permission: delete-locations
```

---

## Building Management

### List All Buildings
```http
GET /dashboard/building
Authorization: Required
Permission: view-buildings
```

### Create Building
```http
POST /dashboard/building
Authorization: Required
Permission: create-buildings

Parameters:
- building_name: string (required)
- building_type: string (required)
- building_code: string (required, unique)
- location_id: integer (required)
- employee_id: integer (required)
- total_floor: integer (required)
- address: text (required)
- security_guard_name: string (optional)
- guard_contact_number: string (optional)
- gate_open_time: time (optional)
- gate_close_time: time (optional)
- status: enum ['0', '1'] (required)
```

### Get Building Details
```http
GET /dashboard/building/building_details/{id}
Authorization: Required

Returns: Building information with related data
```

### Get Employee Details
```http
GET /dashboard/building/employee_details/{id}
Authorization: Required

Returns: Employee information for building assignment
```

### Get Location List for Building
```http
GET /dashboard/locations/location-list/{id}
Authorization: Required

Returns: Locations for specific building
```

---

## Asset Management

### List All Assets
```http
GET /dashboard/asset
Authorization: Required
Permission: view-assets
```

### Create Asset
```http
POST /dashboard/asset
Authorization: Required
Permission: create-assets

Parameters:
- unit_name: string (required, max:255)
- asset_code: string (required, max:255)
- building_id: integer (required)
- location_id: integer (required)
- floor_id: integer (required)
- gas_type: string (optional)
- gas_owner_part_amount: decimal (optional)
- gas_rental_part_amount: decimal (optional)
- lift_facility: string (optional)
- electricity_type: string (optional)
- e_owner_part_amount: decimal (optional)
- e_rental_part_amount: decimal (optional)
- water_type: string (optional)
- water_owner_part_amount: decimal (optional)
- water_rental_part_amount: decimal (optional)
- unit_size: string (optional)
- unit_view: string (optional)
- monthly_rent: decimal (optional)
- service_charge: decimal (optional)
- others_charge: decimal (optional)
- available_from: date (optional)
- others_description: text (optional)
- employee_id: integer (optional)
- status: enum ['0', '1'] (required)
- rooms: array of room objects (optional)
  - room_name: string
  - room_type_id: integer
  - room_size: string
```

### Get Asset Details
```http
GET /dashboard/asset/{id}
Authorization: Required
Permission: view-assets
```

### Update Asset
```http
PUT /dashboard/asset/{id}
Authorization: Required
Permission: update-assets

Parameters: Same as Create Asset
```

### Delete Asset
```http
DELETE /dashboard/asset/{id}
Authorization: Required
Permission: delete-assets
```

### Delete Asset Room
```http
GET /dashboard/asset/room-delete/{room}
Authorization: Required
```

### Get Room Types
```http
GET /dashboard/room-types
Authorization: Required

Returns: List of available room types
```

---

## Booking Management

### List All Bookings
```http
GET /dashboard/booking
Authorization: Required
Permission: view-bookings
```

### Create Booking (Step 1)
```http
POST /dashboard/booking
Authorization: Required
Permission: create-bookings

Parameters:
- location_id: integer (required)
- building_id: integer (required)
- floor_id: integer (required)
- asset_id: integer (required)
```

**Response:** Redirects to Step 2

### Booking Step 2 (Customer Details)
```http
GET /dashboard/booking/step/{booking}/second-step
Authorization: Required

POST /dashboard/booking/step/{booking}/second-step
Parameters:
- customer_name: string (required)
- customer_email: email (optional)
- customer_phone: string (required)
- customer_nid: string (required)
- customer_address: text (required)
- family_members: array (optional)
  - member_name: string
  - member_nid: string
  - member_relation: string
```

### Booking Step 3 (Confirmation)
```http
GET /dashboard/booking/step/{customer}/last-step
Authorization: Required

Shows: Booking summary for final confirmation
```

### Final Booking Submission
```http
POST /dashboard/booking/step/{customer}/final-step
Authorization: Required

Completes the booking process
```

### Get Approval List
```http
GET /dashboard/booking/approval/list
Authorization: Required
Permission: approve-bookings

Returns: List of pending bookings for approval
```

### Approve Booking
```http
GET /dashboard/booking/status/{booking}/update
Authorization: Required
Permission: approve-bookings

Approves the booking and updates status
```

### Delete Booking Member
```http
GET /dashboard/booking/member/{id}/delete
Authorization: Required
```

### Print Booking Form (PDF)
```http
GET /dashboard/booking/report/DMP-from/printPDF
Authorization: Required

Returns: PDF of booking form
```

### AJAX Endpoints

#### Get Buildings by Location
```http
GET /dashboard/booking/get-buildings/{location_id}
Authorization: Required

Returns: JSON array of buildings
```

#### Get Assets by Building
```http
GET /dashboard/booking/get-asset/{building_id}
Authorization: Required

Returns: JSON array of available assets
```

#### Get Apartment Details
```http
GET /dashboard/booking/get-apartment-details/{asset_id}
Authorization: Required

Returns: JSON object with asset details
```

---

## Collection Management

### List All Collections
```http
GET /dashboard/collection
Authorization: Required
Permission: view-collections
```

### Create Collection
```http
POST /dashboard/collection
Authorization: Required
Permission: create-collections

Parameters:
- building_id: integer (required)
- asset_id: integer (required)
- customer_id: integer (required)
- employee_id: integer (required)
- collection_date: date (required)
- month: string (required, format: YYYY-MM)
- payable_amount: decimal (required)
- collection_amount: decimal (required)
- due_amount: decimal (calculated)
- water_amount: decimal (optional)
- gas_amount: decimal (optional)
- electricity_amount: decimal (optional)
- internet_amount: decimal (optional)
- dish_amount: decimal (optional)
- guard_amount: decimal (optional)
- adjust_amount: decimal (optional)
- gas_type: string (optional)
- electricity_type: string (optional)
- water_type: string (optional)
```

### View Collection
```http
GET /dashboard/collection/{id}
Authorization: Required
Permission: view-collections
```

### Print Collection Receipt
```http
GET /dashboard/collection/{id}/print
Authorization: Required

Returns: PDF receipt
```

### Get Due List
```http
GET /dashboard/collection/due/list
Authorization: Required
Permission: view-dues

Returns: List of all dues
```

### Make Due Payment
```http
POST /dashboard/collection/due/payment
Authorization: Required
Permission: pay-dues

Parameters:
- due_log_id: integer (required)
- payment_amount: decimal (required)
- payment_date: date (required)
```

### AJAX Endpoints

#### Get Assets by Building
```http
GET /dashboard/collection/get-asset/{building_id}
Authorization: Required

Returns: JSON array of assets
```

#### Get Asset Details
```http
GET /dashboard/collection/get-asset-details/{asset_id}
Authorization: Required

Returns: JSON object with asset and customer details
```

#### Get Employee Details
```http
GET /dashboard/collection/get-employee-details/{employee_id}
Authorization: Required

Returns: JSON object with employee details
```

---

## Collection Reports

### Client-Wise Collection Report
```http
GET /dashboard/collectionreport/clientwise/totalcollection
Authorization: Required
Permission: view-reports

Query Parameters:
- building_id: integer (optional)
- asset_id: integer (optional)
- date_range: string (optional)
```

#### Get Client-Wise Details
```http
GET /dashboard/collectionreport/clientwise/details
Authorization: Required

Query Parameters:
- asset_id: integer (required)
```

#### Generate Client-Wise PDF
```http
GET /dashboard/collectionreport/clientwise/pdf/{selectedAsset}
Authorization: Required

Returns: PDF report
```

### Month-Wise Collection Report
```http
GET /dashboard/collectionreport/monthwise/totalcollection
Authorization: Required
Permission: view-reports

Query Parameters:
- month: string (format: YYYY-MM)
- building_id: integer (optional)
```

#### Get Month-Wise Details
```http
GET /dashboard/collectionreport/monthwise/details
Authorization: Required

Query Parameters:
- month: string (required)
- building_id: integer (optional)
- asset_id: integer (optional)
```

#### Generate Month-Wise PDF
```http
GET /dashboard/collectionreport/monthwise/pdf/{month}/{building_id}/{asset_id}
Authorization: Required

Returns: PDF report
```

### Year-Wise Collection Report
```http
GET /dashboard/collectionreport/yearwise/totalcollection
Authorization: Required
Permission: view-reports

Query Parameters:
- year: integer (format: YYYY)
- building_id: integer (optional)
```

#### Get Year-Wise Details
```http
GET /dashboard/collectionreport/yearwise/details
Authorization: Required

Query Parameters:
- year: integer (required)
- building_id: integer (optional)
- asset_id: integer (optional)
```

#### Generate Year-Wise PDF
```http
GET /dashboard/collectionreport/yearwise/pdf/{year}/{building_id}/{asset_id}
Authorization: Required

Returns: PDF report
```

---

## Checkout Management

### List All Checkouts
```http
GET /dashboard/checkout
Authorization: Required
Permission: view-checkouts
```

### Create Checkout
```http
POST /dashboard/checkout
Authorization: Required
Permission: create-checkouts

Parameters:
- building_id: integer (required)
- asset_id: integer (required)
- customer_id: integer (required)
- checkout_date: date (required)
- reason: text (optional)
- final_settlement: decimal (calculated)
```

### Get Checkout Approval List
```http
GET /dashboard/checkout/approval/list
Authorization: Required
Permission: approve-checkouts
```

### Approve Checkout
```http
GET /dashboard/checkout/approval/list/approve/{checkout_id}
Authorization: Required
Permission: approve-checkouts
```

### Get Customer Due Details
```http
GET /dashboard/collection/get/collection/details/{customer_id}
Authorization: Required

Returns: Customer due and collection details
```

### AJAX Endpoints

#### Get Assets by Building
```http
GET /dashboard/collection/checkout/get-asset/{building_id}
Authorization: Required
```

#### Get Asset Details
```http
GET /dashboard/collection/checkout/get-asset-details/{asset_id}
Authorization: Required
```

---

## Reports

### Booking Report
```http
GET /dashboard/report/booking
Authorization: Required
Permission: view-reports

Returns: Booking statistics by building
```

#### Get Booking Details
```http
GET /dashboard/report/booking/details/{building_id}
Authorization: Required

Returns: Detailed booking list for building
```

#### Generate Booking PDF
```http
GET /dashboard/report/booking/pdf/{building_id}
Authorization: Required

Returns: PDF report of bookings
```

### Asset Report
```http
GET /dashboard/report/asset
Authorization: Required
Permission: view-reports

Query Parameters:
- location_id: integer (optional)
- building_id: integer (optional)
- floor_id: integer (optional)
```

#### Get Asset Details
```http
GET /dashboard/report/asset/details
Authorization: Required

Query Parameters:
- location_id: integer (optional)
- building_id: integer (optional)
- floor_id: integer (optional)
```

#### Generate Asset PDF
```http
GET /dashboard/report/asset/pdf/{location_id}/{building_id}/{floor_id}
Authorization: Required

Returns: PDF report of assets
```

### Checkout Report
```http
GET /dashboard/report/checkout
Authorization: Required
Permission: view-reports
```

#### Get Checkout Details
```http
GET /dashboard/report/checkout/details/{building_id}
Authorization: Required
```

#### Generate Checkout PDF
```http
GET /dashboard/report/checkout/pdf/{building_id}
Authorization: Required

Returns: PDF report of checkouts
```

---

## User Management

### List All Users
```http
GET /dashboard/users/index
Authorization: Required
Permission: view-users
```

### Create User
```http
POST /dashboard/users/store
Authorization: Required
Permission: create-users

Parameters:
- name: string (required)
- email: email (required, unique)
- password: string (required, min:8)
- password_confirmation: string (required)
- role: integer (role_id, optional)
```

### Update User
```http
POST /dashboard/users/update
Authorization: Required
Permission: update-users

Parameters:
- user_id: integer (required)
- name: string (required)
- email: email (required)
- role: integer (optional)
```

### Delete User
```http
DELETE /dashboard/users/{userId}/delete
Authorization: Required
Permission: delete-users
```

### Deactivate User
```http
GET /dashboard/users/dective_user/{id}
Authorization: Required
Permission: deactivate-users
```

---

## Role Management

### List All Roles
```http
GET /dashboard/user/roles
Authorization: Required
Permission: view-roles
```

### Create Role
```http
POST /dashboard/user/roles
Authorization: Required
Permission: create-roles

Parameters:
- name: string (required, unique)
```

### Update Role
```http
POST /dashboard/users/roles/{role}
Authorization: Required
Permission: update-roles

Parameters:
- name: string (required)
```

### Delete Role
```http
DELETE /dashboard/users/roles/{id}/delete
Authorization: Required
Permission: delete-roles
```

### Assign Permissions to Role
```http
GET /dashboard/users/roles/{roleId}/give-permissions
Authorization: Required
Permission: assign-permissions

PUT /dashboard/users/roles/{roleId}/give-permissions
Parameters:
- permissions: array of permission IDs
```

---

## Permission Management

### List All Permissions
```http
GET /dashboard/users/permissions
Authorization: Required
Permission: view-permissions
```

### Create Permission
```http
POST /dashboard/users/permissions
Authorization: Required
Permission: create-permissions

Parameters:
- name: string (required, unique)
```

### Update Permission
```http
POST /dashboard/users/permissions/{permission}
Authorization: Required
Permission: update-permissions

Parameters:
- name: string (required)
```

### Bulk Delete Permissions
```http
DELETE /dashboard/users/permissions/bulkdelete
Authorization: Required
Permission: delete-permissions

Parameters:
- permission_ids: array of permission IDs
```

---

## Customer Management

### List All Customers
```http
GET /dashboard/customer
Authorization: Required
Permission: view-customers
```

### Create Customer
```http
POST /dashboard/customer
Authorization: Required
Permission: create-customers

Parameters:
- customer_name: string (required)
- customer_email: email (optional)
- customer_phone: string (required)
- customer_nid: string (required)
- customer_address: text (required)
```

### Update Customer
```http
PUT /dashboard/customer/{id}
Authorization: Required
Permission: update-customers
```

### Delete Customer
```http
DELETE /dashboard/customer/{id}
Authorization: Required
Permission: delete-customers
```

---

## Employee Management

### List All Employees
```http
GET /dashboard/employee
Authorization: Required
Permission: view-employees
```

### Create Employee
```http
POST /dashboard/employee
Authorization: Required
Permission: create-employees

Parameters:
- employee_name: string (required)
- employee_code: string (required, unique)
- designation_id: integer (required)
- employee_phone: string (required)
- employee_email: email (optional)
- employee_address: text (optional)
- status: enum ['0', '1'] (required)
```

---

## Utility Routes

### Clear Cache
```http
GET /cache_clear
Authorization: Required

Clears: routes, cache, config, and optimizations
```

### Create Storage Link
```http
GET /storage_link
Authorization: Required

Creates symbolic link for storage
```

---

## Error Responses

### 401 Unauthorized
```json
{
  "message": "Unauthenticated."
}
```

### 403 Forbidden
```json
{
  "message": "This action is unauthorized."
}
```

### 404 Not Found
```json
{
  "message": "Resource not found."
}
```

### 422 Validation Error
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "field_name": [
      "Error message"
    ]
  }
}
```

### 500 Server Error
```json
{
  "message": "Server Error"
}
```

---

## Rate Limiting

Currently, no rate limiting is implemented. Consider implementing for production use.

## Pagination

List endpoints support pagination:

```
?page=1&per_page=15
```

Default: 15 items per page

---

## Notes

- All dates should be in `Y-m-d` format (e.g., 2026-02-01)
- All times should be in `H:i:s` format (e.g., 09:00:00)
- Decimal values should use dot notation (e.g., 1500.50)
- File uploads should use `multipart/form-data` encoding

---

**Last Updated:** February 2026
**Version:** 1.0.0
