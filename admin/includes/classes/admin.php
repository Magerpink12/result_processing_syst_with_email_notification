<?php

class Admin extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'dob', 'gender', 'address', 'lga', 'state', 'phone', 'password', 'picture', 'email');
    public static $db_table = 'admin';
    public $id;
    public $name;
    public $dob;
    public $gender;
    public $address;
    public $lga;
    public $state;
    public $phone;
    public $password;
    public $picture;
    public $email;
}