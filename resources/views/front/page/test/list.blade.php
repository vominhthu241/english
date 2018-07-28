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
                    <strong>{{$test->testskill->test_skill_name}}</strong>
                </a>
                <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                    <span></span> View all Test </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection