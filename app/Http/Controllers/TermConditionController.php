<?php

namespace App\Http\Controllers;

use App\Http\Resources\PricvacyTermResource;
use App\Models\GDPRTerms;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\FeedbackResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TermConditionController extends Controller
{
    //

    public function getPrivacyAndTerms($type)
    {
        try {
            $terms = GDPRTerms::where('type', $type)->first();
            if(empty($terms))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new PricvacyTermResource($terms));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

}
