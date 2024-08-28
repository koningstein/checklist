<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Period;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class LearningOutcomeFilter extends Component
{
    public $studentId;
    public $periods;
    public $modules = [];
    public $learningOutcomes = [];
    public $selectedPeriodId = null;
    public $selectedModuleId = null;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
        $this->periods = Period::all(); // Haal alle periodes op
    }

    public function setPeriod($periodId)
    {
        $this->selectedPeriodId = $periodId;
        $this->modules = Module::where('period_id', $this->selectedPeriodId)->get();
        $this->selectedModuleId = null;
        $this->learningOutcomes = [];
    }

    public function setModule($moduleId)
    {
        $this->selectedModuleId = $moduleId;
        $this->loadLearningOutcomes();
    }

    public function loadLearningOutcomes()
    {
        $this->learningOutcomes = DB::select("
            SELECT lo.name as learning_outcome_name,
                   los.name as learning_suboutcome_name,
                   ll.name as learning_level_name,
                   sa.assignment_status_id
            FROM learning_outcomes lo
            JOIN learning_suboutcomes los ON los.learning_outcome_id = lo.id
            JOIN learning_suboutcome_levels lsl ON lsl.learning_suboutcome_id = los.id
            JOIN learning_levels ll ON ll.id = lsl.learning_level_id
            JOIN learning_suboutcome_level_assignments lslas ON lslas.learning_suboutcome_level_id = lsl.id
            JOIN assignments a ON a.id = lslas.assignment_id
            JOIN student_assignments sa ON (sa.individual_assignment_id = a.id OR sa.class_assignment_id IN (
                SELECT class_assignments.id FROM class_assignments WHERE class_assignments.assignment_id = a.id))
            JOIN enrolment_classes ec ON ec.id = sa.enrolment_class_id
            JOIN enrolments e ON e.id = ec.enrolment_id AND e.student_id = ?
            WHERE a.module_id = ?
            ORDER BY lo.name, los.name, ll.name
        ", [$this->studentId, $this->selectedModuleId]);
    }

    public function render()
    {
        return view('livewire.learning-outcome-filter', [
            'student' => Student::findOrFail($this->studentId),
        ]);
    }
}
