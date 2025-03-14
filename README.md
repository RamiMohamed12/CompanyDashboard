# Employee Management Dashboard

This project is a simple Employee Management Dashboard built with PHP and MySQL. It allows you to view, add, and delete employee records from a database.

## Features

- View all employees in a table
- Add new employees
- Delete existing employees
- Input validation for salary

## Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (for dependency management)
- XAMPP or any other local server environment

## Installation

1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/your-username/employee-management-dashboard.git
    ```

2. Navigate to the project directory:
    ```bash
    cd employee-management-dashboard
    ```

3. Install the required dependencies using Composer:
    ```bash
    composer install
    ```

4. Create a `.env` file in the root directory and add your database configuration:
    ```properties
    DB_HOST=localhost
    DB_NAME=employees
    DB_USER=root
    DB_PASSWORD=
    DB_CHARSET=utf8mb4
    ```

5. Create the database and table by running the following SQL script in your MySQL database:
    ```sql
    -- Create the database if it doesn't exist
    CREATE DATABASE IF NOT EXISTS employees;

    -- Use the employees database
    USE employees;

    -- Create the employees table
    CREATE TABLE IF NOT EXISTS employees (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        address VARCHAR(255) NOT NULL,
        salary DECIMAL(13, 2) NOT NULL
    );

    -- Optional: Insert some sample data
    INSERT INTO employees (name, address, salary) VALUES
    ('John Doe', '123 Main St, City', 45000.00),
    ('Jane Smith', '456 Oak Ave, Town', 52000.00),
    ('Mike Johnson', '789 Pine Rd, Village', 48500.00);
    ```

6. Start your local server (e.g., XAMPP) and navigate to the project directory in your browser:
    ```
    http://localhost/employee-management-dashboard/src/index.php
    ```

## Usage

- **View Employees**: The main page displays a table of all employees in the database.
- **Add Employee**: Use the form at the bottom of the table to add a new employee. Ensure the salary is a positive number and within the allowed range.
- **Delete Employee**: Click the "Delete" link next to an employee to remove them from the database.

## File Structure

- `src/index.php`: Main file for displaying and managing employees.
- `config.php`: Database connection configuration.
- `style.css`: Basic styling for the dashboard.
- `.env`: Environment variables for database configuration.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [XAMPP](https://www.apachefriends.org/index.html)

## CREATED BY 

Rami Mohamed Amine 
