<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class UnlinkedStudentSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'users.name'; // Sorteer op de 'name' kolom van de 'users' tabel
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection', 'search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
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
        $unlinkedStudents = Student::whereDoesntHave('enrolments.enrolmentClasses')
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                });
            })
            ->join('users', 'students.user_id', '=', 'users.id') // Join met de 'users' tabel om op 'name' te kunnen sorteren
            ->orderBy($this->sortField, $this->sortDirection)
            ->select('students.*') // Selecteer de 'students' kolommen om conflicten te vermijden
            ->paginate(10);

        return view('livewire.unlinked-student-search', [
            'unlinkedStudents' => $unlinkedStudents,
        ]);
    }
}
