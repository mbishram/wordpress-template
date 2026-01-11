# WordPress Template

A WordPress template created using [DDEV](https://ddev.com/)
and [Bedrock](https://roots.io/bedrock/).

## Requirements

- DDEV >= 1.24.10

## Getting Started

To get started, rename the DDEV project using the command below.

```shell
ddev config --project-name=your-project-name-here
```

Afterward, copy `.env.example` to `.env` and update the following values.

```dotenv
DB_NAME='db'
DB_USER='db'
DB_PASSWORD='db'
DB_HOST='db'
...
WP_ENV='development'
WP_HOME="${DDEV_PRIMARY_URL}"
WP_SITEURL="${WP_HOME}/wp"
...
```

For more details about what each of those environment variables does,
see [DDEV Environment Variable page](https://roots.io/bedrock/docs/environment-variables/).

After environment variables are set, install Composer dependencies using the
command below.

```shell
ddev composer install
```

Next, install WordPress using the command below.

```shell
ddev wp core install --url='$DDEV_PRIMARY_URL' --title='Your Wordpress Title' --admin_user=admin --admin_password=admin --admin_email=admin@example.com
```

`title`, `admin_user`, `admin_password`, and `admin_email` can be whatever value
you want; it'll only affect your local development environment. But if you
didn't change anything, the admin dashboard user and password are `admin` and
`admin`.

After that, you can run the following command to get the URL of your DDEV
project plus some additional information about it.

```shell
ddev describe
```

## Default Theme

After setting up WordPress, you can start developing the theme. This project
comes with a default theme that is created using [Sage](https://roots.io/sage/).
They can be found in `web/app/themes/default-theme`.

For more details on how to run them, see the `README.md` file on the theme root
directory.

## Development

While developing, you might want to run some commands to install an npm
package (`npm install`) or require a composer package (`composer install`).
Because we're using DDEV, to use those commands, you need to use DDEV CLI. For
example,

- `ddev npm install`
- `ddev composer install`

For a more complete command list,
see [Using the ddev Command page](https://docs.ddev.com/en/stable/users/usage/cli/).

## Linting

Linting on PHP files is done
using [Laravel Pint](https://laravel.com/docs/12.x/pint).

```shell
# Run linting
ddev composer run lint

# Run linting and fix the issues
ddev composer run lint:fix
```