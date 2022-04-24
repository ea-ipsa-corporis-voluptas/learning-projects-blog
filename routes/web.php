<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





//
//------------------------------------------------
//------------------------------------------------
//                                    |
//                  STUDENT NOTES    /
//                                  V
//
//
//
//
//
//------------------------------------------------
//------------------------------------------------
//
//                  MAILGUN TEST EMAIL
//

//
//------------------------------------------------
//------------------------------------------------
//
//                  MAILCHIMP TEST EMAIL
//
// $mc = new \MailchimpMarketing\ApiClient();
// $mc->setConfig([
//     'apiKey' => config('services.mailchimp.key'),
//     'server' => 'us14'
// ]);
// $mc->setApiKey('us14', config('services.mailchimp.key'));
// dd($mc->messages->send([
//     'message' => [
//         'html' =>
//             '<p style="
//                 font-size: 24px;
//                 font-weight: bold;
//                 font-family: monospace;
//                 background: rgba(0, 0, 0, 0.7);
//                 color: white;
//             ">Hello, ' . auth()->user()?->userName . '.</p>'
//         ,
//         'subject' => 'A New Post from Hilario Bosco was just added.',
//         'from_email' => 'armenkhachikyan.epost@hotmail.com',
//         'from_name' => 'aBlog',
//         'to' => (object) array(
//             'email' => 'armenkhachikyan.epost@hotmail.com',
//             'name' => auth()->user()?->name
//         )
//     ],
//     'send_at' => '2020-01-01 00:00:00'
// ]));

//
//
//
//
//------------------------------------------------
//------------------------------------------------
//
//                  MAILCHIMP PING
//
// $mc = (new \MailchimpMarketing\ApiClient())->setConfig([
//     'apiKey' => config('services.mailchimp.key'),
//     'server' => 'us14'
// ]);
// dd($mc->lists->getAllLists());
//
//
//
//
//------------------------------------------------
//------------------------------------------------
//
//                  INCLUDE EMAIL VERIFICATION
//
// Illuminate\Support\Facades\Auth::routes(['verify' => true]);
//
//------------------------------------------------
//------------------------------------------------
//                                     ^
//                                    /
//                                   |
//                  END STUDENT NOTES
//
//








//------------------------------------------------
//------------------------------------------------
//
//                  OPEN ROUTES
//
//
//------------------------------------------------
//------------------------------------------------
//
//                  POSTS
//
// ALL POSTS
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])
    ->name('home');

// SHOW a POST
Route::get('posts/{post:slug}', [App\Http\Controllers\PostController::class, 'show'])
    ->where('post', '[A-z\-]+');
//
//------------------------------------------------
//------------------------------------------------
//
//                  SUBSCRIPTION
//
// SUBSCRIBE
Route::post('newsletter', [App\Http\Controllers\NewsletterController::class, 'store']);    //
//------------------------------------------------
//------------------------------------------------
//
//                  SESSIONS
//
// LOG OUT
Route::post('logout', [App\Http\Controllers\SessionsController::class, 'destroy']);
//
//------------------------------------------------
//------------------------------------------------
//
//                  GUEST ROUTES
//
Route::middleware('guest')->group(function() {
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  REGISTRATION
    //
    // REGISTER FORM
    Route::get('register', [App\Http\Controllers\RegisterController::class, 'create']);
    // REGISTER
    Route::post('register', [App\Http\Controllers\RegisterController::class, 'store']);
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  AUTHENTICATION
    //
    // LOG IN FORM
    Route::get('login', [App\Http\Controllers\SessionsController::class, 'create']);
    // LOG IN
    Route::post('login', [App\Http\Controllers\SessionsController::class, 'store']);
});
//
//------------------------------------------------
//------------------------------------------------
//
//                  AUTHENTICATED ROUTES
//
Route::middleware('auth')->group(function() {
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  COMMENTS
    //
    // SEND a COMMENT
    Route::post('posts/{post:slug}/comments', [App\Http\Controllers\PostCommentsController::class, 'store'])
        ->where('post', '[A-z\-]+');
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  BOOKMARKS
    //
    // ALL FOLLOWS
    Route::get('bookmarks', [App\Http\Controllers\FollowsController::class, 'index'])
        ->name('bookmarks');

    // FOLLOW AUTHOR
    Route::post('profiles/{user}/follow', [App\Http\Controllers\FollowsController::class, 'store'])
        ->name('follow');
    
    // UNFOLLOW AUTHOR
    Route::delete('profiles/{user}/follow', [App\Http\Controllers\FollowsController::class, 'destroy'])
        ->name('unfollow');
        
});
//
//------------------------------------------------
//------------------------------------------------
//
//                  ADMIN ROUTES
//
Route::middleware('can:admin')->group(function() {
    Route::resource('admin/posts', \App\Http\Controllers\AdminPostController::class)
        ->except('show');

    // Route::get('admin/posts', [App\Http\Controllers\AdminPostController::class, 'index']);
    // // postCreate fillForm
    // Route::get('admin/posts/create', [App\Http\Controllers\AdminPostController::class, 'create']);
    // // postCreate sendForm
    // Route::post('admin/posts', [App\Http\Controllers\AdminPostController::class, 'store']);
    // // postEdit fillForm
    // Route::get('admin/posts/{post}/edit', [App\Http\Controllers\AdminPostController::class, 'edit']);
    // // postEdit sendForm
    // Route::patch('admin/posts/{post}', [App\Http\Controllers\AdminPostController::class, 'update']);
    // // postDelete sendForm
    // Route::delete('admin/posts/{post}', [App\Http\Controllers\AdminPostController::class, 'destroy']);
});