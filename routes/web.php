<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Open as Open;

if (App::environment('local')) {
    Route::get('/login-as/{id}', function ($id) {
        // Retrieve the user by ID
        $user = User::find($id);
        if ($user) {
            // Log the user in
            Auth::login($user);
            // Redirect to the intended route or dashboard
            return redirect('/')->with('status', 'Logged in successfully!');
        }

        return redirect('/')->with('error', 'User not found');
    });
}

Route::get('/', [Open\PageController::class, 'home'])->name('page.home');
Route::get('/about-us', [Open\PageController::class, 'aboutus'])->name('page.aboutus');
Route::get('/contact', [Open\PageController::class, 'contact'])->name('page.contact');
Route::post('/contact', [Open\ContactMessageController::class, 'store'])->name('contact.store');
Route::get('/working-system', [Open\PageController::class, 'workingSystem'])->name('page.working-system');

Route::get('/news', [Open\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [Open\NewsController::class, 'show'])->name('news.show');
Route::middleware('auth')->group(function () {
    Route::post('/news/{news}/comments', [Open\CommentController::class, 'store'])->name('comments.store');
});

Route::get('/teacher/assignments', [Admin\TeacherAssignmentController::class, 'index'])->name('admin.teacherassignments.index');


Route::get('/admin', function () {
    return view('layouts.layoutadmin');
})->name('admin');

Route::group(['middleware' => ['role:teacher|keyteacher|admin']], function (){
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::resource('periods', Admin\PeriodController::class);
        Route::get('periods/{period}/delete', [Admin\PeriodController::class, 'delete'])->name('periods.delete');

        Route::resource('cohorts', Admin\CohortController::class);
        Route::get('cohorts/{cohort}/delete', [Admin\CohortController::class, 'delete'])->name('cohorts.delete');

        Route::resource('crebos', Admin\CreboController::class);
        Route::get('crebos/{crebo}/delete', [Admin\CreboController::class, 'delete'])->name('crebos.delete');

        Route::resource('courses', Admin\CourseController::class);
        Route::get('courses/{course}/delete', [Admin\CourseController::class, 'delete'])->name('courses.delete');

        // Student routes
        Route::get('students/{studentId}/results', [Admin\StudentController::class, 'showResults'])->name('students.showResults');
        Route::get('students/import', [Admin\StudentController::class, 'importForm'])->name('students.importForm');
        Route::post('students/import', [Admin\StudentController::class, 'import'])->name('students.import');
        Route::get('students/confirm-import', [Admin\StudentController::class, 'confirmImport'])->name('students.confirmImport');
        Route::post('students/store-import', [Admin\StudentController::class, 'storeImportedStudents'])->name('students.storeImport');
        Route::resource('students', Admin\StudentController::class);
        Route::get('students/{student}/delete', [Admin\StudentController::class, 'delete'])->name('students.delete');


        // SchoolClass routes
        Route::resource('schoolclasses', Admin\SchoolClassController::class);
        Route::get('schoolclasses/{schoolclass}/delete', [Admin\SchoolClassController::class, 'delete'])->name('schoolclasses.delete');

        // Enrollment Status routes
        Route::resource('enrolmentstatuses', Admin\EnrolmentStatusController::class);
        Route::get('enrolmentstatuses/{enrolmentstatus}/delete', [Admin\EnrolmentStatusController::class, 'delete'])->name('enrolmentstatuses.delete');

        // SchoolYear routes
        Route::resource('schoolyears', Admin\SchoolYearController::class);
        Route::get('schoolyears/{schoolyear}/delete', [Admin\SchoolYearController::class, 'delete'])->name('schoolyears.delete');

        Route::resource('classyears', Admin\ClassYearController::class);
        Route::get('classyears/{classyear}/delete', [Admin\ClassYearController::class, 'delete'])->name('classyears.delete');

        Route::resource('modules', Admin\ModuleController::class);
        Route::get('modules/{module}/delete', [Admin\ModuleController::class, 'delete'])->name('modules.delete');

        Route::resource('assignments', Admin\AssignmentController::class);
        Route::get('assignments/{assignment}/delete', [Admin\AssignmentController::class, 'delete'])->name('assignments.delete');

        Route::resource('enrolments', Admin\EnrolmentController::class);
        Route::get('enrolments/{enrolment}/delete', [Admin\EnrolmentController::class, 'delete'])->name('enrolments.delete');

        // Assignment Status routes
        Route::resource('assignmentstatuses', Admin\AssignmentStatusController::class);
        Route::get('assignmentstatuses/{assignmentstatus}/delete', [Admin\AssignmentStatusController::class, 'delete'])->name('assignmentstatuses.delete');

        // ClassAssignments routes
        Route::resource('classassignments', Admin\ClassAssignmentController::class);
        Route::get('classassignments/{classassignment}/delete', [Admin\ClassAssignmentController::class, 'delete'])->name('classassignments.delete');

        // EnrolmentClass routes
        Route::get('enrolmentclasses/unlinked', [Admin\EnrolmentClassController::class, 'showUnlinkedStudents'])->name('enrolmentclasses.unlinked');
        Route::resource('enrolmentclasses', Admin\EnrolmentClassController::class);
        Route::get('enrolmentclasses/{enrolmentclass}/delete', [Admin\EnrolmentClassController::class, 'delete'])->name('enrolmentclasses.delete');

        Route::resource('studentassignments', Admin\StudentAssignmentController::class);
        Route::get('studentassignments/{studentassignment}/delete', [Admin\StudentAssignmentController::class, 'delete'])->name('studentassignments.delete');

        Route::resource('learningoutcomes', Admin\LearningOutcomeController::class);
        Route::get('learningoutcomes/{learningoutcome}/delete', [Admin\LearningOutcomeController::class, 'delete'])->name('learningoutcomes.delete');

        Route::get('learninglevels/{learninglevel}/delete', [Admin\LearningLevelController::class, 'delete'])->name('learninglevels.delete');
        Route::resource('learninglevels', Admin\LearningLevelController::class);

        Route::resource('learningrelatedtechniques', Admin\LearningRelatedTechniqueController::class);
        Route::get('learningrelatedtechniques/{learningrelatedtechnique}/delete', [Admin\LearningRelatedTechniqueController::class, 'delete'])
            ->name('learningrelatedtechniques.delete');

        Route::resource('learningsuboutcomes', Admin\LearningSuboutcomeController::class);
        Route::get('learningsuboutcomes/{learningsuboutcome}/delete', [Admin\LearningSuboutcomeController::class, 'delete'])
            ->name('learningsuboutcomes.delete');

        Route::resource('learningsuboutcomelevels', Admin\LearningSuboutcomeLevelController::class);
        Route::get('learningsuboutcomelevels/{learningsuboutcomelevel}/delete', [Admin\LearningSuboutcomeLevelController::class, 'delete'])
            ->name('learningsuboutcomelevels.delete');

        Route::resource('learningsuboutcometechniques', Admin\LearningSuboutcomeTechniqueController::class);
        Route::get('learningsuboutcometechniques/{learningsuboutcometechnique}/delete', [Admin\LearningSuboutcomeTechniqueController::class, 'delete'])
            ->name('learningsuboutcometechniques.delete');

        Route::resource('lsuboutcomelevelassignments', Admin\LearningSuboutcomeLevelAssignmentController::class);
        Route::get('lsuboutcomelevelassignments/{lsuboutcomelevelassignment}/delete', [Admin\LearningSuboutcomeLevelAssignmentController::class, 'delete'])
            ->name('lsuboutcomelevelassignments.delete');

        Route::get('class-results', [Admin\PDFController::class, 'showClassResultsForm'])->name('class-results.form');
        Route::post('class-results/generate', [Admin\PDFController::class, 'generateClassResultsPDF'])->name('class-results.generate');

        Route::resource('guardians', Admin\GuardianController::class);
        Route::post('/guardians/storeNew', [Admin\GuardianController::class, 'storeNew'])->name('guardians.storeNew');
        Route::get('guardians/{guardian}/delete', [Admin\GuardianController::class, 'delete'])
            ->name('guardians.delete');

        Route::resource('news', Admin\NewsController::class);
        Route::get('news/{news}/delete', [Admin\NewsController::class, 'delete'])
            ->name('news.delete');

        Route::resource('comments', Admin\CommentController::class);
        Route::get('comments/{comment}/delete', [Admin\CommentController::class, 'delete'])
            ->name('comments.delete');

        Route::resource('contactmessages', Admin\ContactMessageController::class);
        Route::get('contactmessages/{contactmessage}/delete', [Admin\ContactMessageController::class, 'delete'])
            ->name('contactmessages.delete');
    });
});

// Routes voor studenten
Route::group(['middleware' => ['role:student']], function (){
    Route::prefix('student')->name('student.')->group(function() {
        Route::get('/voortgang', [Open\StudentController::class, 'showOwnResults'])->name('results');
        Route::get('/module/{moduleId}', [Open\StudentController::class, 'showModuleDetails'])->name('module.details');
        Route::get('/learning-outcome-overview', [Open\LearningOutcomeController::class, 'index'])->name('learning-outcome.index');

    });
});

// Routes voor guardians (ouders)
Route::group(['middleware' => ['role:guardian']], function (){
    Route::prefix('guardian')->name('guardian.')->group(function() {
        Route::get('/dashboard', [Open\GuardianController::class, 'index'])->name('dashboard');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
