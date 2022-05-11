@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-0 fw-medium text-secondary" style="padding-bottom:20px">RANKING</h2>
    <table class="taulaRanking">
        <thead class="rank">
            <tr class="text-secondary">
                <th style="padding-left: 20px !important; padding-bottom: 10px !important; padding-top: 10px !important;">Posició</th>
                <th >{{ __('msg.userName') }}</th>
                <th >PUNTUACIÓ</th>

            </tr>
        </thead>
        <tbody class="rank">
            @for ($i = 0; $i < count($users); $i++)
                <tr class="text-secondary">
                    <td style="padding-left: 20px !important; padding-bottom: 10px !important; padding-top: 10px !important;">{{ ($i + 1) }}</td> 
                    <td>{{ $users[$i]->userName }}</td>
                    <td>{{ $users[$i]->puntuacio }}</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    @endsection
