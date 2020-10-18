<?php

namespace App\Http\Controllers;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\kelex_section;
use App\Models\Kelex_student;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\studentrequest;
use App\Models\Kelex_students_session;

class StudentController extends Controller
{
    public function index_student()
    {
        $class= Kelex_class::all(); 
        $session= Kelex_sessionbatch::all(); 
        return view("Admin.Students.addstudent")->with(['classes'=>$class,'sessions'=>$session]);
    }
    public function add_student(studentrequest $request)
    {
        $image = $request->file('IMAGE');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
        // $regno = 0;
        $regno= DB::table('kelex_students')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('REG_NO')
        ->latest('created_at')
        ->first();
        // dd($regno['']);
        $rollno= DB::table('kelex_students_sessions')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('ROLL_NO')
        ->latest('created_at')
        ->first();
        $regno = ( $regno == NULL) ? 1 : $regno->REG_NO+1;
        $rollno = ( $rollno == NULL) ? 1 : $rollno->ROLL_NO+1;
        // dd($regno);
        $recent_entry_student= Kelex_student::create([
            'NAME' => $request->NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'FATHER_CONTACT' => $request->FATHER_CONTACT,
            'SECONDARY_CONTACT' => $request->SECONDARY_CONTACT,
            'GENDER' => $request->GENDER,
            'DOB' => $request->DOB, 
            'CNIC' => $request->CNIC,
            'RELIGION' => $request->RELIGION,
            'FATHER_CNIC' => $request->FATHER_CNIC,
            'SHIFT' => $request->SHIFT, 
            'PRESENT_ADDRESS' => $request->PRESENT_ADDRESS,
            'PERMANENT_ADDRESS' => $request->PERMANENT_ADDRESS,
             'GUARDIAN' => $request->GUARDIAN,
             'GUARDIAN_CNIC' => $request->GUARDIAN_CNIC, 
             'IMAGE' => $my_image,
              'PREV_CLASS' => $request->PREV_CLASS,
              'SLC_NO' => $request->SLC_NO,
             'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
             'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
             'PASSING_YEAR' => $request->PASSING_YEAR, 
             'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
             'REG_NO'=> $regno,
              'USER_ID' => Auth::user()->id, 
        ]);
        $studentid= DB::table('kelex_students')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('STUDENT_ID')
        ->latest('created_at')
        ->first();
        // dd($studentid->STUDENT_ID);
        Kelex_students_session::Create(['SESSION_ID'=>$request->SESSION_ID,
                                        'CLASS_ID'=>$request->CLASS_ID,
                                        'IS_ACTIVE'=>'1',
                                        'SECTION_ID'=>$request->SECTION_ID,
                                        'USER_ID' => Auth::user()->id, 
                                         'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
                                        'STUDENT_ID'=> $studentid->STUDENT_ID]);
        $studentid= $recent_entry_student->STUDENT_ID;
        Kelex_students_session::Create(['SESSION_ID'=>$request->SESSION_ID,'CLASS_ID'=>$request->CLASS_ID,
        'IS_ACTIVE'=>'1','SECTION_ID'=>$request->SECTION_ID,'STUDENT_ID'=> $studentid,'ROLL_NO'=> $rollno,'CAMPUS_ID'=>Auth::user()->CAMPUS_ID,
         'USER_ID'=> Auth::user()->id]);

        $msg='Student Record inserted successfully';
        return response()->json($msg);
    }
    public function showstudent()
    {

    $student= Kelex_student::all();
    

    return view('Admin.Students.view')->with('students',$student);
    }

    public function getstudentdata($id){
        list($data,$class,$section,$session,$std_session_data)=  $this->getstudentdetails($id);
        return view('Admin.Students.editstudent')->with(['student'=>$data,'classes'=>$class,'sessions'=>$session,'sections'=>$section,'std_session_data'=>$std_session_data]);
       
    }
    public function update_student(studentrequest $request)
    {
        $image = $request->file('IMAGE');
        $img=Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)->first();
        $my_image =$img['IMAGE'];
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
        Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)
          ->update([ 'NAME' => $request->NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'FATHER_CONTACT' => $request->FATHER_CONTACT,
            'SECONDARY_CONTACT' => $request->SECONDARY_CONTACT,
            'GENDER' => $request->GENDER,
            'DOB' => $request->DOB, 
            'CNIC' => $request->CNIC,
            'RELIGION' => $request->RELIGION,
            'FATHER_CNIC' => $request->FATHER_CNIC,
            'SHIFT' => $request->SHIFT, 
            'PRESENT_ADDRESS' => $request->PRESENT_ADDRESS,
            'PERMANENT_ADDRESS' => $request->PERMANENT_ADDRESS,
             'GUARDIAN' => $request->GUARDIAN,
             'GUARDIAN_CNIC' => $request->GUARDIAN_CNIC, 
             'IMAGE' => $my_image,
              'PREV_CLASS' => $request->PREV_CLASS,
              'SLC_NO' => $request->SLC_NO,
             'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
             'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
             'PASSING_YEAR' => $request->PASSING_YEAR, 
             'CAMPUS_ID' => '1',
              'USER_ID' => '1', 
        ]);
        Kelex_students_session::where('STUDENT_ID',$request->STUDENT_ID)->
        update(['SESSION_ID'=>$request->SESSION_ID,'CLASS_ID'=>$request->CLASS_ID,
        'IS_ACTIVE'=>'1','SECTION_ID'=>$request->SECTION_ID]);
        $msg='Student Record Updated successfully';
        return response()->json($msg);
    }


    public function show()
    {

    $class= Kelex_class::all();
    return view('Admin.Students.view')->with('classes',$class);
    }
    
    public function fetch($id)
    {
        echo json_encode(DB::table('kelex_sections')->where('Class_id',$id)->get());
    }

    public function fetchstudentdata($id)
    {
      
     $explode_id = array_map('intval', explode('.', $id));
    
        echo json_encode( DB::table('kelex_students_sessions')
        ->leftJoin('kelex_students', 'kelex_students_sessions.STUDENT_ID', '=', 'kelex_students.STUDENT_ID')
        ->where('kelex_students_sessions.SECTION_ID', '=',$explode_id[0])
        ->where('kelex_students_sessions.CLASS_ID', '=',$explode_id[1])
        ->select('kelex_students.*')
        ->get()->toArray());
    }
    
    public function showdetails($id)
    {
      list($data,$class,$section,$session,$std_session_data)=  $this->getstudentdetails($id);
      $classid= $std_session_data['CLASS_ID'];
      $selectedclass= Kelex_class::where('Class_id',$classid)->first();
      $sessionid= $std_session_data['SESSION_ID'];
      $selectedsession= Kelex_sessionbatch::where('SB_ID',$sessionid)->first();
      return view('Admin.Students.view_students_details')->with(['student'=>$data,'class'=>$selectedclass,'session'=>$selectedsession,'section'=>$section]);
    
    }

    public function searchstudent(Request $request)
    {


    }

   private function getstudentdetails($id="")
    {
        $data = Kelex_student::find($id)->toArray();
        $std_session_data= Kelex_students_session::where('STUDENT_ID',$id)->first();
        $class= Kelex_class::all(); 
        $sectionid= $std_session_data['SECTION_ID'];
        $section= kelex_section::where('Section_id',$sectionid)->first();
        $session=Kelex_sessionbatch::all();
        return array($data,$class,$section,$session,$std_session_data);
    }
}