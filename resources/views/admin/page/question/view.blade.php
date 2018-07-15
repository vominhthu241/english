@extends('admin.layout.master')
@section('content')
    <div class="portlet light portlet-fit portlet-datatable ">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">Question Datatable</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="alert alert-success" id="reportAlert" style="display:none"></div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                <thead>
                    <tr>
                        <th width="60%">
                            <i class="fa fa-briefcase"></i> Question </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> Content </th>
                        <th>
                            <i class="fa fa-shopping-cart"></i> Since </th>
                        <th width="20%"> <a href="{{ url('admin/ques/add') }}" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-edit"></i> ADD </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ques as $question)
                    <tr class="odd gradeX" id="tr{{$question->id}}">
                        <td>{{ $question['question'] }}</td>
                        <td>{{ $question->content['name'] }}</td>
                        <td>{{ $question['created_at'] }}</td>
                        <td>
                            <a id="e{{$question->id}}" href="{{ route('get.ques', [ 'id' => $question->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-edit"></i> View </a>
                            <a href="{{ route('destroy.ques', [ 'id' => $question->id]) }}" id="{{$question->id}}" class="btn btn-outline btn-circle dark btn-sm black deleteQues">
                                <i class="fa fa-trash-o"></i> Delete </a>
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
<script>
    $(document).ready(function(){
        $('.deleteQues').click(function () {
            confirm('Are you sure to delete');
        });

    });
</script>
@endsection
