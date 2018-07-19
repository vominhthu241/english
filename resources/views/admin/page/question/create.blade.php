@extends('admin.layout.master') @section('content')
<div id="message">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif   
    
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
    </div>
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
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="nd-test">
                <label>Test Skill</label>
                <select class="form-control" id="selectTestSkill" name="testskill_id" required>
                    <option value="">Choose Test Skill</option>
                    @foreach ($testskills as $testskill) 
                    <option value="{{$testskill->id}}">{{ $testskill->test_skill_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="nd-test">
                <label>Test</label>
                <select class="form-control" id="selectTest" name="test_id" required>
                    <option value="">Choose Test</option>
                </select>
            </div>
            <div class="nd-content">
                <label>Content</label>
                <select class="form-control" id="selectContent" name="content_id" required>            
                    <option value="">Choose content ...</option>
                </select>
            </div>
            <h4 class="block">QUESTION</h4>
            <div class="form-group row">
                <label class="control-label col-md-3">Upload mp3
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="mp3" name="mp3" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Upload image
                    <span class="required"> * </span>
                </label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="images" name="images" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                <textarea name="question" class="form-textarea required" style="width:98%" required></textarea>
            </div> -->
            <div class="form-group row">
                    <label class="col-md-3 control-label">Question</label>
                    <div class="col-md-8">
                        <textarea name="question" id="summernote_1" required>{{old('content')}} </textarea>
                    </div>
                    <div class="col-md-offset-3 col-md-9" id="image_preview" required></div>
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
                                        <textarea name="answers[]" class="form-textarea required" style="width:98%" required>A</textarea>
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
                            <tr class="odd gradeX" id="tr1">
                                <td>
                                    <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                        <textarea name="answers[]" class="form-textarea required" style="width:98%" required>B</textarea>
                                    </div>
                                </td>
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="hidden" name="correct[1]" class="checkboxes" value="0" />
                                        <input type="checkbox" name="correct[1]" class="checkboxes" value="1" />

                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="odd gradeX" id="tr2">
                                <td>
                                    <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                        <textarea name="answers[]" class="form-textarea required" style="width:98%" required>C</textarea>
                                    </div>
                                </td>
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="hidden" name="correct[2]" class="checkboxes" value="0" />
                                        <input type="checkbox" name="correct[2]" class="checkboxes" value="1" />

                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="odd gradeX" id="tr3">
                                <td>
                                    <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                        <textarea name="answers[]" class="form-textarea required" style="width:98%" required>D</textarea>
                                    </div>
                                </td>
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="hidden" name="correct[3]" class="checkboxes" value="0" />
                                        <input type="checkbox" name="correct[3]" class="checkboxes" value="1" />

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
                    <a href="{{route('view.ques')}}" type="button" class="btn default">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 
@section('jquery')
<script>
    $(document).ready(function() {
        $('#selectTestSkill').on('change', function() {
            var idTest = $(this).val();
            $.get("/api/gettest/" + idTest, function(data) {
                console.log(data);
                $('#selectTest option').remove();
                $('#selectTest').trigger('change');
                data.forEach(item => {
                    $('#selectTest').append(''
                    + '<option value="' + item.id + '">'+item.name + ' - ' +  item.type_test+'</options>'
                    +'');
                });

            });
        })

        $('#selectTest').on('change', function() {
            var idTest = $(this).val();
            $.get("/api/getcontent/" + idTest, function(data) {
                console.log(data);
                $('#selectContent option').remove();
                data.forEach(item => {
                    $('#selectContent').append(''
                    + '<option value="' + item.id + '">'+item.content+'</options>'
                    +'');
                });
            });
        })
})
</script>

 @endsection

