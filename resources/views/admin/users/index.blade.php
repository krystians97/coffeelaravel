@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-white">Użytkownicy</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Dodaj użytkownika</a>
    <table class="table table-dark table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Pokaż</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edytuj</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
