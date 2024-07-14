<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Period;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\ModuleStoreRequest;
use App\Http\Requests\ModuleUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class ModuleController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index module'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show module'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create module'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit module'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete module'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $modules = Module::with(['period', 'course'])->paginate(15);
        return view('admin.modules.index', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $periods = Period::all();
        $courses = Course::all();
        return view('admin.modules.create', ['periods' => $periods, 'courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  ModuleStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(ModuleStoreRequest $request): RedirectResponse
    {
        $module = new Module();
        $module->name = $request->name;
        $module->description = $request->description;
        $module->period_id = $request->period_id;
        $module->course_id = $request->course_id;
        $module->save();

        return to_route('admin.modules.index')->with('status', 'Module created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  Module  $module
     * @return View
     */
    public function show(Module $module): View
    {
        return view('admin.modules.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Module  $module
     * @return View
     */
    public function edit(Module $module): View
    {
        $periods = Period::all();
        $courses = Course::all();
        return view('admin.modules.edit', ['module' => $module, 'periods' => $periods, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     * @param  ModuleUpdateRequest  $request
     * @param  Module  $module
     * @return RedirectResponse
     */
    public function update(ModuleUpdateRequest $request, Module $module): RedirectResponse
    {
        $module->name = $request->name;
        $module->description = $request->description;
        $module->period_id = $request->period_id;
        $module->course_id = $request->course_id;
        $module->save();

        return to_route('admin.modules.index')->with('status', 'Module updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  Module  $module
     * @return View
     */
    public function delete(Module $module): View
    {
        return view('admin.modules.delete', ['module' => $module]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Module  $module
     * @return RedirectResponse
     */
    public function destroy(Module $module): RedirectResponse
    {
        try {
            $module->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.modules.index')->with('status-wrong', 'Module cannot be deleted.');
        }
        return to_route('admin.modules.index')->with('status', "Module $module->name deleted successfully.");
    }
}
