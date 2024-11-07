<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\MentorInfoController;
use App\Http\Controllers\MenteeInfoController;
use App\Http\Controllers\MentorMenteeListController;
use App\Http\Controllers\CommunityDocumentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\MentorRatingController;
use App\Http\Controllers\CompetitionRegistrationController;

/*
|--------------------------------------------------------------------------- 
| API Routes 
|--------------------------------------------------------------------------- 
| 
| Here is where you can register API routes for your application. 
| These routes are loaded by the RouteServiceProvider within a group which 
| is assigned the "api" middleware group. Enjoy building your API! 
|
*/

// Route nhóm cho các API yêu cầu xác thực
Route::middleware('auth:sanctum')->group(function () {

    // Các route cho Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('{id}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('{id}', [UserController::class, 'update']);
        Route::delete('{id}', [UserController::class, 'destroy']);
    });

    // Các route cho Roles
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('{id}', [RoleController::class, 'show']);
        Route::post('/', [RoleController::class, 'store']);
        Route::put('{id}', [RoleController::class, 'update']);
        Route::delete('{id}', [RoleController::class, 'destroy']);
    });

    // Các route cho User-Roles
    Route::group(['prefix' => 'user-roles'], function () {
        Route::get('/', [UserRoleController::class, 'index']);
        Route::get('{id}', [UserRoleController::class, 'show']);
        Route::post('/', [UserRoleController::class, 'store']);
        Route::put('{id}', [UserRoleController::class, 'update']);
        Route::delete('{id}', [UserRoleController::class, 'destroy']);
    });

    // Các route cho Mentor-Info
    Route::group(['prefix' => 'mentor-info'], function () {
        Route::get('/', [MentorInfoController::class, 'index']);
        Route::get('{id}', [MentorInfoController::class, 'show']);
        Route::post('/', [MentorInfoController::class, 'store']);
        Route::put('{id}', [MentorInfoController::class, 'update']);
        Route::delete('{id}', [MentorInfoController::class, 'destroy']);
    });

    // Các route cho Mentee-Info
    Route::group(['prefix' => 'mentee-info'], function () {
        Route::get('/', [MenteeInfoController::class, 'index']);
        Route::get('{id}', [MenteeInfoController::class, 'show']);
        Route::post('/', [MenteeInfoController::class, 'store']);
        Route::put('{id}', [MenteeInfoController::class, 'update']);
        Route::delete('{id}', [MenteeInfoController::class, 'destroy']);
    });

    // Các route cho Mentor-Mentee List
    Route::group(['prefix' => 'mentor-mentee'], function () {
        Route::get('/', [MentorMenteeListController::class, 'index']);
        Route::get('{id}', [MentorMenteeListController::class, 'show']);
        Route::post('/', [MentorMenteeListController::class, 'store']);
        Route::put('{id}', [MentorMenteeListController::class, 'update']);
        Route::delete('{id}', [MentorMenteeListController::class, 'destroy']);
    });

    // Các route cho Community Documents
    Route::resource('community-documents', CommunityDocumentController::class);

    // Các route cho Comments
    Route::resource('comments', CommentController::class);

    // Các route cho Competitions
    Route::group(['prefix' => 'competitions'], function () {
        Route::get('/', [CompetitionController::class, 'index']);
        Route::get('{id}', [CompetitionController::class, 'show']);
        Route::post('/', [CompetitionController::class, 'store']);
        Route::put('{id}', [CompetitionController::class, 'update']);
        Route::delete('{id}', [CompetitionController::class, 'destroy']);
    });

    // Các route cho Contact Messages
    Route::resource('contact-messages', ContactMessageController::class);

    // Các route cho Mentor Ratings
    Route::resource('mentor-ratings', MentorRatingController::class);

    // Các route cho Competition Registrations
    Route::resource('competition-registrations', CompetitionRegistrationController::class);
});
