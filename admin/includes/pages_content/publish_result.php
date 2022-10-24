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


?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Publishing Result Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Select Class to Publish Their Results</h2>
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
                                        <input type="hidden" name="page" value="publish_result">
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
                                    <h2><i class="fa fa-book"></i>
                                        <div class="badge badge-success">
                                            <?php echo !empty($class_mana) ? $class_mana->name : '' ?>
                                        </div>
                                        <small>Results </small>
                                    </h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo $_SESSION['msg'] ?? '';
                                        unset($_SESSION['msg']) ?>
                                    <form action="print/index.php" method="POST"
                                        class="form-horizontal form-label-left">
                                        <!-- <form action="email/mail_dev.php" method="POST"
                                        class="form-horizontal form-label-left"> -->
                                        <!-- <input type="hidden" name="page" value="publish_result"> -->
                                        <input type="hidden" name="class_id" value="<?php echo $class_id ?? '' ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-upload"> Publish Result</i></button>
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


                </div>
            </div>
        </div>
    </div>
</div>