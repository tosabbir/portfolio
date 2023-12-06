<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Home\HomeAboutController;
use App\Http\Controllers\home\HomePartnerController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\HometesTimonialController;
use App\Http\Controllers\MultiImage\AboutMultiImageController;
use App\Http\Controllers\MultiImage\ClientMultiImageController;
use App\Http\Controllers\MultiImage\PartnerMultiImageController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

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

// all frontend access route
Route::get('/', function () {
    return view('index');
});

// all frontend about route here
Route::get('/about', [AboutController::class, 'index'])->name('about.page');


// all frontend portfolio route here
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.page');
Route::get('/details/portfolio,{id}', [PortfolioController::class, 'show'])->name('portfolio.details');


// all frontend Blog route here
Route::get('/blog', [BlogController::class, 'index'])->name('blog.page');
Route::get('/details/blog,{id}', [BlogController::class, 'show'])->name('details.blog');



// all frontend comment route here
Route::post('/store/comment,{id}', [CommentController::class, 'store'])->name('store.comment');
Route::post('/store/comment/service,{id}', [CommentController::class, 'storeCommentService'])->name('store.comment.service');
Route::post('/store/question', [CommentController::class, 'storeQuestion'])->name('store.question');



// all frontend contact route is here
Route::get('/contact', [CommentController::class, 'Contact'])->name('contact');
Route::post('/store/contact', [CommentController::class, 'StoreContactInfo'])->name('store.contact.info');




// all frontend service route is here
Route::get('/details/service,{id}', [ServiceController::class, 'show'])->name('details.service');
Route::get('/service', [ServiceController::class, 'service'])->name('service');


// admin dashboard route
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// admin profile access route here
Route::middleware('auth','verified')->group(function () {
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'index'])->name('admin.profile');
    Route::get('/admin/edit/profile', [AdminController::class, 'edit'])->name('admin.edit.profile');
    Route::post('/admin/update/profile', [AdminController::class, 'update'])->name('admin.update.profile');
    Route::get('/admin/change/password', [AdminController::class, 'changePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'updatePassword'])->name('admin.update.password');

});


// admin access > home page about section manage route here
Route::middleware('auth','verified')->group(function () {
    Route::get('/home/slide', [HomeSlideController::class, 'index'])->name('home.slide');
    Route::post('/update/home', [HomeSlideController::class, 'update'])->name('update.home');
    Route::get('/home/about', [HomeAboutController::class, 'index'])->name('home.about');
    Route::post('update/home/about', [HomeAboutController::class, 'update'])->name('update.home.about');

});

// admin access > home page partner section manage route here
Route::middleware('auth','verified')->group(function () {

    // home pertner section crud operations here
    Route::get('/home/partner', [HomePartnerController::class, 'index'])->name('home.partner');
    Route::Post('update/home/partner,{id}', [HomePartnerController::class, 'update'])->name('update.home.partner');


    // partner multi image crud opeation here
    Route::get('/partner/multi/image', [PartnerMultiImageController::class, 'index'])->name('partner.multi.image');
    Route::post('/store/partner/multi/image', [PartnerMultiImageController::class, 'store'])->name('store.partner.multi.image');
    Route::get('/edit/partner/multi/image,{id}', [PartnerMultiImageController::class, 'edit'])->name('partner.multi.image.edit');
    Route::post('/update/partner/multi/image,{id}', [PartnerMultiImageController::class, 'update'])->name('update.partner.multi.image');
    Route::get('/delete/partner/multi/image,{id}', [PartnerMultiImageController::class, 'destroy'])->name('partner.multi.image.delete');

});
// admin access > home page Cliend section manage route here
Route::middleware('auth','verified')->group(function () {

    // home client section crud operations here
    Route::get('/home/testimonial', [HometesTimonialController::class, 'index'])->name('home.testimonial');
    Route::post('/store/testimonial', [HometesTimonialController::class, 'store'])->name('store.testimonial');
    Route::get('/edit/testimonial,{id}', [HometesTimonialController::class, 'edit'])->name('edit.testimonial');
    Route::Post('update/home/testimonial,{id}', [HometesTimonialController::class, 'update'])->name('update.testimonial');
    Route::get('delete/home/testimonial,{id}', [HometesTimonialController::class, 'destroy'])->name('delete.testimonial');


    // client multi image crud opeation here
    Route::get('/client/multi/image', [ClientMultiImageController::class, 'index'])->name('client.multi.image');
    Route::post('/store/client/multi/image', [ClientMultiImageController::class, 'store'])->name('store.client.multi.image');
    Route::get('/edit/client/multi/image,{id}', [ClientMultiImageController::class, 'edit'])->name('client.multi.image.edit');
    Route::post('/update/client/multi/image,{id}', [ClientMultiImageController::class, 'update'])->name('update.client.multi.image');
    Route::get('/delete/client/multi/image,{id}', [ClientMultiImageController::class, 'destroy'])->name('client.multi.image.delete');

});



