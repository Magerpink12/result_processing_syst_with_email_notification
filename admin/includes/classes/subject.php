<?php

class Subject extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'subject_code');
    public static $db_table = 'subject';
    public $id;
    public $name;
    public $subject_code;
}