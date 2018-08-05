@extends('admin.layout.master') @section('content')
<div id="message">
    @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err) {{$err}}
        <br> @endforeach
    </div>
    @endif @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
</div>
<div class="container portlet box purple ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Question Edit Groups
        </div>
        <div class="tools">
            <a href="" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="" class="reload"> </a>
            <a href="" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <form id="edit-ques-form" method="POST" action="{{route('edit.ques')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" name="question_id" value="{{$quesdata['question']->id}}" />
            <h4 class="block">QUESTION</h4>
            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                <textarea name="question" class="form-textarea required" style="width:98%"><?php echo $quesdata['question']->question; ?></textarea>
            </div>
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
                                <th> Answers</th>
                                <th width="10%" class="table-checkbox">
                                    <label>Correct</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quesdata['answers'] as $answer)
                            <tr class="odd gradeX" id="tr0">
                                <td>
                                    <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                        <textarea name="answers[{{$answer->id}}]" class="form-textarea required" style="width:98%"><?php echo $answer->answer ?></textarea>
                                    </div>
                                </td>
                                <td>
                                    <label>
                                        <input type="radio" name="correct" id="{{$answer->id}}" class="checkboxes" value="1" @if ($answer->iscorrect) checked=checked @endif />
                                        <span></span>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                            <input type="hidden" name="newAnswer" id="set-correct" class="checkboxes" value="0" />
                        </tbody>
                    </table>
                </div>
                <div class="form-actions">
                    <button id="addQues" type="submit" class="btn blue">Update</button>
                    <a href="{{route('view.ques')}}" type="button" class="btn default">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection @section('jquery')
<script>
    $(document).ready(function () {
        $('#edit-ques-form').submit(function () {
            var newCorrect = $(this).find('input[type=radio]:checked');
            $('#set-correct').val(newCorrect.attr('id'));
        });
    })
</script> @endsection
