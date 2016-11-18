<div class="form-group{{ $errors->has('$name') ? ' has-error' : '' }}"">
    {{ Form::label($label ? $label : $name, null, ['class' => 'col-sm-3']) }}
    <div class="col-sm-6 checkbox-inline">
      <div class="form-control">
    @foreach ($values as $value)
      {{ Form::label($value) }}
      {{ Form::radio($name, $value) }}
    @endforeach
      </div>
    </div>
</div>
