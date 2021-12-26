<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\UserRole;
use App\Models\ProfileData;
use App\Models\StudentSubjects;
use App\Models\TeacherSubjects;
use App\User;
use DB;
use Hash;
use Str;
use Carbon\Carbon;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {

        try {

            DB::beginTransaction();
            $data =  Subject::select('id','title')->get();
            DB::commit();
            return response()->json($data, 200);
            
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ifExist = User::where('email',$request->email_id)->first();

        $token = Str::random(60);


        if($ifExist != ''){
            return response()->json(['status' => 'false','message' => 'email id exist !']);
        }else{
            try {
                DB::beginTransaction();
                // save data to user table
                $userData = new User();
                $userData->name = $request->first_name. " ".$request->first_name;
                $userData->email = $request->email_id;
                $userData->email_verified_at = Carbon::now();
                $userData->password = Hash::make($request->confirmpassword);
                $userData->role_id = UserRole::where('role_name',$request->user_type)->first()->id;
                $userData->api_token = Hash('sha256', $token);                
                $userData->remember_token = Str::random(100);

                $userData->save();

                // SAVE  DATA TO PROFILE TABLE

                $profileData = new ProfileData();
                $profileData->first_name = $request->first_name;
                $profileData->last_name = $request->last_name;
                $profileData->email = $request->email_id;
                $profileData->dob = $request->dob;
                $profileData->qualification = $request->qualification;
                $profileData->grade = $request->grade;
                $profileData->user_id  = $userData->id;
                $profileData->save();

                // SAVE  SUBJECTS TO STUDENT SUBJECT TABLE

                foreach ($request->selectedsubjects as $subject) {

                    if($userData->role_id == 1){
                        $subjectFollow = new StudentSubjects();
                        $subjectFollow->student_id = $userData->id;
                        $subjectFollow->is_favorite = 0;
                    }else{
                        $subjectFollow = new TeacherSubjects();
                        $subjectFollow->teacher_id = $userData->id;                        
                    }
                    
                    $subjectFollow->subject_id = $subject;                    
                    $subjectFollow->save();
                }

                DB::commit();

                return response()->json(['status' => 'success','message' => 'User data saved']);
                
            } catch (Exception $e) {
                DB::rollback();
                throw $e;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $token = $request->bearerToken();         

        try {

            DB::beginTransaction();
            if($token != ""){
                $userData = User::with('ProfileData')
                ->where('api_token',$token)
                ->first();  
            }          
            DB::commit();
            return response()->json($userData, 200);
            
        } catch (Exception $e) {
            DB::rollback();
        }       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $token = $request->bearerToken();

        try {

            DB::beginTransaction();
            if(!empty($token)){

                $user_id = User::where('api_token',$token)->first()->id;

                $update =   ProfileData::where('user_id', $user_id)
                            ->update([
                                'first_name' => $request->first_name,
                                'last_name' => $request->last_name,
                                'DOB' => $D_OB??null,
                                'grade' => $request->grade,
                                'qualification' => $request->qualification??null
                            ]);
                DB::commit();
                return response()->json(['status' => 'success','message' => 'User data updated'], 200); 
            }    
                   
            
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getsubjects(Request $request){

        $token = $request->bearerToken();
        try {

            DB::beginTransaction();
            $student_subject =  StudentSubjects::leftjoin('users','users.id','=','student_subscribed_subjects.student_id')
            ->leftjoin('subject','subject.id','=','student_subscribed_subjects.subject_id')
            ->select('subject.title','student_subscribed_subjects.is_favorite','subject.id')
            ->where('users.api_token',$token)
            ->get();
            
            return response()->json($student_subject, 200);
            
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function getOthersubjects(Request $request){

        $token = $request->bearerToken();
        try {

            $user_id = User::where('api_token',$token)->first()->id;

            DB::beginTransaction();

            $subjects = Subject::select('subject.id')->get();

            $student_subject =  StudentSubjects::leftjoin('users','users.id','=','student_subscribed_subjects.student_id')
            ->leftjoin('subject','subject.id','=','student_subscribed_subjects.subject_id')
            ->select('subject.id')
            ->where('users.api_token',$token)
            ->get();

            // $final_data1 = [];
            // $final_data2 = [];
            // $final_data = [];  

            foreach ($subjects as $key1 => $value1) {
                $final_data1 [] = $value1->id;
                // $final_data1 [] = $value->title;
            }

            foreach ($student_subject as $key2 => $value2) {
                $final_data2 [] = $value2->id;
                // $final_data2 [] = $value->title;
            }

            // dd($final_data2);
            $result=array_diff($final_data1,$final_data2);
            

           

            if(count($result)>0){
                foreach ($result as $key => $value) {
                    // $final_data = "";
                    $final_data []  = Subject::select('subject.id','subject.title')->where('subject.id',$value)->first();
                    
                }
            }else{
                $final_data [] = Subject::select('subject.id','subject.title')->get();
            }
            
            DB::commit();
            
            return response()->json($final_data, 200);
            
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function subsribeSubject(Request $request,$id){

        // dd($request);

        $token = $request->bearerToken();
        try {

            $user_id = User::where('api_token',$token)->first()->id;

            DB::beginTransaction();  

            if($request->status_code == 0){
                $this->destroy($id,$user_id);
            }else{
                $subjectFollow = new StudentSubjects();
                $subjectFollow->student_id = $user_id;
                $subjectFollow->is_favorite = 0; 
                $subjectFollow->subject_id = $id;                    
                $subjectFollow->save();
            }          

            DB::commit();

            return response()->json(['status' => 'success','message' => 'Subject subscribed'],200);  
            
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function adFavorite(Request $request,$id){

        $token = $request->bearerToken();
        try {

            $user_id = User::where('api_token',$token)->first()->id;

            DB::beginTransaction();             

               $update =   StudentSubjects::where('student_id', $user_id)
                ->where('subject_id', $id)
                ->update([                    
                    'is_favorite' => $request->status_code
                ]);         

            DB::commit();

            return response()->json(['status' => 'success','message' => 'favorite updated'],200);  
            
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function destroy($id,$user_id)
    {
        // dd($id);
        $dataSub = StudentSubjects::where('subject_id',$id)
        ->where('student_id',$user_id)
        ->first();
        // dd($dataSub);
        $dataSub->delete();

        return response()->json(['status' => 'success','message' => 'Subject unsubscribed'], 200);
    }
}
