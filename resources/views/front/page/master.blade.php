<!DOCTYPE html>
<html lang="en">
@include ('front.page.header')
  <body>
    <div class="home-header">
      @include('front.page.navbar')
    </div>
    <div class="content-page-home">
      <div class="home-content">
        @yield('content') 
    </div>
    </div>
    @include ('front.page.script')
    @yield('jquery')
  </body>
</html>