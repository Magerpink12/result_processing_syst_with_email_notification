<?php
include("includes/config/init.php");
session_destroy();
header("Location: login.php");