<?php

use Illuminate\Http\Request;

Route::get('testlaravelhelper', [Ehtu\LaravelBladeHelpers\Controllers\LaravelBladeHelperController::class, 'Index'])->name('testlaravelhelper');

Route::post('testlaravelhelper', [Ehtu\LaravelBladeHelpers\Controllers\LaravelBladeHelperController::class, 'Update']);
