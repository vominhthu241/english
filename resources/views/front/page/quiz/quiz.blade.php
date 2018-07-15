@extends('admin.layout.master')
@section('content')
<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-drop font-red-sunglo"></i>
            <span class="caption-subject bold uppercase"> Radios</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                <i class="icon-cloud-upload"></i>
            </a>
            <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                <i class="icon-wrench"></i>
            </a>
            <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                <i class="icon-trash"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form role="form">
            <div class="form-group form-md-radios">
                <label>Checkboxes</label>
                <div class="md-radio-list">
                    <div class="md-radio">
                        <input type="radio" id="radio1" name="radio1" class="md-radiobtn">
                        <label for="radio1">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Option 1 </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection