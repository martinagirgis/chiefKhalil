<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\admin\Package;
use App\models\admin\PackageFeature;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFeature($package_id){
        $package_features = PackageFeature::where('user_package_id',$package_id)->get();
        if(count($package_features)  == 0){
            $package_features = PackageFeature::create([
                'name_ar'=>'package_ar',
                'name_en'=>'package_en',
                'user_package_id'=>$package_id
            ]);
            return view('admin.sections.packages.features.edit',compact('package_id','package_features'));
        }else{
            return view('admin.sections.packages.features.edit',compact('package_id','package_features'));
        }
    }
    public function chnageFeature(Request $request){
        $numberOfFeatures = intval($request->num);
        $package_id = $request->package_id;
        $package_features = PackageFeature::where('user_package_id',$package_id)->get();

        if(count($package_features) < $numberOfFeatures){
           $dif = $numberOfFeatures - count($package_features);
           for($i=0;$i<$dif;$i++){
               $package_features = PackageFeature::create([
                   'name_ar'=>'package_ar',
                   'name_en'=>'package_en',
                   'user_package_id'=>$package_id
               ]);
           }
           return redirect()->back()->with('message','Done Successfully');
        }else{
            return redirect()->back()->with('message','Enter Another Number');

        }

    }
    public function addFeature(Request $request){
        $numberOfFeatures = $request->numberOfFeatures;

        for($i=0;$i<$numberOfFeatures;$i++){
            $feature =$request->input('feature_id'.$i);
            $featureUpdate = PackageFeature::find($feature);
            $featureUpdate->update([
                'name_ar'=> $request->input('name_ar'.$i),
                'name_en'=>$request->input('name_en'.$i),
            ]);
        }
        return redirect()->back()->with('message','Done Successfully');
    }
    public function removeFeature($id){
        $feature=  PackageFeature::find($id);
        $feature->delete();
        return redirect()->back()->with('message', 'Deleted successfully');
    }


    public function index()
    {
        $categories = Package::latest()->get();
        return view('admin.sections.packages.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.packages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => 'required',
            'price' => 'required',
            'duration'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator);
        }else {

            Package::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'duration'=>$request->duration,
            ]);
        }
        return  redirect()->back()->with("message","Done Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Package::find($id);
        return view('admin.sections.packages.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Package::find($id);
        return view('admin.sections.packages.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);

        $rules = [
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

          $package->update([
                'name' => $request->name,
                'price' => $request->price,
                'duration' => $request->duration,
            ]);
        }
        return redirect()->back()->with('message', 'Done Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //You can not delete subs
        $users = User::where('package_id',$id)->get();
        if(count($users) > 0 ){
            return redirect()->back()->with('message','You can not delete this package');
        }else {
            $old = Package::find($id);
            $old->delete();
            return redirect()->route('packages.index')->with('message', 'Deleted successfully');
        }
    }
}
