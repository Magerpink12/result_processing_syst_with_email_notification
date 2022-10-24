<?php

class Teacher extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'dob', 'gender', 'address', 'lga', 'state', 'phone', 'teaching_subjects', 'teaching_classes', 'picture', 'email');
    public static $db_table = 'teacher';
    public $id;
    public $name;
    public $dob;
    public $gender;
    public $address;
    public $lga;
    public $state;
    public $phone;
    public $teaching_subjects;
    public $teaching_classes;
    public $picture;
    public $email;
}