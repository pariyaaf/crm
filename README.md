# CRM System

This project is a Customer Relationship Management (CRM) system built with Laravel 10. It allows users to manage clients, projects, tasks, and user authentication efficiently.

## Features
- **Client Management:** Store and manage customer information.
- **User Management:** Handle user roles and authentication.
- **Project & Task Management:** Organize projects and track tasks.
- **Authentication:** Secure login and API authentication using Laravel Sanctum.
- **Database Support:** Uses MySQL as the database backend.

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/pariyaaf/crm.git
   cd crm
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install
   ```
3. Set up the environment:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure the database in the `.env` file and run migrations:
   ```sh
   php artisan migrate
   ```
5. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage
- Access the application at `http://localhost:8000`
- Register or log in to manage clients and projects

## Technologies Used
- **Laravel 10**
- **MySQL**
- **Laravel Sanctum** (API authentication)
- **Guzzle HTTP Client** (for API requests)

## License
This project is open-source and available under the [MIT License](LICENSE).

