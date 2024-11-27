<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Core Features

- Email Submission: Accepts email data via an API endpoint.
- Asynchronous Sending: Processes email sending using Laravel queues.
- Status Tracking: Tracks the status of emails (pending, sent, failed).
Additional Features
- View Sent Emails: Retrieves a list of emails with the status sent.
- Formatted API Responses: Uses resources to standardize the API output.


## API Endpoints
- POST	/api/emails	 Submit a new email
- GET	/api/emails	Retrieve a list of all email records
- GET	/api/emails/sent	Retrieve a list of sent emails

# Installation

### Clone the Repository
- git clone <repository_url>
- cd <repository_name>

### Run project with sail
- ./vendor/bin/sail up

### Install Dependencies
- composer install

###  Configure the .env File
- cp .env.example .env

### Database Configuration:
-  DB_CONNECTION
-  DB_DATABASE
-  DB_USERNAME
-  DB_PASSWORD

### Queue Configuration
- QUEUE_CONNECTION=database

### Create a Symbolic Link for Storage
- php artisan storage:link

### Run Database Migrations
- php artisan migrate

### Start the Queue Worker
- php artisan queue:work


# How to Use

### Submit a New Email
- Send a POST request to /api/emails

`{
"email_address": "example@example.com",
"message": "Your message here",
"attachment": "Base64_encoded_file_content (optional)",
"attachment_filename": "example.txt (optional)"
}`

### Retrieve All Emails
- Send a GET request to /api/emails

### Retrieve Sent Emails
- Send a GET request to /api/emails/sent

