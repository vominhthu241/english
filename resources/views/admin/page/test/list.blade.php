@extends('admin.layout.master') @section('content')
<div class="portlet-title">
    <div class="caption">
        <i class=" icon-layers font-green"></i>
        <span class="caption-subject font-green sbold uppercase">Test Datatable</span>
        <a href="{{ route('admincreate.test') }}" class="btn btn-outline btn-circle btn-sm red">
                <i class="fa fa-edit"></i> ADD NEW </a>
    </div>
</div>
<div class="portlet-body">
    <div class="alert alert-success" id="reportAlert" style="display:none"></div>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>
                        <i class="fa fa-briefcase"></i> Name </th>
                    <th width="" class="hidden-xs">
                        <i class="fa fa-user"></i> Type </th>
                    <th width="" class="hidden-xs">
                        <i class="fa fa-user"></i> Test Skill </th>
                    <th width="">
                        <a href="{{ route('adminadd.test') }}" class="btn btn-outline btn-circle btn-sm red">
                            <i class="fa fa-edit"></i> ADD </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tests as $test)
                <tr class="odd gradeX" id="tr{{$test->id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <a>{{ $test->name }}</a>
                    </td>
                    <td>{{ $test->type_test }}</td>
                    <td id="{{$test->id}}">{{ $test->testskill->test_skill_name }}</td>
                    <td>
                        <a id="e{{$test->id}}" href="{{ route('get.test', [ 'id' => $test->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                            <i class="fa fa-edit"></i> Edit </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection