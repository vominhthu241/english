@extends('admin.layout.master') @section('content')
<div class="portlet-title">
    <div class="caption">
        <i class=" icon-layers font-green"></i>
        <span class="caption-subject font-green sbold uppercase">{{ $data['test']->name }}</span>
    </div>
</div>
<div class="portlet-body">
    <div class="alert alert-success" id="reportAlert" style="display:none"></div>
    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="40%">
                    <i class="fa fa-briefcase"></i> Content </th>
                <th width="" class="hidden-xs">
                    <i class="fa fa-user"></i> Questions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['contents'] as $content)
                @if ($data['questions'] != null)
                <tr class="odd gradeX">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <a>{{ $content->content }}</a>
                    </td>
                    <td>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['questions'][$content->id] as $question)
                                <tr>
                                    <td rowspan="5">
                                        {{ $question->question }}
                                    </td>
                                    
                                </tr>
                                @foreach ($data['answers'][$question->id] as $answer)
                                <tr
                                    @if ($answer->iscorrect)
                                        class="success"
                                    @else
                                        class="danger"
                                    @endif
                                >
                                    <td>
                                        {{ $question->question }}
                                        {{ $answer->answer }}
                                    </td>
                                </tr>   
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection