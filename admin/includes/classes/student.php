<?php

class Student extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'parent_name', 'dob', 'gender', 'address', 'lga', 'state', 'parent_phone', 'password', 'picture', 'parent_email', 'current_class_id');
    public static $db_table = 'student';
    public $id;
    public $name;
    public $parent_name;
    public $dob;
    public $gender;
    public $address;
    public $lga;
    public $state;
    public $parent_phone;
    public $password;
    public $picture;
    public $parent_email;
    public $current_class_id;
}