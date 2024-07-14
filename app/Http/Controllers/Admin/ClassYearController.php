<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassYear;
use App\Models\SchoolClass;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Http\Requests\ClassYearStoreRequest;
use App\Http\Requests\ClassYearUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class ClassYearController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index classyear'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show classyear'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create classyear'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit classyear'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete classyear'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $classYears = ClassYear::with(['schoolClass', 'schoolYear'])->paginate(15);
        return view('admin.classyears.index', ['classYears' => $classYears]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $schoolClasses = SchoolClass::all();
        $schoolYears = SchoolYear::all();
        return view('admin.classyears.create', ['schoolClasses' => $schoolClasses, 'schoolYears' => $schoolYears]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  ClassYearStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(ClassYearStoreRequest $request): RedirectResponse
    {
        $classYear = new ClassYear();
        $classYear->school_class_id = $request->school_class_id;
        $classYear->school_year_id = $request->school_year_id;
        $classYear->save();

        return to_route('admin.classyears.index')->with('status', 'Class Year created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  ClassYear  $classYear
     * @return View
     */
    public function show(ClassYear $classyear): View
    {
        return view('admin.classyears.show', ['classYear' => $classyear]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  ClassYear $classYear
     * @return View
     */
    public function edit(ClassYear $classyear): View
    {
        $schoolClasses = SchoolClass::all();
        $schoolYears = SchoolYear::all();
        return view('admin.classyears.edit', [
            'classYear' => $classyear,
            'schoolClasses' => $schoolClasses,
            'schoolYears' => $schoolYears
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  ClassYearUpdateRequest  $request
     * @param  ClassYear  $classYear
     * @return RedirectResponse
     */
    public function update(ClassYearUpdateRequest $request, ClassYear $classyear): RedirectResponse
    {
        $classyear->school_class_id = $request->school_class_id;
        $classyear->school_year_id = $request->school_year_id;
        $classyear->save();
        return to_route('admin.classyears.index')->with('status', 'Class Year updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  ClassYear $classYear
     * @return View
     */
    public function delete(ClassYear $classyear): View
    {
        return view('admin.classyears.delete', ['classYear' => $classyear]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  ClassYear  $classYear
     * @return RedirectResponse
     */
    public function destroy(ClassYear $classyear): RedirectResponse
    {
        try {
            $classyear->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.classyears.index')->with('status-wrong', 'Class Year cannot be deleted.');
        }
        return to_route('admin.classyears.index')->with('status', "Class Year deleted successfully.");
    }
}
