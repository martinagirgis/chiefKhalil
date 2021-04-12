<?php

namespace App\Http\Controllers\Martina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chief;
use App\models\Categories;
use App\models\Courses;
use App\models\UserCoursesFavoriteList;
use App\models\UserChiefsFollowingsList;
use App\models\UserCoursesBooking;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\Contactus;
use App\Mail\ContactusChief;
use App\models\ContactMails;
use App\models\Contact;
use App\models\CoursesLessons;
use App\models\Adds;
use App\models\CoursesLessonsQuiz;
use App\models\CoursesLessonsQuizQuestions;
use App\models\CoursesLessonsQuizUserAnswers;
use App\models\CourseLessonQuizAnswerUserMark;
use App\models\LessonsCommunity;

class IndexController extends Controller
{
    public function index()
    {
        //get random 20 chief
        $chief = Chief::inRandomOrder()->limit(20)->get();

        //get random 20 course
        $course = Courses::inRandomOrder()->limit(20)->get();

        //get category
        $category = Categories::get();

        $contactMails = ContactMails::get();

        //get user favorite courses if he Auth
        if(Auth::User('web'))
        {
            $coursesFavoriteList = UserCoursesFavoriteList::where('user_id', Auth::User('web')->id)->get();
            $followingChiefList = UserChiefsFollowingsList::where('user_id', Auth::User('web')->id)->get();
            return view('site.index',compact('chief','course' , 'category' , 'coursesFavoriteList','followingChiefList','contactMails'));
        }

        else
        {
            return view('site.index',compact('chief','course' , 'category','contactMails'));
        }

    }

    public function showChiefs()
    {
        $chief = Chief::get();

        if(Auth::User('web'))
        {

            $followingChiefList = UserChiefsFollowingsList::where('user_id', Auth::User('web')->id)->get();

            return view('site.allChiefs',compact('chief','followingChiefList'));
        }
        else
        {
            return view('site.allChiefs',compact('chief'));
        }

        
    }

    public function showCourses()
    {
        //get course
        $course = Courses::get();

        //get category
        $category = Categories::get();

        if(Auth::User('web'))
        {

            $coursesFavoriteList = UserCoursesFavoriteList::where('user_id', Auth::User('web')->id)->get();

            return view('site.allCourses',compact('course', 'category','coursesFavoriteList'));
        }
        else
        {
            return view('site.allCourses',compact('course', 'category'));
        }
        
    }

    public function chiefCourses($id)
    {
        //get course
        $course = Courses::where('chief_id', $id)->get();

        //get category
        $category = Categories::get();

        if(Auth::User('web'))
        {

            $coursesFavoriteList = UserCoursesFavoriteList::where('user_id', Auth::User('web')->id)->get();

            return view('site.chiefCourses',compact('course', 'category','coursesFavoriteList'));
        }
        else
        {
            return view('site.chiefCourses',compact('course', 'category'));
        }
        
    }

    public function addFavoriteCourse($id)
    {
        $favoriteCourse = UserCoursesFavoriteList::create([
            'user_id'  => Auth::User('web')->id,
            'course_id' => $id ,
        ]);

        return  redirect()->back();
    }

    public function removeFavoriteCourse($id)
    {
        DB::table("user_courses_favorite_list")->where('course_id','=',$id)->where('user_id','=',Auth::User('web')->id)->delete();

        return  redirect()->back();
    }

    public function followingChieff($id)
    {
        $followingChieff = UserChiefsFollowingsList::create([
            'user_id'  => Auth::User('web')->id,
            'chief_id' => $id ,
        ]);

        return redirect()->back();
    }

    public function unFollowingChieff($id)
    {
        DB::table("user_chiefs_followings_list")->where('chief_id','=',$id)->where('user_id','=',Auth::User('web')->id)->delete();

        return redirect()->back();
    }

    public function myFavoriteCourse()
    {
        $coursesFavoriteList = UserCoursesFavoriteList::where('user_id', Auth::User('web')->id)->get();
        $course = Courses::get();
        return view('site.favoriteCourses',compact('course' , 'coursesFavoriteList' ));
    }

    public function myFollowingChieff()
    {
        $followingChiefList = UserChiefsFollowingsList::where('user_id', Auth::User('web')->id)->get();
        $chief = Chief::get();
        return view('site.followingChiefs',compact('chief' , 'followingChiefList' ));
    }

    public function myCourses()
    {
        $myCoursesBooking = UserCoursesBooking::where('user_id', Auth::User('web')->id)->get();
        $course = Courses::get();
        return view('site.myCourses',compact('course' , 'myCoursesBooking' ));
    }

    public function showChiefDetails($id)
    {
        $chief = Chief::find($id);
        if(Auth::User('web'))
        {
            $followingChiefList = UserChiefsFollowingsList::where('user_id', Auth::User('web')->id)->get();
            return view('site.chiefDetails',compact('chief', 'followingChiefList'));
        }
        else
        {
            return view('site.chiefDetails',compact('chief'));
        }
    }

