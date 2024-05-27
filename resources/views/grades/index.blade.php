@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Oceny</h1>
    @if(auth()->user()->role->name == 'teacher' || auth()->user()->role->name == 'admin')
        <a href="{{ route('grades.create') }}" class="btn btn-primary">Dodaj ocenę</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Uczeń</th>
                <th>Przedmiot</th>
                <th>Ocena</th>
                <th>Nauczyciel</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr>
                <td>{{ $grade->id }}</td>
                <td>{{ $grade->user->name }}</td>
                <td>{{ $grade->subject }}</td>
                <td>{{ $grade->grade }}</td>
                <td>{{ $grade->teacher->name }}</td>
                <td>
                    @if(auth()->user()->role->name == 'teacher' || auth()->user()->role->name == 'admin')
                        <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning">Edytuj</a>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
