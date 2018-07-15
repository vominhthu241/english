@extends('admin.layout.master') @section('content')
<div class="portlet-title">
    <div class="caption">
        <i class=" icon-layers font-green"></i>
        <span class="caption-subject font-green sbold uppercase">Test Datatable</span>
    </div>
</div>
<div class="portlet-body">
    <div class="alert alert-success" id="reportAlert" style="display:none"></div>
    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
        <thead>
            <tr>
                <th>
                    <i class="fa fa-briefcase"></i> Name </th>
                <th width="30%"class="hidden-xs">
                    <i class="fa fa-user"></i> Type </th>
                <th width="30%">
                    <a href="{{ route('adminadd.test') }}" class="btn btn-outline btn-circle btn-sm purple">
                        <i class="fa fa-edit"></i> ADD </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tests as $test)
            <tr class="odd gradeX" id="tr{{$test->id}}">
                <td>
                    <a href="{{route('showadmin.test',['id'=>$test->id])}}">{{ $test->name }}</a>
                </td>
                <td>{{ $test->type_test }}</td>
                <td>
                    <a id="e{{$test->id}}" href="{{ route('get.test', [ 'id' => $test->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                        <i class="fa fa-edit"></i> Edit </a>
                    <button id="{{$test->id}}" class="btn btn-outline btn-circle dark btn-sm black deleteQues">
                        <i class="fa fa-trash-o"></i> Delete </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection