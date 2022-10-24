<?php
if (isset($_POST['update'])) {

    extract($_POST);
    $rand_id = rand(0000, 9999);

    $teacher = Teacher::find_by_id($id);

    $teacher->name = $name;
    $teacher->email = $email;
    $teacher->address = $address;
    $teacher->phone = $phone;
    $teacher->dob = $dob;
    $teacher->gender = $gender;
    $teacher->state = $state;
    $teacher->lga = $lga;
    // $teacher->password = $password;

    if (isset($_FILES['picture'])) {
        $maga = explode(".", $_FILES['picture']['name']);
        $maga = array_reverse($maga);
        $ext = $maga[0];
        if (move_uploaded_file($_FILES['picture']['tmp_name'], "teachers_pics/teacher_$rand_id.$ext")) {

            $teacher->picture = "teachers_pics/teacher_$rand_id.$ext";
        }
    }

    if ($teacher->save()) {
        $message = notification('success', 'Teacher Updated Successful');
    } else {
        $message = notification('danger', 'Error in Updating Teacher!');
    }
}
?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Teachers Page</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Teachers Page</h2>
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
                                    <p class="text-muted font-13 m-b-30">
                                        <a class="btn btn-sm btn-success" href="?page=add_teacher"><i
                                                class="fa fa-plus-square"> Add
                                                Teacher</i></a>
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <!-- <th>picture</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $teachers = Teacher::find_all() ?>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($teachers as $teacher) : ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $teacher->name ?></td>
                                                <td><?php echo $teacher->email ?></td>
                                                <td><?php echo $teacher->phone ?></td>
                                                <td><?php echo $teacher->gender ?></td>
                                                <!-- <td><?php //echo $teacher->picture 
                                                                ?></td> -->
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#modal<?php echo $teacher->id ?>"><i
                                                            class="fa fa-pencil-square-o"></i></button>
                                                    <?php include("includes/components/edit_teacher_modal.php") ?>
                                                    <a href="includes/components/delete_teacher.php?id=<?php echo $teacher->id; ?>"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>

                                            </tr>
                                            <?php $i++;
                                            endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- footer content -->