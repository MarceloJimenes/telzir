<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Plans;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plans::select('id', 'name')->get();
        $cities = Cities::select('id', 'name', 'state_id', 'ddd')->get();

        return view('plans.index', compact(
            'plans', 'cities'
        ));
    }
}
