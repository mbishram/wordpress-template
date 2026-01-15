# Default Theme

Hybrid theme created using [Sage](https://roots.io/sage/) and enhanced
using [Poet](https://github.com/Log1x/poet).

## Requirements

- DDEV >= 1.24.10

## Getting Started

Before starting development, you might want to change the name of the theme. To
do that, you need to update several files and folders; they are listed below.

- The theme folder itself `../default-theme` into `../your-text-domain`
- Text Domain `default-theme` inside `./style.css` into `your-text-domain`
- `base` property inside `./vite.config.js`, from
  `'/app/themes/default-theme/public/build/'` into
  `'/app/themes/your-text-domain/public/build/'`
- `DEFAULT_THEME_DIR` variable inside `/bin/init` and `/.ddev/commands/web/dev`
  in the project root directory, from `"web/app/themes/default-theme"` to
  `"web/app/themes/your-text-domain"`
- Optional but highly encouraged, you can also replace all the occurrences of
  `'default-theme'` translation text domain into `'your-text-domain'`. For
  example,

```diff
<a class="sr-only focus:not-sr-only" href="#main">
- {{ __('Skip to content', 'default-theme') }}
+ {{ __('Skip to content', 'your-text-domain') }}
</a>
```

After changing the theme name, you need to change your selected theme in the
WordPress Admin Dashboard to whatever `your-text-domain` is.

After that, copy `.env.example` to `.env` and update the following values.

```dotenv
APP_URL="${DDEV_PRIMARY_URL}"
```

This configuration is needed to fix the CORS error that happened in the
development environment. For more details,
see [Laravel Vite page on the CORS section](https://laravel.com/docs/12.x/vite#cors).

## Development

To start development and watch the file changes, run the following command.

```shell
ddev dev
```

You also need to make sure the build artifact exists on `/public/build/`. They
should already be generated when you first run the `bin/init` command. But if it
doesn't exist, run the build command below to generate it.

```shell
ddev npm run build
```

The build artifacts are mostly used for the `theme.json` generation. Without it,
the WordPress editor will not work properly.

Every time you make changes to `./theme.json`, you must also run the build
command. That's because hot reloading for `./theme.json` during development is
not supported by Sage.

## Linting

Linting is done using [Prettier](https://prettier.io/docs/install) for most of
the file types, i.e., .js, .blade.php, etc. They are installed in the current
theme root directory.

For PHP files, use [Laravel Pint](https://laravel.com/docs/12.x/pint) that is
already installed in the Bedrock root directory.

## Additional Features

Additional features like **registering custom post types**, **creating blocks,
creating patterns**, etc. are provided by Poet. For more information on how to
use them,
see [Poet usage documentation](https://github.com/Log1x/poet?tab=readme-ov-file#usage).

