@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj ocenę</h1>
    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="user_id">Uczeń</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $grade->user_id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subject">Przedmiot</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ $grade->subject }}" required>
        </div>
        <div class="form-group">
            <label for="grade">Ocena</label>
            <input type="number" name="grade" id="grade" class="form-control" min="1" max="6" value="{{ $grade->grade }}" required>
        </div>
        <button type="submit" class="btn btn-success">Zaktualizuj</button>
    </form>
</div>
@endsection
