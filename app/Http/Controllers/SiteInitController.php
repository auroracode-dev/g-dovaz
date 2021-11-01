<?php

namespace App\Http\Controllers;

use App\Models\Site_init;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteInitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $data = Site_init::find(1);
        return view('admin.index')->with('data', $data);
    }

    public function update(Request $request, Site_init $site_init)
    {
        $request->validate([
        'site_banner' => 'mimes:jpeg,jpg,png',
        'img_first_section' => 'mimes:jpeg,jpg,png,gif'
      ]);
        $input = $request->all();
        //Image of the first section
        if (!empty($request->file('img_first_section'))) {
            // Delete existing image
            if (Storage::exists($site_init->img_first_section)) {
                Storage::delete($site_init->img_first_section);
            }

            $extension = $request->file('img_first_section')->getClientOriginalExtension();

            //Save new image
            $file = $request->file('img_first_section')->storeAs('site-init', 'img_first_section_'.date('d-m-Y').".".$extension);

            $input['img_first_section'] = $file;
        }
        // Site banner
        if (!empty($request->file('site_banner'))) {
            // Delete existing image
            if (Storage::exists($site_init->site_banner)) {
                Storage::delete($site_init->site_banner);
            }

            $extension = $request->file('site_banner')->getClientOriginalExtension();

            //Save new image
            $file = $request->file('site_banner')->storeAs('site-init', "banner_".date('d-m-Y').".".$extension);

            $input['site_banner'] = $file;
        }
        $site_init->update($input);

        return redirect('/admin/dashboard');
    }
}
