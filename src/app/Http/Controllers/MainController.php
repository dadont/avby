<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\InputMessages;

class MainController extends Controller
{
    public function bot(Request $request)
    {
        InputMessages::inputMessages($request);
    }

}
