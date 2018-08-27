@extends('front.page.master') @section('content')
<div class="container portlet light portlet-fit portlet-datatable ">
  <button type="button" class="btn btn-default" onclick="goBack()">Back</button>
  <div class="row">
    <div class="col-md-4 cl-dark">
      <div class="pmi-caption caption-write">
        <span>{{ $contentdata['test']->name }}</span>
      </div>
      <div class="om-item">
        <a href="{{route('test',['id'=>$contentdata['test']->id])}}">
          <span class="om-icon icon-writing"> </span>
        </a>
        <div class="row">
          <div class="col-md-6">
            <a href="{{route('test',['id'=>$contentdata['test']->id])}}" class="om-btn">
              <span></span> Take Test </a>
          </div>
          <div class="col-md-6">
            <a href="{{route('solution',['id'=>$contentdata['test']->id])}}" class=" om-btn btn-solution">
              <span class="om-icon icon-lego"></span>View Solution
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-offset-2 col-md-6 text-center">
      <h3>Top 10 highest score</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Top</th>
            <th>User</th>
            <th>Score</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 10 ?> @foreach ($contentdata['results'] as $result)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$result['user']}}</td>
            <td>{{$result['score']}}</td>
            <td>{{$result['time']}}</td>
          </tr>
          <?php $i-- ?> @if ($i == 0) @break @endif @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  function goBack() {
    window.history.go(-1);
  }
</script> @endsection