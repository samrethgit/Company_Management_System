@extends('developers.layout')
@section('content')
<div class="pull-left">
    <h2>Developer Management</h2>
</div>
<div class="row">
    <div class="col-lg-12 margin-bt">

        <div class="pull-right">
            <a class="btn btn-success" href="{{route('developers.create')}}">Create New Developers</a>

        </div>
    </div>
</div>

@if($message = Session::get('success'));
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Salary</th>
        <th>Address</th>

        <th width="280px">Action</th>
    </tr>
    @foreach($developers as $developer)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$developer->name}}</td>
        <td>{{$developer->email}}</td>
        <td>{{$developer->phone}}</td>
        <td>{{$developer->salary}}</td>
        <td>{{$developer->address}}</td>
        <td>
            <form action="{{route('developers.destroy',$developer->id)}}" method ="POST">
                <a class="btn btn-info" href="{{route('developers.show',$developer->id)}}">Show</a>
                <a class="btn btn-primary" href="{{route('developers.edit',$developer->id)}}">Edit</a>
            @csrf

            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>