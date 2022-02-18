<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin_dashboard.about.edit', [
            'setting' => About::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $validated = request()->validate([
            'about_first_text' => 'required|min:50,max:500',
            'about_second_text' => 'required|min:50,max:500',
            'about_our_vision' => 'required',
            'about_our_mission' => 'required',
            'about_services' => 'required',
            'about_first_image' => 'nullable|image',
            'about_second_image' => 'nullable|image',
        ]);

        if(request()->has('about_first_image'))
        {
            $about_first_image = request()->file('about_first_image');
            $path = $about_first_image->store('images', 'public');
            $validated['about_first_image'] ='storage/'. $path;
        }

        if(request()->has('about_second_image'))
        {
            $about_second_image = request()->file('about_second_image');
            $path = $about_second_image->store('images', 'public');
            $validated['about_second_image'] = 'storage/'. $path;
        }

        About::find(1)->update($validated);
        return redirect()->route('admin.about.edit')->with('success', 'About has been Updated.');
    }



}
