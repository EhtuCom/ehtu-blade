<?php

namespace Ehtu\LaravelBladeHelpers\Controllers;

use Illuminate\Http\Request;

class LaravelBladeHelperController extends \App\Http\Controllers\Controller
{
    //
    public function Index()
    {
        return view('EhtuBlade::test');
    }

    public function Update(Request $request)
    {
        return $request->all();
    }
}
