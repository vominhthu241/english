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
                <label class="control-label col-md-3">Test Skill</label>
                <div class="col-md-4">
                    <select class="form-control" id="selectTestSkill" name="testskill_id" required>
                        <option value="">Choose Test Skill</option>
                        @foreach ($testskill as $testskill)
                        <option value="{{$testskill->id}}">{{ $testskill->test_skill_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Test Name</label>
                <div class="col-md-4">
                    <select class="form-control" id="selectTest" name="test_id" required>
                        <option value="">Choose Test</option>
                    </select>
                </div>
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
                            <input type="file" class="form-control" id="images" name="images" accept="image/*" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 control-label">Nội Dung</label>
                <div class="col-md-8">
                    <textarea name="content" id="summernote_1" required>{{old('content')}} </textarea>
                </div>
                <div class="col-md-offset-3 col-md-9" id="image_preview" required></div>
            </div>
            <div class="form-actions">
                <button id="addQues" type="submit" class="btn blue">Submit</button>
                <a href="{{route('listadmin.content')}}" class="btn default">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection @section('jquery')
<script>
    $(document).ready(function () {
        $('#selectTestSkill').on('change', function () {
            var idTest = $(this).val();
            $.get("/api/gettest/" + idTest, function (data) {
                console.log(data);
                $('#selectTest option').remove();
                $('#selectTest').trigger('change');
                data.forEach(item => {
                    $('#selectTest').append(''
                        + '<option value="' + item.id + '">' + item.name + ' - ' + item.type_test + '</options>'
                        + '');
                });

            });
        })
    })
</script> @endsection