# Techify
## Techify is a modern web application designed to deliver the latest tech news, reviews, and resources. Built with Laravel 11, it features a clean, user-friendly interface and powerful backend functionality for seamless content management.

## Features
### Real-time tech news and updates
### Dynamic article categorization and filtering
### Search functionality to find specific topics quickly
### User registration and authentication
### Responsive design for desktop and mobile devices
## Technologies Used
#### Framework: Laravel 11
#### Package Manager: Composer
#### Frontend: HTML, CSS, Blade Templates, JavaScript
#### Database: MySQL
## Setup Instructions
### Prerequisites
#### PHP 8.x or higher
#### MySQL database
#### Composer
## Installation
### Clone the repository:

git clone https://github.com/yourusername/techify.git  
cd techify  
Install dependencies using Composer:
composer install  
Install frontend dependencies and compile assets: 
npm install  
npm run dev  
Create a new MySQL database:

sql
Copy
Edit
CREATE DATABASE techify_db;  
Configure your .env file:

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=techify_db  
DB_USERNAME=your_db_username  
DB_PASSWORD=your_db_password  
Run migrations and seed the database:


php artisan migrate --seed  
Serve the application locally:

php artisan serve  
Visit the app in your browser: http://localhost:8000.

### Usage
### User: Browse tech articles, reviews, and news. Use the bookmarking feature to save articles add posts.
Fork the repository
Create your feature branch (git checkout -b feature-name)
Commit your changes (git commit -am 'Add new feature')
Push to the branch (git push origin feature-name)
Open a pull request
### License
This project is licensed under the MIT License - see the LICENSE file for details.
