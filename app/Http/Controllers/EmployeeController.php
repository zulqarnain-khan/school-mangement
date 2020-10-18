<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelex_employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index_employee()
    {   
        return view('Admin.HRManagement.addemployeecategory');
      
    }
    public function add_employee(EmployeeRequest $request)
    {
        $image = $request->file('EMP_IMAGE');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
        // $regno = 0;
        $EMP= DB::table('kelex_employees')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('EMP_NO')
        ->latest('created_at')
        ->first();
     
        $EMP_NO = ( $EMP == NULL) ? 1 : $EMP->EMP_NO+1;
        // dd($regno);
        $recent_entry_student= Kelex_employee::create([
            'EMP_NAME' => $request->EMP_NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'DESIGNATION_ID' => $request->DESIGNATION_ID,
            'QUALIFICATION' => $request->QUALIFICATION,
            'GENDER' => $request->GENDER,
            'EMP_DOB' => $request->DOB, 
            'CNIC' => $request->CNIC,
            'EMP_TYPE' => $request->EMP_TYPE,
            'ADDRESS' => $request->ADDRESS,
            'PASSWORD' => $request->PASSWORD, 
            'ALLOWANCESS' => $request->ALLOWANCESS,
            'CREATED_BY' => Auth::user()->id,
             'JOINING_DATE' => $request->JOINING_DATE,
             'LEAVING_DATE' => $request->LEAVING_DATE, 
             'EMP_IMAGE' => $my_image,
              'ADDED_BY' => Auth::user()->id,
             'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
             'EMP_NO'=> $EMP_NO,
        ]);
        $msg='Employee Record inserted successfully';
        return response()->json($msg);
    }
    public function showemployee()
    {

    $employee= Kelex_employee::all();
    

    return view('Admin.HRManagement.viewemployeecategory')->with('employees',$employee);
    }

    public function getemployeedata($id){

        $data= Kelex_employee::where('EMP_ID',$id)->first();
        return view('Admin.HRManagement.editemployeecategory')->with('employee',$data,);
       
    }
    // public function update_student(studentrequest $request)
    // {
    //     $image = $request->file('IMAGE');
    //     $img=Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)->first();
    //     $my_image =$img['IMAGE'];
    //     if(!empty($image)):
    //         $my_image = rand() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('upload'), $my_image);
    //     endif;
    //     Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)
    //       ->update([ 'NAME' => $request->NAME,
    //         'FATHER_NAME' => $request->FATHER_NAME,
    //         'FATHER_CONTACT' => $request->FATHER_CONTACT,
    //         'SECONDARY_CONTACT' => $request->SECONDARY_CONTACT,
    //         'GENDER' => $request->GENDER,
    //         'DOB' => $request->DOB, 
    //         'CNIC' => $request->CNIC,
    //         'RELIGION' => $request->RELIGION,
    //         'FATHER_CNIC' => $request->FATHER_CNIC,
    //         'SHIFT' => $request->SHIFT, 
    //         'PRESENT_ADDRESS' => $request->PRESENT_ADDRESS,
    //         'PERMANENT_ADDRESS' => $request->PERMANENT_ADDRESS,
    //          'GUARDIAN' => $request->GUARDIAN,
    //          'GUARDIAN_CNIC' => $request->GUARDIAN_CNIC, 
    //          'IMAGE' => $my_image,
    //           'PREV_CLASS' => $request->PREV_CLASS,
    //           'SLC_NO' => $request->SLC_NO,
    //          'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
    //          'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
    //          'PASSING_YEAR' => $request->PASSING_YEAR, 
    //          'CAMPUS_ID' => '1',
    //           'USER_ID' => '1', 
    //     ]);
    //     Kelex_students_session::where('STUDENT_ID',$request->STUDENT_ID)->
    //     update(['SESSION_ID'=>$request->SESSION_ID,'CLASS_ID'=>$request->CLASS_ID,
    //     'IS_ACTIVE'=>'1','SECTION_ID'=>$request->SECTION_ID]);
    //     $msg='Student Record Updated successfully';
    //     return response()->json($msg);
    // }
}
