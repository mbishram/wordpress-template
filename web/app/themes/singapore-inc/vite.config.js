import { defineConfig, loadEnv } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), '');

  const host = env.APP_URL ? new URL(env.APP_URL).hostname : '';
  if (!host) {
    throw new Error(
      'APP_URL environment variable is not set. Create .env file to set them.',
    );
  }

  return {
    base: '/app/themes/singapore-inc/public/build/',
    plugins: [
      tailwindcss(),
      laravel({
        input: [
          'resources/css/app.css',
          'resources/js/app.js',
          'resources/css/editor.css',
          'resources/js/editor.js',
        ],
        refresh: true,
      }),

      wordpressPlugin(),

      // Generate the theme.json file in the public/build/assets directory
      // based on the Tailwind config and the theme.json file from base theme folder
      wordpressThemeJson({
        disableTailwindColors: false,
        disableTailwindFonts: false,
        disableTailwindFontSizes: false,
      }),
    ],
    resolve: {
      alias: {
        '@scripts': '/resources/js',
        '@styles': '/resources/css',
        '@fonts': '/resources/fonts',
        '@images': '/resources/images',

        /**
         * Alias to keep WordPress using dependency extraction instead of one from node_modules. @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-dependency-extraction-webpack-plugin/
         *
         * NOTE:
         * The same package should also be installed on the dev dependencies.
         * This was only done to add type-hinting to the IDE, the package used are still one from WordPress dependency extraction.
         */
        '@wordpress/dom-ready': 'window.wp.domReady',
      },
    },
    server: {
      host: '0.0.0.0',
      port: 5173,
      hmr: {
        protocol: 'wss',
        host,
        clientPort: 5174,
      },
    },
  };
});
