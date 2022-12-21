<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\directoryExists;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    
        $username=auth()->user()->username;
        // File::makeDirectory(public_path()."/opt/myprogram/$username", 0755, true);
        // $file=auth()->user()->username;
       
        Storage::append("/opt/myprogram/$username/",$username);
        $path=public_path()."/opt/myprogram";
        // $dir = new DirectoryIterator($path);
        // foreach ($dir as $fileinfo) {
        //     if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        //         echo $fileinfo->getFilename().'<br>';
        //     }
        // }

        $files = Storage::disk('local')->allFiles('opt/myprogram');
        return $files;
        
   

    // return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
