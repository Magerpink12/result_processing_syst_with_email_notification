<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once('./vendor/autoload.php');

$student_panel = false;
$result_panel = false;
if (isset($_GET['class_id']) && !empty($_GET['class_id'])) {


    $class_id = $_GET['class_id'];
    $class = Classes::find_by_id($class_id);
    if ($class) {
        $student_panel = true;
        $class_name = $class->name;
        $db_table = strtolower(str_replace(' ', '_', $class_name));

        Ca_test::$db_table = $db_table;

        if (isset($_POST['class_id']) && !empty($_POST['class_id']) && isset($_POST['student_id']) && !empty($_POST['student_id'])) {
            $result_panel = true;
            extract($_POST);
        }
    }
}


function grade($total)
{
    switch (true) {
        case $total >= 70:
            $grade = 'A';
            break;
        case $total >= 60:
            $grade = 'B';
            break;
        case $total >= 50:
            $grade = 'C';
            break;
        case $total >= 45:
            $grade = 'D';
            break;
        default:
            # code...
            $grade = 'F';
            break;
    }
    return $grade;
}


?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> View Result Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Search for Individual Result</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">









                        <div class="col-md-6 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-institution"></i>
                                        <small>Class</small>

                                    </h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form method="GET" enctype="multipart/form-data"
                                        class="form-horizontal form-label-left">
                                        <input type="hidden" name="page" value="view_result">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select name="class_id" type="text" class="form-control">
                                                        <?php if ($class_id ?? false) : $class_mana = Classes::find_by_id($class_id) ?>
                                                        <option value="<?php echo $class_id ?>">
                                                            <?php echo !empty($class_mana) ? $class_mana->name : '..Select Class' ?>
                                                        </option>
                                                        <?php else : ?>
                                                        <option value="">..Select Class</option>

                                                        <?php endif ?>
                                                        <?php $classes = Classes::find_all();
                                                        foreach ($classes as $class) : ?>
                                                        <option value="<?php echo $class->id ?>">
                                                            <?php echo $class->name ?>
                                                        </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php if ($student_panel) : ?>
                        <div class="col-md-6 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-user"></i>
                                        <div class="badge badge-success">
                                            <?php echo !empty($class_mana) ? $class_mana->name : '' ?>
                                        </div>
                                        <small>Student </small>
                                    </h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form method="POST" enctype="multipart/form-data"
                                        class="form-horizontal form-label-left">
                                        <input type="hidden" name="page" value="view_result">
                                        <input type="hidden" name="class_id" value="<?php echo $class_id ?? '' ?>">

                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input class="form-control" type="search" name="student_id"
                                                        placeholder="Roll Number / Student name" list="students">

                                                    <datalist id="students">
                                                        <?php $students = Student::find_by_query("SELECT * FROM student WHERE current_class_id=$class_id");
                                                            foreach ($students as $student) : ?>
                                                        <option value="<?php echo $student->id ?>">
                                                            <?php echo $student->name ?>
                                                        </option>
                                                        <?php endforeach ?>
                                                    </datalist>
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>


                    </div>
                    <?php if ($result_panel) : ?>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>
                                        <div class="badge badge-success">
                                            <?php echo isset($class_id) ? Classes::find_by_id($class_id)->name : '' ?>
                                        </div>
                                        <div class="badge badge-success">
                                            <?php $student_mana = Student::find_by_query("SELECT * FROM student WHERE id = $student_id AND current_class_id=$class_id");
                                                $student_mana = array_shift($student_mana);
                                                echo !empty($student_mana) ? $student_mana->name : 'INVALID' ?>
                                        </div>
                                        <div class="badge badge-success">
                                            Roll #<?php echo isset($class_id) ? $class_id : '' ?>
                                        </div>
                                        Scores
                                    </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <?php echo isset($message) ? $message : '' ?>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <?php $ca_tests = Ca_test::find_by_query("SELECT * FROM $db_table WHERE roll_no=$student_id");
                                                    $ca_tests = array_shift($ca_tests);
                                                    // print_r($ca_tests);
                                                    ?>

                                                <?php if (!empty($student_mana)) : ?>
                                                <table id="datatable" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Subjects \ Assessment</th>
                                                            <th>1st C.A</th>
                                                            <th>2nd C.A</th>
                                                            <th>Exams</th>
                                                            <th>Total</th>
                                                            <th>Grade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $subjects_decoded = json_decode($class_mana->subjects) ?? array();
                                                                $first_ca_json = json_decode($ca_tests->first_ca);
                                                                $second_ca_json = json_decode($ca_tests->second_ca);
                                                                $exams_ca_json = json_decode($ca_tests->exams);
                                                                ?>
                                                        <?php foreach ($subjects_decoded as $subject_name) :
                                                                    $total = 0;
                                                                    $first = $first_ca_json->{$subject_name} ?? 0;
                                                                    $second = $second_ca_json->{$subject_name} ?? 0;
                                                                    $exams = $exams_ca_json->{$subject_name}  ?? 0;
                                                                    $total = $first + $second + $exams;
                                                                ?>
                                                        <tr>
                                                            <th><?php echo $subject_name ?></th>
                                                            <td><?php echo $first ?></td>
                                                            <td><?php echo $second ?></td>
                                                            <td><?php echo $exams ?></td>
                                                            <th style="background-color: rgb(50,200,150);" class="">
                                                                <?php echo $total ?></th>
                                                            <th style="background-color: rgb(50,200,150);" class="">
                                                                <?php echo grade($total) ?></th>
                                                        </tr>
                                                        <?php endforeach ?>


                                                    </tbody>
                                                </table>


                                                <a target="blank"
                                                    href="print/index_12.php?student_id=<?php echo $student_id ?>"
                                                    class="btn btn-sm btn-success">View / Print Result</a>


                                                <?php else : ?>
                                                <div class="alert alert-danger alert-dismissible " role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>Holy guacamole!</strong> Invalid Student Roll Number
                                                    Provided Or no Such Roll Number belong to Selected Class!
                                                </div>

                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>
</div>