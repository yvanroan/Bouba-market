<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create(){
    	return view('admin.slider.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'image'=>'required|mimes:png,jpeg'
    	]);
    	$image = $request->file('image')->store('public/slider');
    	Slider::create([
    		'image' => $image
    	]);
    	notify()->success('Slider created successfully ⚡️');
        return redirect()->back();
    }

    public function index(){
    	$sliders = Slider::get();
    	return view('admin.slider.index', compact('sliders'));
    }

    public function destroy($id){
    	Slider::find($id)->delete();
    	notify()->success('Slider destroyed successfully ⚡️');
        return redirect()->back();
    }
}
