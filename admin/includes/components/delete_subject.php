<?php
include_once("../config/init.php");

if ($_GET['id']) {

    $subject = Subject::find_by_id($_GET['id']);
    if ($subject->delete()) {
        // $session->message = notification("warning", '');
        header("Location: ../../?page=manage_subject");
    }
}