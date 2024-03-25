# SimpleShop

SimpleShop is a lightweight e-commerce platform built with CodeIgniter 3, showcasing features such as product listings, a shopping cart, user authentication, and a simple likes system. This project is designed to demonstrate web development skills with PHP and the CodeIgniter framework.

## Features

- User Authentication (Register, Login, Logout)
- Product Management (Add, View, Like)
- Shopping Cart (Add, Update, Remove, Checkout)
- Likes System (Like/Unlike Products)
- Responsive Design using Bootstrap

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 7.x
- MySQL
- Composer
- Git

### Installing

A step-by-step series of examples that tell you how to get a development environment running.

1. **Clone the repository**

`git clone https://yourrepositoryurl.com/simple-shop.git
cd simple-shop`

2. **Install dependencies**

`composer install`

3. **Create a database**

Log in to your MySQL server and create a new database for the project:

`CREATE DATABASE simpleshop;`

4. **Configure your environment**

edit `application/config/config.php edit` with your database settings and base URL:

`composer install`

5. **Migrate the database**

Run the migration script to create the necessary tables:

`php index.php migrate`

6. **Start your server**

Use PHP's built-in server for testing:

`php -S localhost:8000`

Navigate to http://localhost:8000 in your browser.

**Built With**

CodeIgniter 3 - The web framework used
MySQL - Database
Bootstrap - Frontend Framework