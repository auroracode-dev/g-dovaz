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
        'img_first_section' => 'mimes:jpeg,jpg,png,gif'
      ]);
        $input = $request->all();

        if (!empty($request->file('img_first_section'))) {
            // Delete existing image
            if (Storage::exists($site_init->img_first_section)) {
                Storage::delete($site_init->img_first_section);
            }

            //Save new image
            $file = $request->file('img_first_section')->storeAs('site-init', date('d-m-Y'));

            $input['img_first_section'] = $file;
        }
        $site_init->update($input);

        return redirect('/admin/dashboard');
    }
}
