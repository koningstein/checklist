<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\PeriodStoreRequest;
use App\Http\Requests\PeriodUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Throwable;

class PeriodController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('index period'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('show period'), only: ['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create period'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit period'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete period'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $periods = Period::paginate(15);
        return view('admin.periods.index', ['periods' => $periods]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  PeriodStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(PeriodStoreRequest $request): RedirectResponse
    {
        $period = new Period();
        $period->period = $request->period;
        $period->save();

        return to_route('admin.periods.index')->with('status', 'Period created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  Period  $period
     * @return View
     */
    public function show(Period $period): View
    {
        return view('admin.periods.show', ['period' => $period]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Period  $period
     * @return View
     */
    public function edit(Period $period): View
    {
        return view('admin.periods.edit', ['period' => $period]);
    }

    /**
     * Update the specified resource in storage.
     * @param  PeriodUpdateRequest  $request
     * @param  Period  $period
     * @return RedirectResponse
     */
    public function update(PeriodUpdateRequest $request, Period $period): RedirectResponse
    {
        $period->period = $request->period;
        $period->save();
        return to_route('admin.periods.index')->with('status', 'Period updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  Period  $period
     * @return View
     */
    public function delete(Period $period): View
    {
        return view('admin.periods.delete', ['period' => $period]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Period  $period
     * @return RedirectResponse
     */
    public function destroy(Period $period): RedirectResponse
    {
        try {
            $period->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.periods.index')->with('status-wrong', 'Period cannot be deleted because it is being used.');
        }
        return to_route('admin.periods.index')->with('status', "Period $period->period deleted successfully");
    }
}
