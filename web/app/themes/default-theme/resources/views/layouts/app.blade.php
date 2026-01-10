<!DOCTYPE html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content', 'default-theme') }}
      </a>

      @include('sections.header')

      <main id="main" class="main">
        <div class="container mx-auto bg-blue-400 text-white">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur
          enim eum itaque nihil, soluta sunt? A debitis dignissimos earum est ex
          illo ipsum, necessitatibus nostrum officia praesentium reprehenderit
          ut veritatis, vitae. Adipisci aliquid animi at autem commodi,
          consequatur, corporis culpa dicta dolore doloremque dolores et facilis
          fuga fugiat id ipsum iste iure molestias nam nemo nihil placeat quam
          quos reprehenderit rerum sapiente ullam velit! Dolorum ducimus earum
          fugit harum iusto laboriosam minus officiis placeat quia sapiente? Ab
          architecto commodi cumque earum eum necessitatibus obcaecati quod,
          voluptatibus. Animi at commodi corporis, deserunt distinctio dolore et
          eum exercitationem facere inventore iste labore nam nesciunt nihil
          obcaecati odio, omnis pariatur quae quod rem saepe suscipit tenetur
          ut. Asperiores eius quisquam recusandae. Accusamus accusantium atque
          eius optio quod? Nobis numquam placeat possimus saepe ullam. A
          accusamus animi aperiam, dolor dolorum enim, error esse eum facilis
          fugit illo illum itaque laborum modi mollitia natus nobis omnis quam
          saepe sunt tempora, voluptas voluptates? Autem, delectus dicta ea ex
          facere in, ipsa ipsam iste nostrum quos saepe unde vel voluptas?
          Aliquam aliquid, consequatur ea eum ex facilis itaque magnam officiis
          porro possimus quaerat, quidem quis quos repudiandae sapiente. Aliquam
          dolorem eum nam non repudiandae sunt tempora temporibus.
        </div>
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
