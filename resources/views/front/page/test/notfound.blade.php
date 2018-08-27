@extends('front.page.master') @section('content')
<div class="container" style="text-align:center;">
  <div class="row">
    <div class="col-md-12 page-404">
      <div class="number font-green"> Sorry </div>
      <div class="details">
        <h2>
          <b>This test is not yet have</b>
        </h2>
        <h4> Please do test later.<p><a href="{{route('homepage')}}"> Return home </a> </p></h4>
        <br/>

        <button type="button" class="btn btn-danger" onclick="goBack()">Go Back</button>
      </div>
    </div>
  </div>
</div>
<script>
  function goBack() {
    window.history.go(-1);
  }
</script> @endsection