@include('admin.layouts.header')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>{{  $title  }} </h1>
    </div><!-- End Page Title -->

    <section class="section">
        @yield('content')
    </section>

  </main><!-- End #main -->

  @include('admin.layouts.footer')


