<div class="form-group {{ $errors->has('test_skill_name') ? 'has-error' : ''}}">
    <label for="test_skill_name" class="col-md-4 control-label">{{ 'Test Skill Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="test_skill_name" type="text" id="test_skill_name" value="{{ $testskill->test_skill_name or ''}}" >
        {!! $errors->first('test_skill_name', '<p class="help-block">:message</p>') !!}
    </div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
