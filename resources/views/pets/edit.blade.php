@extends('layouts.basic')
@section('content')
<div class="row">
    <h1>Edit {{$pet->name}}</h1>
        <form class="form" method="POST" action="{{route('pet.update', $pet->id)}}">
            @csrf
            @method('PUT')
            @if($errors->has('id'))
                    <div class="alert alert-danger">{{ $errors->first('id') }}</div>
            @endif

            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$pet->id ?? ''}}">
            </div>

            @if($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$pet->name ?? ''}}">
            </div>

            @if($errors->has('status'))
                    <div class="alert alert-danger">{{ $errors->first('status') }}</div>
            @endif

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pet status</label>
                <select class="form-control" name="status">
                    <option value="available" @if($pet->status=='available') selected @endif>available</option>
                    <option value="pending" @if($pet->status=='pending') selected @endif>pending</option>
                    <option value="sold" @if($pet->status=='sold') selected @endif>sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success pull-right">Edit</button>

        </form>

</div>
@endsection
