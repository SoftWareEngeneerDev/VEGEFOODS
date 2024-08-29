<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function ajouterslider()
    {
        return view('admin.ajouterslider');
    }

    public function sauverslider(Request $request)
    {
        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
            'slider_image' => 'image|nullable|max:1999'
        ]);


        if ($request->hasFile('slider_image')) {
            //get the full name
            $FullSliderName = $request->file('slider_image')->getClientOriginalName();
            $SliderNameOnly = pathinfo($FullSliderName, PATHINFO_FILENAME);
            $SliderFileExt = $request->file('slider_image')->getClientOriginalExtension();
            $SliderNameTostore = $SliderNameOnly . '_' . time() . '.' . $SliderFileExt;

            $path = $request->file('slider_image')->storeAs('public/Slider_images', $SliderNameTostore);
        } else {
            $SliderNameTostore = 'noimage.jpg';
        }

        $slider = new Slider();
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $SliderNameTostore;
        $slider->status = 1;

        $slider->save();

        return redirect('/ajouterslider')->with('status', 'Le slider ' . $SliderNameTostore . ' 
        à été ajouté avec succès');
    }

    public function slider()
    {
        $sliders = Slider::get();
        return view('admin.slider')->with('sliders', $sliders);
    }

    public function edit_slider($id)
    {
        $slider = Slider::find($id);
        return view('admin.edit_slider')->with('slider', $slider);
    }

    public function sauvermodifslider(Request $request)
    {
        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
            'slider_image' => 'image|nullable|max:1999'
        ]);
        $slider = Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

        if ($request->hasFile('slider_image')) {
            //get the full name
            $FullSliderName = $request->file('slider_image')->getClientOriginalName();
            $SliderNameOnly = pathinfo($FullSliderName, PATHINFO_FILENAME);
            $SliderFileExt = $request->file('slider_image')->getClientOriginalExtension();
            $SliderNameTostore = $SliderNameOnly . '_' . time() . '.' . $SliderFileExt;

            $path = $request->file('slider_image')->storeAs('public/Slider_images', $SliderNameTostore);

            if ($request->slider_image != 'noimage') {
                Storage::delete('public/Slider_images/' . $request->slider_image);
            }
            $slider->slider_image = $SliderNameTostore;
        }
        $slider->update();

        return redirect('/ajouterslider')->with('status', 'Le Slider a bien été modifié avec succès!');
    }

    public function supprimerslider($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('/slider')->with('status', 'Le slider a été supprimé avec succès!');
    }
}