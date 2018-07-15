@extends('front.page.master') @section('content')
<div class="container portlet light portlet-fit portlet-datatable ">
  <div class="row">
    @foreach ($contentdata['content'] as $contents)
    <div class="col-md-4">
      <div class="pmi-caption caption-write">
        <span>{{ $contents->name }}</span>
      </div>
      <div class="om-item">
        <a href="{{route('test',['id'=>$contents->id])}}">
          <span class="om-icon icon-writing"> </span>
          <strong>reading</strong>
        </a>
        <div class="row">
          <div class="col-md-6">
            <a href="{{route('test',['id'=>$contents->id])}}" class="om-btn">
              <span></span> Take Test </a>
          </div>
          <div class="col-md-6">
            <a href="{{route('solution',['id'=>$contents->id])}}" class=" om-btn btn-solution">
              <span class="om-icon icon-lego"></span>View Solution
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection