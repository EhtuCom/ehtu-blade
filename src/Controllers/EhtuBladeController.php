<?php

namespace Ehtu\EhtuBlade\Controllers;

use Illuminate\Http\Request;

class EhtuBladeController extends \App\Http\Controllers\Controller
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
