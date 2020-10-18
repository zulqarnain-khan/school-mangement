   <!-- ========== Left Sidebar Start ========== -->
   <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="{{route('admin')}}" class="waves-effect">
                                    <i class="mdi mdi-home"></i><span class="badge badge-primary float-right">3</span> <span> Dashboard </span>
                                </a>
                            </li>
                      

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> Students <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('student')}}">Student Admission</a></li>
                                    <li><a href="{{route('showstudent')}}">Student Details</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Academics <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="{{route('session-batch')}}">Session/Batches</a></li>
                                    <li><a href="{{route('class')}}">Classes</a></li>
                                    <li><a href="{{route('section')}}">Section</a></li>
                                    <li><a href="{{route('subject')}}">Subject</a></li>
                                    <li><a href="{{route('sgroup')}}">Subject Group Name</a></li>
                                    <li><a href="{{route('subjectgroup')}}">Subject Group</a></li>
                                 
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-black-mesa"></i> <span> Admission Withdraw <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="components-lightbox.html">With-Draw Register</a></li>
                                    <li><a href="components-rangeslider.html">Register Managment</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard"></i><span> Correspondence <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="form-elements.html">Complaint Letter Managment</a></li>
                                    <li><a href="form-validation.html">Showcause Managment</a></li>
                                    <li><a href="form-advanced.html">Notification</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-finance"></i><span> Fee Management <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('feecategory')}}">Define Fee Category</a></li>
                                    <li><a href="{{route('fee-structure')}}">Define Fee Structure</a></li>
                                    <li><a href="charts-chartjs.html">Apply Fee</a></li>
                                    <li><a href="charts-flot.html">Fee Collection</a></li>
                                    <li><a href="charts-c3.html">Print Fee Voucher</a></li>
                                    <li><a href="charts-morris.html">Fee register</a></li>
                                    <li><a href="charts-other.html">Family Accounts</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-settings"></i><span> Student Attendance <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="tables-basic.html">Applications</a></li>
                                    <li><a href="{{route('student-attendance')}}">Attendance Managment</a></li>
                                    <li><a href="{{route('non-present-students')}}">Non-Present Report</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> HR Managment  <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span> </a>
                                <ul class="submenu">
                                    <li><a href="{{route('employee')}}">Employee Categories</a></li>
                                    <li><a href="{{route('showemployee')}}">Employee Managment</a></li>
                                    <li><a href="icons-fontawesome.html">Employee Attendance</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-maps"></i><span> Accounts  <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span></a>
                                <ul class="submenu">
                                    <li><a href="maps-google.html"> Assets Category</a></li>
                                    <li><a href="maps-vector.html"> Assets Managamnet</a></li>
                                </ul>
                            </li>
                            
                            <li>
                 
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-page-layout-sidebar-left"></i><span> Certificate Managment <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="layouts-dark-sidebar.html">SLC</a></li>
                                    <li><a href="layouts-sidebar-user.html">Experience</a></li>
                                    <li><a href="layouts-collapsed.html">Curricular </a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Settings</li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span>System Settings <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="pages-login.html">General Settings</a></li>
                                    <li><a href="pages-register.html">Roles/Permission</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

    </div> 
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <!-- <h4 class="page-title">Blank page</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Agroxa</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Blank page</li>
                        </ol>

                        <div class="state-information d-none d-sm-block">
                            <div class="state-graph">
                                <div id="header-chart-1"></div>
                                <div class="info">Balance $ 2,317</div>
                            </div>
                            <div class="state-graph">
                                <div id="header-chart-2"></div>
                                <div class="info">Item Sold 1230</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>