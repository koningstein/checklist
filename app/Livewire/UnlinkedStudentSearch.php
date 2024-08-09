<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\ClassYear;
use App\Models\EnrolmentClass;
use App\Models\ClassAssignment;
use App\Models\StudentAssignment;

class UnlinkedStudentSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'users.name';
    public $sortDirection = 'asc';
    public $selectedClass = [];
    public $assignClassAssignments = false;

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

    public function linkStudentsToClasses()
    {
        foreach ($this->selectedClass as $studentId => $classYearId) {
            if ($classYearId) {
                $enrolmentId = Student::findOrFail($studentId)->enrolments->first()->id;

                $enrolmentClass = EnrolmentClass::create([
                    'enrolment_id' => $enrolmentId,
                    'class_year_id' => $classYearId,
                ]);

                // Als de checkbox is aangevinkt, voeg de class assignments toe
                if ($this->assignClassAssignments) {
                    $classAssignments = ClassAssignment::where('class_year_id', $classYearId)->get();
                    foreach ($classAssignments as $classAssignment) {
                        StudentAssignment::create([
                            'enrolment_class_id' => $enrolmentClass->id,
                            'class_assignment_id' => $classAssignment->id,
                            'duedate' => $classAssignment->duedate,
                            'assignment_status_id' => 1, // Zorg ervoor dat dit een geldige status_id is
                            'marked_by_id' => null,
                            'completed' => false,
                            'marked_at' => null,
                        ]);
                    }
                }
            }
        }

        // Reset de selectie na koppeling
        $this->selectedClass = [];
        $this->assignClassAssignments = false;

        // Succesbericht
        session()->flash('message', 'Geselecteerde studenten succesvol gekoppeld aan de klassen.');
    }

    public function render()
    {
        // Haal de klassen van het huidige schooljaar op met de juiste kolomnamen
        $currentYearClasses = ClassYear::join('school_classes', 'class_years.school_class_id', '=', 'school_classes.id')
            ->where('class_years.school_year_id', function($query) {
                $query->select('id')
                    ->from('school_years')
                    ->where('startdate', '<=', now())
                    ->where('enddate', '>=', now());
            })
            ->select('class_years.id', 'school_classes.name')
            ->get();

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
            'currentYearClasses' => $currentYearClasses,
        ]);
    }
}
