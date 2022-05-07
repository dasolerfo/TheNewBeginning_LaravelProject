@extends('layout')

@section('content')
    <div class="container">
        <h2 class="mb-0 fw-medium text-secondary">{{ __('msg.usuaris') }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="text-secondary">
                    <th>{{ __('msg.nom') }}</th>
                    <th>{{ __('msg.userName') }}</th>
                    <th>{{ __('msg.correu') }}</th>
                    <th>{{ __('msg.pais') }}</th>
                    <th>{{ __('msg.detalls') }}/Edit</th>
                    <th>{{ __('msg.elimina') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    @if($user->admin == 0)
                        <tr class="text-secondary">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->userName }}</td>

                            <td>{{ $user->email }}</td>
                            <td>{{ $user->pais }}</td>
                            <td><a href="{{ route('edita',$user->id) }}" class="btn btn-warning">{{ __('msg.ensenyarDetalls')}}</a></td>
                            {{-- {{ route('countries.show',$country->Code) }} --}}
                            {{-- <td><a href="{{ route('cities.edit',$city->ID) }}"><button>Edit</button></a></td> --}}
                            <form action="{{ route('delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td><button type="submit" class="btn btn-danger">{{ __('msg.elimina') }}</button></td>
                            </form>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
