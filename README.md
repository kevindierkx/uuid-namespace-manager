# UUID namespace manager
A manager interface for maintaining UUID v5 namespaces. It uses [webpatser/laravel-uuid](https://github.com/webpatser/laravel-uuid) to generate v5 UUID hashes, namespaced with the `NS_DNS` namespace.

For more information about the UUID specification: [RFC 4122](http://tools.ietf.org/html/rfc4122)

## Installation
_This application is build using the [Laravel framework](http://laravel.com) for a complete installation guide on Laravel applications please check the [Laravel documentation](http://laravel.com/docs/4.2/quick)._

### Requirements
The application requires a database connection to store and maintain it's namespaces. Some PHP modules for maintaining database connections and an existing database connection are required.
- MySQL
- PHP >= 5.5.9
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
  - Tokenizer PHP Extension

### Composer installation
Clone or download the application and navigate to the ROOT folder of the application in your terminal. Run the following command to install the application.

```
composer install
```

### Enviroment configuration
The ROOT directory of the application will contain a `.env.example` file. If you installed the application via Composer, this file will automatically be renamed to `.env`. Otherwise, you should rename the file manually.

The `.env` contains all necessary configurations for the application to function properly.

Feel free to modify your environment variables as needed for your own server

#### Generating a random APP_KEY _optional_
You can generate a random `APP_KEY` using the following command.

```
php artisan key:generate
```

### Database migrations
The application requires some database tables to store it's namespaces. By navigating to the ROOT directory of the application in your terminal and running the following command automatically builds the required tables.

```
php artisan migrate
```

### Database seeds _optional_
Some namespace IDs as defined in the [RFC 4122 appendix C](http://tools.ietf.org/html/rfc4122#appendix-C) can be seeded using the command below, this step is completely optional.

```
php artisan db:seed
```

## License
The MIT License (MIT). Please see [License File](https://github.com/kevindierkx/uuid-namespace-manager/blob/master/LICENSE) for more information.
