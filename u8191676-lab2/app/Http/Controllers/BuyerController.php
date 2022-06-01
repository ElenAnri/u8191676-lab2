<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class BuyerController extends Controller
{
    public function index()
    {
        return view('buyers');
    }

}
