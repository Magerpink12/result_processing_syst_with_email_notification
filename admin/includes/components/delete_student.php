<?php
include_once("../config/init.php");

if ($_GET['id']) {

    $student = Student::find_by_id($_GET['id']);
    if ($student->delete()) {
        // $session->message = notification("warning", '');
        header("Location: ../../?page=manage_student");
    }
}