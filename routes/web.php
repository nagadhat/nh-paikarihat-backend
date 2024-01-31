<?php

use App\Http\Controllers\FrontEnd\PackageController as FrontEnd_PackageController;

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Courier\CourierController;
use App\Http\Controllers\Courier\UserCourierController;
use App\Http\Controllers\Dashboard\AdminDashboard;
use App\Http\Controllers\Dashboard\CustomerDashboard;
use App\Http\Controllers\FrontEnd\AuthController;
use App\Http\Controllers\FrontEnd\CustomerDashboardController;
use App\Http\Controllers\Package\PackageController;
use App\Http\Controllers\Pos\PosCartController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Purchase\PurchaseCartController;
use App\Http\Controllers\Pos\PosController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Order\OderController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\User\SupplierController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\Product\ProductVariationController;
use App\Http\Controllers\Theme\TemplateController;
use App\Http\Controllers\Ticket\SupportTicketController;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\Theme\UserThemeController;
use App\Http\Controllers\Theme\UserThemeElementController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\LandingPageController;
use App\Http\Controllers\FrontEnd\OrderDetailsController;
use App\Http\Controllers\FrontEnd\OrderHistoryController;
use App\Http\Controllers\FrontEnd\ProductCartController;
use App\Http\Controllers\FrontEnd\ProductDetialsController;
use App\Http\Controllers\Landing\LandingPageListController;
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

/*
|--------------------------------------------------------------------------
|   # front-end routes
|--------------------------------------------------------------------------
*/

// shop routes
Route::domain('{shop}.' . env('APP_URL'))->group(function () {
    //  home page
    Route::get('/{slug}', [ShopController::class, 'index'])->name('user_shop');
});


// front-end auth routes
Route::get('/customer-login', [AuthController::class, 'login'])->name('customer_login');
Route::get('/customer-register', [AuthController::class, 'register'])->name('customer_register');
Route::post('/customer-registered', [AuthController::class, 'registeredUser'])->name('customer_registered');
Route::post('/login-customer', [AuthController::class, 'loginCustomer'])->name('login_customer');
Route::get('/customer-logout', [AuthController::class, 'logoutCustomer'])->name('customer_logout');

// add to Cart Routes
Route::get("/add-to-cart", [ProductCartController::class,'addToCart'])->name('add_to_cart');
Route::post('/product-add-cart',[ProductCartController::class,'productAddCart'])->name('product_add_cart');
Route::get('/product-delete-cart/{id}',[ProductCartController::class,'productDeleteCart'])->name('product_delete_cart');
Route::post('/product-increment',[ProductCartController::class,'productIncrement'])->name('product_increment');

// customer routes
Route::prefix('/customer')->middleware('customer')->group(function () {
    Route::get('/', [CustomerDashboardController::class, 'customerDashboard'])->name('customer_dashboard');
    Route::get('/customer-profile-update', [AuthController::class, 'profileUpdate'])->name('customer_profile_update');
    Route::post('/customer-profile-update-save', [AuthController::class, 'profileSave'])->name('customer_profile_update_save');
    Route::get('/customer-password-change', [AuthController::class, 'customerPassword'])->name('customer_password');
    Route::post('/customer-password-update', [AuthController::class, 'customerPasswordUpdate'])->name('customer_password_update');

    // Customer Order History Routes
    Route::controller(OrderHistoryController::class)->group(function () {
        Route::get('/customer-order-history', 'customerOrderHistory')->name('customer_order_history');
        Route::get('/customer-order-details/{id}', 'customerOrderDetails')->name('customer_order_details');
        Route::get('/customer-order-invoice/{id}', 'customerOrderinvoice')->name('customer_order_invoice');
    });

});





Route::get('/', [HomeController::class, 'homePage'])->name('home_page');
Route::get('/product-details/{slug}', [ProductDetialsController::class, 'productDetails'])->name('product_details');
Route::get('/checkout-details/{checkout}', [OrderDetailsController::class, 'checkoutDetails'])->name('checkout_details');
// Route::post('/order-product', [OrderDetailsController::class, 'orderProduct'])->name('order_product');
Route::match(['get', 'post'], '/order-product', [OrderDetailsController::class, 'orderProduct'])->name('order_product');
Route::get('/invoice-order/{id}', [OrderDetailsController::class, 'invoiceOrder'])->name('invoice_order');


