<?php
if (isset($_POST['add'])) {
    extract($_POST);

    $subject = new Subject;

    $subject->name = $name;
    $subject->subject_code = $subject_code;

    // print_r($_POST);
    if ($subject->save()) {
        $message = notification('success', 'Subject Added Successful');
    } else {
        $message = notification('danger', 'Error in Adding Subject!');
    }
}
?>


<!-- page content -->
<div class="right_col" role="main" style="min-height:100px !important;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Subject Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="col-md-6 col-sm-6  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Adding Subject</h2>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" name="name" required="required"
                                            class="form-control form-control-sm ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Subject
                                        Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" name="subject_code" required="required"
                                            class="form-control form-control-sm ">
                                    </div>
                                </div>

                                <input class="btn btn-sm btn-primary" type="submit" name="add" value="Create">
                            </div>

                        </form>
                        <!-- End SmartWizard Content -->


                    </div>
                </div>
                <!-- <div class="col-md-6 col-sm-6  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>To Do List <small>Sample tasks</small></h2>
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

                            <div class="">
                                <ul class="to_do">
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Schedule meeting with new client
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
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