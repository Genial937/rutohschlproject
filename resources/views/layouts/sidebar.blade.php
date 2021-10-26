<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="">
                    <a href=""><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                @role('Super Admin')
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Admins</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.index') }}">All Admins</a></li>
                        <li><a href="{{ route('admin.create') }}">Add Admin</a></li>
                    </ul>
                </li>
                @endrole
               @role('Super Admin|HoD|Exam Cordinator')
               <li class="submenu">
                <a href="#"><i class="la la-cube"></i> <span> Academics</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li class="submenu">
                        <a href="#"><span> Curriculum</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('curriculum.index') }}">Curriculum</a></li>
                            <li><a href="{{ route('curriculum.create') }}">Add Curriculum</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span> Schools</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('schools.index') }}">Schools</a></li>
                            <li><a href="">Add School</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span> Departments</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('departments.index') }}">Departments</a></li>
                            <li><a href="">Add Department</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span> Courses</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('courses.index') }}">Courses</a></li>
                            
                        </ul>
                    </li>
                    
                    <li><a href="{{ route('units.index') }}">Units</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="la la-user"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{ route('students.index') }}">All Students</a></li>
                    <li><a href="{{ route('students.create') }}">Add Students</a></li>
                </ul>
            </li>
            {{-- <li class="submenu">
                <a href="#"><i class="la la-user"></i> <span> Parents</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{ route('parents.index') }}">All Parents</a></li>
                    <li><a href="{{ route('parents.create') }}">Add Parent</a></li>
                </ul>
            </li> --}}
               @endrole
                @role('Exam Cordinator')
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Exams</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('exams.index') }}">All Exams</a></li>
                        <li><a href="{{ route('exams.create') }}">Add Exams</a></li>
                    </ul>
                </li>
                @endrole
                
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Results</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('results.index') }}">All Results</a></li>
                        <li><a href="{{ route('results.create') }}">Add Result</a></li>
                    </ul>
                </li>
               
                @role('Super Admin')
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Roles and Permissions</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    </ul>
                </li>
                @endrole
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->