<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\admin\Category;
use App\models\admin\Course;
use App\models\admin\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($course_id)
    {

        $course = Course::find($course_id);
        return view('admin.sections.lessons.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {

        $course = Course::find($course_id);
        $lessons = Lesson::where('course_id',$course_id)->orderBy('id', 'asc')->get();

        if(count(@$lessons) != $course->number_of_lessons) {
                $dif = abs(count($lessons)  - $course->number_of_lessons);
                for ($i = 0; $i < $dif; $i++) {
                    $lessons = Lesson::create([
                        'name_ar' => 'الدرس رقم' . $i,
                        'name_en' => 'Lesson number' . $i,
                        'details_ar' => 'تفاصيل الدرس رقم' . $i,
                        'details_en' => 'details lesson number' . $i,
                        'image' => 'image' . $i,
                        'video'=>'video'.$i,
                        'course_id'=>$course->id
                    ]);
                }
            }
        return view('admin.sections.lessons.create',compact('course','lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadVideo(Request $request,$filename,$course_id,$lesson_id)
    {
        $filename = strval($filename);
        if ($request->hasFile($filename)) {
            //  Let's do everything here
            if ($request->file($filename)->isValid()) {
                //
                $validated = $request->validate([
                    $filename => 'file',
                ]);
                $extension = $request->file($filename)->extension();
                $image = time() . '.' . $request->file($filename)->getClientOriginalExtension();
                $request->file($filename)->move(public_path('/assets/videos/'.$course_id.'/'.$lesson_id.'/'), $image);
                return $image;
            }else{
                return 0;
            }
        }
    }

/*
        $request->file($filename)->move(public_path('/assets/videos/'.$course_id.'/'.$lesson_id.'/'), $image);
        return $image;
    }*/


    public function store(Request $request)
    {
        $lessons = $request->lessons;
        $course_id = $request->course_id;


      for($i=0;$i<$lessons;$i++) {
          $lesson_image  = 'image'.$i;
          $lesson_video = 'video'.$i;
          $lesson_id = $request->input('lesson_id' . $i);
          $image = $this->uploadVideo($request,$lesson_image,$course_id,$lesson_id);
          $video = $this->uploadVideo($request,$lesson_video,$course_id,$lesson_id);

          $lesson_name_ar = $request->input('name_ar' . $i);
          $lesson_name_en = $request->input('name_en' . $i);
          $lesson_details_ar = $request->input('details_ar' . $i);
          $lesson_details_en = $request->input('details_en' . $i);


          $lesson = Lesson::find($lesson_id);
          $lesson->update([
              'name_ar'=> $lesson_name_ar,
              'name_en'=>$lesson_name_en,
              'details_ar'=>$lesson_details_ar,
              'details_en'=>$lesson_details_en,
              'image'=>$image,
              'video'=>$video,
          ]);
      }
      return redirect()->back()->withSuccess('IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
