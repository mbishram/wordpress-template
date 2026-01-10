# SingaporeInc

Theme for SingaporeInc website. Created using [Sage](https://roots.io/sage/) and
enhanced using [Poet](https://github.com/Log1x/poet).

## Requirements

- DDEV >= 1.24.10

## Getting Started

While in the theme root directory, install the required dependencies using npm
and Composer.

```shell
# Install npm dependencies
ddev npm install

# Install Composer dependencies
ddev composer -d web/app/themes/singapore-inc install
```

Copy `.env.example` to `.env` and update the following values.

```dotenv
APP_URL="${DDEV_PRIMARY_URL}"
```

This configuration is needed to fix the CORS error that happened in the
development environment. For more details,
see [Laravel Vite page on the CORS section](https://laravel.com/docs/12.x/vite#cors).

Afterward, use the following command to watch the file changes while developing.

```shell
ddev npm run dev
```

## Linting

Linting is done using [Prettier](https://prettier.io/docs/install) for most of
the file types, i.e., *.js, *.blade.php, etc. They are installed in the current
theme root directory.

For PHP files, use [Laravel Pint](https://laravel.com/docs/12.x/pint) that is
already installed in the Bedrock root directory.

## Additional Features

Additional features like **registering custom post types**, **creating blocks,
creating patterns**, etc. are provided by Poet. For more information on how to
use them,
see [Poet usage documentation](https://github.com/Log1x/poet?tab=readme-ov-file#usage).

