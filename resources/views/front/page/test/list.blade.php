@extends('front.page.master') @section('content')
<div class="container portlet light portlet-fit portlet-datatable ">
    <div class="row">
        @foreach ($tests as $test)
        <div class="col-md-4">
            <div class="pmi-caption">
                <span>{{ $test->name }}</span>
            </div>
            <div class="om-item om-write">
                <a href="{{route('test.content',['id'=>$test->id])}}">
                    <span class="om-icon icon-reading"> </span>
                    <strong>reading</strong>
                </a>
                <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                    <span></span> Take Test </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection