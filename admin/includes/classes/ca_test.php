<?php

class Ca_test extends Objects_class
{
    public static $db_table_fields = array('id', 'roll_no', 'first_ca', 'second_ca', 'exams');
    public static $db_table = 'ca_test';
    public $id;
    public $roll_no;
    public $first_ca;
    public $second_ca;
    public $exams;
}