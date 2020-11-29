<div class="sidebar" id="sidebar"> <!-- sidebar -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ areActiveRoutes(['dashboard'])}}">
                    <a href="{{route('dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>




                @if(Auth::user()->can('Franchise Applicant')  )
                <li class="submenu ">
                    <a href="javascript:;" class="{{ areActiveRoutes(['subject.index','subject.create','subject.edit','section.index','section.create','section.edit','class.index','class.create','class.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Franchise Management</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        @if(Auth::user()->can('Franchise Applicant')  )
                        <li class="{{ areActiveRoutes(['franchise-applicant.create','franchise-applicant.index'])}}">
                            <a href="{{route('franchise-applicant.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                                <span>Franchise Applicant </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif


                <li class="submenu ">
                    <a href="javascript:;" class="{{ areActiveRoutes(['branch-detail.index','branch-class.create','branch-class.edit' ,'branch-detail.index','branch-detail.create','branch-detail.store','branch-monthly-fee.index','branch-monthly-fee.create','branch-monthly-fee.store','branch-detail-monthly.index','branch-detail-monthly.create','branch-detail-monthly.store','branch-status.index','branch-status.create','branch-status.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Branch Management</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">



                        @if(Auth::user()->can('Branch Record') || Auth::user()->can('Branch-Create') || Auth::user()->can('Branch-Edit') )
                        <li class="{{ areActiveRoutes(['branch.index','branch.create','branch.edit'])}}">
                            <a href="{{route('branch.index')}}" class="{{ areActiveRoutes(['branch.index','branch.create','branch.edit'])}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span> Branch Setting</span>
                            </a>
                        </li>
                        @endif


                        @if(Auth::user()->can('Branch Detail') )

                        <li class="{{ areActiveRoutes(['branch-status.index','branch-status.create','branch-status.edit'])}}">
                            <a href="{{route('branch-status.index')}}" class="{{ areActiveRoutes(['branch-status.index','branch-status.create','branch-status.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Branch Status</span>
                            </a>
                        </li>

                        <li class="{{ areActiveRoutes(['branch-detail.index','branch-detail.create','branch-detail.store'])}}">
                            <a href="{{route('branch-detail.create')}}" class="{{ areActiveRoutes(['branch-detail.index','branch-detail.create','branch-detail.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Branch Detail</span>
                            </a>
                        </li>

                        <li class="{{ areActiveRoutes(['branch-detail-monthly.index','branch-detail-monthly.create','branch-detail-monthly.store'])}}">
                            <a href="{{route('branch-detail-monthly.create')}}" class="{{ areActiveRoutes(['branch-detail-monthly.index','branch-detail-monthly.create','branch-detail-monthly.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Branch Montly Detail</span>
                            </a>
                        </li>

                        <li class="{{ areActiveRoutes(['branch-monthly-fee.index','branch-monthly-fee.create','branch-monthly-fee.store'])}}">
                            <a href="{{route('branch-monthly-fee.create')}}" class="{{ areActiveRoutes(['branch-monthly-fee.index','branch-monthly-fee.create','branch-monthly-fee.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Branch Fee Detail</span>
                            </a>
                        </li>


                        <li class="{{ areActiveRoutes(['branch-detail.index','branch-detail.create','branch-detail.edit'])}}">
                            <a href="{{route('branch-detail.index')}}" class="{{ areActiveRoutes(['branch-detail.index','branch-detail.create','branch-detail.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Full Detail</span>
                            </a>
                        </li>
                        @endif





                        @if(Auth::user()->can('Branch-Class-Record') || Auth::user()->can('Branch-Class-Record') )
                        <li class="{{ areActiveRoutes(['branch-class.index','branch-class.create','branch-class.edit'])}}">
                            <a href="{{route('branch-class.index')}}" class="{{ areActiveRoutes(['branch-class.index','branch-class.create','branch-class.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Branch has Class</span>
                            </a>
                        </li>
                        @endif


                        @if(Auth::user()->can('Admission Package') || Auth::user()->can('Admission Package Edit') )
                        <li class="{{ areActiveRoutes(['admission-package.index','admission-package.create','admission-package.edit'])}}">
                            <a href="{{route('admission-package.index')}}" class="{{ areActiveRoutes(['admission-package.index','admission-package.create','admission-package.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Addmission Package</span>
                            </a>
                        </li>
                        @endif
                        <li class="{{ areActiveRoutes(['branch-performance.index','branch-performance.edit','branch-performance.create','branch-performance.store'])}}">
                            <a href="{{route('branch-performance.index')}}" class="{{ areActiveRoutes(['branch-performance.index','branch-performance.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span>Branch Performance</span>
                            </a>
                        </li>
                        @if(Auth::user()->can('New Admission Status'))
                        <li class="{{ areActiveRoutes(['net-admission-status.index','net-admission-status.edit','net-admission-status.create','net-admission-status.store'])}}">
                            <a href="{{route('net-admission-status.index')}}" class="{{ areActiveRoutes(['net-admission-status.index','net-admission-status.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span>Net Admission</span>
                            </a>
                        </li>
                        @endif



                        <li class="{{ areActiveRoutes(['school.index','school.create','school.edit'])}}">
                            <a href="{{route('school.index')}}" class="{{ areActiveRoutes(['school.index','school.create','school.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> School</span>
                            </a>
                        </li>



                        <li class="{{ areActiveRoutes(['bank.index','bank.create','bank.edit'])}}">
                            <a href="{{route('bank.index')}}" class="{{ areActiveRoutes(['bank.index','bank.create','bank.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Bank</span>
                            </a>
                        </li>

                        @if(Auth::user()->can('Class Record') || Auth::user()->can('Class-Create') || Auth::user()->can('Class-Edit') || Auth::user()->can('Section Record') || Auth::user()->can('Section-Create') || Auth::user()->can('Section-Edit') || Auth::user()->can('Subject Record') || Auth::user()->can('Subject-Create') || Auth::user()->can('Subject-Edit'))
                        <li class="submenu ">
                            <a href="javascript:;" class="{{ areActiveRoutes(['subject.index','subject.create','subject.edit','section.index','section.create','section.edit','class.index','class.create','class.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Academic Setting</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                @if(Auth::user()->can('Class Record') || Auth::user()->can('Class-Create') || Auth::user()->can('Class-Edit') )
                                <li class="{{ areActiveRoutes(['class.index','class.create','class.edit'])}}">
                                    <a href="{{route('class.index')}}" class="{{ areActiveRoutes(['class.index','class.create','class.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                        <span> Course / Classes</span>
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->can('Section Record') || Auth::user()->can('Section-Create') || Auth::user()->can('Section-Edit') )
                                <li class="{{ areActiveRoutes(['section.index','section.create','section.edit'])}}">
                                    <a href="{{route('section.index')}}" class="{{ areActiveRoutes(['section.index','section.create','section.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                                        <span> Section</span>
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->can('Subject Record') || Auth::user()->can('Subject-Create') || Auth::user()->can('Subject-Edit') )
                                <li class="submenu ">
                                    <a href="javascript:;" class="{{ areActiveRoutes(['subject.index','subject.create','subject.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Subject</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                      @if(Auth::user()->can('Subject Record')  || Auth::user()->can('Subject-Edit') )
                                      <li class="{{ areActiveRoutes(['subject.index'])}}"><a href="{{route('subject.index')}}">All Subject</a></li>
                                      @endif
                                      @if(Auth::user()->can('Subject-Create')  )
                                      <li><a href="javascript:;">Add Subject</a></li>
                                      @endif
                                      <li><a href="javascript:;">Assign Subject</a></li>
                                      <li><a href="javascript:;">Subject Allocation</a></li>

                                  </ul>
                              </li>
                              @endif
                          </ul>
                      </li>
                      @endif






                  </ul>
              </li>



              @if(Auth::user()->can('Admin Record') || Auth::user()->can('Admin-Create') || Auth::user()->can('Admin-Edit') || Auth::user()->can('Role Record') || Auth::user()->can('Role-Create') || Auth::user()->can('Role-Edit') || Auth::user()->can('Role-Delete') || Auth::user()->can('Permission Record') || Auth::user()->can('Permission Add') || Auth::user()->can('Permission Edit'))
              <li class="submenu ">
                <a href="javascript:;" class="{{ areActiveRoutes(['staff.index','staff.create','staff.edit','role.index','role.create','role.edit','permission.index','permission.create','permission.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> User Management</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">

                    @if(Auth::user()->can('Admin Record') || Auth::user()->can('Admin-Create') || Auth::user()->can('Admin-Edit') )
                    <li class="{{ areActiveRoutes(['staff.index','staff.create','staff.edit'])}}">
                        <a href="{{route('staff.index')}}" class="{{ areActiveRoutes(['staff.index','staff.create','staff.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> Staff</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->can('Role Record') || Auth::user()->can('Role-Create') || Auth::user()->can('Role-Edit') || Auth::user()->can('Role-Delete') )


                    <li class="{{ areActiveRoutes(['role.index','role.create','role.edit'])}}">
                        <a href="{{route('role.index')}}" class="{{ areActiveRoutes(['role.index','role.create','role.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> Roles</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->can('Permission Record') || Auth::user()->can('Permission Add') || Auth::user()->can('Permission Edit') )
                    <li class="{{ areActiveRoutes(['permission.index','permission.create','permission.edit'])}}">
                        <a href="{{route('permission.index')}}" class="{{ areActiveRoutes(['permission.index','permission.create','permission.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> Permission</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(Auth::user()->can('HR Dashboard') || Auth::user()->can('HR Dashboard') || Auth::user()->can('HR Dashboard') || Auth::user()->can('HR Dashboard') || Auth::user()->can('Job Record') || Auth::user()->can('Job-Add') || Auth::user()->can('Job-Edit') || Auth::user()->can('Job-Delete') || Auth::user()->can('Job Application') || Auth::user()->can('Interview Conduct') || Auth::user()->can('Interview Record')  || Auth::user()->can('Employee Record') || Auth::user()->can('Employee Add') || Auth::user()->can('Employee Edit') || Auth::user()->can('Employee Attandance Record') || Auth::user()->can('Employee Attandance Add') || Auth::user()->can('Employee Attandance Edit') || Auth::user()->can('Application-status Record') || Auth::user()->can('Application-status Create') || Auth::user()->can('Application-status Edit')  )
            <li class="submenu ">
                <a href="javascript:;" class="{{ areActiveRoutes(['hr.index','hr.create','hr.edit','job.index','job.create','job.edit','application.index','application.create','application.edit','interview.index','interview.create','interview.edit','application-status.index','application-status.create','application-status.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> HR Management</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li class="menu-title">
                        <span>Hr </span>
                    </li>
                    @if(Auth::user()->can('HR Dashboard') || Auth::user()->can('HR Dashboard') || Auth::user()->can('HR Dashboard') || Auth::user()->can('HR Dashboard') )
                    <li class="{{ areActiveRoutes(['hr.index','hr.create','hr.edit'])}}">
                        <a href="{{route('hr.index')}}" class="{{ areActiveRoutes(['hr.index','hr.create','hr.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> HR</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->can('Job Record') || Auth::user()->can('Job-Add') || Auth::user()->can('Job-Edit') || Auth::user()->can('Job-Delete') )
                    <li class="{{ areActiveRoutes(['job.index','job.create','job.edit'])}}">
                        <a href="{{route('job.index')}}" class="{{ areActiveRoutes(['job.index','job.create','job.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> Jobs</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->can('Job Application') || Auth::user()->can('Interview Conduct') )
                    <li class="{{ areActiveRoutes(['application.index','application.create','application.edit'])}}">
                        <a href="{{route('application.index')}}" class="{{ areActiveRoutes(['application.index','application.create','application.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> Application</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->can('Interview Record')  )
                    <li class="{{ areActiveRoutes(['interview.index','interview.create','interview.edit'])}}">
                        <a href="{{route('interview.index')}}" class="{{ areActiveRoutes(['interview.index','interview.create','interview.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                            <span> Interview</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->can('Employee Record') || Auth::user()->can('Employee Add') || Auth::user()->can('Employee Edit') )

                    <li class="submenu">
                        <a href="javascript:;" class="{{ areActiveRoutes(['department.create','department.store','department.index','designation.create','designation.store','designation.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Employee  </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">

                            <li class="{{ areActiveRoutes(['employee.index','employee.create','employee.edit'])}}"><a href="{{route('employee.index')}}"> Employee</a></li>

                            <li class="{{ areActiveRoutes(['employee-list.index','employee-list.create','employee-list.edit'])}}"><a href="{{route('employee-list.index')}}"> Employee List</a></li>
                            <li class="{{ areActiveRoutes(['employee-salary-list.index','employee-salary-list.create','employee-salary-list.edit'])}}"><a href="{{route('employee-salary-list.index')}}"> Employee Salary List</a></li>


                        </ul>
                    </li>


                    @endif
                    <li class="submenu">
                       <a href="javascript:;"><i class="la la-graduation-cap"></i>  <span> Performance  </span>  <span class="menu-arrow"></span></a>
                       <ul style="display: none;">
                         <li><a href="{{route('performance-indicator.index')}}"> Performance Indicator  </a></li>
                         <li><a href="{{route('performance.index')}}"> Performance Review  </a></li>
                         <!-- <li><a href="{{route('performance-list.index')}}"> Performance  </a></li> -->
                     </ul>
                 </li>


                 <li><a href="{{route('holidays.index')}}"><i class="la la-bullhorn"></i>  <span>Holidays </span></a></li>
                 <li><a href="{{route('leaves.index')}}"><i class="la la-bullhorn"></i>  <span>Leaves (Admin) </span> <span class="badge badge-pill bg-primary float-right">1 </span></a></li>
                 <li><a href="{{route('leaves-requests.index')}}"><i class="la la-bullhorn"></i>  <span>Leaves (Employee)</span> </a></li>
                 <li><a href="{{route('leaves-setting.index')}}"><i class="la la-bullhorn"></i>  <span>Leave Settings </span></a></li>



                 @if(Auth::user()->can('Employee Attandance Record') || Auth::user()->can('Employee Attandance Add') || Auth::user()->can('Employee Attandance Edit')  )
                 <li class="{{ areActiveRoutes(['employee-attandance.index','employee-attandance.create','employee-attandance.edit'])}}">
                    <a href="{{route('employee-attandance.index')}}" class="{{ areActiveRoutes(['employee-attandance.index','employee-attandance.create','employee-attandance.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Attandance</span>
                    </a>
                </li>
                @endif

                <li class="{{ areActiveRoutes(['employee-card.index','employee-card.create','employee-card.edit'])}}">
                    <a href="{{route('employee-card.index')}}" class="{{ areActiveRoutes(['employee-card.index','employee-card.create','employee-card.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Employee Card</span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="javascript:;" class="{{ areActiveRoutes(['advance-request.create','advance-request.store','advance-request.index','advance-approval.create','advance-approval.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Advance </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">

                        <li class="{{ areActiveRoutes(['advance-request.index','advance-request.create','advance-request.edit'])}}"><a href="{{route('advance-request.index')}}"> Advance Request</a></li>
                        <li class="{{ areActiveRoutes(['advance-approval.index','advance-approval.create','advance-approval.edit'])}}"><a href="{{route('advance-approval.index')}}"> Approval Advance</a></li>
                        <li class="{{ areActiveRoutes(['advance.index','advance.create','advance.edit'])}}"><a href="{{route('advance.index')}}"> Advance</a></li>



                    </ul>
                </li>


                <li class="submenu">
                    <a href="#" class="{{ areActiveRoutes(['department.create','department.store','department.index','designation.create','designation.store','designation.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Departmentalization </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">

                        <li class="{{ areActiveRoutes(['department.index','department.create','department.edit'])}}"><a href="{{route('department.index')}}"> Department</a></li>
                        <li class="{{ areActiveRoutes(['designation.index','designation.create','designation.edit'])}}"><a href="{{route('designation.index')}}"> Designation</a></li>
                        <li class="{{ areActiveRoutes(['designation.index','designation.create','designation.edit'])}}"><a href="{{route('designation.index')}}"> Shift</a></li>


                    </ul>
                </li>




                <li class="submenu">
                 <a href="#"><i class="la la-files-o"></i>  <span> Accounts  </span>  <span class="menu-arrow"></span></a>
                 <ul style="display: none;">
                   <li><a href="{{route('income-tax.index')}}">Income Tax</a></li>
                   <li><a href="{{route('payroll-item.index')}}"> payroll-item  </a></li>
               </ul>
           </li>

           <li class="submenu">
             <a href="#"><i class="la la-money"></i>  <span> Salary Management  </span>  <span class="menu-arrow"></span></a>
             <ul style="display: none;">
              <li><a href="{{route('salary-post.index')}}">Salary Post</a></li>
              <li><a href="{{route('salary-post-approval.index')}}"> Employee Salary Approval  </a></li>
              <li><a href="{{route('salary-sheet.index')}}"> Salary Sheet </a></li>
              <li><a href="{{route('pay-slip.index')}}"> Payslip  </a></li>



          </ul>
      </li>



      @if(Auth::user()->can('Application-status Record') || Auth::user()->can('Application-status Create') || Auth::user()->can('Application-status Edit')  )
      <li class="{{ areActiveRoutes(['application-status.index','application-status.create','application-status.edit'])}}">
        <a href="{{route('application-status.index')}}" class="{{ areActiveRoutes(['application-status.index','application-status.create','application-status.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
            <span> Job Status</span>
        </a>
    </li>
    @endif

</ul>
</li>
@endif


<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['student-registration.create','students.edit','transfer.index','transfer.create','transfer.edit','students.index','left-student.create','left-student.edit','branch_student_left_report','approval-left-student.create','approval-left-student.store','approval-left-student.index','approveBranchWiseLeft','re-admission.index.index','re-admission.index.edit','re-admission.create','student-freeze.index','student-freeze.edit','student-freeze.create'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Student Management</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">
        @if(Auth::user()->can('Student Category Record') || Auth::user()->can('Student Category Add') || Auth::user()->can('Student Category Edit') )
        <li class="{{ areActiveRoutes(['student-category.index','student-category.create','student-category.edit'])}}">
            <a href="{{route('student-category.index')}}" class="{{ areActiveRoutes(['student-category.index','student-category.create','student-category.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Student Category</span>
            </a>
        </li>

        @endif

        @if(Auth::user()->can('Student Admission Record') || Auth::user()->can('Student Addmission Add') || Auth::user()->can('Student Edit')  )
        <li class="submenu">
            <a href="#" class="{{ areActiveRoutes(['student-registration.create','student-registration.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Admission</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">

                <li class="{{ areActiveRoutes(['initial-admission.index'])}}">
                    <a href="{{route('initial-admission.index')}}" class="{{ areActiveRoutes(['initial-admission.index'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                        <span>Initial Admission</span>
                    </a>
                </li>


                <li class="{{ areActiveRoutes(['student-registration.create'])}}">
                    <a href="{{route('student-registration.create')}}" class="{{ areActiveRoutes(['student-registration.create'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                        <span>Add Student</span>
                    </a>
                </li>

                <li class="{{ areActiveRoutes(['student-registration.index'])}}">
                    <a href="{{route('student-registration.index')}}" class="{{ areActiveRoutes(['student-registration.index'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                        <span> New Students List</span>
                    </a>
                </li>

                <li class="{{ areActiveRoutes(['edit-student.index'])}}">
                    <a href="{{route('edit-student.index')}}" class="{{ areActiveRoutes(['edit-student.index'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Edit Student</span>
                    </a>
                </li>

            </ul>
        </li>
        @endif




        @if(Auth::user()->can('Student Record')  )
        <li class="{{ areActiveRoutes(['students.index','students.edit'])}}">
            <a href="{{route('students.index')}}" class="{{ areActiveRoutes(['students.index'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> All Student</span>
            </a>
        </li>
        @endif



        @if(Auth::user()->can('Student-Freeze') || Auth::user()->can('Student-Freeze Report') )
        <li class="submenu" class="{{ areActiveRoutes(['student-freeze.index','student-freeze.edit','student-freeze.create'])}}">
            <a href="#" class="{{ areActiveRoutes(['student-freeze.index','student-freeze.edit','student-freeze.create'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Student-Freeze</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;" class="{{ areActiveRoutes(['student-freeze.index','student-freeze.edit','student-freeze.create'])}}">
                @if(Auth::user()->can('Student-Freeze') )
                <li class="{{ areActiveRoutes(['student-freeze.store'])}}"><a href="{{route('student-freeze.create')}}"> Student-Freeze </a></li>
                @endif
                @if(Auth::user()->can('Student-Freeze Report') )
                <li class="{{ areActiveRoutes(['student-freeze.index'])}}"><a href="{{route('student-freeze.index')}}"> Student-Freeze Report</a></li>
                @endif


                @if(Auth::user()->can('Student-Freeze') )
                <li class="{{ areActiveRoutes(['student-unfreeze.index'])}}"><a href="{{route('student-unfreeze.index')}}"> Student-UnFreeze </a></li>
                @endif

            </ul>
        </li>
        @endif


        @if(Auth::user()->can('Student-left') || Auth::user()->can('Student-left Report') || Auth::user()->can('Student-left Approval') || Auth::user()->can('Student-left Approved Report') )
        <li class="submenu">
            <a href="#" class="{{ areActiveRoutes(['left-student.create','left-student.edit','branch_student_left_report','approval-left-student.create','approval-left-student.store','approveBranchWiseLeft','approval-left-student.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Student Left</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
                @if(Auth::user()->can('Student-left') )
                <li class="{{ areActiveRoutes(['left-student.store'])}}"><a href="{{route('left-student.create')}}"> Student Left</a></li>
                <li class="{{ areActiveRoutes(['left-student.index' ,'branch_student_left_report'])}}"><a href="{{route('left-student.index')}}"> Student Left Record</a></li>
                <li class="{{ areActiveRoutes(['approval-left-student.create','approval-left-student.store','approveBranchWiseLeft'])}}"><a href="{{route('approval-left-student.create')}}"> Student Left Approval</a></li>
                <li class="{{ areActiveRoutes(['approval-left-student.index'])}}"><a href="{{route('approval-left-student.index')}}"> Approved Left Record </a></li>
                @endif
            </ul>
        </li>
        @endif
        @if(Auth::user()->can('Student-left') || Auth::user()->can('Student-left Report') || Auth::user()->can('Student-left Approval') || Auth::user()->can('Student-left Approved Report') )
        <li class="submenu">
            <a href="#" class="{{ areActiveRoutes(['transfer.create','transfer.store','transfer.index','branch_student_transfer_report','approval-transfer-student.index','approval-transfer-student.edit','approval-transfer-student.index','approval-transfer-student.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Student Transfer</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
                <li class="{{ areActiveRoutes(['transfer.create','transfer.store'])}}"><a href="{{route('transfer.create')}}"> Transfer</a></li>

                <li class="{{ areActiveRoutes(['transfer.index','branch_student_transfer_report'])}}"><a href="{{route('transfer.index')}}"> Transfer Record</a></li>

                <li class="{{ areActiveRoutes(['approval-transfer-student.index','approval-transfer-student.edit'])}}"><a href="{{route('approval-transfer-student.index')}}"> Student Transfer Approval</a></li>
                <li class="{{ areActiveRoutes(['approval-transfer-student.create'])}}"><a href="{{route('approval-transfer-student.create')}}">Student transfer Record</a></li>
            </ul>
        </li>
        @endif

        @if(Auth::user()->can('Student Card')  )

        <li class="{{ areActiveRoutes(['card.index','card.edit','card.create','card.store'])}}">
            <a href="{{route('card.index')}}" class="{{ areActiveRoutes(['card.index','card.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span>Student Card</span>
            </a>
        </li>

        @endif





        <li class="{{ areActiveRoutes(['branch-performance.index','branch-performance.edit','branch-performance.create','branch-performance.store'])}}">
            <a href="{{route('branch-performance.index')}}" class="{{ areActiveRoutes(['branch-performance.index','branch-performance.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span>Branch Performance</span>
            </a>
        </li>


        <li class="{{ areActiveRoutes(['class-list.index','class-list.edit','class-list.create','class-list.store'])}}">
            <a href="{{route('class-list.index')}}" class="{{ areActiveRoutes(['class-list.index','class-list.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span>Class List</span>
            </a>
        </li>

        <li class="{{ areActiveRoutes(['attendance-list.create','attendance-list.store'])}}">
            <a href="{{route('attendance-list.index')}}" class="{{ areActiveRoutes(['attendance-list.index.index','attendance-list.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span>Attendance  List</span>
            </a>
        </li>

        <li class="submenu">
            <a href="javascript:;" class="{{ areActiveRoutes(['attendance.index.index','attendance.index.edit','attendance.create'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Attendance</span> <span class="menu-arrow"></span>
            </a>
            <ul class="list-unstyled" style="display: none;">
               <li class="{{ areActiveRoutes(['attendance.index.index','attendance.store'])}}"><a href="{{route('attendance.index')}}"> Machine Attendance</a></li>


               <li class="{{ areActiveRoutes(['manual-attendance.index','manual-attendance.store'])}}"><a href="{{route('manual-attendance.index')}}"> Manual Attendance</a></li>

               <li class="{{ areActiveRoutes(['attendance-report.index','attendance-report.store'])}}"><a href="{{route('attendance-report.index')}}"> Attendance Report</a></li>



           </ul>
       </li>

       <li class="{{ areActiveRoutes(['student-edit.index.index','student-edit.index.edit','student-edit.create'])}}">
        <a href="{{route('student-edit.index')}}" class="{{ areActiveRoutes(['student-edit.index.index','student-edit.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
            <span>Student Bulk Edit</span>
        </a>
    </li>



    <li class="{{ areActiveRoutes(['attendance.index.index','attendance.index.edit','attendance.create'])}}">
        <a href="{{route('attendance.index')}}" class="{{ areActiveRoutes(['attendance.index.index','attendance.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
            <span>Attendance</span>
        </a>
    </li>






    <li class="submenu">
            <a href="#" class="{{ areActiveRoutes(['re-admission.index.index','re-admission.index.edit','re-admission.create'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Re-Admission</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
                <li class="{{ areActiveRoutes(['re-admission.index.index','re-admission.store'])}}"><a href="{{route('re-admission.index')}}"> Re-Admission</a></li>

                <li class="{{ areActiveRoutes(['re-admission-report.index','re-admission-report.store'])}}"><a href="{{route('re-admission-report.index')}}"> Re-Admission Record</a></li>

                <li class="{{ areActiveRoutes(['approval-re-admission.index','approval-re-admission.edit'])}}"><a href="{{route('approval-re-admission.index')}}"> Re-Admission Approval</a></li>

                <!-- <li class="{{ areActiveRoutes(['approval-re-admission.create'])}}"><a href="{{route('approval-re-admission.create')}}">Re-Admission Approval Report</a></li> -->
            </ul>
        </li>



    @if(Auth::user()->can('Student Fee Structure')  )


    <li class="{{ areActiveRoutes(['fee-structure.index.index','fee-structure.index.edit','fee-structure.create'])}}">
        <a href="{{route('fee-structure.create')}}" class="{{ areActiveRoutes(['fee-structure.index.index','fee-structure.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
            <span>Student Fee Structure</span>
        </a>
    </li>

    @endif

</ul>
</li>

@if(Auth::user()->can('SMS Alert')  )
<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['sms-send.create','sms-send.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> SMS & E-Mails Alert</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">

        @if(Auth::user()->can('SMS Alert')  )
        <li class="{{ areActiveRoutes(['sms-send.create','sms-send.index'])}}">
            <a href="{{route('sms-send.create')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>SMS Alert</span>
            </a>
        </li>

        <li class="{{ areActiveRoutes(['fee-posted-sms.create','fee-posted-sms.index'])}}">
            <a href="{{route('fee-posted-sms.create')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>Fee Posted SMS</span>
            </a>
        </li>


        @endif
    </ul>
</li>
@endif

@if(Auth::user()->can('Fee Challen') || Auth::user()->can('Fee Deposit') || Auth::user()->can('Fee Post') || Auth::user()->can('Profit Loss') || Auth::user()->can('Balance Sheet')  || Auth::user()->can('Trial Balance')  || Auth::user()->can('Ledger')  || Auth::user()->can('General Voucher')  || Auth::user()->can('Bank Deposit') || Auth::user()->can('Bank Payment') || Auth::user()->can('Cash Payment') || Auth::user()->can('Cash Receipt') || Auth::user()->can('Account Record') || Auth::user()->can('Account Add') || Auth::user()->can('Account Edit')  || Auth::user()->can('statement')  || Auth::user()->can('Outstanding') || Auth::user()->can('Franchise Applicant') || Auth::user()->can('Correction') ||  Auth::user()->can('Correction Approval') || Auth::user()->can('Correction Approved Report') || Auth::user()->can('Paid List') || Auth::user()->can('Tentive List'))
<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['franchise-applicant.create','franchise-applicant.index','statement.create','statement.index','statement.store','account.create','account.index','feepost.create','feepost.index','fee-deposit.create','fee-deposit.index','fee-challan.create','fee-challan.index' ,'fee-challan.store','outstanding.create','outstanding.index','outstanding.store','cash-receipt.create','cash-receipt.index','cash-payment.create','cash-payment.index','bank-payment.create','bank-payment.index','bank-deposit.create','bank-deposit.index','ledger.create','ledger.index','ledger.edit','general-voucher.create','general-voucher.index','tentive.create','tentive.store','tentive.index','paid-account.create','paid-account.index','paid-account.store','fee-increment.create','fee-increment.index' ,'fee-increment.store','bank-outstanding.create','bank-outstanding.index','bank-outstanding.store','account-category.create','account-category.index','account-category.edit','bank-outstanding.create','bank-outstanding.index','bank-outstanding.store'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Account Management</span> <span class="menu-arrow"></span></a>

    <ul class="list-unstyled" style="display: none;">


        @if(Auth::user()->can('Outstanding')  || Auth::user()->can('Tentive List') || Auth::user()->can('Paid List') || Auth::user()->can('Correction') || Auth::user()->can('Correction Report') ||  Auth::user()->can('Correction Approval') || Auth::user()->can('Correction Approved Report') || Auth::user()->can('statement') || Auth::user()->can('statement') || Auth::user()->can('Fee Increment')  || Auth::user()->can('Tentive List') || Auth::user()->can('Outstanding') ||  Auth::user()->can('Paid List') || Auth::user()->can('Correction') || Auth::user()->can('Correction Report') ||  Auth::user()->can('Correction Approval') || Auth::user()->can('Correction Approved Report'))
        <li class="submenu">
            <a href="#" class="{{ areActiveRoutes(['feepost.create','feepost.index','fee-deposit.create','fee-deposit.index','fee-challan.create','fee-challan.index' ,'fee-challan.store','fee-increment.create','fee-increment.index' ,'fee-increment.store','statement.create','statement.index','statement.store','fee-increment.create','fee-increment.index' ,'fee-increment.store','outstanding.create','outstanding.index','outstanding.store','tentive.create','tentive.index','tentive.store','paid-account.create','paid-account.index','paid-account.store','approval-correction.create','approval-correction.store','approveBranchWise','approveBranchWise','approval-correction.index','correctionReport','individual-feepost.create','individual-feepost.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Fee</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">


                @if(Auth::user()->can('Fee Post') || Auth::user()->can('Fee Deposit') ||  Auth::user()->can('Fee Challen') )
                <li class="submenu">
                    <a href="javascript:;" class="{{ areActiveRoutes(['feepost.create','feepost.index','fee-deposit.create','fee-deposit.index','fee-challan.create','fee-challan.index' ,'fee-challan.store','fee-increment.create','fee-increment.index' ,'fee-increment.store','individual-feepost.create','individual-feepost.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Post Deposit</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">




                       @if(Auth::user()->can('Fee Post')  )
                       <li class="{{ areActiveRoutes(['feepost.create','feepost.index'])}}"><a href="{{route('feepost.index')}}"> Fee Post</a></li>
                       <li class="{{ areActiveRoutes(['individual-feepost.create','individual-feepost.index'])}}"><a href="{{route('individual-feepost.index')}}">Individual FeePost</a></li>
                       @endif
                       @if(Auth::user()->can('Fee Deposit') )
                       <li class="{{ areActiveRoutes(['fee-deposit.create','fee-deposit.index'])}}"><a href="{{route('fee-deposit.index')}}">Fee Deposit</a></li>
                       <li class="{{ areActiveRoutes(['jazzcash-file-read.create','jazzcash-file-read.index'])}}"><a href="{{route('jazzcash-file-read.index')}}">Jazzcash File Read</a></li>






                       @endif


                       @if(Auth::user()->can('Fee Challen')  )
                       <li class="{{ areActiveRoutes(['fee-challan.create','fee-challan.index' ,'fee-challan.store'])}}"><a href="{{route('fee-challan.create')}}">Fee Challan</a></li>
                       <li class="{{ areActiveRoutes(['blis-fee-challan.create','blis-fee-challan.index' ,'blis-fee-challan.store'])}}"><a href="{{route('blis-fee-challan.index')}}">BLIS Fee Challan</a></li>


                       @endif

                       @if(Auth::user()->can('Fee Increment')  )
                       <li class="{{ areActiveRoutes(['fee-increment.create','fee-increment.index' ,'fee-increment.store'])}}"><a href="{{route('fee-increment.create')}}">Fee Increment</a></li>
                       @endif
                   </ul>
               </li>
               @endif



               @if(Auth::user()->can('statement') || Auth::user()->can('Fee Increment')  )
               <li class="submenu">
                <a href="javascript:;" class="{{ areActiveRoutes(['statement.create','statement.index','statement.store','fee-increment.create','fee-increment.index' ,'fee-increment.store'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Student Fee</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">

                   <li class="">
                    <a href="javascript:;" class=""><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Change Update</span>
                    </a>
                </li>

                @if(Auth::user()->can('statement')  )
                <li class="{{ areActiveRoutes(['statement.create','statement.index','statement.store'])}}">
                    <a href="{{route('statement.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Statement</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can('Fee Increment')  )
                <li class="{{ areActiveRoutes(['fee-increment.create','fee-increment.index' ,'fee-increment.store'])}}"><a href="{{route('fee-increment.create')}}">Fee Increment</a></li>
                @endif
            </ul>
        </li>
        @endif

        @if(Auth::user()->can('Tentive List') || Auth::user()->can('Outstanding') ||  Auth::user()->can('Paid List') )
        <li class="submenu">
            <a href="javascript:;" class="{{ areActiveRoutes(['outstanding.create','outstanding.index','outstanding.store','tentive.create','tentive.index','tentive.store','paid-account.create','paid-account.index','paid-account.store'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Monthly Detail</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">

                @if(Auth::user()->can('Outstanding') )

                <li class="{{ areActiveRoutes(['outstanding.create','outstanding.index','outstanding.store'])}}">
                    <a href="{{route('outstanding.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Outstanding</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('Tentive List'))
                <li class="{{ areActiveRoutes(['tentive.create','tentive.index','tentive.store'])}}">
                    <a href="{{ route('tentive.create')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Tentative List</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('Paid List'))
                <li class="{{ areActiveRoutes(['paid-account.create','paid-account.index','paid-account.store'])}}">
                    <a href="{{ route('paid-account.create')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
                        <span> Paid List</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif


        @if(Auth::user()->can('Correction') || Auth::user()->can('Correction Report') ||  Auth::user()->can('Correction Approval') || Auth::user()->can('Correction Approved Report') )
        <li class="submenu">
            <a href="javascript:;" class="{{ areActiveRoutes(['approval-correction.create','approval-correction.store','approveBranchWise','approveBranchWise','approval-correction.index','correctionReport'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Correction</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
               @if(Auth::user()->can('Correction')  )
               <li class="{{ areActiveRoutes(['correction.create','correction.store'])}}"><a href="{{route('correction.create')}}"> Correction</a></li>
               @if(Auth::user()->can('Correction Report')  )
               <li class="{{ areActiveRoutes(['correction.index','branch_correction_report'])}}">
                <a href="{{route('correction.index')}}"> Correction Report</a>
            </li>
            @endif

            @endif
            @if(Auth::user()->can('Correction Approval')  )
            <li class="{{ areActiveRoutes(['approval-correction.create','approval-correction.store','approveBranchWise'])}}"><a href="{{route('approval-correction.create')}}">Correction Approval </a></li>


            @endif
            @if(Auth::user()->can('Correction Approved Report')  )
            <li class="{{ areActiveRoutes(['approval-correction.index','correctionReport'])}}"><a href="{{route('approval-correction.index')}}">Approved Report</a></li>
            @endif
        </ul>
    </li>
    @endif
</ul>
</li>
@endif




@if(Auth::user()->can('Franchise Applicant')  )
<li class="{{ areActiveRoutes(['franchise-applicant.create','franchise-applicant.index'])}}">
    <a href="{{route('franchise-applicant.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span>Franchise Applicant </span>
    </a>
</li>
@endif






@if(Auth::user()->can('Bank Outstanding')  )
<li class="{{ areActiveRoutes(['bank-outstanding.create','bank-outstanding.index','bank-outstanding.store'])}}">
    <a href="{{route('bank-outstanding.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Bank Outstanding</span>
    </a>
</li>
@endif


@if(Auth::user()->can('Account Statement')  )
<li class="{{ areActiveRoutes(['account-statement.create','account-statement.index','account-statement.store'])}}">
    <a href="{{route('account-statement.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Account Statement</span>
    </a>
</li>
@endif


<li class="{{ areActiveRoutes(['fee-deposit-detail.create','fee-deposit-detail.index','fee-deposit-detail.edit'])}}">
    <a href="{{route('fee-deposit-detail.create')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Fee Deposit Detail</span>
    </a>
</li>

<li class="{{ areActiveRoutes(['account-category.create','account-category.index','account-category.edit'])}}">
    <a href="{{route('account-category.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Accounts Category</span>
    </a>
</li>


@if(Auth::user()->can('Account Record') || Auth::user()->can('Account Add') || Auth::user()->can('Account Edit')  )
<li class="{{ areActiveRoutes(['account.create','account.index'])}}">
    <a href="{{route('account.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Accounts</span>
    </a>
</li>

<li class="{{ areActiveRoutes(['bank-student-list.store','bank-student-list.index'])}}">
    <a href="{{route('bank-student-list.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Bank Student List</span>
    </a>
</li>
@endif

@if(Auth::user()->can('Checque Book Add') )
<li class="submenu">
    <a href="javascript:;" class="{{ areActiveRoutes(['bank-checque.create','bank-checque.index'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Checque</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">

        @if(Auth::user()->can('Checque Book Add')  )
        <li class="{{ areActiveRoutes(['bank-checque.create'])}}">
            <a href="{{route('bank-checque.create')}}"> Checque Book Add</a>
        </li>
        @endif
        @if(Auth::user()->can('Checques')  )
        <li class="{{ areActiveRoutes(['bank-checque.index'])}}"><a href="{{route('bank-checque.index')}}">Checques </a></li>
        @endif

    </ul>
</li>
@endif



@if(Auth::user()->can('Cash Receipt')  )
<li class="{{ areActiveRoutes(['cash-receipt.create','cash-receipt.index'])}}">
    <a href="{{route('cash-receipt.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Cash Receipt</span>
    </a>
</li>
@endif
@if(Auth::user()->can('Cash Payment')  )

<li class="{{ areActiveRoutes(['cash-payment.create','cash-payment.index'])}}">
    <a href="{{route('cash-payment.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Cash Payment</span>
    </a>
</li>
@endif
@if(Auth::user()->can('Bank Payment')  )
<li class="{{ areActiveRoutes(['bank-payment.create','bank-payment.index'])}}">
    <a href="{{route('bank-payment.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Bank Payment</span>
    </a>
</li>
@endif
@if(Auth::user()->can('Bank Deposit')  )
<li class="{{ areActiveRoutes(['bank-deposit.create','bank-deposit.index'])}}">
    <a href="{{route('bank-deposit.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Bank Deposit</span>
    </a>
</li>
@endif
@if(Auth::user()->can('General Voucher')  )
<li class="{{ areActiveRoutes(['general-voucher.create','general-voucher.index'])}}">
    <a href="{{route('general-voucher.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> General Voucher</span>
    </a>
</li>
@endif


@if(Auth::user()->can('Ledger')  )
<li class="{{ areActiveRoutes(['ledger.create','ledger.index','ledger.store'])}}">
    <a href="{{route('ledger.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Ledger</span>
    </a>
</li>
@endif
@if(Auth::user()->can('Trial Balance')  )
<li class="{{ areActiveRoutes(['trial-balance.create','trial-balance.index','trial-balance.store'])}}">
    <a href="{{route('trial-balance.index')}}" class="{{ areActiveRoutes(['trial-balance.create','trial-balance.index','trial-balance.store'])}}"><i class="fa fa-user" aria-hidden="true"></i>
        <span> Trial Balance</span>
    </a>
</li>
@endif
@if(Auth::user()->can('Balance Sheet')  )

<li class="">
    <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Balance Sheet</span>
    </a>
</li>
@endif
@if(Auth::user()->can('Profit Loss')  )
<li class="">
    <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Profit / Loss</span>
    </a>
</li>
@endif

@if(Auth::user()->can('Student Account Statement Update')  )

<li class="">
    <a href="{{route('update-student-statement.index')}}" class=""><i class="fa fa-user" aria-hidden="true"></i>
        <span> Update Student Statement</span>
    </a>
</li>
@endif

<!-- update-student-statement -->
</ul>
</li>
@endif
@if(Auth::user()->can('Marks Posting') || Auth::user()->can('Marks List') ||  Auth::user()->can('DateSheet Show') || Auth::user()->can('Add DateSheet') || Auth::user()->can('Exam Category') || Auth::user()->can('Student Result Card') || Auth::user()->can('DateSheet Record') || Auth::user()->can('DateSheet Add') || Auth::user()->can('DateSheet Edit') || Auth::user()->can('Exam Category Record') || Auth::user()->can('Exam Category Add') || Auth::user()->can('Exam Category Edit'))
<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['exam-category.create','exam-category.index','exam-category.edit','exam.create','exam.index','exam.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Exam Management</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">
        <!-- <li class="menu-title">Staff Management</li> -->
        @if(Auth::user()->can('Exam Category Record') || Auth::user()->can('Exam Category Add') || Auth::user()->can('Exam Category Edit')  )
        <li class="{{ areActiveRoutes(['exam-category.create','exam-category.index','exam-category.edit'])}}">
            <a href="{{route('exam-category.index')}}" class="{{ areActiveRoutes(['exam-category.create','exam-category.index','exam-category.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Set Term</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->can('DateSheet Record') || Auth::user()->can('DateSheet Add') || Auth::user()->can('DateSheet Edit')  )
        <li class="{{ areActiveRoutes(['exam.create','exam.index','exam.edit'])}}">
            <a href="{{route('exam.index')}}" class="{{ areActiveRoutes(['exam.create','exam.index','exam.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Create Exam</span>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('Marks Posted') || Auth::user()->can('Marks Edit')   )
        <li class="{{ areActiveRoutes(['post.create','post.index','post.edit'])}}">
            <a href="{{route('post.index')}}" class="{{ areActiveRoutes(['post.create','post.index','post.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Marks Post</span>
            </a>
        </li>

        <li class="{{ areActiveRoutes(['marks-edit.create','marks-edit.index','marks-edit.edit'])}}">
            <a href="{{route('marks-edit.index')}}" class="{{ areActiveRoutes(['marks-edit.create','marks-edit.index','marks-edit.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Marks Edit</span>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('Marks List')  )

        <li class="{{ areActiveRoutes(['marks-list.create','marks-list.index','marks-list.edit'])}}">
            <a href="{{route('marks-list.index')}}" class="{{ areActiveRoutes(['marks-list.create','marks-list.index','marks-list.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Marks List</span>
            </a>
        </li>

        <li class="{{ areActiveRoutes(['discipline-marks.create','discipline-marks.index','discipline-marks.edit'])}}">
            <a href="{{route('discipline-marks.index')}}" class="{{ areActiveRoutes(['discipline-marks.create','discipline-marks.index','discipline-marks.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> discipline Marks</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->can('Student Result Card')  )
        <li class="{{ areActiveRoutes(['student-card.create','student-card.index','student-card.edit'])}}">
            <a href="{{route('student-card.index')}}" class="{{ areActiveRoutes(['student-card.create','student-card.index','student-card.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Result Card</span>
            </a>
        </li>
        @endif



        <!-- <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Report Card Settings</span>
            </a>
        </li>
        <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Board Sheet</span>
            </a>
        </li>
        <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Generate Report Card</span>
            </a>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Exam Hall</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
                <li><a href="#"> Exam Hall</a></li>
                <li><a href="#">Hall Arrangement</a></li>
                <li><a href="#">Invigilation Duties</a></li>

            </ul>
        </li> -->

    </ul>
</li>
@endif
@if(Auth::user()->can('Transport')  )
<li class="submenu ">
    <a href="javascript:;" class="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Transport Management</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">
        <!-- <li class="menu-title">Staff Management</li> -->

        <li class="">
            <a href=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>  Vehicle</span>
            </a>
        </li>
        <li class="">
            <a href=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>  Driver</span>
            </a>
        </li>
        <li class="">
            <a href=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>  Destination</span>
            </a>
        </li>
        <li class="">
            <a href=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>  Transport Allocation</span>
            </a>
        </li>
        <li class="">
            <a href=""><i class="fa fa-user" aria-hidden="true"></i>
                <span>  Fee Collection</span>
            </a>
        </li>
        <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Manage Route </span>
            </a>
        </li>
        <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Transport Member</span>
            </a>
        </li>
        <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> SMS Alert</span>
            </a>
        </li>
        <li class="">
            <a href="" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Report</span>
            </a>
        </li>



    </ul>
</li>

@endif

@if(Auth::user()->can('Maintaince Category Record') || Auth::user()->can('Maintaince Category-Create') || Auth::user()->can('Maintaince Category-Edit')  || Auth::user()->can('Maintaince Users') || Auth::user()->can('Pending Maintainces') || Auth::user()->can('Resolved Maintainces') || Auth::user()->can('Maintaince-lists') )
<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['category.index','category.create','category.edit','role.index','role.create','role.edit','permission.index','permission.create','permission.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Maintenance Management</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">
        @if(Auth::user()->can('Maintaince Category Record') || Auth::user()->can('Maintaince Category-Create') || Auth::user()->can('Maintaince Category-Edit')  )
        <li class="{{ areActiveRoutes(['category.index','category.create','category.edit'])}}">
            <a href="{{route('category.index')}}" class="{{ areActiveRoutes(['category.index','category.create','category.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> maintenance Category</span>
            </a>
        </li>
        @endif


        @if(Auth::user()->can('Maintaince Users')  )
        <li class="{{ areActiveRoutes(['maintenance-user.index','maintenance-user.create','maintenance-user.edit'])}}">
            <a href="{{route('maintenance-user.index')}}" class="{{ areActiveRoutes(['maintenance-user.index','maintenance-user.create','maintenance-user.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> maintenance Users</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->can('Maintaince-Requests') || Auth::user()->can('Maintainces Create') || Auth::user()->can('Pending Maintainces') || Auth::user()->can('Resolved Maintainces') || Auth::user()->can('Approval Maintainces')  )
        <li class="{{ areActiveRoutes(['maintenance.index','maintenance.create','maintenance.edit'])}}">
            <a href="{{route('maintenance.index')}}" class="{{ areActiveRoutes(['maintenance.index','maintenance.create','maintenance.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Branch maintenance </span>
            </a>
        </li>
        @endif


        @if(Auth::user()->can('Maintaince-lists')  )

        <li class="{{ areActiveRoutes(['list.index','list.create','list.edit'])}}">
            <a href="{{route('list.index')}}" class="{{ areActiveRoutes(['list.index','list.create','list.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Maintenance List</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['query.index','query.create','query.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Query Management </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">

        <li class="{{ areActiveRoutes(['query.index','query.create','query.edit'])}}">
            <a href="{{route('query.index')}}" class="{{ areActiveRoutes(['query.index','query.create','query.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Query</span>
            </a>
        </li>
    </ul>
</li>

<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['product-category.index','product-category.create','product-category.edit','product-sub-category.index','product-sub-category.create','product-sub-category.edit','product.index','product.create','product.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Inventory Management </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">

        <li class="{{ areActiveRoutes(['product-category.index','product-category.create','product-category.edit'])}}">
            <a href="{{route('product-category.index')}}" class="{{ areActiveRoutes(['product-category.index','product-category.create','product-category.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Product Category</span>
            </a>
        </li>
        <li class="{{ areActiveRoutes(['product-sub-category.index','product-sub-category.create','product-sub-category.edit'])}}">
            <a href="{{route('product-sub-category.index')}}" class="{{ areActiveRoutes(['product-sub-category.index','product-sub-category.create','product-sub-category.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Product Sub Category</span>
            </a>
        </li>
        <li class="{{ areActiveRoutes(['product.index','product.create','product.edit'])}}">
            <a href="{{route('product.index')}}" class="{{ areActiveRoutes(['product.index','product.create','product.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Products</span>
            </a>
        </li>
        <li class="{{ areActiveRoutes(['order.index','order.create','order.edit'])}}">
            <a href="{{route('order.index')}}" class="{{ areActiveRoutes(['order.index','order.create','order.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Orders</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Sales</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;" class=""><i class="fa fa-user" aria-hidden="true"></i>
                <span> Inventory</span>
            </a>
        </li>



    </ul>
</li>


<li class="submenu ">
    <a href="javascript:;" class=""><i class="fa fa-user" aria-hidden="true"></i> <span> Certificate Management</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">



        <li class="">
            <a href="javascript:;" ><i class="fa fa-user" aria-hidden="true"></i>
                <span> Certificate Category</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;" ><i class="fa fa-user" aria-hidden="true"></i>
                <span> Certificate</span>
            </a>
        </li>
    </ul>
</li>

<li class="submenu ">
    <a href="javascript:;" class=""><i class="fa fa-user" aria-hidden="true"></i> <span> Quality Assurance</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li class="">
            <a href="javascript:;" ><i class="fa fa-user" aria-hidden="true"></i>
                <span> Complaint</span>
            </a>
        </li>
    </ul>
</li>
                <li class="submenu ">
                    <a href="javascript:;" class="{{ areActiveRoutes(['survey_category.index','survey_questions.index','survey_attemps'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span>Survey Managment</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li class="{{ areActiveRoutes(['survey_category.index'])}}">
                            <a href="{{route('survey_category.index')}}" ><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Category</span>
                            </a>
                        </li>
                        <li class="{{ areActiveRoutes(['survey_questions.index'])}}">
                            <a href="{{route('survey_questions.index')}}" ><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Questions</span>
                            </a>
                        </li>
                        <li class="{{ areActiveRoutes(['survey_attemps'])}}">
                            <a href="{{route('survey_attemps')}}" ><i class="fa fa-user" aria-hidden="true"></i>
                                <span> Survey Attempts</span>
                            </a>
                        </li>
                    </ul>
                </li>


<li class="submenu ">
    <a href="javascript:;" class="{{ areActiveRoutes(['category.index','admission_inquiry','camp_applicant','category.create','category.edit','role.index','role.create','role.edit','permission.index','permission.create','permission.edit'])}}"><i class="fa fa-user" aria-hidden="true"></i> <span> Campus Management</span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li class="{{ areActiveRoutes(['admission_inquiry'])}}">
            <a href="{{route('admission_inquiry')}}" ><i class="fa fa-user" aria-hidden="true"></i>
                <span> Admission Inquiry</span>
            </a>
        </li>
        <li class="{{ areActiveRoutes(['camp_applicant'])}}">
            <a href="{{route('camp_applicant')}}" ><i class="fa fa-user" aria-hidden="true"></i>
                <span> Campus Applicant</span>
            </a>
        </li>
    </ul>
</li>



<li class="menu-title">Academics</li>
<li class="submenu">
    <a href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i> <span>Diary</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li>
            <a href="{{route('home-work.index')}}"> Home Work</a>
        </li>

        <li>
            <a href="contacts.html"> Manage</a>
        </li>

        <li>
            <a href="contacts.html"> Parent Consent</a>
        </li>
        <li>
            <a href="contacts.html"> Invitation</a>
        </li>
        <li>
            <a href="contacts.html"> Circular</a>
        </li>
    </ul>
</li>
                <!-- <li>
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
                </li> -->
            </ul>
        </div>
    </div>
</div>
