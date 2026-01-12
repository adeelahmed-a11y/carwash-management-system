# CarWash Management System

Web-based car wash management system with customer booking, PayPal (sandbox) payments, invoicing, notifications, and an admin back office for services, packages, promotions, inventory, and staff.

## Features

- Customer portal: browse services/packages, search, view details with feedback, register/login, book slots, pay via PayPal REST (sandbox), track bookings, leave feedback, and print invoices.
- Admin dashboard: manage categories, services and packages, employees, users, bookings, products/inventory, promotions, notifications, FAQs, and sale reports.
- Communication: contact form intake and email utility via PHPMailer (SMTP).
- Assets: Bootstrap 5 UI, Font Awesome icons, jQuery interactions, printable invoice view.

## Tech Stack

- PHP 8+, MySQL/MariaDB
- Bootstrap 5, jQuery
- Omnipay PayPal REST (vendor/), PHPMailer

## Getting Started

1. Requirements: PHP 8+, MySQL/MariaDB, Composer (if you want to reinstall vendor/), web server (Apache via XAMPP/WAMP/LAMP).
2. Clone or copy the repo into your web root (e.g., `htdocs/final`).
3. Database: create a database named `car_wash` and import `database/car_wash.sql`.
4. App config: update database credentials in `db_connection.php`; adjust timezone if needed.
5. Payments: replace the sandbox keys and URLs in `config.php` with your PayPal REST credentials and live/return/cancel URLs before production.
6. Email: set SMTP credentials in `function.php` (PHPMailer) to your own account; keep app passwords secure.
7. File permissions: ensure `image/` is writable if you allow uploads for users/services/products.
8. Run: start Apache & MySQL, then open `http://localhost/final/` in the browser.

## Default Test Accounts (from sample data)

- Admin: admin@gmail.com / 123
- Users: adeelhayat110@gmail.com / 123, a@gmail.com / 123

## Project Structure (key paths)

- Public portal pages: `index.php`, `service_detail.php`, `book_now.php`, `booking.php`, `profile.php`, `notification.php`, `generate_invoice.php`.
- Auth: `login.php`, `register.php`, `logout.php`.
- Admin panel: `admin/` (entry `admin/index.php`, dashboard `admin/home.php`, CRUD pages for services, packages, bookings, products, promotions, notifications, employees, FAQs, reports).
- Config: `config.php` (PayPal), `db_connection.php` (DB), `function.php` (email helper).
- Data: `database/car_wash.sql` sample schema & seed data.
- Assets: `css/`, `js/`, `image/`, `fonts/`, `vendor/`.

## Notes & Recommendations

- Replace all hard-coded secrets (DB, SMTP, PayPal) with environment-specific values; never commit production credentials.
- Passwords are stored in plaintext in the sample code; hash them (e.g., `password_hash`) before any real deployment.
- Keep vendor libraries updated if you reinstall via Composer.
- Set `PAYPAL_RETURN_URL` and `PAYPAL_CANCEL_URL` to your deployed domain when hosting externally.

## License

This project is provided as-is for educational purposes. It was developed as a Final Year Project (FYP) in a web development course. No specific license is applied at this time.
