<?php

class Settings extends Objects_class
{
    public static $db_table_fields = array('id', 'email', 'email_password');
    public static $db_table = 'settings';
    public $id;
    public $email;
    public $email_password;
}