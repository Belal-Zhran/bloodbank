<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\Article;
use App\Models\BloodType;
use App\Models\Catigory;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Governorate;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Laravel\Sanctum\HasApiTokens;
class MainController extends Controller
{

    public function governorates(): JsonResponse
    {
        $governorates = Governorate::all();
        return responseJson(1, 'success', $governorates);
    }

    public function cities(Request $request): JsonResponse
    {
        $cities = City::where( function ($query) use ($request)
                    {
                        if ($request->has('governorate_id'))
                        {
                            $query->where('governorate_id', $request->governorate_id);
                        }
                    }
        )->get();

        return responseJson(1, 'success', $cities);
    }

    public function bloodTypes(): JsonResponse
    {
        $bloodTypes = BloodType::all();
        return responseJson(1, 'success', $bloodTypes);
    }

    public function catigories(): JsonResponse
    {
        $catigories = Catigory::all();
        return responseJson(1, 'success', $catigories);
    }


    public function articles(Request $request): JsonResponse
    {
        $articles = Article::where( function ($query) use ($request)
        {
            if ($request->has('catigory_id'))
            {
                $query->where('catigory_id', $request->catigory_id);
            }
        }
        )->get();

        return responseJson(1, 'success', $articles);
    }




    public function donationRequests(Request $request): JsonResponse
    {
        //$donationRequests = DonationRequest::all();
        $donationRequests = DonationRequest::where( function ($query) use ($request)
        {
            if ($request->has('id'))
            {
                $query->where('id', $request->id);
            }
        }
        )->get();
        return responseJson(1, 'success', $donationRequests);
    }


    public function settings(Request $request): JsonResponse
    {

        return responseJson(1, 'success', $donationRequests);
    }

    public function contactUs(Request $request): JsonResponse
    {
        $contactUs = AppSetting::first();
        return responseJson(1, 'success', $contactUs);
    }

    //>>>>>> using Laravel Sanctum <<<<<<<<<<<<<<<



}
