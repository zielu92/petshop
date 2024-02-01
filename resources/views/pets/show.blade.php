@extends('layouts.basic')
@section('content')
<div class="row">
    <h1>{{$pet->name ?? 'unknown'}}</h1>
    <p><a class="btn btn-default" href="{{route('pet.edit', $pet->id)}}" role="button">Edit &raquo;</a></p>
    <p><a class="btn btn-danger" href="{{route('pet.destroy', $pet->id)}}" role="button">Remove &raquo;</a></p>
</div>
@endsection
