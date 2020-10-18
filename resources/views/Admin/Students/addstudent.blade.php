@extends('Admin.layout.master')
@section("page-css")
    <link rel="stylesheet" type="text/css" href="{{ url('assets/dist/css/dropify.min.css') }}">
@endsection
@section("content")
<div class="page-content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="card m-b-20">
                  <div class="row">
                     <div class="col-2">
                          <a href="{{route('showstudent')}}" class="btn btn-info">Show Existing Students</a>
                        
                     </div>
                  </div>
                  <div class="card-body"> <h4 class="register-heading">Student Admission</h4>
                     <p class="text-muted m-b-30 ">Please fill all the mandaortey fields .</p>
                     <!-- student form start -->
                        <form id="addstudent" action="{{route('addstudent')}}"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                              <div class="row">
                                <div class="col-3">
                                    <label for="upload">Upload Student picture</label>
                                    <input type="file" name="IMAGE" id="IMAGE" size="20" class="dropify"  accept="image/*"/>
                                    <small id="IMAGE_error" class="form-text text-danger"></small>
                                 </div>
                              <div class="col-3">
                                 <div class="form-group">
                                    <label for="">Class</label> 
                                       <small class="req"> *</small>
                                       <select name="CLASS_ID" class="form-control formselect required" placeholder="Select Class"
                                          id="class_id">
                                          <option value="0" disabled selected>Select
                                             Class*</option>
                                          @foreach($classes as $class)
                                          <option  value="{{ $class->Class_id }}">
                                             {{ ucfirst($class->Class_name) }}</option>
                                          @endforeach
                                    </select>
                                    <small id="CLASS_ID_error" class="form-text text-danger"></small>
                                 </div>
                              </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                       <label for="">Section</label> 
                                          <small class="req"> *</small>
                                          <select name="SECTION_ID" class="form-control formselect required" placeholder="Select Section" id="sectionid" >
                                       </select>
                                       <small id="SECTION_ID_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label for="">Session</label> 
                                          <small class="req"> *</small>
                                          <select name="SESSION_ID" class="form-control formselect required" placeholder="Select Section" id="SESSION_ID" >
                              <option value="">Select</option>
                              @foreach($sessions as $session)
                              <option value="{{$session->SB_ID}}">{{$session->SB_NAME}}</option>
                                   @endforeach
                             </select>
                             <small id="SESSION_ID_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                              </div>
                           
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputNAME1">Student Name </label> 
                                       <small class="req"> *</small>
                                       <input id="NAME" name="NAME" placeholder="" type="text" class="form-control">
                                       <small id="NAME_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInpUTFNAME1">FATHER NAME</label>
                                       <small class="req"> *</small>
                                       <input id="FATHER_NAME" name="FATHER_NAME" placeholder="" type="text" class="form-control">
                                       <small id="FATHER_NAME_error" class="form-text text-danger"></small> 
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFNO1">Father Phone</label>
                                          <small class="req"> *</small>
                                          <input id="FATHER_CONTACT" name="FATHER_CONTACT" placeholder="" type="text" class="form-control" >
                                          <small id="FATHER_CONTACT_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFSNO1">Secondary Phone no</label>
                                          <small class="req"> *</small>
                                          <input id="SECONDARY_CONTACT" name="SECONDARY_CONTACT" placeholder="" type="text" class="form-control" >
                                          <small id="SECONDARY_CONTACT_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputGen"> Gender</label>
                                       <small class="req"> *</small>
                                       <select class="form-control" name="GENDER">
                                          <option value="">Select</option>
                                          <option value="Male">Male</option>
                                          <option value="Female" selected="">Female</option>
                                       </select>
                                       <small id="GENDER_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputdob1">Date of Birth</label>
                                       <small class="req"> *</small>
                                       <input id="DOB" name="DOB" placeholder="" type="date" class="form-control date">
                                       <small id="DOB_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>

                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFNO1">CNIC</label>
                                          <small class="req"> *</small>
                                          <input id="CNIC" name="CNIC" placeholder="" type="text" class="form-control" >
                                          <small id="CNIC_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFNO1">RELIGION</label>
                                          <small class="req"> *</small>
                                          <input id="RELIGION" name="RELIGION" placeholder="" type="text" class="form-control" >
                                          <small id="RELIGION_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="Sins"> SHIFT:</label>
                                       <small class="req"> *</small>
                                       <label class="radio-inline">
                                       <small id="SHIFT_err" class="form-text text-danger"></small>
                                       <input  type="radio" id="Morning" name="SHIFT" value="1" style=" margin: 10px;"  > Morning
                                       <input type="radio" id="Evening" name="SHIFT" value="2" style=" margin: 10px;"> Evening
                                       </label>
                                       <small id="SHIFT_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputPAl1">Present address</label>
                                       <small class="req"> *</small>
                                       <input type="text" id="PRESENT_ADDRESS" name="PRESENT_ADDRESS" class="form-control" >
                                       <small id="PRESENT_ADDRESS_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputPAl1">PERMANENT ADDRESS</label>
                                       <small class="req"> *</small>
                                       <input type="text" id="PERMANENT_ADDRESS" name="PERMANENT_ADDRESS" class="form-control" >
                                       <small id="PERMANENT_ADDRESS_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInpUTFNAME1">GUARDIAN NAME</label>
                                       <small class="req"> *</small>
                                       <input id="GUARDIAN" name="GUARDIAN" placeholder="" type="text" class="form-control">
                                       <small id="GUARDIAN_error" class="form-text text-danger"></small> 
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFNO1">GUARDIAN CNIC</label>
                                          <small class="req"> *</small>
                                          <input id="GUARDIAN_CNIC" name="GUARDIAN_CNIC" placeholder="" type="text" class="form-control" >
                                          <small id="GUARDIAN_CNIC_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFNO1">School Leaving Certificate</label>
                                          <small class="req"> *</small>
                                          <input id="SLC_NO" name="SLC_NO" placeholder="" type="number" class="form-control" >
                                          <small id="SLC_NO_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                                 <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputFNO1">Previous University/School Name</label>
                                          <small class="req"> *</small>
                                          <input id="PREV_BOARD_UNI" name="PREV_BOARD_UNI" placeholder="" type="text" class="form-control" >
                                          <small id="PREV_BOARD_UNI_error" class="form-text text-danger"></small>
                                       </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputdob1">Passing year</label>
                                       <small class="req"> *</small>
                                       <input id="PASSING_YEAR" name="PASSING_YEAR" placeholder="" type="date" class="form-control date">
                                       <small id="PASSING_YEAR_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                               
                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputsection1">Previous Class :  </label>
                                          <small class="req"> *</small>
                                          <select class="form-control formselect required" name="PREV_CLASS" id="PREV_CLASS" >
                                          @foreach($classes as $class)
                                          <option value="{{$class->Class_id}}">{{$class->Class_name}}</option>
                                                @endforeach
                                          </select>
                                          <small id="PREV_CLASS_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputdob1">Previous Class Marks</label>
                                       <small class="req"> *</small>
                                       <input id="PREV_CLASS_MARKS" name="PREV_CLASS_MARKS" placeholder="" type="text" class="form-control date">
                                       <small id="PREV_CLASS_MARKS_error" class="form-text text-danger"></small>
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
         
                                    </div>
                                   
                                 </div>
                                
                              </div>  
                              
                              <div class="box-footer text-center">
                                 
                                    <div class=" ">
                                       <button type="submit" class="btn btn-info btn-rounded align-items-right waves-effect waves-light">Save Student</button>
                                    </div>
                              </div>
                        </form>
                     <!-- student form end -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
                                  



