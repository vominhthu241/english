@extends('admin.layout.master')
@section('content')
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
            <form id="edit-ques-form" method="POST" action="{{route('edit.ques')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="question_id" value="{{$quesdata['question']->id}}"/>
                <h4 class="block">QUESTION</h4>
                <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                    <textarea name="question" class="form-textarea required" style="width:98%"><?php echo $quesdata['question']->question; ?></textarea>
                </div>
                <div class="portlet light portlet-fit portlet-datatable ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green sbold uppercase">ANSWER</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column"
                               id="sample_2">
                            <thead>
                            <tr>
                                <th width="80%"> Answers</th>
                                <th class="table-checkbox">
                                    <label>Correct</label>
                                </th>
                                <th>
                                    <a id="addRow" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($quesdata['answers'] as $answer) 
                            <tr class="odd gradeX" id="tr0">
                                <td>
                                    <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                        <textarea name="answers[{{$answer->id}}]" class="form-textarea required"
                                                  style="width:98%"><?php echo $answer->answer ?></textarea>
                                    </div>
                                </td>
                                <td>
                                    <label>
                                        
                                        <input type="radio" name="correct" id="{{$answer->id}}" class="checkboxes" value="1"
                                            @if ($answer->iscorrect) 
                                            checked=checked
                                            @endif
                                        /> 
                                        <span></span>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                            <input type="hidden" name="newAnswer" id="set-correct" class="checkboxes" value="0"/>
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
@endsection
@section('jquery')
    <script>
        $(document).ready(function () {
            $('#edit-ques-form').submit(function(){
                var newCorrect = $(this).find('input[type=radio]:checked');
                $('#set-correct').val(newCorrect.attr('id'));
            });
        })
    </script>
@endsection