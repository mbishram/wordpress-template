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
- `DEFAULT_THEME_DIR` variable inside `/bin/init`, from
  `"web/app/themes/default-theme"` to `"web/app/themes/your-text-domain"`
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

Afterward, use the following command to watch the file changes while developing.

```shell
ddev npm run dev
```

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

