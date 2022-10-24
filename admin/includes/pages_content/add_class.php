<?php
if (isset($_POST['add'])) {
    extract($_POST);

    $class = new Classes;
    $subjects = json_encode($subjects);

    $class->name = $name;
    $class->form_master_id = $form_master_id;
    $class->subjects = $subjects;

    // print_r($subjects);

    if ($class->save()) {
        $message = notification('success', 'Class Added Successful');
    } else {
        $message = notification('danger', 'Error in Adding Class!');
    }
}
?>


<!-- page content -->
<div class="right_col" role="main" style="min-height:100px !important;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Class Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Adding class</h2>
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


                    <!-- Smart Wizard -->
                    <p>Fiil the form below!!.</p>
                    <form enctype="multipart/form-data" class="" method="POST">
                        <div class="form_wizard wizard_horizontal">

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Class
                                    Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="name" required="required"
                                        class="form-control form-control-sm ">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Class Form
                                    Master</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control col form-control-sm " name="form_master_id">
                                        <option value="">..</option>
                                        <?php $teachers = Teacher::find_all();
                                        foreach ($teachers as $teacher) : ?>
                                        <option value="<?php echo $teacher->id ?>"><?php echo $teacher->name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>





                            <div class="col-md-3 col-sm-3 "></div>
                            <div class="col-md-6 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Subjects <small>Offering</small></h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div class="">
                                            <ul class="to_do">
                                                <?php
                                                $subjects = Subject::find_all();
                                                foreach ($subjects as $subject) :
                                                ?>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" name="subjects[]"
                                                            value="<?php echo $subject->subject_code ?>"
                                                            class="flat"><strong>
                                                            <?php echo $subject->subject_code ?></strong>
                                                        <?php echo $subject->name ?>
                                                        Subject
                                                    </p>
                                                </li>
                                                <?php endforeach ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <input class="btn btn-sm btn-primary" type="submit" name="add" value="Create">
                        </div>
                    </form>
                    <!-- End SmartWizard Content -->


                </div>
            </div>
        </div>
    </div>
</div>
<script>
const image_input = document.querySelector("#image_input");
var uploaded_image = "";

image_input.addEventListener("change", function() {

    const reader = new FileReader();
    reader.addEventListener("load", function() {
        uploaded_image = reader.result;
        document.querySelector("#display_image").innerHTML =
            `<img src="${uploaded_image}" alt="Profile" class="rounded-circle img-responsive mt-2" width="128"
    height="128">`;

    })
    reader.readAsDataURL(this.files[0])
})
</script>

<!-- /page content 
-->

<!-- footer content -->