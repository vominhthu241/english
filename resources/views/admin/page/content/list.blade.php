@extends('admin.layout.master') @section('content')
<div class="portlet light portlet-fit portlet-datatable ">
    <div class="portlet-title">
        <div class="caption">
            <i class=" icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">Content Datatable</span>
        </div>
    </div>
    <div class="container portlet-body">
        <div class="alert alert-success" id="reportAlert" style="display:none"></div>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
            <thead>
                <tr>
                    <th width="5%"> # </th>
                    <th class="hidden-xs">
                        <i class="fa fa-user"></i> Content </th>
                    <th width="15%">
                        <i class="fa fa-font"></i> Test </th>
                    <th width="20%">
                        <a href="{{ route('adminadd.content') }}" class="btn btn-outline btn-circle btn-sm red">
                            <i class="fa fa-edit"></i> ADD </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $contents)
                <tr class="odd gradeX" id="tr{{$contents->id}}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ substr($contents->content,0,400) }}...</td>
                    <td>{{ $contents->test->testskill->test_skill_name }} - {{ $contents->test->name }}</td>
                    <td>
                        <a id="e{{$contents->id}}" href="{{ route('get.content', [ 'id' => $contents->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                            <i class="fa fa-edit"></i> View </a>
                        <button id="{{$contents->id}}" class="btn btn-outline btn-circle dark btn-sm black deleteContent">
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
                <div class="modal-body">Do you really want to delete this Content? </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="confirmBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection @section('jquery')
<script>
    $(document).ready(function () {

        $(".deleteContent").on('click', function () {
            $("#basic").modal('show');
            id = $(this).attr('id');
            $('#basic').children('.modal-dialog').attr('id', 'id' + id);
        });

        $('#confirmBtn').on('click', function () {
            $("#basic").modal('hide');
            id = $('#basic').children('.modal-dialog').attr('id');
            id = id.replace("id", "");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route("destroy.content") }}',
                dataType: 'text',
                data: { id: id },
                success: function (data) {
                    $('#tr' + id).fadeOut();
                    $('#tr' + id).remove();
                    $("#reportAlert").text(data).show();
                    setTimeout(function () {
                        $('#reportAlert').fadeOut();
                    }, 4000);
                }
            });
        });
    });
</script> @endsection