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
        $buyers = Buyer::query()
            ->get(); 
        return view('buyers', ['buyers' => $buyers]);
    }

    public function filter(Request $request): View
    {
        $filters = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'isBlocked' => $request->get('isBlocked')
        ];

        if ($filters['isBlocked'] == "null") {
            $customersToShow = Buyer::where('phone', 'like', "%{$filters['phone']}%")
                ->where('email', 'like', "%{$filters['email']}%")
                ->where(DB::raw("concat(\"firstName\", ' ',\"lastName\")"), 'like', "%{$filters['name']}%")
                ->paginate(20);
        }   else 
        {if ($filters['isBlocked'] == "true"){
            $isBlocked = true;
        }   else {
            $isBlocked = false;
        }
            $customersToShow = Buyer::where('phone', 'like', "%{$filters['phone']}%")
                ->where('email', 'like', "%{$filters['email']}%")
                ->where('isBlocked', $isBlocked)
                ->where(DB::raw("concat(\"firstName\", ' ',\"lastName\")"), 'like', "%{$filters['name']}%")
                ->paginate(20);
        }

        $customersToShow->appends($request->except('page'));

        return view('buyers')->with('buyers', $customersToShow);
    }

    public function printBuyer($id): View|string
    {
        $buyer = Buyer::where('id', $id)->with('address')->get()->first();

        if ($buyer != null) {
            return view('buyerid')->with('buyer', $buyer);
        } else
            return "Wrong ID";
    }

}
