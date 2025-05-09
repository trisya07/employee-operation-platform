# 🏢 Employee Operation System (CodeIgniter)

A web application built with CodeIgniter to manage employee attendance, daily reports, file uploads, and internal team communication.

## 📌 Key Features

- ✅ **Employee Attendance**: Record clock-in and clock-out with timestamps
- 📋 **Daily Reports**: Employees can submit and track their daily work reports
- 🖼️ **Design Uploads**: Upload project files or design results

## 🛠️ Built With

- **Framework**: CodeIgniter 3
- **Backend Language**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Authentication**: Session-based login system
- **File Upload**: CI Upload Library

## ⚙️ Installation

1. Clone or download this repository
2. Import the `employee_system.sql` database into MySQL
3. Configure `application/config/database.php` with your DB credentials
4. Make sure `uploads/` folder is writable
5. Access via `http://localhost/employee-operation-system-ci`

## 👤 Default Admin Account

To access the admin dashboard, use the following default admin credentials:

- **Username**: `admin@admin.com`
- **Password**: `admin`

You can change the admin credentials after logging in.

## 📌 Notes

- Use `application/config/config.php` to set the base URL.
- Make sure `mod_rewrite` is enabled if you're using `.htaccess`.
