<?php
if (isset($_POST['update'])) {

    extract($_POST);

    $subject = Subject::find_by_id($id);
    $subject->name = $name;
    $subject->subject_code = $subject_code;
    // $subject->classes_offering = $classes_offering;

    if ($subject->save()) {
        $message = notification('success', 'Subject Updated Successful');
    } else {
        $message = notification('danger', 'Error in Udating Subject!');
    }
}
?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Subject Page</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Subject Page</h2>
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
                                                Subject</i></a>
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Subject Name</th>
                                                <th>Subject Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $subjects = Subject::find_all() ?>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($subjects as $subject) : ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $subject->name ?></td>
                                                <td><?php echo $subject->subject_code ?></td>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#modal<?php echo $subject->id ?>"><i
                                                            class="fa fa-pencil-square-o"></i></button>
                                                    <?php include("includes/components/edit_subject_modal.php") ?>
                                                    <a href="includes/components/delete_subject.php?id=<?php echo $subject->id; ?>"
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