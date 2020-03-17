<div class="sidebar" id="sidebar"> <!-- sidebar -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ areActiveRoutes(['dashboard'])}}">
                    <a href="{{route('dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li class="menu-title">Academic Mangement</li>
                <li class="{{ areActiveRoutes(['class.index','class.create','class.edit'])}}">
                    <a href="{{route('class.index')}}" class="{{ areActiveRoutes(['class.index','class.create','class.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Course / Classes</span>
                    </a>
                </li>
                <li class="{{ areActiveRoutes(['section.index','section.create','section.edit'])}}">
                    <a href="{{route('section.index')}}" class="{{ areActiveRoutes(['section.index','section.create','section.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Section</span> 
                    </a>
                </li>

                <li class="submenu ">
                    <a href="javascript:;" class="{{ areActiveRoutes(['subject.index','subject.create','subject.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Subject</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li class="{{ areActiveRoutes(['subject.index'])}}"><a href="{{route('subject.index')}}">All Subject</a></li>
                        <li><a href="#">Add Subject</a></li>
                        <li><a href="#">Assign Subject</a></li>
                        <li><a href="#">Subject Allocation</a></li>
                       
                    </ul>
                </li>
                <li class="menu-title">Staff Mangement</li>

                <li class="{{ areActiveRoutes(['staff.index','staff.create','staff.edit'])}}">
                    <a href="{{route('staff.index')}}" class="{{ areActiveRoutes(['staff.index','staff.create','staff.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Staff</span> 
                    </a>
                </li>
                <li class="{{ areActiveRoutes(['role.index','role.create','role.edit'])}}">
                    <a href="{{route('role.index')}}" class="{{ areActiveRoutes(['role.index','role.create','role.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Roles</span> 
                    </a>
                </li>
                 <li class="{{ areActiveRoutes(['permission.index','permission.create','permission.edit'])}}">
                    <a href="{{route('permission.index')}}" class="{{ areActiveRoutes(['permission.index','permission.create','permission.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Permission</span> 
                    </a>
                </li>
                <li class="menu-title">Hr Mangement</li>
                <li class="{{ areActiveRoutes(['hr.index','hr.create','hr.edit'])}}">
                    <a href="{{route('hr.index')}}" class="{{ areActiveRoutes(['hr.index','hr.create','hr.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> HR</span> 
                    </a>
                </li>
                <li class="{{ areActiveRoutes(['job.index','job.create','job.edit'])}}">
                    <a href="{{route('job.index')}}" class="{{ areActiveRoutes(['job.index','job.create','job.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Jobs</span> 
                    </a>
                </li>
                <li class="{{ areActiveRoutes(['application.index','application.create','application.edit'])}}">
                    <a href="{{route('application.index')}}" class="{{ areActiveRoutes(['application.index','application.create','application.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Application</span> 
                    </a>
                </li>
                <li class="{{ areActiveRoutes(['interview.index','interview.create','interview.edit'])}}">
                    <a href="{{route('interview.index')}}" class="{{ areActiveRoutes(['interview.index','interview.create','interview.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Interview</span> 
                    </a>
                </li>
                 <li class="{{ areActiveRoutes(['application-status.index','application-status.create','application-status.edit'])}}">
                    <a href="{{route('application-status.index')}}" class="{{ areActiveRoutes(['application-status.index','application-status.create','application-status.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Job Status</span> 
                    </a>
                </li>
                
                <li class="menu-title">Student Mangement</li>
                
                <li class="{{ areActiveRoutes(['student-category.index','student-category.create','student-category.edit'])}}">
                    <a href="{{route('student-category.index')}}" class="{{ areActiveRoutes(['student-category.index','student-category.create','student-category.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> 
                        <span> Student Category</span> 
                    </a>
                </li>
               
                <li class="submenu">
                    <a href="javascript:;"><i class="fa fa-user" aria-hidden="true"></i> <span> Student Admission</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        
                        <li class="{{ areActiveRoutes(['student-registeration.create'])}}"><a href="{{route('student-registeration.create')}}">Student Admission</a></li>
                        <li><a href="#">All Student</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Student List</span> <span class="menu-arrow"></span></a>
                    
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Attendance</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="#"> Student Attendance</a></li>
                        <li><a href="#">Teacher Attendance</a></li>
                        <li><a href="#">Other Faculty Attendance</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Guardians</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="#"> Guardians List</a></li>
                        <li><a href="#">Add Guardians</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Roll No</span> <span class="menu-arrow"></span></a>
                    
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Student Gate Pass</span> <span class="menu-arrow"></span></a>
                    
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Student iD Card</span> <span class="menu-arrow"></span></a>
                    
                </li>
                <li class="menu-title">Other</li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i> <span>Apps</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html"><span>Compose Mail</span></a></li>
                                <li>
                                    <a href="inbox.html"> <span> Inbox</span> </a>
                                </li>
                                <li><a href="mail-view.html"><span>Mailview</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="chat.html"> Chat <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contacts.html"> Contacts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" style="width: 80%; display: inline-block;"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</a>
                </li>
                <li>
                    <a href="exam-list.html"><i class="fa fa-table" aria-hidden="true"></i> Exam list</a>
                </li>
                <li>
                    <a href="holidays.html"><i class="fa fa-tasks" aria-hidden="true"></i> Holidays</a>
                </li>
                <li>
                    <a href="calendar.html"><i class="fa fa-table" aria-hidden="true"></i> Events</a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-book" aria-hidden="true"></i><span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="provident-fund.html">Provident Fund</a></li>
                        <li><a href="taxes.html">Taxes</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-money" aria-hidden="true"></i><span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog View</a></li>
                        <li><a href="add-blog.html">Add Blog</a></li>
                        <li><a href="edit-blog.html">Edit Blog</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="noti-dot"><i class="fa fa-rocket" aria-hidden="true"></i> <span>Management </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="#" class="noti-dot"><span> Employees</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="all-employees.html">All Employees</a></li>
                                <li><a href="holidays.html">Holidays</a></li>
                                <li><a href="leaves.html"><span>Leave Requests</span> <span class="badge badge-pill bg-primary float-right">1</span></a></li>
                                <li><a href="attendance.html">Attendance</a></li>
                                <li><a href="departments.html">Departments</a></li>
                                <li><a href="designations.html">Designations</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="activities.html">Activities</a>
                        </li>
                        <li>
                            <a  href="users.html">Users</a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="expense-reports.html"> Expense Report </a></li>
                                <li><a href="invoice-reports.html"> Invoice Report </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="settings.html"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                </li>
                <li class="menu-title">UI Elements</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-laptop" aria-hidden="true"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="uikit.html">UI Kit</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="tabs.html">Tabs</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-edit" aria-hidden="true"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="basic-inputs.html">Basic Input</a></li>
                        <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                        <li><a href="form-input-groups.html">Input Groups</a></li>
                        <li><a href="form-horizontal.html">Horizontal Form</a></li>
                        <li><a href="form-vertical.html">Vertical Form</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-table" aria-hidden="true"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatables.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-columns" aria-hidden="true"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="change-password2.html"> Change Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                        <li><a href="profile.html"> Profile </a></li>
                        <li><a href="gallery.html"> Gallery </a></li>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                        <li><a href="blank-page.html"> Blank Page </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>