<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Plans;
use App\Models\Tariffs;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    /**
     * Calculates the plan's value based on the parameters get from request
     *
     * @param Request $request
     * @param int $originId, $destinationId, $minutes, $planId
     * @return Response
     *
     */
    public function calculate(Request $request, int $originId, int $destinationId, int $minutes, int $planId)
    {
        if(empty($request->session()->token())) return [];

        $origin      = Cities::select('name')->where('id', $originId)->first();
        $destination = Cities::select('name')->where('id', $destinationId)->first();
        $tariffs     = Tariffs::select('id','value')->whereIn('city_id', [$originId, $destinationId])->get();
        $plan        = Plans::select('time', 'name')->where('id', $planId)->first();
        $minuteValue = $tariffs->first()->value + $tariffs->last()->value;

        $withoutPlan = $minuteValue * $minutes;
        $withPlan = 0;

        if($minutes > 0 && $minutes > $plan->time ){
            $remainingTime = $minutes - $plan->time;
            $withPlan      = ($minuteValue + (($minuteValue / 100) * 10)) * $remainingTime;
        }

        return response()->json([
            'from'        => $origin->name,
            'for'         => $destination->name,
            'minutes'     => $minutes,
            'plan'        => $plan->name,
            'withPlan'    => $withPlan,
            'withoutPlan' => $withoutPlan
        ], 200);
    }
}
