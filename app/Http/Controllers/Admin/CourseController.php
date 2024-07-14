<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Throwable;

class CourseController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('index course'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('show course'), only: ['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create course'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit course'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete course'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $courses = Course::paginate(15);
        return view('admin.courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CourseStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(CourseStoreRequest $request): RedirectResponse
    {
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        return to_route('admin.courses.index')->with('status', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  Course  $course
     * @return View
     */
    public function show(Course $course): View
    {
        return view('admin.courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Course  $course
     * @return View
     */
    public function edit(Course $course): View
    {
        return view('admin.courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     * @param  CourseUpdateRequest  $request
     * @param  Course  $course
     * @return RedirectResponse
     */
    public function update(CourseUpdateRequest $request, Course $course): RedirectResponse
    {
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
        return to_route('admin.courses.index')->with('status', 'Course updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  Course  $course
     * @return View
     */
    public function delete(Course $course): View
    {
        return view('admin.courses.delete', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Course  $course
     * @return RedirectResponse
     */
    public function destroy(Course $course): RedirectResponse
    {
        try {
            $course->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.courses.index')->with('status-wrong', 'Course cannot be deleted because it is being used.');
        }
        return to_route('admin.courses.index')->with('status', "Course $course->name deleted successfully");
    }
}
