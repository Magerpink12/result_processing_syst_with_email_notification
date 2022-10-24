<?php

class Classes extends Objects_class
{
    public static $db_table_fields = array('id', 'name', 'form_master_id', 'subjects');
    public static $db_table = 'class';
    public $id;
    public $name;
    public $form_master_id;
    public $subjects;
}