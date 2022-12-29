<?php

namespace App\Http\Controllers;

use App\Models\ExtraSetting;
use Illuminate\Http\Request;

class ExtraSettingController extends Controller
{
    public function settingsSave(Request $request){
        $settings = $request->except('_token');
        foreach ($settings as $key => $value) {
            $setting = ExtraSetting::whereName($key)->first();
            if ($setting) {
                $setting->name = $key;
                $setting->value = $value;
                $setting->user_id = auth()->id();
                $setting->save();
            } else {
                ExtraSetting::create([
                    'name' => $key,
                    'value' => $value,
                    'user_id' =>  auth()->id()
                ]);
            }
        }
        return redirect()->back()->with('success', 'Settings saved successfully');
    }
}
