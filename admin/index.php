<?php
ob_start();
include("./includes/header.php");

?>

<style>
.block {
    display: block;
}
</style>

<?php

if (!isset($_GET['page'])) {
    $home = "active";
    $home_block = "display: block";
    $dashoard = 'current-page';
    // include("./includes/pages_content/dashboard.php");
} else {
    extract($_GET);
    if ($page == "dashboard") {
        $home = "active";
        $home_block = "display: block";
        $dashoard = 'current-page';
    } elseif ($page == 'add_admin' || $page == 'manage_admin') {
        $admin = "active";
        $admin_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'add_admin' || $page == 'manage_admin') {
        $admin = "active";
        $admin_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'add_teacher' || $page == 'manage_teacher') {
        $teacher = "active";
        $teacher_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'add_class' || $page == 'manage_class') {
        $class = "active";
        $class_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'add_subject' || $page == 'manage_subject') {
        $subject = "active";
        $subject_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'add_student' || $page == 'manage_student') {
        $student = "active";
        $student_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'upload_1st_ca_test' || $page == 'upload_2nd_ca_test' || $page == 'upload_exams' || $page == 'view_result' || $page == 'publish_result') {
        $assessment = "active";
        $assessment_block = "display: block";
        ${$page} = "current-page";
    } elseif ($page == 'profile') {
        ${$page} = "current-page active";
    }
}


?>



<!-- SIDE navigation -->
<?php include("./includes/sidenav.php");
?>

<!-- /top navigation -->
<?php include("./includes/topnav.php");
?>

<!-- page content -->

<!-- /page content -->
<?php


if (!isset($_GET['page'])) {
    include("./includes/pages_content/dashboard.php");
} else {
    extract($_GET);
    if (file_exists("./includes/pages_content/$page.php")) {
        include("./includes/pages_content/$page.php");
    } else {
        header("Location: 404.php");
    }
}

?>

<!-- footer content -->
<?php include("./includes/footer.php");
?>