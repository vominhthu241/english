@extends('front.page.master') @section('content')
<div class="container">
    <h1 class="test-caption">Reading Testing Online</h1>
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#home">
                <h3>
                    <b>Level 250 - 500</b>
                </h3>
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#menu1">
                <h3>
                    <b>Level 500 - 750</b>
                </h3>
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#menu2">
                <h3>
                    <b>Level 750 - 990</b>
                </h3>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="pm-item iconpink">
                <div class="pmi-caption pink">
                    <span>Incomplete Sentence</span>
                </div>
                <div class="row">
                    @foreach ($tests['testincomplete1'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-pink">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item icongreen">
                <div class="pmi-caption green">
                    <span>Text Completion</span>
                </div>
                <div class="row">
                    @foreach ($tests['testtext1'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-green">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item iconblue">
                <div class="pmi-caption blue">
                    <span>Single Passage</span>
                </div>
                <div class="row">
                    @foreach ($tests['testsingle1'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-blue">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item iconyellow">
                <div class="pmi-caption yellow">
                    <span>Double Passage</span>
                </div>
                <div class="row">
                    @foreach ($tests['testdouble1'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-yellow">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="pm-item iconpink">
                <div class="pmi-caption pink">
                    <span>Photo</span>
                </div>
                <div class="row">
                    @foreach ($tests['testincomplete2'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-pink">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item icongreen">
                <div class="pmi-caption green">
                    <span>Text Completion</span>
                </div>
                <div class="row">
                    @foreach ($tests['testtext2'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-green">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item iconblue">
                <div class="pmi-caption blue">
                    <span>Single Passage</span>
                </div>
                <div class="row">
                    @foreach ($tests['testsingle2'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-blue">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item iconyellow">
                <div class="pmi-caption yellow">
                    <span>Double Passage</span>
                </div>
                <div class="row">
                    @foreach ($tests['testdouble2'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-yellow">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="pm-item iconpink">
                <div class="pmi-caption pink">
                    <span>Photo</span>
                </div>
                <div class="row">
                    @foreach ($tests['testincomplete3'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-pink">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item icongreen">
                <div class="pmi-caption green">
                    <span>Text Completion</span>
                </div>
                <div class="row">
                    @foreach ($tests['testtext3'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-green">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item iconblue">
                <div class="pmi-caption blue">
                    <span>Single Passage</span>
                </div>
                <div class="row">
                    @foreach ($tests['testsingle3'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-blue">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pm-item iconyellow">
                <div class="pmi-caption yellow">
                    <span>Double Passage</span>
                </div>
                <div class="row">
                    @foreach ($tests['testdouble1'] as $test)
                    <div class="col-md-3">
                        <div class="om-item om-write-yellow">
                            <a href="{{route('test.content',['id'=>$test->id])}}">
                                <span class="om-icon icon-reading"> </span>
                                <strong>{{$test->testskill->test_skill_name}}</strong>
                            </a>
                            <a href="{{route('test.content',['id'=>$test->id])}}" class="om-btn">
                                <span></span>{{ $test->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection