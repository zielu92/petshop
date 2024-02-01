@extends('layouts.basic')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Add a new pet</h1>
        <form class="form" method="POST" action="{{route('pet.store')}}">
            @csrf

            @if($errors->has('id'))
                    <div class="alert alert-danger">{{ $errors->first('id') }}</div>
            @endif

            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>

            @if($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            @if($errors->has('status'))
                    <div class="alert alert-danger">{{ $errors->first('status') }}</div>
            @endif

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pet status</label>
                <select class="form-control" name="status">
                    <option value="available">available</option>
                    <option value="pending">pending</option>
                    <option value="sold">sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success pull-right">Check</button>

        </form>
    </div>
</div>
@endsection
