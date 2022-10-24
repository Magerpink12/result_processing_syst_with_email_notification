<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"> <img width="70" src="images/101.png"> <span>Results
                    Proccessor!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>Isah Ahmed</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li class="<?php echo isset($home) ? $home : "" ?>"><a><i class="fa fa-home"></i> Home <span
                                class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($home_block) ? $home_block : '' ?>" class="nav child_menu ">
                            <li class="<?php echo isset($dashoard) ? $dashoard : '' ?>"><a
                                    href="index.php?page=dashboard">Dashboard</a></li>
                            <!-- <li><a href="index2.html">Reports</a></li>
                            <li><a href="index2.html">Reports</a></li> -->
                        </ul>
                    </li>
                    <li class="<?php echo isset($admin) ? $admin : "" ?>"><a><i class="fa fa-users"></i> Admins <span
                                class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($admin_block) ? $admin_block : '' ?>" class="nav child_menu">
                            <li class="<?php echo isset($add_admin) ? $add_admin : '' ?>"><a href="?page=add_admin">Add
                                    Admin</a></li>
                            <li class="<?php echo isset($manage_admin) ? $manage_admin : '' ?>"><a
                                    href="?page=manage_admin">Manage Admin</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($teacher) ? $teacher : "" ?>"><a><i class="fa fa-users"></i> Teachers
                            <span class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($teacher_block) ? $teacher_block : '' ?>" class="nav child_menu">
                            <li class="<?php echo isset($add_teacher) ? $add_teacher : '' ?>"><a
                                    href="?page=add_teacher">Add Teacher</a></li>
                            <li class="<?php echo isset($manage_teacher) ? $manage_teacher : '' ?>"><a
                                    href="?page=manage_teacher">Manager Teacher</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($class) ? $class : "" ?>"><a><i class="fa fa-institution"></i> class
                            <span class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($class_block) ? $class_block : "" ?>" class="nav child_menu">
                            <li class="<?php echo isset($add_class) ? $add_class : "" ?>"><a href="?page=add_class">Add
                                    Class</a></li>
                            <li class="<?php echo isset($manage_class) ? $manage_class : "" ?>"><a
                                    href="?page=manage_class">Manage Class</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($subject) ? $subject : "" ?>"><a><i class="fa fa-book"></i> Subject
                            <span class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($subject_block) ? $subject_block : "" ?>" class=" nav child_menu">
                            <li class="<?php echo isset($add_subject) ? $add_subject : "" ?>"><a
                                    href="?page=add_subject">Add Subject</a></li>
                            <li class="<?php echo isset($manage_subject) ? $manage_subject : "" ?>"><a
                                    href="?page=manage_subject">Manage Subject</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($student) ? $student : "" ?>"><a><i class="fa fa-mortar-board"></i>
                            Student <span class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($student_block) ? $student_block : "" ?>" class="nav child_menu">
                            <li class="<?php echo isset($add_student) ? $add_student : "" ?>"><a
                                    href="?page=add_student">Add Student</a></li>
                            <li class="<?php echo isset($manage_student) ? $manage_student : "" ?>"><a
                                    href="?page=manage_student">Manage Student</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($assessment) ? $assessment : "" ?>"><a><i class="fa fa-upload"></i>
                            Assessment <span class="fa fa-chevron-down"></span></a>
                        <ul style="<?php echo isset($assessment_block) ? $assessment_block : "" ?>" class=" nav
                            child_menu">
                            <li class="<?php echo isset($upload_1st_ca_test) ? $upload_1st_ca_test : "" ?>"><a
                                    href="?page=upload_1st_ca_test">Uploade 1st C.A Test</a></li>
                            <li class="<?php echo isset($upload_2nd_ca_test) ? $upload_2nd_ca_test : "" ?>"><a
                                    href="?page=upload_2nd_ca_test">Uploade 2nd C.A Test</a></li>
                            <li class="<?php echo isset($upload_exams) ? $upload_exams : "" ?>"><a
                                    href="?page=upload_exams">Uploade Exams</a></li>
                            <li class="<?php echo isset($view_result) ? $view_result : "" ?>"><a
                                    href="?page=view_result">View Results</a></li>
                            <li class="<?php echo isset($publish_result) ? $publish_result : "" ?>"><a
                                    href="?page=publish_result">Publish Results</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($profile) ? $profile : "" ?>"><a href="?page=profile"><i
                                class="fa fa-cogs"></i> Settings</a>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>