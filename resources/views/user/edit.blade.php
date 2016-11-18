@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile</div>
                <div class="panel-body">

<?php
?>

{!! Form::model( $user, ['url' => ['/user/store',  $user->id], 'class' => "form-horizontal", 'files' => true]) !!}

{{ Form::bsText('email') }}
{{ Form::bsText('name') }}
{{ Form::bsText('phoneprefix', 'Prefix Number') }}
{{ Form::bsText('phone', 'Phone Number') }}
{{ Form::bsText('mobilephone', 'Mobile Number') }}

{{ Form::bsSubmit('Update', 'data-loading-text="Updating..."' ) }}

{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
