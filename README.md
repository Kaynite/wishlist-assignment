# Wishlist Laravel Project

## Table of Contents

- [Wishlist Laravel Project](#wishlist-laravel-project)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [API Endpoints](#api-endpoints)
    - [Items Index](#items-index)
    - [Item Show](#item-show)
    - [Item Store](#item-store)
    - [Items Statistics](#items-statistics)
  - [Views](#views)

## Installation

Follow these steps to set up the project locally:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/kaynite/wishlist-assignment.git
   cd wishlist-laravel
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Create a `.env` file:**

   Duplicate `.env.example` and rename it to `.env`. Configure your database connection settings.

4. **Generate an application key:**

   ```bash
   php artisan key:generate
   ```

5. **Run migrations and seeders:**

   ```bash
   php artisan migrate --seed
   ```

6. **Start the development server:**

   ```bash
   php artisan serve
   ```

   Access the application at `http://localhost:8000`.

## API Endpoints

### Items Index

- Endpoint: `/api/items`
- Method: GET
- Description: Retrieve a list of wishlist items.

### Item Show

- Endpoint: `/api/items/{id}`
- Method: GET
- Description: Retrieve details of a specific wishlist item.

### Item Store

- Endpoint: `/api/items`
- Method: POST
- Description: Create a new wishlist item.
- Request body:
  ```json
  {
    "name": "Item Name",
    "price": 19.99,
    "seller": "Seller Name"
  }
  ```

### Items Statistics

- Endpoint: `/api/items/stats`
- Method: GET
- Description: Retrieve statistics about wishlist items.
- Response:
  ```json
  [
    {
      "label": "Total price this month",
      "value": 129.99
    },
    {
      "label": "Average price",
      "value": 45.99
    }
  ]
  ```

## Views

A simple view has been created for the wishlist items index.

- Route: `/items`
- Description: Displays a list of wishlist items.