// admin access > about page & manage route here
Route::middleware('auth','verified')->group(function () {

    // about multi image crud opeation here
    Route::get('/about/multi/image', [AboutMultiImageController::class, 'index'])->name('about.multi.image');
    Route::post('/store/about/multi/image', [AboutMultiImageController::class, 'store'])->name('store.about.multi.image');
    Route::get('/edit/about/multi/image,{id}', [AboutMultiImageController::class, 'edit'])->name('about.multi.image.edit');
    Route::post('/update/about/multi/image,{id}', [AboutMultiImageController::class, 'update'])->name('update.about.multi.image');
    Route::get('/delete/about/multi/image,{id}', [AboutMultiImageController::class, 'destroy'])->name('about.multi.image.delete');

    // all skills crud operation is here
    Route::get('/add/skill', [AboutController::class, 'addSkill'])->name('add.skill');
    Route::post('/srore/skill', [AboutController::class, 'storeSkill'])->name('store.skill');
    Route::get('/edit/kill,{id}', [AboutController::class, 'editSkill'])->name('edit.skill');
    Route::post('/update/skill,{id}', [AboutController::class, 'updateSkill'])->name('update.skill');
    Route::get('/delete/skill,{id}', [AboutController::class, 'deleteSkill'])->name('delete.skill');

    // all award crud operaion is here
    Route::get('/add/award', [AboutController::class, 'addAward'])->name('add.award');
    Route::post('/store/award', [AboutController::class, 'storeAward'])->name('store.award');
    Route::get('/edit/award,{id}', [AboutController::class, 'editAward'])->name('edit.award');
    Route::post('/update/award,{id}', [AboutController::class, 'updateAward'])->name('update.award');
    Route::get('/delete/award,{id}', [AboutController::class, 'deleteAward'])->name('delete.award');

    // all education crud operaion is here
    Route::get('/add/education', [AboutController::class, 'addEducation'])->name('add.education');
    Route::post('/store/education', [AboutController::class, 'storeEducation'])->name('store.education');
    Route::get('/edit/education,{id}', [AboutController::class, 'editEducation'])->name('edit.education');
    Route::post('/update/education,{id}', [AboutController::class, 'updateEducation'])->name('update.education');
    Route::get('/delete/education,{id}', [AboutController::class, 'deleteEducation'])->name('delete.education');

});


// admin access > portfolio page & manage route here
Route::middleware('auth','verified')->group(function () {

    // portfolio category setup here
    Route::get('/portfolio/category', [PortfolioController::class, 'portfolioCategory'])->name('portfolio.category');

    Route::post('/store/portfolio/category', [PortfolioController::class, 'portfolioCategoryStore'])->name('store.portfolio.category');

    Route::get('/portfolio/category/edit,{id}', [PortfolioController::class, 'portfolioCategoryEdit'])->name('portfolio.category.edit');

    Route::post('/Update/portfolio/category,{id}', [PortfolioController::class, 'portfolioCategoryUpdate'])->name('update.portfolio.category');


    // portfolio crud operaion here
    Route::get('/all/portfolio', [PortfolioController::class, 'allPortfolio'])->name('all.portfolio');
    Route::get('/add/portfolio', [PortfolioController::class, 'create'])->name('add.portfolio');
    Route::post('/store/portfolio', [PortfolioController::class, 'store'])->name('store.portfolio');

    Route::get('/edit/portfolio,{id}', [PortfolioController::class, 'edit'])->name('edit.portfolio');
    Route::post('/update/portfolio,{id}', [PortfolioController::class, 'update'])->name('update.portfolio');

    Route::get('/delete/portfolio,{id}', [PortfolioController::class, 'destroy'])->name('delete.portfolio');

});


// admin access > blog page & manage route here
Route::middleware('auth','verified')->group(function () {

    // blog category setup here
    Route::get('/all/blog/category', [BlogController::class, 'blogCategory'])->name('all.blog.category');

    Route::post('/store/blog/category', [BlogController::class, 'blogCategoryStore'])->name('store.blog.category');

    Route::get('/blog/category/edit,{id}', [BlogController::class, 'blogCategoryEdit'])->name('blog.category.edit');

    Route::post('/Update/blog/category,{id}', [BlogController::class, 'blogCategoryUpdate'])->name('update.blog.category');


    // blog crud operaion here
    Route::get('/all/blog', [BlogController::class, 'allblog'])->name('all.blog');
    Route::get('/add/blog', [BlogController::class, 'create'])->name('add.blog');
    Route::post('/store/blog', [BlogController::class, 'store'])->name('store.blog');

    Route::get('/edit/blog,{id}', [BlogController::class, 'edit'])->name('edit.blog');
    Route::post('/update/blog,{id}', [BlogController::class, 'update'])->name('update.blog');

    Route::get('/delete/blog,{id}', [BlogController::class, 'destroy'])->name('delete.blog');

});


// admin access > All Comment & manage route here
Route::middleware('auth','verified')->group(function () {

    // blog category setup here
    Route::get('/all/comment', [CommentController::class, 'index'])->name('all.comment');
    Route::get('/details/comment,{id}', [CommentController::class, 'show'])->name('details.comment');
    Route::get('/delete/comment,{id}', [CommentController::class, 'destroy'])->name('delete.comment');

});

// admin access > All service & manage route here
Route::middleware('auth','verified')->group(function () {

    // blog category setup here
    Route::get('/all/service', [ServiceController::class, 'index'])->name('all.service');
    Route::post('/store/service', [ServiceController::class, 'store'])->name('store.service');
    Route::get('/edit/service,{id}', [ServiceController::class, 'edit'])->name('edit.service');
    Route::post('/update/service,{id}', [ServiceController::class, 'update'])->name('update.service');
    Route::get('/delete/service,{id}', [ServiceController::class, 'destroy'])->name('delete.service');

});






Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

require __DIR__.'/auth.php';
