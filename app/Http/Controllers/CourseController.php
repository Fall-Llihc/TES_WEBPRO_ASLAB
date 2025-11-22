<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all();

        // Pass the courses to the 'courses.index' view
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /courses/create
     */
    public function create()
    {
        // Return the view containing the course creation form
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /courses
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validatedData = $request->validate([
            'Judul' => 'required|max:255',
            'Sub_Judul' => 'required|max:255',
            'Kategori' => 'required|max:50',
            'Deadline' => 'required|date',
            'Deskripsi' => 'required|',
        ]);

        // 2. Create and Save the course
        Course::create($validatedData);

        // 3. Redirect back to the index page with a success message
        return redirect()->route('courses.index')->with('success', 'TP Baru Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     * GET /courses/{course}
     * (Optional: You can add a dedicated 'show' view for single courses)
     */
    public function show(Course $course)
    {
        // For this basic CRUD, we'll just redirect to index, but you could implement a 'show' view.
        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     * GET /courses/{course}/edit
     */
    public function edit(Course $course)
    {
        // Return the view containing the course edit form, passing the course data
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     * PUT/PATCH /courses/{course}
     */
    public function update(Request $request, Course $course)
    {
        // 1. Validation
         $validatedData = $request->validate([
            'Judul' => 'required|max:255',
            'Sub_Judul' => 'required|max:255',
            'Kategori' => 'required|max:50',
            'Deadline' => 'required|date',
            'Deskripsi' => 'required|',
        ]);

        // 2. Update the course data
        $course->update($validatedData);

        // 3. Redirect back to the index page with a success message
        return redirect()->route('courses.index')->with('success', 'TP Berhasil Diedit!!');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /courses/{course}
     */
    public function destroy(Course $course)
    {
        // Delete the course record from the database
        $course->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('courses.index')->with('success', 'TP Sudah Terhapus!');
    }
}
