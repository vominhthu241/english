@extends('admin.layout.master')
@section('content')
    <div class="portlet light portlet-fit portlet-datatable ">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">Content Datatable</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="alert alert-success" id="reportAlert" style="display:none"></div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                <thead>
                    <tr>
                        <th width="5%"> # </th>
                        <th width="10%">
                            <i class="fa fa-briefcase"></i> Content Name </th>
                        <th width="50%" class="hidden-xs">
                            <i class="fa fa-user"></i> Content </th>
                        <th>
                            <i class="fa fa-clock"></i> Time of test </th>
                        <th>
                            <i class="fa fa-font"></i> Test </th>
                        <th width="10%"> <a href="{{ route('adminadd.content') }}" class="btn btn-outline btn-circle btn-sm red">
                                <i class="fa fa-edit"></i> ADD </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $contents)
                    <tr class="odd gradeX" id="tr{{$contents->id}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contents->name }}</td>
                        <td>{{ $contents->content }}</td>
                        <td>{{ $contents->time }}</td>
                        <td>{{ $contents->test->testskill->test_skill_name }} - {{ $contents->test->name }}</td>
                        <td>
                            <a id="e{{$contents->id}}" href="{{ route('get.content', [ 'id' => $contents->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-edit"></i> View </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('jquery')
@endsection
