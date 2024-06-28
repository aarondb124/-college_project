<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PixelController;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SensorController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PagelistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\MonitorSizeController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\RentCartController;
use App\Http\Controllers\Admin\CameraFormatController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PublicMessageController;
use App\Http\Controllers\Admin\RecordingModeController;
use App\Http\Controllers\Admin\EffectivePixelController;
use App\Http\Controllers\Admin\MessageSendingController;
use App\Http\Controllers\Customer\OrderCancelController;
use App\Http\Controllers\Customer\CustomerController as CustomerCustomerController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

// use GuzzleHttp\Middleware;



// Route::get('/', function () {
//     return view('welcome');
// });

// optimiZe
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return 'DONE'; //Return anything
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/subcategory-list/{id}', [HomeController::class, 'subcategoryList'])->name('sub.category.list');
Route::get('service-and-repair',[HomeController::class,'service'])->name('service');

//policy
Route::get('delivery-policy',[HomeController::class,'delivery'])->name('delivery.policy');
Route::get('return-policy',[HomeController::class,'return'])->name('return.policy');

Route::get('/another-branch/{id}', [HomeController::class, 'anotherBranch'])->name('another.branch');
//brand wise 
Route::get('brand-product/{id}',[HomeController::class,'brandProduct'])->name('brand.product');
//sub category wise
Route::get('/subcategory-wise-product/{id}', [HomeController::class, 'subProductQuote'])->name('subcategory-wise-product');
Route::get('/category-wise-product/{id}', [HomeController::class, 'ProductQuote'])->name('category-wise-product');

Route::get('/quote-print', [HomeController::class, 'quotePrint'])->name('quote-print.website');
Route::get('/product-list/{slug}', [HomeController::class, 'productList'])->name('product.list');
// Route::get('/subcategorywise-product-list/{slug}', [HomeController::class, 'subCategorywise'])->name('subCategorywiseProduct');
Route::get('/product-list-category/{slug}', [HomeController::class, 'productCategory'])->name('product.category');
//category wise
Route::get('/category-wise/{slug}', [HomeController::class, 'categoryWise'])->name('category.wise');
Route::get('/product-details/{slug}', [HomeController::class, 'ProductDetails'])->name('product.detail');
Route::post('/product-short', [HomeController::class, 'productSort'])->name('product.sort');
Route::get('/get-upazila', [HomeController::class, 'getUpazila'])->name('upazila.change');
Route::get('/add-cart-ajax/{id}', [CartController::class, 'addToCartAjax'])->name('add.cart.ajax');
Route::get('/cart-all', [CartController::class, 'cartAllData'])->name('cart.alldata');
Route::get('/cart-content', [CartController::class, 'cartContent'])->name('cart.content');
Route::get('/cart-page', [HomeController::class, 'cart'])->name('cart.page');
Route::get('/cart/increment/{id}', [CartController::class, 'increment'])->name('cart.increment');
Route::get('/cart/decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::get('/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/add-cart', [CartController::class, 'addCart'])->name('add.cart');
Route::get('/quote/{id}', [QuoteController::class, 'quoteAdd'])->name('quote');
Route::get('all-brand',[HomeController::class,'brand'])->name('all.brand');
Route::get('brand-wise-product/{id}',[HomeController::class,'brandWise'])->name('brand.wise');

Route::get('all-sub-subcategorylist/{id}',[HomeController::class,'getAllsubsubcategory'])->name('allSubsubcategory');

Route::get('/quote-remove/{id}', [QuoteController::class, 'removeQuate'])->name('quate-remove');

Route::get('/get-quote', [QuoteController::class, 'getQuote'])->name('get-quote');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-store', [HomeController::class, 'contactStore'])->name('contact.store');
// serarch route
Route::get('/get_suggestions/{k}', [HomeController::class, 'getSearchSuggestions'])->name('searh.product');
Route::get('/get_suggestions_build/{k}/{id}', [HomeController::class, 'getSearchSuggestionsBuild'])->name('searh.product.build');
Route::get('/search', [HomeController::class, 'productSearch'])->name('search');
Route::get('/search-build', [HomeController::class, 'productSearchBuild'])->name('search-build');

Route::get('/what-happening', [HomeController::class, 'blog'])->name('blog');
Route::get('/what-happening-details/{id}', [HomeController::class, 'blogDetails'])->name('blog.details');

//news
Route::get('/news',[HomeController::class,'News'])->name('news');
Route::get('news-details/{slug?}', [HomeController::class,'newsDetails'])->name('news.details');

Route::get('/question-store', [HomeController::class, 'questionStore'])->name('question.store')->middleware('questionCheck');


Route::get('/hot-product', [HomeController::class, 'hotProduct'])->name('hot.product');

//about us page
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');

Route::get('/area/change', [HomeController::class, 'areaChange'])->name('area.change');

Route::get('/area/charge', [HomeController::class, 'areaCharge'])->name('area.charge');

// admin all route
require __DIR__ . '/admin.php';

// customer all route
require __DIR__ . '/customer.php';


