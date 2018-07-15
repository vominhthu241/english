@extends('front.page.master') @section('content')
<div class="container portlet light portlet-fit portlet-datatable ">
    <div class="row">
        @foreach ($tests as $test)
        <div class="col-md-3">
            <div class="pmi-caption">
                <span>{{ $test->name }}</span>
            </div>
            <div class="om-item">
                <a href="{{route('test.content',['id'=>$test->id])}}">
                    <span class="om-icon"> </span>
                    <strong>reading</strong>
                </a>
                <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                    <span></span> Take Test </a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- <div class="portlet-title">
        <div class="caption">
            <i class=" icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">Sample Datatable</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="alert alert-success" id="reportAlert" style="display:none"></div>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
            <thead>
                <tr>
                    <th>
                        <i class="fa fa-briefcase"></i> Name </th>
                    <th class="hidden-xs">
                        <i class="fa fa-user"></i> Type </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tests as $test)
                <tr class="odd gradeX" id="tr{{$test->id}}">
                    <td></td>
                    <td>
                        <a href="{{route('test',['id'=>$test->id])}}">{{ $test->name }}</a>
                    </td>
                    <td>{{ $test->type_test }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> -->
</div>
@endsection