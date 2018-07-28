@extends('front.page.master') @section('content')
<?php $countRadio = 0; ?>
<?php $countQuestion1 = 1; ?>
<?php $countQuestion2 = 1; ?>
<?php $answerLabel = ['null', 'A', 'B', 'C', 'D']; ?>
    
    <div class="container-test row">
        <div class="content-test col-md-7">
            <div class="owl-carousel">
                @foreach ($testdata['contents'] as $content)
                <div style="display: block;">
                    {{ $content['content'] }}
                    <div class="owl-carousel-2">
                        @foreach ($content->questions as $question)
                            <div>
                                <h3>{{ $countQuestion1 }}. {{ $question->question }}</h3>
                                @if ($question->fileimage != null)
                                <img src="{{ asset('images'). '/' .$question->fileimage }}" style="max-height: 500px;" alt="">
                                @endif

                                @if ($question->filemedia != null)
                                <audio id="audio" controls>
                                    <source src="{{ asset('mp3'). '/' .$question->filemedia }}" type="audio/mpeg">
                                </audio>
                                @endif

                                @if ($question->question != null)
                                <span>
                                    @foreach ($question->answers as $answer)
                                        <p>{{ $answer->answer }}</p>
                                    @endforeach
                                    
                                </span>
                                @endif
                                <?php $countQuestion1++ ?>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="question-test col-md-5">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-drop font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Question</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form id="form-taken-answer" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="hidden" name="user_id" value="{{ Session::get('users')->id }}" />
                    <input type="hidden" name="test_id" value="{{ $testdata['test']->id }}" />
                    <div class="form-group form-md-radios">
                        @foreach ($testdata['contents'] as $content)
                            @foreach ($content->questions as $question)
                                <div class="md-radio-inline">
                                    <label>{{ $countQuestion2 }}. </label>
                                    @foreach ($question->answers as $answer)
                                        <div class="md-radio">
                                            <div class="md-answer">
                                                <input type="radio" id="radio{{$countRadio}}" value="{{ $answer->answer }}" name="answerno_{{$answer->question->id}}" class="md-radiobtn">
                                                <label for="radio{{$countRadio}}">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>{{ $answerLabel[$loop->iteration] }}
                                                </label>
                                            </div>
                                            <?php $countRadio++ ?>
                                        </div>
                                    @endforeach
                                </div>
                                <?php $countQuestion2++ ?>
                            @endforeach
                        @endforeach
                    </div>
                    <button id="set-submit-test" type="submit" style="display: none;"></button>
                    <input id='time-remain' type="hidden" name="time" value="" />
                </form>
            </div>
        </div>
    </div>
    
<!-- Popup submit test -->
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
<!-- End Popup submit test -->

<!-- Popup view user result -->
<div class="modal fade" id="result" data-backdrop="static" data-keyboard="false" tabindex="-1" role="basic" aria-hidden="true"
    style="display: none">
    <div class="modal-dialog" id="id2">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ Session::get('users')->name }}'s Test Result</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th>Test Skill</th>
                        <th>Test</th>
                        <th>Correct Answer</th>
                        <th>Score</th>
                        <th>Time taken</th>
                    </thead>
                    <tbody id="user-result-test">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!-- <button id="resume-time" type="button" class="btn dark btn-outline" data-dismiss="modal">Resume</button>
                <button id="submit-test" type="button" class="btn green">Submit Test</button> -->
                <a href="#">Return to home</a>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- End Popup view user result -->
</div>
<div class="reading-footer">
    <div class="control-button">
        <button class="btn-submit" id="confirm-test" type="submit" value="Submit">Submit</button>
    </div>
    <div class="time">
        <div class="icon-time"></div>
        <p id="hms_timer" class="number-time">{{$testdata['test']->time}}</p>
        
    </div>
</div>
<script>
    window.onload = function () {
        function submitTestForm() {
            $('#form-taken-answer').submit();
            $('audio').each(function(){
                $(this).get(0).pause(); // Stop playing
                $(this).currentTime = 0; // Reset time
            }); 
        };

        var str = $("#hms_timer").html(),
            timer = str.split(":"),
            countdown = $('#hms_timer');

        countdown.countdowntimer({
            hours: timer[0],
            minutes: timer[1],
            seconds: timer[2],
            size: "lg",
            timeUp: submitTestForm,
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
        
        $('.owl-carousel').owlCarousel({
            items: 1,
            mouseDrag: false,
            nav: true,
            navText: ["Next", 'Prev'],
        });
        
        $('.owl-carousel-2').each(function(){
            if ($(this).find('div').length > 4) {
                $(this).owlCarousel({
                    items: 1,
                    mouseDrag: false,
                    nav: true,
                    navText: ["<< Prev", 'Next >>'],
                });
            }
        })

        $('#form-taken-answer').on('submit', function(e){
            e.preventDefault();
            e.stopPropagation();
            
            countdown.countdowntimer("pause", "pause");
            $('#time-remain').val(countdown.html());
            
            // Return test result
            $.ajax({
                data: $('#form-taken-answer').serializeArray(),
                type: 'POST',    
                url: "{{ route('submit.test') }}",
            }).done(function(response){
                console.log(response);
                $('#user-result-test').append(
                    '<tr>' +
                        '<td>' + response.testskill.test_skill_name + '</td>' +
                        '<td>' + response.test.name + '</td>' +
                        '<td>' + response.testresult.correct_answer + '</td>' +
                        '<td>' + response.testresult.score + '</td>' +
                        '<td>' + response.testresult.time_taken + '</td>' +
                    '</tr>'
                );
                countdown.countdowntimer("pause", "pause");
                $('#result').modal('show');
                
            }).fail(function(response){
                console.log(response);
            })
            return false;
        });

        $('#submit-test').click(function () {
            submitTestForm();
        });
    };

</script> @endsection