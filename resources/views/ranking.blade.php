@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-0 fw-medium text-secondary">{{ __('msg.usuaris') }}</h2>
    <table class="table table-bordered">
        <thead>
            <tr class="text-secondary">
                <th>{{ __('msg.userName') }}</th>
                <th>PUNTUACIÓ</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr class="text-secondary">
                    <td>{{ $user->userName }}</td>
                {{-- <td>{{ $user->game->puntuacio }}</td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
