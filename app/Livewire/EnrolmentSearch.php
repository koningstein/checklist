<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Enrolment;

class EnrolmentSearch extends Component
{
    use WithPagination;

    public $searchStudentName = '';
    public $searchCreboName = '';
    public $searchCohortName = '';
    public $searchDate = '';
    public $searchEnrolmentStatusName = '';
    public $sortField = 'users.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchStudentName()
    {
        $this->resetPage();
    }

    public function updatingSearchCreboName()
    {
        $this->resetPage();
    }

    public function updatingSearchCohortName()
    {
        $this->resetPage();
    }

    public function updatingSearchDate()
    {
        $this->resetPage();
    }

    public function updatingSearchEnrolmentStatusName()
    {
        $this->resetPage();
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $enrolments = Enrolment::query()
            ->join('students', 'enrolments.student_id', '=', 'students.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->join('crebos', 'enrolments.crebo_id', '=', 'crebos.id')
            ->join('cohorts', 'enrolments.cohort_id', '=', 'cohorts.id')
            ->join('enrolment_statuses', 'enrolments.enrolment_status_id', '=', 'enrolment_statuses.id')
            ->select('enrolments.*', 'users.name as student_name', 'crebos.name as crebo_name', 'cohorts.name as cohort_name', 'enrolment_statuses.name as enrolment_status_name')
            ->when($this->searchStudentName, function ($query) {
                $query->where('users.name', 'like', '%'.$this->searchStudentName.'%');
            })
            ->when($this->searchCreboName, function ($query) {
                $query->where('crebos.name', 'like', '%'.$this->searchCreboName.'%');
            })
            ->when($this->searchCohortName, function ($query) {
                $query->where('cohorts.name', 'like', '%'.$this->searchCohortName.'%');
            })
            ->when($this->searchDate, function ($query) {
                $query->where('enrolments.date', 'like', '%'.$this->searchDate.'%');
            })
            ->when($this->searchEnrolmentStatusName, function ($query) {
                $query->where('enrolment_statuses.name', 'like', '%'.$this->searchEnrolmentStatusName.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.enrolment-search', [
            'enrolments' => $enrolments,
        ]);
    }
}
