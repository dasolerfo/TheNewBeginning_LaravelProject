@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-0 fw-medium text-secondary">{{ __('msg.usuaris') }}</h2>
    <table class="table table-bordered">
        <thead>
            <tr class="text-secondary">
                <th>Posició</th>
                <th>{{ __('msg.userName') }}</th>
                <th>PUNTUACIÓ</th>

            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($users); $i++)
                <tr class="text-secondary">
                    <td>{{ ($i + 1) }}</td> 
                    <td>{{ $users[$i]->userName }}</td>
                    <td>{{ $users[$i]->puntuacio }}</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    @endsection
