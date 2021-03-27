<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\models\admin\CheifSkills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Chief;

class ChiefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Chief::latest()->get();
        return view('admin.sections.chiefs.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.chiefs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:chiefs',
            'password' => 'required',
            'phone' => 'required',
            'image'=>'required',
            'gender'=>'required'
        ];
        $messages = [
            'fname.required' => __('chief.fname_error'),
            'lname.required' => __('chief.lname_error'),
            'email.required' => __('chief.email_error'),
            'password.required' => __('chief.password_error'),
            'phone.required' => __('chief.phone_error'),
            'gender'=>__('chief.gender_error'),
            'image'=>__('chief.image_error'),

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $coverName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/chiefs'), $coverName);

            $chief = Chief::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => $request->password,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'image' => $coverName,
                'biography'=>$request->biography,
                'professionalLife'=>$request->professionalLife,
                'instagram' =>$request->instagram,
                'twitter'=>$request->twitter,
                'facebook'=>$request->facebook,
            ]);//Create new chief

            for($i=0;$i<$request->skills;$i++) {
                $skills []= $request->input('skill'.$i);
                $percentages[] = $request->input('percentages'.$i);
            }

            for($i = 0 ;$i < count($skills);$i++) {
                CheifSkills::create([
                    'skill'=>$skills[$i],
                    'percentage'=>$percentages[$i],
                    'chief_id'=>$chief->id,
                ]);
            }

            return redirect()->route('chiefs.index')->with('success', 'The Category has created successfully.');
        }
    }
    function setDynamicIdsIntoArray($number,$array){
        for($i=0;$i < $number;$i++){
            $skills [] = $array;
        }
        return $skills;
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Chief::find($id);
        return view('admin.sections.chiefs.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Chief::find($id);
        return view('admin.sections.chiefs.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Chief $category)
    {
        $rules = [
            /*'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image'=>'required',*/
        ];
        $messages = [
            /*    'name_ar.required'=> 'this field can not be empty',
                'name_en.required'=> 'this field can not be empty',
                'description_ar.required'=> 'this field can not be empty',
                'description_en.required'=> 'this field can not be empty',
                'image.required'=> 'this field can not be empty',*/
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            if ($request->image != $category->image) {
                unlink(public_path('/assets/images/categories') . '/' . $category->image);
                $coverName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/categories'), $coverName);
            } else {
                $coverName = $request->image;
            }
            dd($category->name_ar);

            $category->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'image' => $coverName
            ]);

            return redirect()->route('categories.index')
                ->with('success', 'Product updated successfully');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($category)
    {

        $old = Chief::find($category);
        $old->delete();

        return redirect()->route('categories.index')->with('success', 'Product deleted successfully');
    }
}