    public function sendMailChief(Request $request,$id)
    {
        $messagee = $request->message;
        $emaill = $request->email; 
        $namee = $request->name;
        Mail::to($id)->send(new ContactusChief($messagee,$emaill,$namee));

        return redirect()->back()->with('success','email successfully send chick your mail');
    }

    public function showCotactUs()
    {
        $contactMails = ContactMails::get();
        return view('site.contact',compact('contactMails'));
    }

    public function sendMailCotactUs(Request $request)
    {
        $messagee = $request->message;
        $emaill = $request->email; 
        $namee = $request->name;
        $subjectt = $request->subject;
        $contactTitle = ContactMails::where('email',$subjectt)->get();
        Mail::to($subjectt)->send(new Contactus($messagee,$emaill,$namee));

        Contact::create([
            'title'  => $contactTitle[0]->subject_en,
            'body' => $messagee ,
            'sender_email' => $emaill ,
            'received_email' => $subjectt ,
        ]);

        return redirect()->back()->with('success','email successfully send chick your mail');
    }

    public function showCourseDetails($id)
    {
        $course = Courses::find($id);

        if(Auth::User('web'))
        {
            $myCoursesBooking = UserCoursesBooking::where('user_id', Auth::User('web')->id)->get();
            return view('site.courseDetails',compact('course' , 'myCoursesBooking'));
        }
        else
        {
            return view('site.courseDetails',compact('course'));
        }
    }

    public function enrollCourse($id)
    {
        $enrollCourse = UserCoursesBooking::create([
            'user_id'  => Auth::User('web')->id,
            'course_id' => $id ,
            'course_progress' => 1 ,
        ]);

        return redirect()->back();
    }

    public function courseLessonses($id,$lessonNum)
    {
        $course = Courses::find($id);
        $corseAllLessons = CoursesLessons::where('course_id',$id)->get();
        $add = Adds::inRandomOrder()->where('from','<=',date("Y-m-d"))->where('to','>=',date("Y-m-d"))->limit(1)->get();
        if(Auth::User('web'))
        {
            $forChickLessonAvailble = 0;
            $booking = 1;
            $myCoursesBooking = UserCoursesBooking::where('user_id', Auth::User('web')->id)->get();
            if(count($myCoursesBooking)>0)
            {
                $myLessonIndex = $myCoursesBooking[0]['course_progress'];
                //$myLessonIndex2 = $myLessonIndex +1;
                if($lessonNum <= $myLessonIndex && $lessonNum != 0 )
                {
                    $forChickLessonAvailble = 1;
                    $myCoursesLesson = CoursesLessons::where('course_id',$id)->where('lesson_number',$lessonNum)->get();

                    return view('site.coursesLessons',compact('course','corseAllLessons','myCoursesLesson','myLessonIndex','forChickLessonAvailble','add','booking'));
                }
                else
                {
                    $myLessonIndex = $myLessonIndex + 1;
                    return view('site.coursesLessons',compact('course','corseAllLessons','myLessonIndex','forChickLessonAvailble','add','booking'));
                }
               
            }
            else
            {
                $booking = 0;
                // ده انا وقفت للدرس الكام في الكورس 
                $myLessonIndex = 1;
                // علشان اشوف انا ينفع ادخل الدرس ولا لا
                $forChickLessonAvailble = 0;
                // if($lessonNum == 0)
                // {
                //     return view('site.coursesLessons',compact('course', 'myCoursesLesson','myLessonIndex'));
                // }
                if($lessonNum <= $myLessonIndex && $lessonNum != 0)
                {
                    $forChickLessonAvailble = 1;
                    // ده انا رايح بانهي درس عايزه
                    $myCoursesLesson = CoursesLessons::where('course_id',$id)->where('lesson_number',$myLessonIndex)->get();
                    return view('site.coursesLessons',compact('course','corseAllLessons','myCoursesLesson','myLessonIndex','forChickLessonAvailble','add','booking'));
                }
                else
                {
                    return view('site.coursesLessons',compact('course','corseAllLessons','myLessonIndex','forChickLessonAvailble','add','booking'));
                }
            }
        }
        else
        {

            $corseAllLessons = CoursesLessons::where('course_id',$id)->get();
            // ده انا وقفت للدرس الكام في الكورس 
            $myLessonIndex = 1;
            // علشان اشوف انا ينفع ادخل الدرس ولا لا
            $forChickLessonAvailble = 0;
            // if($lessonNum == 0)
            // {
            //     return view('site.coursesLessons',compact('course', 'myCoursesLesson','myLessonIndex'));
            // }
            if($lessonNum <= $myLessonIndex && $lessonNum != 0)
            {
                $forChickLessonAvailble = 1;
                // ده انا رايح بانهي درس عايزه
                $myCoursesLesson = CoursesLessons::where('course_id',$id)->where('lesson_number',$myLessonIndex)->get();
                return view('site.coursesLessons',compact('course','corseAllLessons','myCoursesLesson','myLessonIndex','forChickLessonAvailble','add'));
            }
            else
            {
                return view('site.coursesLessons',compact('course','corseAllLessons','myLessonIndex','forChickLessonAvailble','add'));
            }
        }
    }

