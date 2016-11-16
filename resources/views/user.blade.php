@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

<table id="userstable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>email</th>
    <th>Mobile</th>
  </tr>
</thead>
<tbody>  
@foreach ($users as $user)
 <tr>
   <td>{{ $user->name }}</td>
   <td>{{ $user->phone }}</td>
   <td>{{ $user->email }}</td>
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
