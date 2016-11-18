<?php
foreach ($data['data'] as $obj) {
  $values[$obj->$data['key']] = $obj->$data['value'];
}
$attributes = ['id' => $name];
?> 

<div class="form-group{{ $errors->has('$name') ? ' has-error' : '' }}"">
    {{ Form::label($label ? $label : $name, null, ['class' => 'col-sm-3']) }}
    <div class="col-sm-6">
      {{ Form::select($name, $values, $default,  array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>
