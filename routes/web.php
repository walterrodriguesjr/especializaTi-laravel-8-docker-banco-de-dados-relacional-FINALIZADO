<?php

use App\Models\User;
use App\Models\Preference;
use Illuminate\Support\Facades\Route;

Route::get('/one-to-one', function(){
$user =User::first();

$data = [
    'background_color' => '#000',
];

if ($user->preference) {
    $user->preference->update($data);
    
}else{
    $preference = new Preference($data);
    $user->preference()->save($preference);

}

$user->refresh();

dd($user->preference);
});

Route::get('/', function () {
    return view('welcome');
});
