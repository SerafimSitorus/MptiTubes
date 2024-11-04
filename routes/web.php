<?php

use App\Http\Controllers\Jobseeker\DashboardController as JobseekerDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\Operator\DashboardController as OperatorDashboardController;
use App\Http\Controllers\Parent\DashboardController as ParentDashboardController;
use App\Http\Controllers\Superadmin\AuditController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Superadmin\DashboardController;
use App\Http\Controllers\Superadmin\OperatorController;
use App\Http\Controllers\Superadmin\TutorController;
use App\Http\Controllers\Tutor\DashboardController as TutorDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/jobdashboard', function () {
    return view('/JobSeeker/jobseeker-dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Parents (Serafim)
Route::group(['prefix'=> 'parents', 'middleware' => 'auth'], function () {
    Route::get('dashboard-parents', [ParentDashboardController::class, 'index'])->name('parent/dashboard-parents');    
    Route::get('/tutor-applicants-parents', [ParentDashboardController::class, 'applicants']);
    Route::get('/tutor-applicants-parents-detail-profil{nik_lamaran}', [ParentDashboardController::class, 'detailapplicants'])->name('tutor-applicant-profil-detail');
    Route::get('/tutor-applicants-parents-detail-lowongan{id_lowongan}', [ParentDashboardController::class, 'detaillowongan'])->name('tutor-applicant-lowongan-detail');
    Route::get('/tutor-applicants-parents-terima{id_lamaran}', [ParentDashboardController::class, 'applicants_terima'])->name('tutor-applicant-terima');
    Route::get('/tutor-applicants-parents-tolak{id_lamaran}', [ParentDashboardController::class, 'applicants_tolak'])->name('tutor-applicant-tolak');
    Route::get('/find-tutor-parent', [ParentDashboardController::class, 'findtutor'])->name('parents.find-tutor');
    Route::get('/tutor-review-parent-tambahlowongan', [ParentDashboardController::class, 'findtutorform']);
    Route::post('/tutor-review-parent-tambahlowongan-insert', [ParentDashboardController::class, 'insertfindtutorform']);
    Route::get('/tutor-management', [ParentDashboardController::class, 'berhentikantutor']);
    Route::get('/tutor-management-berhentikan{id_mengajar}', [ParentDashboardController::class, 'berhentikantutortombol'])->name('tutor-applicant-berhentikan');

    Route::get('/parentsprofile', [ParentDashboardController::class, 'profile'])->name('parents.profile');

    Route::get('/parentsedit', [ParentDashboardController::class, 'editprofile']);
    Route::post('/parentsinsertedit', [ParentDashboardController::class, 'inserteditprofile']);

    Route::get('/parentseditpassword', [ParentDashboardController::class, 'updatepassword']);
    Route::post('/parentsinserteditpassword', [ParentDashboardController::class, 'insertupdatepassword']);
    Route::get('/parentseditemail', [ParentDashboardController::class, 'updateemail']);
    Route::post('/parentsinserteditemail', [ParentDashboardController::class, 'insertupdateemail']);

    Route::get('/parentseditusername', [ParentDashboardController::class, 'profile_edit_username']);
});



//operator
Route::group(['prefix'=>'operator', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [OperatorDashboardController::class, 'index'])->name('operator/dashboard');

    Route::get('/operator-tutor-review', function () {
        return view('/operator/operator-tutor-review');
    });
    
    Route::get('/operator-tutor-review-detail', function () {
        return view('/operator/operator-tutor-review-detail');
    });
    
    Route::get('/operator-tutor-status', [OperatorDashboardController::class, 'tampilstatusmengajar']);
    Route::get('/operator-tutor-berhenti{id_mengajar}', [OperatorDashboardController::class, 'hentikan_mengajar'])->name('hentikan_tutor_mengajar');
    // Route::get('/operator-tutor-status-detail{id_lowongan}', [OperatorDashboardController::class, 'tampilstatusmengajar_detail'])->name('detail_tutor');
    
    Route::get('/operator-tutor-status-detail', function () {
        return view('/operator/operator-tutor-status-detail');
    });
    
    Route::get('/operator-tutor-criteria-inbox', [OperatorDashboardController::class, 'tutorcriteria']);
    Route::get('/operator-tutor-criteria-inbox-terima/{id_lowongan}', [OperatorDashboardController::class, 'tutorcriteria_terima'])->name('tutor_criteria_inbox_terima');
    Route::get('/operator-tutor-criteria-inbox-tolak/{id_lowongan}', [OperatorDashboardController::class, 'tutorcriteria_tolak'])->name('tutor_criteria_inbox_tolak');
    Route::get('/operator-tutor-criteria-inbox-detail/{id_lowongan}', [OperatorDashboardController::class, 'tutorcriteriadetail'])->name('tutor_criteria_detail');
    Route::get('/operator-profil', [OperatorDashboardController::class, 'profile']);
    Route::get('/operator-profil-edit-password', [OperatorDashboardController::class, 'editpassword']);
    Route::post('/operator-profil-edit-password-insert', [OperatorDashboardController::class, 'inserteditpassword']);
    
    Route::get('/operator-tutor-criteria-inbox-detail', function () {
        return view('/operator/operator-tutor-criteria-inbox-detail');
    });
    
    Route::get('/operator-profile', function () {
        return view('/operator/operator-profile');
    });
    
    Route::get('/operator-payment-for-tutor', function () {
        return view('/operator/operator-payment-for-tutor');
    });
    
    Route::get('/operator-payment-for-tutor-detail', function () {
        return view('/operator/operator-payment-for-tutor-detail');
    });
    
    Route::get('/operator-payment-for-operator', function () {
        return view('/operator/operator-payment-for-operator');
    });
    
    Route::get('/operator-payment-for-operator-detail', function () {
        return view('/operator/operator-payment-for-operator-detail');
    });
    
    Route::get('/operator-edit-profile', function () {
        return view('/operator/operator-edit-profile');
    });
});


