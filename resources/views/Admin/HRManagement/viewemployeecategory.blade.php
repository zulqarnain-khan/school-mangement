@extends('Admin.layout.master')
@section('content')
@section("content")

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="container">
            <div class="pt-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <h1>Campus Details</h1>
                </div>
                    
           {{--Table data display--}}         
           
                </div>
                <br>
                <br>
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">QUALIFICATION</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    <tbody id="displaydata">
                        
                      @foreach ($employees as $employee)
                      <tr id="row{{$employee->EMP_ID}}">
                        <td>{{$employee->EMP_ID}}</td>
                        <td>{{$employee->EMP_NAME}}</td>
                        <td>{{$employee->DESIGNATION_ID}}</td>
                        <td>{{$employee->QUALIFICATION}}</td>
                        <td><img src="{{asset('upload')}}/{{$employee['EMP_IMAGE']}}" onerror="this.src='https://via.placeholder.com/200'" alt="" style="width: 50px;height:50px;"></td>
                        <td>
                           <a href="editemployee/{{$employee->EMP_ID}}" class="btn btn-success editbtn"> Edit </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <a href="{{route('employee')}}" class="btn btn-primary">Add New Employee</a>
            </div>
        </div>
@endsection