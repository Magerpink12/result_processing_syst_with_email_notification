<?php
include_once("../config/init.php");

if ($_GET['id']) {

    $admin = Admin::find_by_id($_GET['id']);
    if ($admin->delete()) {
        // $session->message = notification("warning", '');
        header("Location: ../../?page=manage_admin");
    }
}