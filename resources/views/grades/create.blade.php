<!-- resources/views/grades/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj ocenę</h1>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student" class="form-label">Uczeń</label>
            <select name="user_id" id="student" class="form-control">
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Przedmiot</label>
            <input type="text" name="subject" id="subject" class="form-control">
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Ocena</label>
            <input type="number" name="grade" id="grade" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>
@endsection
