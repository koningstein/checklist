<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\ClassYear;
use App\Models\EnrolmentClass;

class UnlinkedStudentSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'users.name';
    public $sortDirection = 'asc';
    public $selectedClass = [];
    public $currentYearClasses = [];

    protected $queryString = ['sortField', 'sortDirection', 'search'];

    public function mount()
    {
        // Haal de klassen van het huidige schooljaar op met de juiste kolomnamen
        $this->currentYearClasses = ClassYear::join('school_classes', 'class_years.school_class_id', '=', 'school_classes.id')
            ->where('class_years.school_year_id', function($query) {
                $query->select('id')
                    ->from('school_years')
                    ->where('startdate', '<=', now())
                    ->where('enddate', '>=', now());
            })
            ->select('class_years.id', 'school_classes.name')
            ->get();
    }

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

    public function linkStudentsToClasses()
    {
        foreach ($this->selectedClass as $studentId => $classYearId) {
            if ($classYearId) {
                $enrolmentId = Student::findOrFail($studentId)->enrolments->first()->id;

                EnrolmentClass::create([
                    'enrolment_id' => $enrolmentId,
                    'class_year_id' => $classYearId,
                ]);
            }
        }

        // Reset de selectie na koppeling
        $this->selectedClass = [];

        // Succesbericht
        session()->flash('message', 'Geselecteerde studenten succesvol gekoppeld aan de klassen.');
    }

    public function render()
    {
        $unlinkedStudents = Student::whereDoesntHave('enrolments.enrolmentClasses')
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                });
            })
            ->join('users', 'students.user_id', '=', 'users.id')
            ->orderBy($this->sortField, $this->sortDirection)
            ->select('students.*')
            ->paginate(10);

        return view('livewire.unlinked-student-search', [
            'unlinkedStudents' => $unlinkedStudents,
            'currentYearClasses' => $this->currentYearClasses,
        ]);
    }
}
