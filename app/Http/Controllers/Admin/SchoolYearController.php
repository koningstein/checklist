<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolYearStoreRequest;
use App\Http\Requests\SchoolYearUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class SchoolYearController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index schoolyear'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show schoolyear'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create schoolyear'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit schoolyear'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete schoolyear'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $schoolYears = SchoolYear::paginate(15);
        return view('admin.schoolyears.index', ['schoolYears' => $schoolYears]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.schoolyears.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  SchoolYearStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(SchoolYearStoreRequest $request): RedirectResponse
    {
        $schoolYear = new SchoolYear();
        $schoolYear->name = $request->name;
        $schoolYear->startdate = $request->startdate;
        $schoolYear->enddate = $request->enddate;
        $schoolYear->save();

        return to_route('admin.schoolyears.index')->with('status', 'School Year created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  SchoolYear  $schoolYear
     * @return View
     */
    public function show(SchoolYear $schoolyear): View
    {
        return view('admin.schoolyears.show', ['schoolYear' => $schoolyear]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  SchoolYear $schoolyear
     * @return View
     */
    public function edit(SchoolYear $schoolyear): View
    {
        return view('admin.schoolyears.edit', ['schoolYear' => $schoolyear]);
    }

    /**
     * Update the specified resource in storage.
     * @param  SchoolYearUpdateRequest  $request
     * @param  SchoolYear  $schoolyear
     * @return RedirectResponse
     */
    public function update(SchoolYearUpdateRequest $request, SchoolYear $schoolyear): RedirectResponse
    {
        $schoolyear->name = $request->name;
        $schoolyear->startdate = $request->startdate;
        $schoolyear->enddate = $request->enddate;
        $schoolyear->save();
        return to_route('admin.schoolyears.index')->with('status', 'School Year updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  SchoolYear $schoolyear
     * @return View
     */
    public function delete(SchoolYear $schoolyear): View
    {
        return view('admin.schoolyears.delete', ['schoolYear' => $schoolyear]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  SchoolYear  $schoolyear
     * @return RedirectResponse
     */
    public function destroy(SchoolYear $schoolyear): RedirectResponse
    {
        try {
            $schoolyear->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.schoolyears.index')->with('status-wrong', 'School Year cannot be deleted.');
        }
        return to_route('admin.schoolyears.index')->with('status', "School Year $schoolyear->name deleted successfully.");
    }
}
