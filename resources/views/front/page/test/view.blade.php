@extends('front.page.master') @section('content')
<?php $countRadio = 0 ?>
<div class="container-test row">
    <div class="content-test col-md-6">
        <p>{{ $testdata['content']->content }}</p>
    </div>
    <div class="question-test col-md-6">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-drop font-red-sunglo"></i>
                <span class="caption-subject bold uppercase">Question</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form id='form-taken-answer' role="form" action=" {{ route('submit.test') }} " method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="user_id" value="{{ Session::get('users')->id }}" />
                <input type="hidden" name="test_id" value="{{ $testdata['test_id'] }}" />
                <input type="hidden" name="content_id" value="{{ $testdata['content']->id }}" />
                <div class="form-group form-md-radios">
                    @foreach ($testdata['questions'] as $question)
                    <label>{{$loop->iteration}}. {{ $question->question }}</label>
                    <div class="md-radio-list">
                        <div class="md-radio">
                            @foreach ($testdata['answers'] as $answer) @foreach ($answer as $ans) @if ($ans->question_id == $question->id)
                            <div class="md-answer">
                                <input type="radio" id="radio{{$countRadio}}" value="{{ $ans->answer }}" name="answerno_{{$ans->question->id}}" class="md-radiobtn">
                                <label for="radio{{$countRadio}}">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span>{{ $ans->answer }}
                                </label>
                            </div>
                            <?php $countRadio++ ?> @endif @endforeach @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <button id="set-submit-test" type="submit" style="display: none;"></button>
            </form>
            <div class="modal fade" id="basic" data-backdrop="static" data-keyboard="false" tabindex="-1" role="basic" aria-hidden="true"
                style="display: none">
                <div class="modal-dialog" id="id1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">Do you really want to submit your test? </div>
                        <div class="modal-footer">
                            <button id="resume-time" type="button" class="btn dark btn-outline" data-dismiss="modal">Resume</button>
                            <button id="submit-test" type="button" class="btn green">Submit Test</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <button id="pauseTime" style="display: none;">Pause</button>
        </div>
    </div>

</div>
<div class="reading-footer">
    <div class="control-button">
        <button class="btn-submit" id="confirm-test" type="submit" value="Submit">Submit</button>
    </div>
    <div class="time">
        <div class="icon-time"></div>
        <p id="hms_timer" class="number-time">{{ $testdata['content']->time }}</p>
        <input id='time-remain' type="hidden" name="time" value="" />
    </div>
</div>
<script>
    window.onload = function () {
        var str = $("#hms_timer").html(),
            timer = str.split(":"),
            countdown = $('#hms_timer');

        countdown.countdowntimer({
            hours: timer[0],
            minutes: timer[1],
            seconds: timer[2],
            size: "lg",
            pauseButton: "pauseTime",
            stopButton: "stopBtnhms",
        });

        $('#confirm-test').click(function () {
            $("#basic").modal('show');
            $('#pauseTime').trigger('click');
        });

        $('#resume-time').click(function () {
            $('#pauseTime').trigger('click');
        });

        $('#submit-test').click(function () {
            $('#set-submit-test').trigger('click');
            $('#form-taken-answer').submit(function () {
                countdown.countdowntimer("pause", "pause");
                $('#time-remain').val(countdown.html());
            });
        });
    };
</script> @endsection