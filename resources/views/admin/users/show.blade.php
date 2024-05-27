<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Szczegóły użytkownika</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Nazwa</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Rola</th>
            <td>{{ $user->role->name }}</td>
        </tr>
    </table>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Powrót do listy</a>
</div>
@endsection