// landing page routes
Route::get('/p/wireless-induction-car-holder', [LandingPageController::class, 'showLandingPage'])->name('show_landing_page');
Route::get('/p/light-wireless-charger', [LandingPageController::class, 'showLandingPageTwo'])->name('show_landing_page_two');
Route::get('/p/multifunction-wireless-charger', [LandingPageController::class, 'showLandingPageThree'])->name('show_landing_page_three');
Route::get('/p/portable-charging-power-bank', [LandingPageController::class, 'showLandingPageFour'])->name('show_landing_page_four');
Route::get('/p/magnetic-wireless-power-bank', [LandingPageController::class, 'showLandingPageFive'])->name('show_landing_page_five');
Route::get('/p/car-headrest-holder', [LandingPageController::class, 'showLandingPagesix'])->name('show_landing_page_six');
Route::get('/p/water-bottle-travel-flask', [LandingPageController::class, 'showLandingPageSev'])->name('show_landing_page_seven');
Route::get('/p/wireless-bracket-charger', [LandingPageController::class, 'showLandingPageEig'])->name('show_landing_page_eight');
Route::get('/landing-invoice-order/{id}', [LandingPageController::class, 'LandinginvoiceOrder'])->name('landing_invoice_order');


Route::match(['get', 'post'], '/order-landing-product', [LandingPageController::class, 'orderLandingProduct'])->name('order_landing_product');

// package route
Route::get('/web-packages', [FrontEnd_PackageController::class, 'index'])->name('web_packages');
Route::get('/select-package/{id}', [FrontEnd_PackageController::class, 'select_package'])->name('select_package');


/*
|--------------------------------------------------------------------------
|   # authentication routes
|--------------------------------------------------------------------------
*/

Route::match(['get', 'post'], '/sign-in', [UserController::class, 'sign_in'])->name('sign_in');
Route::match(['get', 'post'], '/sign-up', [UserController::class, 'sign_up'])->name('sign_up');
Route::get('/sign-out', [UserController::class, 'sign_out'])->name('sign_out');

/*
|--------------------------------------------------------------------------
|   # customer routes
|--------------------------------------------------------------------------
*/

