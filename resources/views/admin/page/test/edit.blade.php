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
<form method="POST" action="{{route('postedit.test')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <input type="hidden" name="id" value="{{$test->id}}" />
    <div>
        <h3 class="block">Edit Test</h3>
        <div class="form-group row">
            <label class="control-label col-md-3">Test Name
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="testname" id="testname" value="{{ $test->name }}" required />
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Time
                <span class="required"> * </span>
            </label>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" value="{{$test->time}}" name="times" class="form-control timepicker timepicker-24">
                    </div>
                    <div class="col-md-1" style="padding: 0 !important;">
                        <span class="input-group-btn">
                            <button class="btn default" type="button">
                                <i class="fa fa-clock-o"></i>
                            </button>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Test Type</label>
            <div class="col-md-4">
                <select class="form-control" id="selectTesttype" name="testtype" required>
                    <option value="Beginner" <?php if($test->type_test == 'Beginner') {echo "selected='selected'";} ?> >Beginner</option>
                    <option value="Intermediate" <?php if($test->type_test == 'Intermediate') {echo "selected='selected'";} ?> >Intermediate</option>
                    <option value="Advanced" <?php if($test->type_test == 'Advanced') {echo "selected='selected'";} ?>>Advanced</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Test Skill</label>
            <div class="col-md-4">
                <select class="form-control" id="selectTesttype" name="testskill" required>
                    @foreach($testskill as $test_skill)
                        <option value="{{$test_skill->id}}" <?php if($test->testskill_id == $test_skill->id) {echo "selected='selected'";} ?>>{{$test_skill->test_skill_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
                <label class="control-label col-md-3">Status</label>
                <div class="col-md-4">
                    <select class="form-control" id="selectTesttype" name="status" required>
                        <option value="1" <?php if($test->status == '1') {echo "selected='selected'";} ?> >Activate</option>
                        <option value="0" <?php if($test->status == '0') {echo "selected='selected'";} ?> >Deactivate</option>
                    </select>
                </div>
            </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <a href="{{route('listadmin.test')}}" class="btn default button-previous">
                    <i class="fa fa-angle-left"></i> Back </a>
                <button class="btn green button-submit"> Submit
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>
</form>

@endsection