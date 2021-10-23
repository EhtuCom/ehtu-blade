<?php

use Illuminate\Http\Request;

Route::get('testlaravelhelper', [Ehtu\EhtuBlade\Controllers\EhtuBladeController::class, 'Index'])->name('testlaravelhelper');

Route::post('testlaravelhelper', [Ehtu\EhtuBlade\Controllers\EhtuBladeController::class, 'Update']);
