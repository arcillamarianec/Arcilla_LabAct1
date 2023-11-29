<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->paginate(10);
        $trashBrand = Brand::onlyTrashed()->latest()->paginate(10);
        return view('brand.index',compact('brands','trashBrand'));
    }

    public function AddBrand(Request $request){
        $validates = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,peg,png',

        ],[
            'brand_name.required' => 'Please input brand name',
            'brand_name.max' => 'Brand name must be less than 255 characters.',
            'brand_image.mimes' => 'Required file extension: jpg, jpeg, or png.'
        ]); 
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_gen.'.'.$img_ext;
        $up_loc = 'image/brand/';
        $last_img = $up_loc.$image_name;
        $brand_image->move($up_loc,$image_name);

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->back()->with('success'.'Brand Inserted Successfully.');
    }
    public function EditBrand($id) {
        $brands = Brand::find($id);
        return view('brand.edit', compact('brands'));
    }
    public function UpdateBrand(Request $request, $id) {
        $validates = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'sometimes|mimes:jpg,peg,png',
        ],[
            'brand_name.required' => 'Please input brand name',
            'brand_name.max' => 'Brand name must be less than 255 characters.',
            'brand_image.mimes' => 'Required file extension: jpg, jpeg, or png.'
        ]); 
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_gen.'.'.$img_ext;
        $up_loc = 'image/brand/';
        $last_img = $up_loc.$image_name;
        $brand_image->move($up_loc,$image_name);

        $brands = Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$last_img
        ]);
        return Redirect()->route('brand')->with('success','Updated Successfully');
    }
    public function RemoveBrand($id) {
        $brands = Brand::find($id)->delete();
        return Redirect()->route('brand')->with('success','Removed Successfully');
    }
    public function RestoreBrand($id) {
        $brands = Brand::withTrashed()->find($id)->restore();
        return Redirect()->route('brand')->with('success','Restored Successfully');
    }
    public function DeleteBrand($id) {
        $brands = Brand::withTrashed()->find($id)->forceDelete();
        return Redirect()->route('brand')->with('success','Deleted Successfully');
    }
}