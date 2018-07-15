<!DOCTYPE html>
<html lang="en">
@include ('front.page.header')

<body>
  <div class="page-content">
    <div class="container-test row">
      @foreach ($contentdata['content'] as $contents)
      <div class="content-test col-md-6">
          <p>{{ $contents->name }}</p>
          <a href="{{route('test',['id'=>$contents->id])}}" class="om-btn">
              <span></span> Take Test </a>
      </div>
      @endforeach
    </div>
  </div>
  @include ('front.page.script') @yield('jquery')
</body>

</html>