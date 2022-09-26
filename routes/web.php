<?php

use App\Models\Course;
use App\Models\Permission;
use App\Models\User;
use App\Models\Preference;
use Illuminate\Support\Facades\Route;

Route::get('/many-to-many-pivot', function() {
$user = User::with('permissions')->find(1);
foreach ($user->permissions as $permission) {
    echo "{$permission->name} <br>";
}
});


Route::get('/many-to-many', function() {
$user = User::with('permissions')->find(1);

$permission = Permission::find(1);
$user->permissions()->save($permission);

dd($user->permissions);
});

Route::get('/one-to-many', function() {
    /* $course = Course::create(['name' => 'Curso de Laravel']); */
    $course = Course::first();
    $data = [
        'name' => 'Módulo x1'
    ];
    $course->modules()->create($data);

    /* $course->modules()->get(); */
    $modules = $course->modules;
    dd($modules);
});

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
