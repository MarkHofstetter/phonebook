<div class="form-group{{ $errors->has('$name') ? ' has-error' : '' }}"">
    {{ Form::label($label ? $label : $name, null, ['class' => 'col-sm-3 control-label']) }}
    <div class="col-sm-6">
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>
