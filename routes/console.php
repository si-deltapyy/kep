<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('arak:bali', function () {
    $this->comment(Inspiring::quote());
})->purpose('Dinggo kata kata ben ra mletre boss');

// Artisan::command('del', function () {
//     $this->comment('Delete directory public/Document Success!');
// })->purpose('Delete directory command');