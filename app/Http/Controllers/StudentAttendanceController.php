<?php

namespace App\Http\Controllers;
use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_section;
use App\Models\Kelex_student;
use App\Models\Kelex_sessionbatch;
use App\Models\Student_Attendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\kelex_student_session;
use App\Models\Kelex_student_attendance;

class StudentAttendanceController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');;
        
    }

    public function student_attendance()
    {
        
        $campus_id = Auth::user()->CAMPUS_ID;
        $class= Kelex_class::where('CAMPUS_ID',$campus_id)->get(); 
        $section= kelex_section::where('CAMPUS_ID',$campus_id)->get(); 
        $session= Kelex_sessionbatch::where('CAMPUS_ID',$campus_id)->get(); 
        // dd($class);
        return view("Admin.StudentsAttendance.std_Attendance_view")->with(['classes'=>$class,'sections'=>$section,'sessions'=>$session]);
    }
    public function get_stds_for_attendance(Request $request)
    {
        $update = null;
        $sectionID = $request->section_id;
        $classID = $request->class_id;
        $sessionID = $request->session_id;
        $date = date('Y-m-d',strtotime($request->date));
        $campus_id = Auth::user()->CAMPUS_ID;
        $check = DB::table('kelex_student_attendances')
                        ->where(['CLASS_ID' => $classID,'SECTION_ID' =>$sectionID,'SESSION_ID'=>$sessionID,'CAMPUS_ID'=> $campus_id,'ATTEN_DATE' => $date])
                        ->get()->toArray();
        if(count($check)>0):
            $record = DB::table('kelex_student_attendances')
            ->leftJoin('kelex_students', 'kelex_students.STUDENT_ID', '=', 'kelex_student_attendances.STD_ID')
            ->leftJoin('kelex_students_sessions', 'kelex_students_sessions.STUDENT_ID', '=', 'kelex_students.STUDENT_ID')
            ->where('kelex_student_attendances.SECTION_ID', '=',$sectionID)
            ->where('kelex_student_attendances.CLASS_ID', '=',$sessionID)
            ->where('kelex_student_attendances.ATTEN_DATE', '=',$date)
            ->select('kelex_students.*','kelex_student_attendances.ATTEN_STATUS','kelex_student_attendances.STD_ATTENDANCE_ID')
            ->get()->toArray();
            $data['update'] = 1;
            $data['record'] = $record;
        else:
            $record = DB::table('kelex_students_sessions')
            ->leftJoin('kelex_students', 'kelex_students_sessions.STUDENT_ID', '=', 'kelex_students.STUDENT_ID')
            ->where('kelex_students_sessions.SECTION_ID', '=',$sectionID)
            ->where('kelex_students_sessions.CLASS_ID', '=',$sessionID)
            ->select('kelex_students.*')
            ->get()->toArray();
            $data['update'] = 0;
            $data['record'] = $record;
         endif;
        return $data;
    }

    public function save_students_attendance(Request $request)
    {
        
       $student_ids = $request->student_ids;
       $attendance = $request->atten_status;
       $remarks = $request->remarks;
       $campus_id = Auth::user()->CAMPUS_ID;
       $userid =  Auth::user()->id;
       $update = $request->update;
       $attendance_ids = $request->attendance_ids;
       for ($i=0; $i <count($student_ids) ; $i++) { 
           $data = [
               'STD_ID' => $student_ids[$i],
               'ATTEN_STATUS' => $attendance[$i],
               'REMARKS' => $remarks[$i],
               'ATTEN_DATE' => date('Y-m-d',strtotime($request->date)),
               'CLASS_ID' => $request->class_id,
               'SECTION_ID' => $request->class_id,
               'SESSION_ID' => $request->class_id,
               'CAMPUS_ID' => $campus_id,
               'USER_ID' =>$userid,
           ];
        //    $where = [
               
        //    ];

           if($update == 0):
                Kelex_student_attendance::create($data);
           else:
                $where = [
                    'STD_ATTENDANCE_ID' => $attendance_ids[$i],
                ];
                Kelex_student_attendance::where($where)->update($data);
           endif;
           
       }
       return ['status'=> 'Students Attendance record Saved Successfully'];
    }

    public function non_present_students()
    {
        $campus_id = Auth::user()->CAMPUS_ID;
        $class= Kelex_class::where('CAMPUS_ID',$campus_id)->get(); 
        $section= kelex_section::where('CAMPUS_ID',$campus_id)->get(); 
        $session= Kelex_sessionbatch::where('CAMPUS_ID',$campus_id)->get(); 
        // dd($class);
        return view("Admin.StudentsAttendance.non_present_students")->with(['classes'=>$class,'sections'=>$section,'sessions'=>$session]);
    }
    public function getNonPresentStudents(Request $request)
    {
        // dd($request->all());
        $sectionID = $request->section_id;
        $classID = $request->class_id;
        $sessionID = $request->session_id;
        $fromdate = date('Y-m-d',strtotime($request->fromdate));
        $todate = date('Y-m-d',strtotime($request->todate));
        $campus_id = Auth::user()->CAMPUS_ID;
            $record = DB::table('kelex_student_attendances')
            ->join('kelex_students', 'kelex_students.STUDENT_ID', '=', 'kelex_student_attendances.STD_ID')
            ->join('kelex_students_sessions', 'kelex_students_sessions.STUDENT_ID', '=', 'kelex_students.STUDENT_ID')
            ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_students_sessions.SECTION_ID')
            ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_students_sessions.CLASS_ID')
            ->where('kelex_students_sessions.SECTION_ID', '=',$sectionID)
            ->where('kelex_students_sessions.CLASS_ID', '=',$sessionID)
            ->where('kelex_students_sessions.SESSION_ID', '=',$sessionID)
            ->where('kelex_student_attendances.ATTEN_STATUS', '=','A')
            ->whereBetween('kelex_student_attendances.ATTEN_DATE', [$fromdate,$todate])
            ->select('kelex_students.STUDENT_ID','kelex_students.REG_NO','kelex_students.NAME','kelex_students.NAME','kelex_students.FATHER_NAME','kelex_classes.Class_name','kelex_sections.Section_name','kelex_student_attendances.ATTEN_STATUS','kelex_student_attendances.STD_ATTENDANCE_ID')
            ->get()
            ->toArray();
            return $record;
    }
}
