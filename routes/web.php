<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Members\ScanController AS ScanMember;
use App\Http\Controllers\Members\HistoryController AS HistoryMember;
use App\Http\Controllers\Members\ProfileController AS ProfileMember;
use App\Http\Controllers\Members\DashboardController AS DashboardMember;
use App\Http\Controllers\Members\ClassController AS ClassMember;
use App\Http\Controllers\Members\MyqrcodeController;

Route::get('/', [AuthController::class, 'signin']);

Route::get('/token', function () {
    return csrf_token();
});

# Auth
Route::prefix('auth')->group(function () {
    Route::post('/signin', [AuthController::class, 'signin'])->name('login');
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::get('/signin', [AuthController::class, 'signin']);
    Route::get('/signup', [AuthController::class, 'signup']);
    Route::get('/signout', [AuthController::class, 'signout']);
});

Route::group(['middleware' => ['auth']], function () {

    # Member
    Route::prefix('member')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardMember::class, 'index']);
        });
        Route::prefix('scan')->group(function () {
            Route::get('/', [ScanMember::class, 'index']);
            Route::post('checkingym', [ScanMember::class, 'checkInGym']);
            Route::post('checkinsessionpt', [ScanMember::class, 'checkinSessionPT']);

            # Success message
            Route::get('/signin_success', [ScanMember::class, 'signinSuccess']);
            Route::get('/signin_error', [ScanMember::class, 'signinError']);
        });
        // Route::prefix('myqrcode')->group(function () {
        //   Route::get('/', [MyqrcodeController::class, 'index']);
        // });
        Route::prefix('class')->group(function () {
            Route::get('/list', [ClassMember::class, 'list']);
            Route::get('/list_json', [ClassMember::class, 'list_json']);
        });
        Route::prefix('history')->group(function () {
            Route::get("/", function () {
                return view("member.history.index");
            });
            Route::get('/check_in', [HistoryMember::class, 'check_in']);
            Route::get('/check_in_json', [HistoryMember::class, 'check_in_json']);
            Route::get('/session_with_pt', [HistoryMember::class, 'session_with_pt']);
            Route::get('/session_with_pt_json', [HistoryMember::class, 'session_with_pt_json']);
            Route::get('/check-out-gym/{id}', [HistoryMember::class, 'checkout_gym']);
            Route::get('/check-out-pt/{id}', [HistoryMember::class, 'checkout_pt']);
        });
        Route::prefix('profile')->group(function () {
            Route::post('/', [ProfileMember::class, 'index']);
            Route::get('/', [ProfileMember::class, 'index']);
        });
    });

    # Personal Trainer
    Route::prefix('personal_trainer')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardMember::class, 'index']);
        });
        Route::prefix('scan')->group(function () {
            Route::get('/', [DashboardMember::class, 'index']);
        });
        Route::prefix('history')->group(function () {
            Route::get('/check_in', [HistoryController::class, 'history_check_in']);
            Route::get('/check_in_trainer', [HistoryController::class, 'history_check_in_trainer']);
        });
        Route::prefix('profile')->group(function () {
            Route::post('/', [ProfileController::class, 'index']);
            Route::get('/', [ProfileController::class, 'index']);
        });
    });
});
