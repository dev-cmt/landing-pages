<?php

namespace App\Http\Controllers;

use App\SteadFastApi;
use Illuminate\Http\Request;

class SteadFastApiSettingsController extends Controller
{
    public function index()
    {
        $data = SteadFastApi::first();
        return view('backEnd.admin.steadfast_api_settings', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            if ($request->is_active) {
                $is_active = 1;
            } else {
                $is_active = 0;
            }

            $input = array_merge($request->all(), [
                'is_active' => $is_active
            ]);

            $data = SteadFastApi::first();
            if($data){
                $data->update($input);
            }else{
                SteadFastApi::create($input);
            }
            return redirect()->back()->with('success', 'Stead Fast API Settings Updated Successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e);
        }
    }
}