@endsection
@section("customscript")
<script>
   $(document).ready(function(){
    $('.dropify').dropify();
    $('#class_id').on('change', function () {
                let id = $(this).val();
                $('#sectionid').empty();
                $('#sectionid').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'getsections/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                //console.log(response);   
                $('#sectionid').empty();
                $('#sectionid').append(`<option value="0" disabled selected>Select Section*</option>`);
                response.forEach(element => {
                    $('#sectionid').append(`<option value="${element['Section_id']}">${element['Section_name']}</option>`);
                    });
                }
            });
        });
   });
</script>
<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
                
$('body').on('submit','#addstudent',function(e){
      e.preventDefault();
      $('#NAME_error').text('');
      $('#FATHER_NAME_error').text('');
      $('#FATHER_CONTACT_error').text('');
      $('#SECONDARY_CONTACT_error').text('');
      $('#GENDER_error').text('');
      $('#DOB_error').text('');
      $('#CNIC_error').text('');
      $('#RELIGION_error').text('');
      $('#FATHER_CNIC_error').text('');
      $('#SHIFT_error').text('');
      $('#PRESENT_ADDRESS_error').text('');
      $('#PERMANENT_ADDRESS_error').text('');
      $('#GUARDIAN_error').text('');
      $('#GUARDIAN_CNIC_error').text('');
      $('#IMAGE_error').text('');
      $('#PREV_CLASS_error').text('');
      $('#SLC_NO_error').text('');
      $('#PREV_CLASS_MARKS_error').text('');
      $('#PREV_BOARD_UNI_error').text('');
      $('#PASSING_YEAR_error').text('');
      $('#SESSION_ID_error').text('');
      $('#CLASS_ID_error').text('');
      $('#SECTION_ID_error').text('');
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addstudent")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
               console.log(data)
               toastr.success(data,'Notice');
               $("#addstudent").get(0).reset();
              },
              error: function(error){
               console.log(error);
               toastr.error('Please Fill the Required Fields','Notice');
               var response = $.parseJSON(error.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
    }
      

              
      });
    });
</script>
@endsection