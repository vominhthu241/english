@extends('admin.layout.master') @section('content')
<div class="portlet-title">
    <div class="caption">
        <i class=" icon-layers font-green"></i>
        <span class="caption-subject font-green sbold uppercase">Test Datatable</span>
        <a href="{{ route('admincreate.test') }}" class="btn btn-outline btn-circle btn-sm red">
            <i class="fa fa-edit"></i> ADD NEW </a>
    </div>
</div>
<div class="container portlet-body">
    <div class="alert alert-success" id="reportAlert" style="display:none"></div>
    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>
                    <i class="fa fa-briefcase"></i> Name </th>
                <th width="" class="hidden-xs">
                    <i class="fa fa-user"></i> Time </th>
                <th width="" class="hidden-xs">
                    <i class="fa fa-user"></i> Test Type </th>
                <th width="" class="hidden-xs">
                    <i class="fa fa-user"></i> Test Skill </th>
                <th width="" class="hidden-xs">
                    </i> Status </th>
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
                <td>
                    <a>{{ $test->time }}</a>
                </td>
                <td>
                    <a>{{ $test->type_test }}</a>
                </td>
                <td id="{{$test->id}}">{{ $test->testskill->test_skill_name }}</td>
                @if($test->status==1)
                <td>
                    <img width="30%" src="../assets/global/img/english/view.png" alt="logo" class="logo-default" />
                </td>
                @endif @if($test->status==0)
                <td>
                    <img width="30%" src="../assets/global/img/english/deactive.png" alt="logo" class="logo-default" /</td>@endif
                    <td>
                        <a id="e{{$test->id}}" href="{{ route('get.test', [ 'id' => $test->id]) }}" class="btn btn-outline btn-circle btn-sm purple">
                            <i class="fa fa-edit"></i> Edit </a>
                        <button id="{{$test->id}}" class="btn btn-outline btn-circle dark btn-sm black deleteTest">
                            <i class="fa fa-trash-o"></i> Delete </button>
                    </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <div style="text-align:center;"><p>{{ $tests->links() }}</p></div>
</div>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">Do you really want to delete this Test? </div>
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

        $(".deleteTest").on('click', function () {
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
                url: '{{ route("destroy.test") }}',
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