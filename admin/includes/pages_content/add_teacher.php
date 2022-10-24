<?php
if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['phone'])) {

    extract($_POST);
    $rand_id = rand(0000, 9999);

    $teacher = new Teacher;

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
        $message = notification('success', 'Teacher Added Successful');
        // redirect("?page=biometric");
        // $session->message($message);

    } else {
        $message = notification('danger', 'Error in Adding Teacher!');
        // $session->message($message);
    }
}
?>


<!-- page content -->
<div class="right_col" role="main" style="min-height:100px !important;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Teacher Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Adding Teacher</h2>
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
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br />
                                            <small>Step 1 description</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br />
                                            <small>Step 2 description</small>
                                        </span>
                                    </a>
                                </li>

                            </ul>

                            <div id="step-1">
                                <div class="row">

                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <div id="display_image">
                                                <img alt="Charles Hall" src="images/img.jpg"
                                                    class="rounded-circle img-responsive mt-2" width="115"
                                                    height="115" />

                                            </div>
                                            <div class="mt-2">
                                                <div class="pt-2">
                                                    <input id="image_input" accept="image/png, image/jpg, image/jpeg"
                                                        type="file" class="form-control-sm"
                                                        title="Upload new profile image" required name="picture">

                                                </div>
                                            </div>
                                            <small>For best results, use an image at least 128px by 128px in .jpg
                                                format</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full
                                        Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" name="name" required="required"
                                            class="form-control form-control-sm ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email
                                        Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="email" id="last-name" name="email" required="required"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone
                                        Number</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col form-control-sm" type="number"
                                            name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Gender *</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            M:
                                            <input type="radio" class="flat" name="gender" id="genderM" value="M"
                                                checked="" required /> F:
                                            <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control form-control-sm"
                                            required="required" type="date" name="dob">
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <h2 class="StepTitle">Step 2 Content</h2>
                                <div class="form-group row">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">State</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
                                        <select class="form-control col form-control-sm " name="state">
                                            <option value="">..</option>
                                            <option value="Yobe">Yobe</option>
                                            <option value="Kano">Kano</option>
                                            <option value="Bauchi">Bauchi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Local
                                        Govt. Area</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control col form-control-sm" name="lga">
                                            <option value="">..</option>
                                            <option value="Potiskum">Potiskum</option>
                                            <option value="Geidam">Geidam</option>
                                            <option value="Nguru">Nguru</option>
                                            <option value="Gashua">Gashua</option>
                                            <option value="Damaturu">Damaturu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea class="form-control col" name="address"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col form-control-sm" type="password"
                                            name="password">
                                    </div>
                                </div> -->

                            </div>
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