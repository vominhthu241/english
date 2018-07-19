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
<form method="POST" action="{{route('postedit.test')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <input type="hidden" name="id" value="{{$test->id}}"/>
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
            <label class="control-label col-md-3">Test Type
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="testtype" id="testtype" value="{{$test->type_test}}" required />
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