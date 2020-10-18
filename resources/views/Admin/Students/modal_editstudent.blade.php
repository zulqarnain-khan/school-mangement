<form  id="editstudent" method="POST"  enctype="multipart/form-data" >
    {{csrf_field()}}

      <input type="hidden" name="STUDENT_ID" id="STUDENT_ID" value="{{ $student['STUDENT_ID'] }}">
     <div class="form-group">
      <label>Student Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Your Name" id="name" value="{{ $student['NAME'] }}">
    </div>

     <div class="form-group">
        <label>Father Name</label>
        <input type="text" class="form-control" name="FATHER_NAME" placeholder="Enter Your FATHER_NAME" id="FATHER_NAME" value="{{ $student['FATHER_NAME'] }}">
      </div>

      <div class="form-group">
        <label>Student Image</label>
        <br>
        <input type="file"  name="IMAGE"  id="IMAGE" accept="image/*">
        <div>
          <img src="{{ asset('upload') }}/{{$student['IMAGE']}}" width="100px" height="100px">
        </div>
      </div>

      <div class="form-group">
        <label for="">FATHER CONTACT:</label>
        <input type="text" name="FATHER_CONTACT" id="FATHER_CONTACT" class="form-control" placeholder="Enter Url" value="{{ $student['FATHER_CONTACT'] }}" >
      </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Are You Sure</button>
    </div>
</form>
