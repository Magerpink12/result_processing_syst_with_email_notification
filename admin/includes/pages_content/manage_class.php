<?php
if (isset($_POST['update'])) {

    extract($_POST);

    $class = Classes::find_by_id($id);
    $subjects = json_encode($subjects);

    $class->name = $name;
    $class->form_master_id = $form_master_id;
    $class->subjects = $subjects;


    if ($class->save()) {
        $message = notification('success', 'Class Updated Successful');
    } else {
        $message = notification('danger', 'Error in  Updated!');
    }
}
?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage classs Page</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage classs Page</h2>
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
                                        <a class="btn btn-sm btn-success" href="?page=add_class"><i
                                                class="fa fa-plus-square"> Add
                                                class</i></a>
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Class Name</th>
                                                <th>Class Form Master</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $classs = Classes::find_all() ?>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($classs as $class) : ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $class->name ?></td>
                                                <td><?php echo Teacher::find_by_id($class->form_master_id)->name ?></td>

                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#modal<?php echo $class->id ?>"><i
                                                            class="fa fa-pencil-square-o"></i></button>
                                                    <?php include("includes/components/edit_class_modal.php") ?>
                                                    <a href="includes/components/delete_class.php?id=<?php echo $class->id; ?>"
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