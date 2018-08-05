@extends('admin.layout.master')
@section('content')
    <div class="portlet light portlet-fit portlet-datatable ">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">Sample Datatable</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-cloud-upload"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-wrench"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="alert alert-success" id="reportAlert" style="display:none"></div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                <thead>
                    <tr>
                        <th class="table-checkbox">
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                <span></span>
                            </label>
                        </th>
                        <th><i class="fa fa-briefcase"></i> Name </th>
                        <th class="hidden-xs"><i class="fa fa-user"></i> Email </th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Dob</th>
                        <th>Role</th>
                        <th><i class="fa fa-shopping-cart"></i> Since </th>
                        <th><i class="fa fa-shopping-cart"></i> Updated </th>
                        <th> 
                            <a href="{{ asset('admin/users/add') }}" class="btn btn-outline btn-circle btn-sm red">
                                <i class="fa fa-edit"></i> ADD </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="odd gradeX" id="tr{{$user->id}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ date('d-m-Y', strtotime($user->dob)) }}</td>
                        <td>
                            @if ($user->role == 0)
                                User
                            @elseif ($user->role == 3)
                                Admin
                            @endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a id="e{{$user->id}}" href="{{ asset('admin/users/edit/'.$user->id) }}" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-edit"></i> Edit </a>
                            <button id="{{$user->id}}" class="btn btn-outline btn-circle dark btn-sm black deleteUser">
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
                    <button type="button" class="btn green" id="confirmBtn">Confirm</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        
        $(".deleteUser").on('click', function(){
            $("#basic").modal('show');
            id = $(this).attr('id');
            $('#basic').children('.modal-dialog').attr('id','id'+id);
        });

        $('#confirmBtn').on('click', function(){
            $("#basic").modal('hide');
            id = $('#basic').children('.modal-dialog').attr('id');
            id = id.replace("id","");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route("destroy.user") }}',
                dataType: 'text',
                data: {id: id},
                success:function(data){
                    $('#tr' + id).fadeOut();
                    $('#tr' + id).remove();
                    $( "#reportAlert" ).text(data).show();
                    setTimeout(function()
                    {
                        $('#reportAlert').fadeOut();
                    },4000);
                }
            });
        });
    });
</script>
@endsection
