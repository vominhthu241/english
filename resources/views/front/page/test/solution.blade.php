@extends('front.page.master') @section('content')
<?php $countRadio = 0; ?>
<?php $countQuestion1 = 1; ?>
<?php $countQuestion2 = 1; ?>
<?php $answerLabel = ['null', 'A', 'B', 'C', 'D']; ?>
<div class="container portlet light portlet-fit portlet-datatable ">
  <div class="row">
    <div class="col-md-12">
      <div class="box-caption box-caption-margin">
        <p>
          <span class="bc-icon icon-lego"></span> Answer Keys:</p>
      </div>
      <ul class="col-md-12 list-answer green">

        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
          <thead>
            <tr>
              <th width="40%">
                <i class="fa fa-briefcase"></i> Content & Question </th>
              <th width="40%">
                <i class="fa fa-briefcase"></i> Correct Answer </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['contents'] as $content) @if ($data['questions'] != null)
            <tr class="odd gradeX">
              <td>
                <table class="table">
                  <tbody>
                    <tr>{!! $content->content !!} @if ($content->fileimage != null)
                      <img src="{{ asset('images'). '/' .$content->fileimage }}" style="max-height: 300px;" alt=""> @endif @if ($content->filemedia != null)
                      <audio id="audio" controls>
                        <source src="{{ asset('mp3'). '/' .$content->filemedia }}" type="audio/mpeg">
                      </audio>
                      @endif
                    </tr>
                    @foreach ($data['questions'][$content->id] as $question)
                    <tr>
                      <div><b style="font-size: 16px; padding-right: 20px">{{ $countQuestion1 }}.</b>{!! $question->question !!} @if ($question->fileimage != null)
                        <img src="{{ asset('images'). '/' .$question->fileimage }}" style="max-height: 300px; width: 60%; margin: 20px 0;" alt=""> @endif @if ($question->filemedia != null)
                        <audio id="audio" controls>
                          <source src="{{ asset('mp3'). '/' .$question->filemedia }}" type="audio/mpeg">
                        </audio></div>
                        @endif @if ($question->question != null)
                        <div>
                          @foreach ($data['answers'][$question->id] as $answer)
                          <p>{{ $answer->answer }}</p>
                          @endforeach
                        </div>
                        @endif
                        <br/>
                        <?php $countQuestion1++ ?>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
              <td>
                <table class="table">
                  <tbody>
                    @foreach ($data['questions'][$content->id] as $question)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      @foreach ($data['answers'][$question->id] as $answer)
                      <td @if ($answer->iscorrect) class="success" @else class="danger" @endif> {{ $question->id }} {{ $answer->answer }}
                      </td>
                      @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
            </tr>
            @endif @endforeach
          </tbody>
        </table>
      </ul>
    </div>

  </div>
</div>
@endsection