    public function getResult(Request $request)
    {
        $question = CoursesLessonsQuizQuestions::where('courses_lessons_quiz_id',$request->QuizId)->get();
        $mark = 0;
        for($i=0 ; $i < count($question); $i++)
        {
            if($question[$i]->correct_answer_en == $request->Arr['answer'. strval($i +1)])
            {
                $mark = $mark + 1;
                
            }
                                                                                                                                                                            
        }

        $quiz = CoursesLessonsQuiz::find($request->QuizId);
        $quizMark = $quiz->total_score;

        $questionMark = $quizMark / count($question);

        $studentMark = $questionMark * $mark;

        if ($studentMark >= ($quizMark/2)) 
        {
            $currentUserBookCourse = UserCoursesBooking::where('user_id',Auth::User('web')->id)->where('course_id',$request->CourseId);
            $currentUserBookCourseProgress = UserCoursesBooking::where('user_id',Auth::User('web')->id)->where('course_id',$request->CourseId)->get();
            if($currentUserBookCourseProgress[0]['course_progress'] == $request->CoursesLesson)
            {
                $user = $currentUserBookCourse->update([
                    'course_progress' => $currentUserBookCourseProgress[0]['course_progress'] + 1,
                ]);

                $newLesson = $currentUserBookCourseProgress[0]['course_progress']+1;

                $userMarkQuiz = CourseLessonQuizAnswerUserMark::create([
                    'user_id'  => Auth::User('web')->id,
                    'courses_lessons_quiz_id' => $request->QuizId ,
                    'mark' => $studentMark ,
                ]);
            }
            else
            {
                $newLesson = intval( $request->CoursesLesson ) + 1;
            }

            

            // $data = "2";
            
            $data =  " <h2 class='text-center'>Exam Score</h2>
            <br><br>
            <h4 id='' class='text-center'>
                <span id='score'>". $studentMark . " from " . $quizMark ."</span>
            </h4>
            <br><br><br><br>
            <div class='buttons'>
              <div class='pull-right'>
                <a href='/courseLessonses/". $request->CourseId ."/". $newLesson ."' id='nextLeson' class='btn btn-lg btn-primary' >Next Lesson</a>
              </div>
            </div> ";
        }
        else
        {
            $currentUserBookCourseProgress = UserCoursesBooking::where('user_id',Auth::User('web')->id)->where('course_id',1)->get();
            $data =  " <h2 class='text-center'>Exam Score</h2>
            <br><br>
            <h4 id='' class='text-center'>
                <span id='score'>". $studentMark . " from " . $quizMark ."</span>
            </h4>
            <h4 id='' class='text-center'>
                Sorry, Please Repeat This Lesson.
            </h4>
            <br><br><br><br>
            <div class='buttons'>
              <div class='pull-right'>
                <a href='/courseLessonses/". $request->CourseId ."/". $request->CoursesLesson ."' id='nextLeson' class='btn btn-lg btn-primary' >Retray Lesson</a>
              </div>
            </div> ";
        }
        
        return $data;
    }

    public function setComment(Request $request)
    {
        $userComment = LessonsCommunity::create([
            'user_id'  => Auth::User('web')->id,
            'courses_lessons_id' => $request->CoursesLesson ,
            'body' => $request->Comment ,
        ]);

        $data = "
            <article class='comment-body'>
                <footer class='comment-meta'>
                    <div class='comment-author vcard'>
                        <img alt='' src='../../../assets/site/backImages/users/".Auth::guard('web')->user()->image."'>
                        <b class='fn'>
                            <a href='#' rel='nofollow' class='url'>". Auth::guard('web')->user()->fname . " " . Auth::guard('web')->user()->lname ."</a>
                        </b>
                    </div>
                    <!-- .comment-author -->

                    <div class='comment-metadata'>
                        <a href='#' class='color-main2'>
                            <time datetime='2018-03-14T07:57:01+00:00'>
                                ". $userComment->created_at ."
                            </time>
                        </a>
                    </div>
                    <!-- .comment-metadata -->
                </footer>
                <!-- .comment-meta -->

                <div class='comment-content'>
                    <p>". $request->Comment ."</p>
                </div>
                <!-- .comment-content -->

            </article>
        
        ";
        return $data;
    }
}
