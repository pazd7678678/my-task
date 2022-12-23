<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;

use function PHPUnit\Framework\directoryExists;
use Symfony\Component\Process\Process;

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

Route::get('/', function () {

    // $process = new Process(['ps', '-aux']);
    // $process->run();
    // // executes after the command finishes
    // if (!$process->isSuccessful()) {
    //     throw new ProcessFailedException($process);
    // }
    // echo $process->getOutput();

    $path=public_path()."/opt/myprogram";
        $dir = new DirectoryIterator($path);
     foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                echo $fileinfo->getFilename().'<br>';
            }
        }
        
    
       
       
   
       
        
        
       

        
        
       

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
