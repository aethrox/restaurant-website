# Restaurant Website

A restaurant ordering website built as a university web programming course's final project: user accounts, a menu, cart, order placement/cancellation, an admin panel, and email notifications.

## Features

- **User Registration and Login**: create an account and sign in
- **Order Placement**: browse the menu and place an order
- **Order Cancellation**: cancel a placed order
- **Admin Panel**: manage users and orders
- **Email Notifications**: order confirmations sent via PHPMailer

## Quick Start

**Requirements:** PHP with a web server (e.g. XAMPP/MAMP or `php -S`), MySQL.

```bash
git clone https://github.com/aethrox/restaurant-website.git
cd restaurant-website
```

1. Create a MySQL database named `restaurant`.
2. `php/config.php` defaults to `DB_SERVER=localhost`, `DB_USERNAME=root`, `DB_PASSWORD=` (empty), `DB_NAME=restaurant`. Edit it if your local MySQL setup differs.
3. Configure PHPMailer credentials in the mail-sending code under `php/` if you want email notifications to actually send.
4. Serve the project root (e.g. `php -S localhost:8000` or place it in your web server's document root) and open `index.php`.

## Tech Stack

HTML, CSS, Bootstrap, JavaScript, PHP, MySQL, [PHPMailer](https://github.com/PHPMailer/PHPMailer).

## Project Structure

```
index.php      # entry point
pages/         # page templates
php/           # server-side logic (auth, db connection, config)
styles/        # CSS
images/        # static assets
PHPMailer/     # vendored PHPMailer library
```

## Limitations

- Database credentials are hardcoded constants in `php/config.php`, not loaded from environment variables; don't reuse the default `root` / empty-password setup outside a local dev environment.
- No automated tests; this was built and verified manually as a course project.
- Built and tested locally; no production deployment guide is included.

## License

No LICENSE file is currently included in this repository.
