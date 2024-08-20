<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Guardian;

class GuardianSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchStudentName = '';
    public $sortField = 'users.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchStudentName()
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
        $guardians = Guardian::query()
            ->join('users', 'guardians.user_id', '=', 'users.id')
            ->leftJoin('student_guardians', 'guardians.id', '=', 'student_guardians.guardian_id')
            ->leftJoin('students', 'student_guardians.student_id', '=', 'students.id')
            ->leftJoin('users as students_users', 'students.user_id', '=', 'students_users.id')
            ->select('guardians.*', 'users.name as guardian_name', 'students_users.name as student_name')
            ->when($this->searchName, function ($query) {
                $query->where('users.name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchStudentName, function ($query) {
                $query->where('students_users.name', 'like', '%'.$this->searchStudentName.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.guardian-search', [
            'guardians' => $guardians,
        ]);
    }
}
