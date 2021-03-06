@extends('layout')

@section('content')
    
    <div class="row">
        <form action="{{ route('aaaaa',$user->id) }}" method="POST" class="container">
            @csrf
            <div class="form-group">
                <strong class="text-secondary">Name:</strong>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
            </div>
            <div class="form-group">
                <strong class="text-secondary">User Name:</strong>
                <input type="text" class="form-control" name="userName" value="{{ $user->userName }}" id="userName">
            </div>
            <div class="form-group">
                <strong class="text-secondary">Email:</strong>
                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <strong class="text-secondary">Pais:</strong>
                <select class="form-select" name="pais" id="pais">
                    <option <?php if($user->pais == "Andorra"){ echo('selected="true"');} ?> value="Andorra">Andorra</option>
                    <option <?php if($user->pais == "Espanya"){ echo('selected="true"');} ?> value="Espanya">Espanya</option>
                    <option <?php if($user->pais == "França"){ echo('selected="true"');} ?> value="França">França</option>
                    <option <?php if($user->pais == "Portugal"){ echo('selected="true"');} ?> value="Portugal">Portugal</option>
                </select>
                {{-- <input type="text" class="form-control" name="pais" id="pais"
            value="{{ $user->pais }}"> --}}
            </div>
            
            <div class="form-group">
                <strong class="text-secondary">Puntuació:</strong>
                @if (Auth::user()->admin == 1)
                    <input type="text" class="form-control" name="puntuacio" id="puntuacio" value="{{ $user->game->puntuacio }}">
                @else
                    <input type="text" class="form-control" name="puntuacio" id="puntuacio" value="{{ $user->game->puntuacio }}" readonly>
                @endif
            </div>
            <br>

            <div class="row">
                @if((Auth::user()->admin == 1))
                    <div class="col-2">
                        <a class="btn btn-primary" href="{{ route('admin') }}"> Back</a>
                    </div>
                @endif
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
              
        </form>
    </div>
@endsection
