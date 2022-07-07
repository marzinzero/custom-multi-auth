<?php

namespace App\Http\Controllers;

// use App\Models\Carbon;

use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CarbonController extends Controller
{
    public function index()
    {

        // $data = Carbon::whereBetween('sale', [7000, 10000])->get();
        // return $data;

        $date = CarbonImmutable::now();
        $mutable = Carbon::now();
        return $date . $mutable;
        return view('home');
    }
}
