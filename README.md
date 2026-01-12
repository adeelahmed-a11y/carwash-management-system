# CarWash Management System

A comprehensive, feature-rich web-based car wash service management platform built with PHP and MySQL. The system enables customers to browse services, book appointments, process secure payments via PayPal, and track their reservations, while providing administrators with complete control over operations, inventory, staff, pricing, and reporting.

## System Overview

The CarWash Management System is a full-stack solution designed for car wash businesses of all sizes. It combines a customer-facing portal for easy service booking and payment with a powerful administrative dashboard for managing every aspect of the business. The platform streamlines operations by automating booking confirmations, generating professional invoices, managing employee schedules, and tracking inventory and sales.

## Core Features

### Customer Portal
- **Service Discovery**: Browse comprehensive catalog of car wash services with detailed descriptions, pricing, and customer feedback
- **Advanced Search**: Search and filter services and packages by category and availability
- **User Accounts**: Secure registration and login system with profile management
- **Booking System**: Reserve car wash services with preferred date and time slots
- **Secure Payments**: Process payments directly through PayPal REST API (sandbox/production ready)
- **Booking Management**: View, track, and manage all current and past reservations
- **Feedback & Ratings**: Submit reviews and ratings for completed services
- **Invoice Generation**: Generate and print professional invoices for all transactions
- **Notifications**: Real-time alerts for booking confirmations, payment updates, and service reminders
- **Contact Form**: Direct communication channel with support team

### Administrative Dashboard
- **Service Management**: Create, update, and organize car wash services with categories and pricing
- **Package Management**: Bundle multiple services with discounted pricing options
- **Booking Administration**: View, manage, and modify all customer bookings with full visibility
- **Employee Management**: Maintain employee profiles, roles, and availability schedules
- **User Management**: Administer customer accounts, reset access, and manage permissions
- **Inventory Control**: Track products and supplies with stock management
- **Promotion Management**: Create and manage promotional campaigns and discount codes
- **Notification System**: Send system-wide notifications and updates to customers
- **FAQ Management**: Maintain comprehensive FAQ database for customer self-service
- **Sales Reports**: Generate detailed sales reports, revenue analysis, and performance metrics
- **Admin Access Control**: Multi-administrator support with secure authentication

## Technology Stack

- **Backend**: PHP 8 with full OOP support
- **Database**: MySQL/MariaDB with relational data model
- **Frontend**: Bootstrap 5 for responsive, mobile-first UI design
- **JavaScript**: jQuery for dynamic interactions and client-side functionality
- **Payment Gateway**: Omnipay PayPal REST API for secure payment processing
- **Email Service**: PHPMailer via SMTP for transactional emails
- **Icons**: Font Awesome 5 for professional iconography
- **Server**: Apache 2.4 with XAMPP integration

## System Requirements

### Minimum Requirements
- Windows 7 or later (Windows 10/11 recommended)
- XAMPP 7.4 or later (includes Apache, PHP, MySQL, phpMyAdmin)
- PHP 8.0 or higher
- MySQL 5.7 or MariaDB 10.3 or higher
- 500MB free disk space
- 2GB RAM minimum

### Recommended Setup
- Windows 10/11 (Pro or Home Edition)
- XAMPP 8.0 or latest
- PHP 8.3
- MySQL 8.0 or MariaDB 10.6
- 2GB free disk space
- 4GB RAM

### Internet & Services
- Active internet connection for PayPal payment processing
- SMTP access for sending email notifications
- Valid PayPal business account (Sandbox for testing, Live for production)

## Installation & Setup Guide for Windows with XAMPP

### Step 1: Download and Install XAMPP

1. Download XAMPP from https://www.apachefriends.org/
2. Choose the version with PHP 8.0 or higher
3. Run the installer and select default installation directory (typically C:\xampp)
4. During installation, ensure Apache, MySQL, and phpMyAdmin are selected
5. Complete the installation process

### Step 2: Start XAMPP Services

1. Open XAMPP Control Panel (Start Menu > XAMPP > XAMPP Control Panel)
2. Click "Start" button for Apache module
3. Click "Start" button for MySQL module
4. Wait for both services to show as running (green status indicators)
5. You should see Apache and MySQL running on default ports (80 and 3306)

### Step 3: Prepare the Application

1. Extract the CarWash Management System files to your XAMPP htdocs folder:
   ```
   C:\xampp\htdocs\carwash-system\
   ```
   Create the `carwash-system` folder if it doesn't exist.

