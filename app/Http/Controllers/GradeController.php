<?php

// app/Http/Controllers/GradeController.php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeHistory;
use App\Models\User;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with('user', 'teacher')->get();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $students = User::where('role_id', 1)->get(); // Assuming role_id 1 is for students
        return view('grades.create', compact('students'));
    }

    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'subject' => 'required|string|max:255',
        'grade' => 'required|numeric|min:1|max:6',
    ]);

    $grade = new Grade();
    $grade->user_id = $request->user_id;
    $grade->teacher_id = auth()->user()->id;
    $grade->subject = $request->subject;
    $grade->grade = $request->grade;
    $grade->save();

    // Zapisanie historii ocen
    $gradeHistory = new GradeHistory();
    $gradeHistory->grade_id = $grade->id;
    $gradeHistory->user_id = auth()->user()->id;
    $gradeHistory->value = $request->grade;
    $gradeHistory->save();

    return redirect()->route('grades.index')->with('success', 'Ocena dodana pomyślnie.');
}

    public function edit(Grade $grade)
    {
        $students = User::where('role_id', 1)->get();
        return view('grades.edit', compact('grade', 'students'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'value' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $grade->update([
            'value' => $request->value,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('grades.index');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index');
    }

    public function show(Grade $grade)
    {
        return view('grades.show', compact('grade'));
    }
}

