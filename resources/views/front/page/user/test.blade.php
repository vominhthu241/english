{{ Session::get('users')->name }}
@foreach ($data as $test)
  {{ $test['result'] }}
  {{ $test['test'] }}
  {{ $test['content'] }}
@endforeach

<table>
  <thead>
    
  </thead>
</table>