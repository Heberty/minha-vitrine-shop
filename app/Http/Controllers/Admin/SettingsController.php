<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\SettingUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;

class SettingsController extends Controller
{

    public function edit(Setting $setting)
    {
        $settings = Setting::get();
        $user = Auth()->User();

        return view('admin.settings.edit', compact('setting', 'settings', 'user'));
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        try {
            $setting->update($request->all());

            if($request->hasFile('image')) {
                $setting->image = Str::random(24) . '.' . $request->file('image')->getClientOriginalExtension();
            }

            if($request->hasFile('favicon')) {
                $setting->favicon = Str::random(24) . '.' . $request->file('favicon')->getClientOriginalExtension();
            }

            $setting->save();

            if($request->hasFile('image')) {
                Storage::putFileAs('settings', $request->file('image'), $setting->image);
            }

            if($request->hasFile('favicon')) {
                Storage::putFileAs('settings', $request->file('favicon'), $setting->favicon);
            }


            return redirect()->to('admin/settings/edit/1')->with('success', 'Configurações atualizado');

        } catch (\Exception $e) {

            return redirect()->to('admin/settings/edit/1')->with('error', 'Erro ao atualizar as configurações');

        }
    }
}
