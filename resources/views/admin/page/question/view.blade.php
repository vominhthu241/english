@extends('admin.layout.master') @section('content')
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
                    <th width="20%">
                        <a href="{{ url('admin/ques/add') }}" class="btn btn-outline btn-circle btn-sm red">
                            <i class="fa fa-edit"></i> ADD </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ques as $question)
                <tr class="odd gradeX " id="tr{{$question->id}}">
                    <td>{{ $question['question'] }}</td>
                    <td>{{ $question->content['name'] }}</td>
                    <td>{{ $question['created_at'] }}</td>
                    <td>
                        <a id="e{{$question->id}}" href="{{ route('get.ques', [ 'id' => $question->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                            <i class="fa fa-edit"></i> View </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection @section('jquery')
<script>
    $(document).ready(function () {
        $('.deleteQues').click(function () {
            confirm('Are you sure to delete');
        });
    });
</script> @endsection