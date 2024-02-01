@extends('layouts.basic')
@section('content')
<div class="row">
    <div class="col-12">
        <form class="form" method="POST" action="{{route('pet.byStatus')}}">
            @csrf

            @if($errors->has('status'))
                    <div class="alert alert-danger">{{ $errors->first('status') }}</div>
            @endif

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pet status</label>
                <select multiple="" class="form-control" name="status[]">
                    <option value="available">available</option>
                    <option value="pending">pending</option>
                    <option value="sold">sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success pull-right">Check</button>

        </form>
    </div>
</div>
    <div class="row">
        @if(isset($pets))
            @foreach ($pets as $pet)
                <div class="col-md-4">
                    <h2>{{$pet->name ?? 'unknown'}}</h2>
                    @if(isset($pet->id))
                        <p><a class="btn btn-default" href="{{route('pet.show', $pet->id)}}" role="button">View details &raquo;</a></p>
                        <form method="POST" action="{{route('pet.destroy', $pet->id)}}">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                              <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
