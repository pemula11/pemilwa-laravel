# Pemilwa Laravel

This is a Laravel project for Pemilwa.

## Requirements

- PHP >= 8.2
- Composer
- Laravel >= 11

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/pemula11/pemilwa-laravel.git
    ```
2. Navigate to the project directory:
    ```sh
    cd pemilwa-laravel
    ```
3. Install dependencies:
    ```sh
    composer install
    ```
4. Copy the `.env.example` file to `.env`:
    ```sh
    cp .env.example .env
    ```
5. Generate an application key:
    ```sh
    php artisan key:generate
    ```
6. Set up your database configuration in the `.env` file.

7. Run the database migrations:
    ```sh
    php artisan migrate
    ```

## Usage

Start the local development server:
```sh
php artisan serve
```

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.