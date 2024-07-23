<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class StudentSearch extends Component
{
    use WithPagination;

    public $searchId = '';
    public $searchName = '';
    public $searchStudentNr = '';
    public $sortField = 'students.id';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchId()
    {
        $this->resetPage();
    }

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchStudentNr()
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
        $students = Student::query()
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('students.*', 'users.name as user_name')
            ->when($this->searchId, function ($query) {
                $query->where('students.id', 'like', '%'.$this->searchId.'%');
            })
            ->when($this->searchName, function ($query) {
                $query->where('users.name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchStudentNr, function ($query) {
                $query->where('students.studentNr', 'like', '%'.$this->searchStudentNr.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.student-search', [
            'students' => $students,
        ]);
    }
}
