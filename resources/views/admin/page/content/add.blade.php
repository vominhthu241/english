@extends('admin.layout.master')
@section('content')
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
<div class=" container portlet light portlet-fit portlet-datatable ">
  <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}" />
      <div class="portlet-title">
          <div class="caption">
              <i class=" icon-layers font-green"></i>
              <span class="caption-subject font-green sbold uppercase">Content Datatable</span>
          </div>
      </div>
      <div class="portlet-body">
          <div class="form-group row">
            <label class="control-label col-md-3">Test Name</label>
            <div class="col-md-8">
                <select id="selectTest" name="test_id" required>
                    <option value="">Choose Test</option>
                    @foreach ($test as $tests) 
                    <option value="{{$tests->id}}" <?php
                        if($tests->id == old('test_id'))
                          echo "selected";
                     ?>>{{ $tests->name }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row" id="form-mp3">
              <label class="control-label col-md-3">Content Name
                  <span class="required"> * </span>
              </label>
              <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-6">
                          <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name"/> 
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-md-3">Time
                  <span class="required"> * </span>
              </label>
              <div class="input-group">
                  <input type="text" name="times" class="form-control timepicker timepicker-24">
                  <span class="input-group-btn">
                      <button class="btn default" type="button">
                          <i class="fa fa-clock-o"></i>
                      </button>
                  </span>
              </div>
          </div>
          <div class="form-group row" id="form-mp3">
              <label class="control-label col-md-3">Upload
                  <span class="required"> * </span>
              </label>
              <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-6">
                          <input type="file" class="form-control" id="images" name="images" accept="image/*"/> 
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-md-3 control-label">Nội Dung</label>
              <div class="col-md-8">
                  <textarea  name="content" id="summernote_1" required>{{old('content')}} </textarea>
              </div>
              <div class="col-md-offset-3 col-md-9" id="image_preview" required></div>
          </div>
          <div class="form-actions">
              <button id="addQues" type="submit" class="btn blue">Submit</button>
              <button type="button" class="btn default">Cancel</button>
          </div>
      </div>
  </form>    
</div>
@endsection

@section('jquery')
@endsection
