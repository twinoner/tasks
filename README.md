# Laravel Project

This is a basic Laravel project. It includes a simple task management system with project functionality.

## Getting Started

Follow these steps to get the project up and running on your local machine.

### Prerequisites

Before you begin, make sure you have the following software installed:

- PHP (>= 7.4)
- Composer
- Node.js and npm (Node Package Manager)
- MySQL or any other supported database system


### Commands to run once

Be sure to modify the `.env` file before you run this commands and run this just once.

- php artisan key:generate
- php artisan migrate z
- php artisan db:seed (to create random data on the database)

### Run the project

Just run the command `php artisan serve` 
If for some reason you have the port 8080 occupied, run `php artisan serve --port=5678` where `5678` it's just an example.