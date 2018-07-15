@extends('admin.layout.master') @section('content')
<div class="portlet box purple ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Question Input Groups
        </div>
        <div class="tools">
            <a href="" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="" class="reload"> </a>
            <a href="" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <form method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="nd-test">
                <label>Test</label>
                <select id="selectTest" name="test_id" required>
                    <option value="">Choose Test</option>
                    @foreach ($tests as $test) 
                    <option value="{{$test->id}}">{{ $test->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="nd-content">
                <label>Content</label>
                <select id="selectContent" name="content_id" required>            
                    <option  value="">Choose content ...</option>
                </select>
            </div>
            <h4 class="block">QUESTION</h4>
            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                <textarea name="question" class="form-textarea required" style="width:98%" required></textarea>
            </div>
            <div class="portlet light portlet-fit portlet-datatable ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">ANSWER</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                        <thead>
                            <tr>
                                <th width="80%"> Answers</th>
                                <th class="table-checkbox">
                                    <label> Answer Correct</label>
                                </th>
                                <th>
                                    <a id="addRow" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" id="tr0">
                                <td>
                                    <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                        <textarea name="answers[]" class="form-textarea required" style="width:98%" required></textarea>
                                    </div>
                                </td>
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="hidden" name="correct[0]" class="checkboxes" value="0" />
                                        <input type="checkbox" name="correct[0]" class="checkboxes" value="1" />

                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-actions">
                    <button id="addQues" type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 
@section('jquery')
<script>
    $(document).ready(function() {
        $('#selectTest').change(function() {
            var idTest = $(this).val();
            $.get("choosecontent/" + idTest, function(data) {
                $('#selectContent').html(data);
            })
        })
})
</script>

 @endsection

