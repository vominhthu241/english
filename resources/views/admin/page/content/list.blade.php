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
                        <th width="60%">
                            <i class="fa fa-briefcase"></i> Content Name </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> Content </th>
                        <th>
                            <i class="fa fa-clock"></i> Time of test </th>
                        <th>
                            <i class="fa fa-font"></i> Test </th>
                        <th width="20%"> <a href="{{ route('adminadd.content') }}" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-edit"></i> ADD </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $contents)
                    <tr class="odd gradeX" id="tr{{$contents->id}}">
                        <td>{{ $contents->name }}</td>
                        <td>{{ $contents->content }}</td>
                        <td>{{ $contents->time }}</td>
                        <td>{{ $contents->test->name }}</td>
                        <td>
                            <a id="e{{$contents->id}}" href="{{ route('get.content', [ 'id' => $contents->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-edit"></i> View </a>
                            <button id="{{$contents->id}}" class="btn btn-outline btn-circle dark btn-sm black deleteQues">
                                <i class="fa fa-trash-o"></i> Delete </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Alert</h4>
                </div>
                <div class="modal-body">Do you really want to delete this user? </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="confirmBtn">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>   
@endsection

@section('jquery')
@endsection
