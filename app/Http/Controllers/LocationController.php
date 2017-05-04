<?php

namespace App\Http\Controllers;

use App\Location\District;
use App\Location\Province;
use App\Location\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    /**
     * Get all province
     *
     * @return string JSON
     */
    public function province()
    {
        return response()->json(Province::orderBy('name', 'ASC')->get());
    }

    /**
     * Get cities based on selected province
     *
     * @return string JSON
     */
    public function regency()
    {
        $regencies = Regency::whereProvinceId(request('province'))
            ->orderBy('name', 'ASC')
            ->get();

        return response()->json($regencies);
    }

    public function district()
    {
        $districts = District::whereRegencyId(request('regency'))
            ->orderBy('name', 'ASC')
            ->get();

        return response()->json($districts);
    }

    public function form()
    {
        return view('location.form')
            ->withTitle('Lokasi');
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'province' => 'required|integer|exists:provinces,id',
            'regency' => 'required|integer|exists:regencies,id',
            'district' => 'required|integer|exists:districts,id',
        ]);

        // do something here

        return response()->json([
            'status' => true,
            'message' => 'Semua data valid.',
        ]);
    }
}
