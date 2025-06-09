<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\MsgController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\AboutListController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\ResidenceController;
use App\Http\Controllers\ResidenceProjectController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OurPeopleController;
use App\Http\Controllers\Admin\ProjectExperinceController;
use App\Http\Controllers\Admin\ProjectListController;
use App\Http\Controllers\Admin\ProjectPageController;
use App\Http\Controllers\RealEstateProjectController;
use App\Http\Controllers\Admin\ResidenceListController;
use App\Http\Controllers\Admin\ResidencePageController;
use App\Http\Controllers\Admin\SpecialProjectController;
use App\Http\Controllers\Admin\WhyUsController;
use App\Http\Controllers\ResidenceDetailController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/real-estate-project', [RealEstateProjectController::class, 'index'])->name('real-estate-project');
Route::get('/residence-project', [ResidenceProjectController::class, 'index'])->name('residence-project');
Route::get('/residence-project/{id}', [ResidenceDetailController::class, 'show'])->name('more_details');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('auth')->group(function () {

    // homepage
    Route::resource('homepage', HomePageController::class)->except(['destroy', 'show']);

    // about
    Route::resource('aboutpage', AboutPageController::class)->except(['destroy', 'show']);

    // project
    Route::resource('projectpage', ProjectPageController::class)->except(['destroy', 'show']);

    // contact
    Route::resource('contact', ContactController::class)->except(['destroy', 'show']);

    // projectlist
    Route::resource('projectlist', ProjectListController::class)->except(['destroy', 'show']);

    // project
    Route::resource('project', ProjectController::class)->except(['destroy', 'show']);
    Route::post('/project/reorder', [ProjectController::class, 'reorder'])->name('project.reorder');
    Route::get('project/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');


    // about list
    Route::resource('aboutlist', AboutListController::class)->except(['destroy', 'show']);

    // history
    Route::resource('history', HistoryController::class)->except(['destroy', 'show']);
    Route::get('history/delete/{id}', [HistoryController::class, 'delete'])->name('history.delete');

    // msg
    Route::resource('msg', MsgController::class)->except(['destroy', 'show']);

    // why us
    Route::resource('why_us', WhyUsController::class)->except(['destroy', 'show']);

    // Our Team
    Route::resource('our_team', OurTeamController::class)->except(['destroy', 'show']);
    Route::post('/our_team/reorder', [OurTeamController::class, 'reorder'])->name('our_team.reorder');
    Route::get('our_team/delete/{id}', [OurTeamController::class, 'delete'])->name('our_team.delete');

    // Our Team
    Route::resource('our_people', OurPeopleController::class)->except(['destroy', 'show']);
    Route::post('/our_people/reorder', [OurPeopleController::class, 'reorder'])->name('our_people.reorder');
    Route::get('our_people/delete/{id}', [OurPeopleController::class, 'delete'])->name('our_people.delete');


    // vision
    Route::resource('vision_page', VisionController::class)->except(['destroy', 'show']);

    // mission
    Route::resource('mission_page', MissionController::class)->except(['destroy', 'show']);

    // // Our Team
    // Route::resource('our_team', OurTeamController::class)->except(['destroy', 'show']);
    // Route::post('/our_team/reorder', [OurTeamController::class, 'reorder'])->name('our_team.reorder');
    // Route::get('our_team/delete/{id}', [OurTeamController::class, 'delete'])->name('our_team.delete');

    // core value
    Route::resource('core_value', CoreValueController::class)->except(['destroy', 'show']);
    Route::post('/core_value/reorder', [CoreValueController::class, 'reorder'])->name('core_value.reorder');
    Route::get('core_value/delete/{id}', [CoreValueController::class, 'delete'])->name('core_value.delete');


    // certificate
    Route::resource('certificate', CertificateController::class)->except(['destroy', 'show']);
    Route::post('/certificate/reorder', [CertificateController::class, 'reorder'])->name('certificate.reorder');
    Route::get('certificate/delete/{id}', [CertificateController::class, 'delete'])->name('certificate.delete');

    // sepcial project
    Route::resource('special_project', SpecialProjectController::class)->except(['destroy', 'show']);

    // residence page
    Route::resource('residence_page', ResidencePageController::class)->except(['destroy', 'show']);
    // residence list
    Route::resource('residencelist', ResidenceListController::class)->except(['destroy', 'show']);
    // residence
    Route::resource('residence', ResidenceController::class)->except(['destroy', 'show']);
    Route::post('/residence/reorder', [ResidenceController::class, 'reorder'])->name('residence.reorder');
    Route::get('residence/delete/{id}', [ResidenceController::class, 'delete'])->name('residence.delete');
    // service
    Route::resource('service', ServiceController::class)->except(['destroy', 'show']);
    Route::post('/service/reorder', [ServiceController::class, 'reorder'])->name('service.reorder');
    Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');
    // project_experince
    Route::resource('project_experince', ProjectExperinceController::class)->except(['destroy', 'show']);
    Route::post('/project_experince/reorder', [ProjectExperinceController::class, 'reorder'])->name('project_experince.reorder');
    Route::get('project_experince/delete/{id}', [ProjectExperinceController::class, 'delete'])->name('project_experince.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
