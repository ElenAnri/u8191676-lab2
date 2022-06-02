<?php

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

Artisan::command('addressCount {id}', function ($id) {
    $buyer = \App\Models\Buyer::where('id', $id)->with('address')->first();
    if ($buyer != null) {
        $this->info("Buyer_id: {$id} \nCount addresses: {$buyer->address->count()}\n");
    } else {
        $this->error("No such customer");
    }
})->purpose('Adresses count');