2. Verify the folder structure contains:
   - admin/ (administrative interface)
   - css/ (stylesheets)
   - js/ (JavaScript files)
   - image/ (media assets)
   - fonts/ (font files)
   - database/ (SQL files)
   - vendor/ (third-party libraries)
   - config.php (configuration file)
   - db_connection.php (database connection)
   - function.php (helper functions)
   - index.php (home page)
   - Plus all other PHP files

### Step 4: Create the Database

1. Open phpMyAdmin in your browser:
   ```
   http://localhost/phpmyadmin/
   ```
   (Default login: username: root, password: empty)

2. Click on "Databases" tab

3. Create a new database:
   - Enter database name: `car_wash`
   - Select charset: utf8mb4_unicode_ci
   - Click "Create"

4. Import the database structure:
   - Navigate to the new `car_wash` database
   - Click "Import" tab
   - Choose file: `database/car_wash.sql` from your extracted files
   - Click "Go" to import sample data and schema

### Step 5: Configure Database Connection

1. Open `C:\xampp\htdocs\carwash-system\db_connection.php`

2. Update the database credentials:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";  // Leave empty if no password set
   $database = "car_wash";
   ```

3. Save the file

### Step 6: Configure PayPal Integration

1. Open `C:\xampp\htdocs\carwash-system\config.php`

2. Replace PayPal credentials:
   - `CLIENT_ID`: Your PayPal Client ID (from PayPal Developer Dashboard)
   - `CLIENT_SECRET`: Your PayPal Client Secret

3. Configure URLs (for local testing, leave as-is; update for production):
   ```php
   define('PAYPAL_RETURN_URL', 'http://localhost/carwash-system/success.php');
   define('PAYPAL_CANCEL_URL', 'http://localhost/carwash-system/cancel.php');
   ```

4. Set payment mode (keep `true` for sandbox testing):
   ```php
   $gateway->setTestMode(true);  // Change to false for production
   ```

5. Save the file

### Step 7: Configure Email Service (Optional but Recommended)

1. Open `C:\xampp\htdocs\carwash-system\function.php`

2. Locate the email configuration section and update SMTP settings:
   ```php
   $mail->Host = 'smtp.gmail.com';  // Your SMTP server
   $mail->Username = 'your-email@gmail.com';  // Your email
   $mail->Password = 'your-app-password';  // App password or SMTP password
   ```

3. For Gmail, enable "Less secure app access" or use an App-specific password

4. Save the file

### Step 8: Set File Permissions

1. Right-click on the `image` folder inside your installation
2. Select "Properties" > "Security" > "Edit"
3. Select "Everyone" and check "Full Control"
4. Click "Apply" and "OK"

This allows the system to upload and store images for services, products, and user profiles.

### Step 9: Access the Application

1. Open your web browser (Chrome, Firefox, Edge, or Safari)

2. Enter the application URL:
   ```
   http://localhost/carwash-system/
   ```

3. The homepage should load successfully with the carousel banner and service listings

## Default Test Accounts

The system includes pre-configured test accounts for immediate evaluation:

### Administrator Account
- **Email**: admin@gmail.com
- **Password**: 123
- **Access**: http://localhost/carwash-system/admin/
- **Permissions**: Full administrative access to all system features

### Customer Test Accounts
- **Email**: adeelhayat110@gmail.com | **Password**: 123
- **Email**: a@gmail.com | **Password**: 123
- **Access**: Customer portal with booking and payment capabilities

Use these accounts to test system functionality before creating production accounts.

## Detailed Project Structure

### Root Level Files
- **index.php**: Home page with service showcase and carousel
- **login.php**: Customer login page
- **register.php**: New customer registration form
- **logout.php**: Session termination and logout handler
- **book_now.php**: Booking initiation page with service selection
- **booking.php**: Booking confirmation and management interface
- **profile.php**: Customer profile and account settings
- **notification.php**: Customer notification center
- **generate_invoice.php**: Invoice creation and display
- **success.php**: Payment success confirmation page
- **cancel.php**: Payment cancellation handling
- **search.php**: Service search and filter functionality
- **service_detail.php**: Detailed service information page
- **product_detail.php**: Product information display
- **feedback.php**: Customer feedback and review submission
- **contact_us.php**: Contact form for general inquiries
- **about.php**: Company information and details
- **header.php**: Navigation and header template
- **footer.php**: Footer and common footer elements

### Configuration Files
- **config.php**: PayPal API credentials and payment gateway setup
- **db_connection.php**: MySQL database connection parameters
- **function.php**: Reusable helper functions and email utilities

### Administrative Panel (admin/ directory)
- **admin/index.php**: Admin login gateway
- **admin/session.php**: Session management for administrators
- **admin/header.php**: Admin navigation header
- **admin/sidebar.php**: Admin navigation sidebar
- **admin/home.php**: Administrator dashboard and overview
- **admin/service.php**: List all services
- **admin/add_service.php**: Add new service form
- **admin/update_service.php**: Edit existing service
- **admin/delete_service.php**: Delete service handler
- **admin/package.php**: List all service packages
- **admin/add_package.php**: Create new package
- **admin/update_package.php**: Modify package details
- **admin/delete_package.php**: Remove package
- **admin/product.php**: Inventory management listing
- **admin/add_product.php**: Add inventory item
- **admin/update_product.php**: Update inventory details
- **admin/delete_product.php**: Remove inventory item
- **admin/category.php**: Service category listing
- **admin/add_category.php**: Create new category
- **admin/update_category.php**: Edit category details
- **admin/delete_category.php**: Remove category
- **admin/employee.php**: Staff management listing
- **admin/add_employee.php**: Add staff member
- **admin/update_employee.php**: Modify staff information
- **admin/delete_employee.php**: Remove staff member
- **admin/user.php**: Customer account management
- **admin/update_user.php**: Edit customer details
- **admin/delete_user.php**: Remove customer account
- **admin/booking.php**: Booking management interface
- **admin/update_booking.php**: Modify booking details
- **admin/delete_booking.php**: Cancel booking handler
- **admin/promotion.php**: Promotion and discount management
- **admin/add_promotion.php**: Create new promotion
- **admin/update_promotion.php**: Edit promotion details
- **admin/delete_promotion.php**: Remove promotion
- **admin/notification.php**: System notification management
- **admin/add_notification.php**: Create customer notification
- **admin/delete_notification.php**: Remove notification
- **admin/faq.php**: FAQ database listing
- **admin/add_faq.php**: Add new FAQ entry
- **admin/update_faq.php**: Edit FAQ entry
- **admin/delete_faq.php**: Remove FAQ entry
- **admin/contact.php**: Manage customer inquiries
- **admin/delete_contact.php**: Archive inquiry
- **admin/report.php**: Sales and performance reports
- **admin/add_admin.php**: Create additional admin user
- **admin/update_admin.php**: Modify admin privileges
- **admin/delete_admin.php**: Remove admin user
- **admin/generate_invoice.php**: Invoice generation for sales
- **admin/add_sale.php**: Record new sale transaction
- **admin/update_sale.php**: Modify sale information
- **admin/delete_sale.php**: Remove sale record
- **admin/logout.php**: Admin session termination

### Static Assets
- **css/**: Bootstrap 5, custom stylesheets, and responsive design files
- **js/**: jQuery, Bootstrap JavaScript, and interactive components
- **image/**: Logos, service photos, product images, and media assets
- **fonts/**: Font files for typography
- **vendor/**: Third-party libraries (Omnipay, PHPMailer, Composer packages)

### Database
- **database/car_wash.sql**: Complete database schema with sample data

## User Roles and Permissions

### Customer Role
- Browse services and packages
- Create and manage bookings
- Process payments through PayPal
- View booking history and invoices
- Submit feedback and ratings
- Manage profile and contact information
- Receive notifications about bookings

### Administrator Role
- Full system access and configuration
- Create and manage all services and packages
- Process and modify customer bookings
- Manage staff schedules and profiles
- Track inventory and products
- Create promotional campaigns
- Generate sales reports and analytics
- Manage customer inquiries and notifications
- Create additional administrator accounts

## Security Considerations for Production

### Database Security
- Change default MySQL password immediately after installation
- Create dedicated database user with limited privileges instead of using root
- Use strong, complex database passwords
- Update database connection credentials regularly
- Never store database credentials in public repositories

### Payment Security
- Replace sandbox PayPal credentials with production credentials only when live
- Store API credentials in secure environment variables, not in code
- Enable HTTPS/SSL for all payment-related pages
- Validate all payment transactions on server-side
- Never store complete PayPal credentials in version control

### Email Security
- Use application-specific passwords instead of primary email password
- Enable SMTP encryption (TLS/SSL)
- Store email credentials securely outside code
- Implement rate limiting for email notifications
- Validate all email addresses before sending

### User Passwords
- Never use plaintext password storage in production
- Implement password hashing using `password_hash()` function
- Enforce strong password requirements
- Implement password reset functionality securely
- Add failed login attempt limiting

### Access Control
- Implement role-based access control verification
- Use sessions for authentication instead of cookies
- Set appropriate session timeout values
- Implement CSRF token protection on forms
- Add SQL injection prevention with prepared statements

### File Uploads
- Validate file types and sizes before upload
- Store uploads outside web root when possible
- Rename uploaded files to prevent overwrite attacks
- Scan uploads for malicious content
- Implement proper permission restrictions

## Database Backup and Recovery

### Regular Backups
1. Use phpMyAdmin to export the car_wash database regularly:
   - Login to phpMyAdmin
   - Select car_wash database
   - Click "Export" tab
   - Choose "SQL" format
   - Save the backup file securely

2. Schedule automated backups using MySQL tools or Windows Task Scheduler

### Restore from Backup
1. Access phpMyAdmin at http://localhost/phpmyadmin/
2. Select the car_wash database
3. Click "Import" tab
4. Select your backup SQL file
5. Click "Go" to restore

## Troubleshooting Common Issues

### Apache or MySQL Won't Start
- Check if ports 80 (Apache) or 3306 (MySQL) are already in use
- Try restarting XAMPP Control Panel
- Disable antivirus temporarily to check for conflicts
- Check XAMPP error logs in C:\xampp\apache\logs\

### Database Connection Errors
- Verify MySQL service is running in XAMPP Control Panel
- Confirm database credentials in db_connection.php are correct
- Check that car_wash database exists in phpMyAdmin
- Ensure database user has proper permissions

### PayPal Payment Not Working
- Verify PayPal credentials are correctly configured
- Confirm setTestMode is set to true for sandbox
- Check PAYPAL_RETURN_URL and PAYPAL_CANCEL_URL point to correct domain
- Test with PayPal sandbox accounts first

### File Upload Issues
- Verify image/ folder has write permissions
- Check available disk space
- Confirm file size doesn't exceed server limits
- Validate file format is accepted (jpg, png, gif)

### Email Not Sending
- Verify SMTP credentials are correct
- Check Gmail has "Less secure apps" enabled or App password configured
- Confirm port settings match your SMTP provider (usually 587 or 465)
- Check XAMPP error logs for SMTP connection errors

## Performance Optimization Tips

- Enable query caching in MySQL configuration
- Optimize database indexes for frequently queried fields
- Minify CSS and JavaScript files in production
- Implement image compression for faster loading
- Use browser caching headers for static assets
- Monitor slow query logs and optimize problematic queries
- Implement pagination for large result sets
- Use CDN for static assets if hosting remotely

## Maintenance Recommendations

### Weekly
- Monitor database size and disk usage
- Check error logs for issues
- Verify payment processing is functioning correctly

### Monthly
- Backup database and critical files
- Review access logs for suspicious activity
- Update inventory counts
- Analyze sales reports and performance metrics

### Quarterly
- Update all third-party libraries and dependencies
- Review and update security configurations
- Test disaster recovery procedures
- Audit user accounts and permissions

## Deployment to Production

### Before Going Live
1. Replace all test data with production data
2. Update PayPal credentials to production mode
3. Configure production SMTP email service
4. Implement HTTPS/SSL certificates
5. Update URLs from localhost to production domain
6. Implement advanced security measures
7. Set up automated backups
8. Configure monitoring and alerts
9. Test all critical functionality thoroughly
10. Document all configuration changes

### Production Hosting
- Choose reliable web hosting with PHP 8+ and MySQL support
- Ensure HTTPS is enabled for all pages
- Configure automated daily backups
- Implement robust logging and monitoring
- Set up firewall and DDoS protection
- Use environment variables for sensitive credentials
- Enable database replication for redundancy
- Implement load balancing if needed

## Support and Maintenance

For issues, feature requests, or general inquiries:
- Review system logs for error details
- Check FAQ section in admin panel
- Verify all configuration settings are correct
- Test with fresh browser and cleared cache
- Consult phpMyAdmin logs for database issues

## License

This project is provided as-is for educational purposes. It was developed as a Final Year Project (FYP) in a web development course. No specific license is applied at this time.