Route::prefix('/user')->middleware('user')->group(function () {
    // dashboard route
    Route::get('/', [CustomerDashboard::class, 'index'])->name('user_dashboard');

    // profile routes
    Route::get('/profiles', [UserController::class, 'user_profiles'])->name('user_profiles');
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update_profile');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update_password');

    // brand routes
    Route::resource('/brands', BrandController::class);

    // product routes
    Route::resource('/products', ProductController::class);
    Route::get('/search-product',[HomeController::class,'searchProduct'])->name('search_product');

    // variation routes
    Route::controller(ProductVariationController::class)->group(function () {
        Route::get("/variations", "index")->name('product_variations');
        Route::match(['get', 'post'], 'create-variation/', 'create')->name('create_variation');
        Route::match(['get', 'post'], '/edit-variation/{id}', 'update')->name('edit_variation');
        Route::get('/edit-product-variation/{variation_id}', 'edit')->name('edit_product_variation');
        Route::get('/delete-variation/{id}', 'destroy')->name('delete_variation');
    });

    Route::controller(LandingPageListController::class)->group(function () {
        Route::get('/landing-page-list', 'landingPageList')->name('landing_page_list');
    });

    // category routes
    Route::resource('/categories', CategoryController::class);

    // theme routes
    Route::resource('/themes', TemplateController::class);
    Route::get('/theme/{code}', [TemplateController::class, 'show_template'])->name('show_template');

    Route::resource('my-themes', UserThemeController::class);
    Route::get('/api/theme-element/{id}', [UserThemeElementController::class, 'get_element'])->name('get_theme_element');

    // shop routes
    Route::resource('/shops', ShopController::class);

    // purchase routes
    Route::controller(PurchaseController::class)->group(function () {
        Route::get("/create-purchase", "create")->name('create_purchase');
        Route::post("/create-purchase", "store")->name('store_purchase');
        Route::get("/purchase-list", "index")->name('purchase_list');
        Route::get("/inspect-purchase/{purchase}", 'inspect')->name('inspect_purchase');
        Route::get("/edit-purchase/{purchase}", 'edit')->name('edit_purchase');
        Route::post("/update-purchase/{purchase}", 'update')->name('update_purchase');
    });

    // purchase cart routes
    Route::controller(PurchaseCartController::class)->group(function () {
        Route::get('/api/create-purchase-cart/{product_id}', 'store');
        Route::get('/api/load-purchase-carts', 'index');
        Route::post('/api/update-purchase-cart', 'update');
        Route::get('/api/remove-purchase-cart/{id}', 'destroy');
    });

    // pos routes
    Route::prefix('pos')->controller(PosController::class)->group(function () {
        Route::get("/", "index")->name('pos');
        Route::post('/api/get-products', 'getProducts');
        Route::post('/api/get-customer', 'getCustomer');

        Route::post('/sale', 'sale')->name('pos_sale');
        Route::get("/sales", "sales")->name('pos_sales');
    });

    // pos cart routes
    Route::prefix('pos')->controller(PosCartController::class)->group(function () {
        Route::post('/api/update-cart-customer', 'updateCartCustomer');
        Route::post('/api/cart-products', 'index');
        Route::post('/api/increase-qty', 'increase');
        Route::post('/api/decrease-qty', 'decrease');
        Route::post('/api/update-qty', 'updateQty');
        Route::post('/api/remove-product', 'remove');
        Route::post('/api/reset-cart', 'reset');
    });

    // supplier routes
    Route::resource('suppliers', SupplierController::class);
    Route::get('/suppliers/{id}/{status}', [SupplierController::class, 'status'])->name('supplier_status');

    // customer routes
    Route::resource('customers', CustomerController::class);

    // ticket routes
    Route::resource('tickets', SupportTicketController::class);
    Route::get('inspect-ticket/{id}', [SupportTicketController::class, 'customerInspectTicket'])->name('customer_inspect_ticket');
    Route::post('reply-support-ticket', [SupportTicketController::class, 'customerReplyTicket'])->name('customer_reply_support_ticket');

    // order routes
    Route::controller(OderController::class)->group(function () {
        Route::get("/orders", "index")->name('orders');
        Route::get("/return-orders", "returnOrders")->name('return_orders');
        Route::get("/order-details/{invoice}", "orderDetails")->name('order_details');
        Route::get("/order-status/{id}/{status}", "orderStatus")->name('order_status');
        Route::get("/order-filter/{status}", "orderFilter")->name('order_filter');
        Route::get("/view-order-details/{id}", "viewOrderDetails")->name('view_order_details');
        Route::get("/order-invoice/{id}", "orderInvoice")->name('order_invoice');
        Route::get("/payment-status/{id}", "paymentStatus")->name('payment_status');
        Route::get("/payment-status-update/{id}/{paystatus}", "paymentStatusUpdate")->name('payment_status_update');
    });

    // setting routes
    Route::controller(SettingController::class)->group(function () {
        Route::get("/settings", "settings")->name('settings');
        Route::post('/tracking-api', 'createApi')->name('tracking_api');
    });

    // courier routes
    Route::resource('/a-couriers', UserCourierController::class);

    // subscription routes
    Route::resource('/subscription', SubscriptionController::class);
});

/*
|--------------------------------------------------------------------------
|   # admin routes
|--------------------------------------------------------------------------
*/

Route::prefix('/admin')->middleware('admin')->group(function () {
    // admin dashboard
    Route::get('/', [AdminDashboard::class, 'index'])->name('admin_dashboard');

    // packages
    Route::resource('/packages', PackageController::class);

    // courier routes
    Route::resource('/couriers', CourierController::class);
    Route::get('/courier-status/{id}/{status}', [CourierController::class, 'status'])->name('courier_status');

    // ticket routes
    Route::controller(SupportTicketController::class)->group(function () {
        Route::get("/support-tickets", "tickets")->name('support_tickets');
        Route::get('/delete-support-ticket/{id}', 'delete')->name('delete_support_ticket');
        Route::get('/inspect-support-ticket/{id}', 'inspectTicket')->name('inspect_support_ticket');
        Route::post('/reply-support-ticket', 'replyTicket')->name('admin_reply_support_ticket');
        Route::get('/support-ticket-status/{id}/{status}', 'status')->name('support_ticket_status');
    });

});


/*
|--------------------------------------------------------------------------
|   # test routes
|--------------------------------------------------------------------------
*/

Route::get('/test', [TestController::class, 'index']);
