<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once('./vendor/autoload.php');

$upload_panel = false;
if (isset($_GET['class_id']) && !empty($_GET['class_id'])) {


    $class_id = $_GET['class_id'];
    $class = Classes::find_by_id($class_id);
    if ($class) {

        $upload_panel = true;
        $class_name = $class->name;
        $db_table = strtolower(str_replace(' ', '_', $class_name));

        $database->query("CREATE TABLE IF NOT EXISTS $db_table (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `roll_no` int(11) NOT NULL,
         `first_ca` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
         `second_ca` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
         `exams` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
         PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");

        Ca_test::$db_table = $db_table;
        if (isset($_POST['class_id']) && !empty($_POST['class_id']) && isset($_FILES['upload'])) {
            $allowedFileType = [
                'application/vnd.ms-excel',
                'text/xls',
                'text/xlsx',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];

            if (in_array($_FILES["upload"]["type"], $allowedFileType)) {

                $targetPath = 'uploads/' . $_FILES['upload']['name'];
                move_uploaded_file($_FILES['upload']['tmp_name'], $targetPath);

                $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                $spreadSheet = $Reader->load($targetPath);
                $excelSheet = $spreadSheet->getActiveSheet();
                $spreadSheetAry = $excelSheet->toArray();
                $sheetCount = count($spreadSheetAry);
                $spreadSheetAry_copy = $spreadSheetAry;
                $colums = count(array_shift($spreadSheetAry_copy));


                for ($row = 1; $row < $sheetCount; $row++) {
                    $ca = new stdClass;

                    $roll_no = null;
                    if (isset($spreadSheetAry[$row][0])) {
                        $roll_no = $spreadSheetAry[$row][0];
                    }


                    for ($colum = 1; $colum < $colums; $colum++) {

                        $ca->{$spreadSheetAry[0][$colum]} = $spreadSheetAry[$row][$colum];

                        if (!$roll_no == null) {

                            $student_ca = Ca_test::find_by_query("SELECT * FROM $db_table WHERE roll_no = $roll_no");
                            $student_ca = array_shift($student_ca);
                            if (!$student_ca) {
                                $student_ca = new Ca_test;
                                $student_ca->roll_no = $roll_no;
                            }
                            $student_ca->second_ca = json_encode($ca);

                            if ($student_ca->save()) {
                                $type = "success";
                                $message = notification("success", "Excel Data Imported into the Database");
                            } else {
                                $type = "error";
                                $message = notification('danger', "Problem in Importing Excel Data");
                            }
                        }
                    }

                    // echo "<pre>";
                    // print_r($ca);
                    // echo "</pre>";
                }
            } else {
                $type = "error";
                $message = "Invalid File Type. Upload Excel File.";
            }
        }
    }
}



?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Upload 2nd C.A Test Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>2nd C.A</h2>
                        <a class="btn btn-sm btn-warning" href="template/Assessment_templete.xlsx">Download Assessment
                            Excel Templete</a>
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
                                        <input type="hidden" name="page" value="upload_2nd_ca_test">
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

                        <?php if ($upload_panel) : ?>
                        <div class="col-md-6 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-upload"></i>
                                        <small>Upload</small>
                                        <div class="badge badge-success">
                                            <?php echo !empty($class_mana) ? $class_mana->name : '' ?>

                                        </div>
                                    </h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form method="POST" enctype="multipart/form-data"
                                        class="form-horizontal form-label-left">
                                        <input type="hidden" name="page" value="upload_2nd_ca_test">
                                        <input type="hidden" name="class_id" value="<?php echo $class_id ?? '' ?>">

                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="file"
                                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                                        name="upload" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="fa fa-upload"></i></button>
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
                    <?php if ($upload_panel) : ?>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>
                                        <div class="badge badge-success">
                                            <?php echo isset($class_id) ? Classes::find_by_id($class_id)->name : '' ?>
                                        </div> Second C.A Score
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
                                                <?php $ca_tests = Ca_test::find_all() ?>
                                                <?php
                                                    $second_ca_arr = json_decode(array_shift($ca_tests)->second_ca ?? "[]", true) ?? array();

                                                    $aaa = array_keys($second_ca_arr);

                                                    ?>

                                                <table id="datatable" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Roll #</th>
                                                            <?php foreach ($aaa as $aa) : ?>
                                                            <th><?php echo $aa ?></th>
                                                            <?php endforeach ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                            foreach ($ca_tests as $ca_test) :
                                                                $second_ca_array = json_decode($ca_test->second_ca, true); ?>
                                                        <tr>

                                                            <td><?php echo $ca_test->roll_no ?></td>



                                                            <?php foreach ($aaa as $aa) : ?>
                                                            <th><?php echo $second_ca_array[$aa]  ?></th>
                                                            <?php endforeach ?>




                                                            </td>

                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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