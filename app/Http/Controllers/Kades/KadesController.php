<?php

namespace App\Http\Controllers\Kades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
