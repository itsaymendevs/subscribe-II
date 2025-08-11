<?php

use App\Livewire\Subscribe\Customization;
use App\Livewire\Subscribe\Helpers\GetAccess;
use App\Livewire\Subscribe\Helpers\Retoken;
use App\Livewire\Subscribe\Invoice;
use App\Livewire\Subscribe\Terms;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;






// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ----------------------------- GENERAL ---------------------------------






// :: linkStorage
Route::get('/storage-link', function () {

    $return = Artisan::call('storage:link');

});






// :: clearCache
Route::get('/clear-cache', function () {

    $return = Artisan::call('optimize:clear');

});







// :: LivewireServerDeployment in subRoute
if (env('APP_ENV') == 'production') {

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post(env('LIVEWIRE_UPDATE_PATH'), $handle);
    });


    Livewire::setScriptRoute(function ($handle) {
        return Route::get(env('LIVEWIRE_JAVASCRIPT_PATH'), $handle);
    });

} // end if










// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** --------------------------- SUBSCRIBE ---------------------------------



// :: getAccess
Route::get('/get-access/{id}', GetAccess::class)->name('subscribe.getAccess');




// Route::middleware(['hasAdminAccess'])->group(function () {

// 1: customization
Route::get('/', Customization::class)->name('subscribe.customization');
Route::get('/customization', Customization::class)->name('subscribe.customization');
Route::get('/customization/{token}', Retoken::class)->name('subscribe.retoken');



// 2: invoice
Route::get('/invoice', Invoice::class)->name('subscribe.invoice');





// --------------------------------------------------------------------------
// --------------------------------------------------------------------------




// 3: terms & conditions
Route::get('/terms-and-conditions', Terms::class)->name('subscribe.terms');





// --------------------------------------------------------------------------
// --------------------------------------------------------------------------




// :: plans-mirror
Route::get('/{nameURL}', Customization::class)->name('subscribe.customizationPlan');
Route::get('/{nameURL}/customization', Customization::class)->name('subscribe.customizationPlan');




// });



