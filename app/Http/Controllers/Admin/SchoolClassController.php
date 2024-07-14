<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolClassStoreRequest;
use App\Http\Requests\SchoolClassUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;

class SchoolClassController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('index schoolclass'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('show schoolclass'), only: ['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create schoolclass'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit schoolclass'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete schoolclass'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $schoolclasses = SchoolClass::paginate(15);
        return view('admin.schoolclasses.index', ['schoolclasses' => $schoolclasses]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.schoolclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  SchoolClassStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(SchoolClassStoreRequest $request): RedirectResponse
    {
        $schoolclass = new SchoolClass();
        $schoolclass->name = $request->name;
        $schoolclass->save();

        return to_route('admin.schoolclasses.index')->with('status', 'SchoolClass created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  SchoolClass  $schoolclass
     * @return View
     */
    public function show(SchoolClass $schoolclass): View
    {
        return view('admin.schoolclasses.show', ['schoolclass' => $schoolclass]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  SchoolClass  $schoolclass
     * @return View
     */
    public function edit(SchoolClass $schoolclass): View
    {
        return view('admin.schoolclasses.edit', ['schoolclass' => $schoolclass]);
    }

    /**
     * Update the specified resource in storage.
     * @param  SchoolClassUpdateRequest  $request
     * @param  SchoolClass  $schoolclass
     * @return RedirectResponse
     */
    public function update(SchoolClassUpdateRequest $request, SchoolClass $schoolclass): RedirectResponse
    {
        $schoolclass->name = $request->name;
        $schoolclass->save();
        return to_route('admin.schoolclasses.index')->with('status', 'SchoolClass updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  SchoolClass  $schoolclass
     * @return View
     */
    public function delete(SchoolClass $schoolclass): View
    {
        return view('admin.schoolclasses.delete', ['schoolclass' => $schoolclass]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  SchoolClass  $schoolclass
     * @return RedirectResponse
     */
    public function destroy(SchoolClass $schoolclass): RedirectResponse
    {
        try {
            $schoolclass->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.schoolclasses.index')->with('status-wrong', 'Cannot delete SchoolClass, it is associated with other data.');
        }
        return to_route('admin.schoolclasses.index')->with('status', "SchoolClass deleted successfully.");
    }
}