//Super Admin (Keisya)

Route::group(['prefix'=>'superadmin', 'middleware'=> ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('superadmin/dashboard');
    Route::controller(OperatorController::class)->group(function(){
        Route::get('operator', 'index')->name('superadmin/operator');
        Route::get('operator/add', 'create')->name('superadmin/operator/add');
        Route::post('operator/store', 'store')->name('superadmin/operator/store');
        Route::get('operator/{id}/detail', 'show')->name('superadmin/operator/detail');
        Route::get('operator/{id}/edit', 'edit')->name('superadmin/operator/edit');
      //  Route::put('operator/{id}/update', 'update')->name('superadmin/operator/update'); 
        Route::put('superadmin/operator/update/{id}', [OperatorController::class, 'update'])->name('superadmin/operator/update');
      //  Route::delete('/superadmin/operator/delete/{nik}', [OperatorController::class, 'destroy'])->name('superadmin/operator/delete');
      //  Route::delete('operator/{id}', 'destroy')->name('superadmin/operator/delete');
    });
    Route::controller(TutorController::class)->group(function(){
        Route::get('tutor', 'list')->name('superadmin/tutor');
        Route::get('tutor/{id}/detail', 'list_detail')->name('superadmin/tutor/detail');
        Route::get('tutor-criteria', 'criteria')->name('superadmin/tutor-criteria');
        Route::get('tutor-criteria/{id_lowongan}/detail', 'criteria_detail')->name('superadmin/tutor-criteria/detail');
        Route::get('tutor-criteria/{id_lowongan}/terima', 'tutorcriteria_terima')->name('superadmin/tutor-criteria/detail/terima');
        Route::get('tutor-criteria/{id_lowongan}/tolak', 'tutorcriteria_tolak')->name('superadmin/tutor-criteria/detail/tolak');
        Route::get('tutor-review', 'review')->name('superadmin/tutor-review');
        Route::get('tutor-review/{id}/detail', 'review_detail')->name('superadmin/tutor-review/detail');
    });
    Route::get('audit', [AuditController::class, 'index'])->name('superadmin/audit');
});



// Tutor
Route::group(['prefix'=>'tutor', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [TutorDashboardController::class, 'index'])->name('tutor/dashboard');
    Route::get('tutor-alljob', [TutorDashboardController::class, 'alljob'])->name('tutor.alljob');
    Route::get('tutor-searchjob', [TutorDashboardController::class, 'searchjob'])->name('tutor.searchjob');
    Route::get('tutor-detail_job{id_job}', [TutorDashboardController::class, 'detailjob'])->name('tutor.detailjob');
    Route::get('tutor-lamar{id_lowongan}',  [TutorDashboardController::class, 'lamarjob'])->name('tutor.lamar');
    Route::get('/tutor-history', [TutorDashboardController::class, 'historyjob'])->name('historyjob');
    Route::get('/tutor-history-detail{id_history_lowongan}', [TutorDashboardController::class, 'detailhistoryjob'])->name('tutor-history-detail');
    Route::get('/tutor-history-hapus{id_history_lowongan}', [TutorDashboardController::class, 'batalkanlamaran'])->name('tutor-history-detail-hapus');
    Route::get('/tutor-profil', [TutorDashboardController::class, 'profile'])->name('tutor.tutor-profil');
    Route::get('/tutorschedule', [TutorDashboardController::class, 'jadwal']);

    Route::get('/tutor-edit-profil', [TutorDashboardController::class, 'editprofile']);
    Route::post('/tutor-insertedit-profil', [TutorDashboardController::class, 'inserteditprofile']);

    Route::get('/tutor-edit-password', [TutorDashboardController::class, 'updatepassword']);
    Route::post('/tutor-insertedit-password', [TutorDashboardController::class, 'insertupdatepassword']);

    Route::get('/tutor-edit-email', [TutorDashboardController::class, 'updateemail']);
    
    Route::post('/tutor-insertedit-email', [TutorDashboardController::class, 'insertupdateemail']);
    
});

// Job seeker
Route::group(['prefix'=>'jobseek'], function () {
    Route::get('dashboard', [JobseekerDashboardController::class, 'index'])->name('jobseeker/dashboard');
});

require __DIR__ . '/auth.php';

