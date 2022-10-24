<?php
include_once("../config/init.php");

if ($_GET['id']) {

    $class = Classes::find_by_id($_GET['id']);
    if ($class->delete()) {
        // $session->message = notification("warning", '');
        header("Location: ../../?page=manage_class");
    }
}