<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrolmentStatus;
use Illuminate\Http\Request;
use App\Http\Requests\EnrolmentStatusStoreRequest;
use App\Http\Requests\EnrolmentStatusUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EnrolmentStatusController extends Controller implements HasMiddleware
{
// Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index enrolmentstatus'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show enrolmentstatus'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create enrolmentstatus'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit enrolmentstatus'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete enrolmentstatus'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $enrolmentStatuses = EnrolmentStatus::paginate(15);
        return view('admin.enrolmentstatuses.index', ['enrolmentStatuses' => $enrolmentStatuses]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.enrolmentstatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param EnrolmentStatusStoreRequest $request
     * @return RedirectResponse
     */
    public function store(EnrolmentStatusStoreRequest $request): RedirectResponse
    {
        $enrolmentStatus = new EnrolmentStatus();
        $enrolmentStatus->name = $request->name;
        $enrolmentStatus->save();

        return to_route('admin.enrolmentstatuses.index')->with('status', 'Enrolment Status created successfully.');
    }

    /**
     * Display the specified resource.
     * @param EnrolmentStatus $enrolmentstatus
     * @return View
     */
    public function show(EnrolmentStatus $enrolmentstatus): View
    {
        return view('admin.enrolmentstatuses.show', ['enrolmentStatus' => $enrolmentstatus]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param EnrolmentStatus $enrolmentstatus
     * @return View
     */
    public function edit(EnrolmentStatus $enrolmentstatus): View
    {
        return view('admin.enrolmentstatuses.edit', ['enrolmentStatus' => $enrolmentstatus]);
    }

    /**
     * Update the specified resource in storage.
     * @param EnrolmentStatusUpdateRequest $request
     * @param EnrolmentStatus $enrolmentstatus
     * @return RedirectResponse
     */
    public function update(EnrolmentStatusUpdateRequest $request, EnrolmentStatus $enrolmentstatus): RedirectResponse
    {
        $enrolmentstatus->name = $request->name;
        $enrolmentstatus->save();
        return to_route('admin.enrolmentstatuses.index')->with('status', 'Enrolment Status updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param EnrolmentStatus $enrolmentstatus
     * @return View
     */
    public function delete(EnrolmentStatus $enrolmentstatus): View
    {
        return view('admin.enrolmentstatuses.delete', ['enrolmentstatus' => $enrolmentstatus]);
    }

    /**
     * Remove the specified resource from storage.
     * @param EnrolmentStatus $enrolmentstatus
     * @return RedirectResponse
     */
    public function destroy(EnrolmentStatus $enrolmentstatus): RedirectResponse
    {
        try {
            $enrolmentstatus->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.enrolmentstatuses.index')->with('status-wrong', 'Enrolment Status cannot be deleted.');
        }
        return to_route('admin.enrolmentstatuses.index')->with('status', "Enrolment Status $enrolmentstatus->name deleted successfully.");
    }
}
