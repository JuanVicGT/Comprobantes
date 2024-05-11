<?php

use App\Exports\ExportDocument;
use App\Http\Controllers\Backend;
use App\Http\Controllers\ProfileController;
use App\Livewire\CustomerIndex;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('pdf', function () {
        $pdf = Pdf::loadView('exports.receipt');
        // return view('exports.pdf');
        return $pdf->stream('invoice.pdf');
    });

    Route::controller(Backend\SettingController::class)->group(function () {
        // Views
        Route::get('/EditSetting', 'index')->name('edit.setting');
        Route::patch('/StoreSetting', 'store')->name('store.setting');
        Route::post('/UpdateSetting', 'update')->name('update.setting');
    });

    Route::controller(Backend\CustomerController::class)->prefix('customer/')
        ->group(function () {
            // Views
            Route::get('/IndexCustomer', 'index')->name('index.customer');
        });

    Route::controller(Backend\DocumentController::class)->prefix('document/')
        ->group(function () {
            // Views
            Route::get('/IndexDocument', 'index')->name('index.document');
        });
});

require __DIR__ . '/auth.php';
