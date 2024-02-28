<?php
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalespersonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    $data['sideMenu'] = 'dashboard';
    // $admin = Auth::guard('admin')->user();
    // $admin->assignRole('super-admin');

    return view('admin.dashboard', compact('data'));
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    // Place your admin routes here
    Route::get('/', function () {
        return 'Admin Dashboard';
    })->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    
});

//Route::resource('products', ProductController::class);
//Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/ledgers', [LedgerController::class, 'index'])->name('ledgers.index');
    Route::resource('accounts', AccountController::class);
    Route::resource('employees', EmployeesController::class);
    Route::resource('salespeople', SalespersonController::class);
    Route::resource('expenses', ExpensesController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('sales', SaleController::class);    
//    Route::resource('products', ProductController::class);
    Route::resource('packings', PackingController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('permissions', PermissionController::class );
    Route::get('/permissions-create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::resource('roles', RoleController::class );
    Route::resource('users', UserController::class );
    Route::resource('purchases', PurchaseController::class );
    Route::resource('payments', PaymentController::class );

    Route::get('/record-purchase', [PurchaseController::class, 'showForm'])->name('record.purchase');
    //Route::get('/showVendorLedger', [LedgerController::class, 'showVendorLedger']);
    Route::get('/ledger/vendor/{vendorId}', [LedgerController::class, 'showVendorLedger'])->name('ledger.vendor');
    Route::get('/ledger/showJournalEntries', [LedgerController::class, 'showJournalEntries'])->name('ledger.showJournalEntries');
    
    //Route::get('/ledger/vendor/{vendorId}/{accountId}', [LedgerController::class, 'showVendorLedger'])->name('ledger.vendor');


//});

require __DIR__.'/adminauth.php';