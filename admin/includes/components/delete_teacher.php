<?php
include_once("../config/init.php");

if ($_GET['id']) {

    $teacher = Teacher::find_by_id($_GET['id']);
    if ($teacher->delete()) {
        // $session->message = notification("warning", '');
        header("Location: ../../?page=manage_teacher");
    }
}