@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

<table id="userstable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
  <tr>
    <th>Name</th>
    <th>Prefix</th>
    <th>Phone</th>
    <th>email</th>
    <th>Mobile</th>
  </tr>
</thead>
<tbody>  
@foreach ($users as $user)
 <tr>
   @if (!Auth::guest() && Auth::user()->isadmin) 
     <td><a href="{{ url('user/update', $user) }}">{{ $user->name }}</a></td>
   @else
     <td>{{ $user->name }}</td>
   @endif
   <td>{{ $user->phoneprefix }}</td>
   <td>{{ $user->phone }}</td>
   <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</td>
   <td>{{ $user->mobilephone }}</td>
 </tr>
@endforeach
</tbody>
</table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#userstable').DataTable();
} );
</script>
@endsection
