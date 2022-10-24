<div class="modal fade bs-example-modal-lg" id="modal<?php echo $student->id ?>" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-dark">
                <h4 class="modal-title text-light" id="myModalLabel">Update student Detail
                </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form enctype="multipart/form-data" class="" method="POST">
                <div class="modal-body">



                    <div class="row">

                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <div id="display_image">
                                    <?php if (empty($student->picture)) : ?>
                                    <img alt="Charles Hall" src="images/img.jpg"
                                        class="rounded-circle img-responsive mt-2" width="115" height="115" />
                                    <?php else :  ?>

                                    <img alt="Charles Hall" src="<?php echo $student->picture ?>"
                                        class="rounded-circle img-responsive mt-2" width="115" height="115" />
                                    <?php endif;  ?>
                                </div>
                                <div class="mt-2">
                                    <div class="pt-2">
                                        <input id="image_input" accept="image/png, image/jpg, image/jpeg" type="file"
                                            class="form-control-sm" title="Upload new profile image" name="picture">

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
                            <input value="<?php echo $student->name ?>" type="text" id="first-name" name="name"
                                required="required" class="form-control form-control-sm ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Parent
                            Full
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" name="parent_name" required="required"
                                class="form-control form-control-sm " value="<?php echo $student->parent_name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email
                            Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input value="<?php echo $student->parent_email ?>" type="email" id="last-name"
                                name="parent_email" required="required" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone
                            Number</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input value="<?php echo $student->parent_phone ?>" id="middle-name"
                                class="form-control col form-control-sm" type="number" name="parent_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Gender *</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                M:
                                <input type="radio" class="flat" name="gender" id="genderM" value="M" checked=""
                                    required /> F:
                                <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input value="<?php echo $student->dob ?>" id="birthday"
                                class="date-picker form-control form-control-sm" required="required" type="date"
                                name="dob">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">State</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control col form-control-sm " name="state">
                                <option value="<?php echo $student->state ?>"><?php echo $student->state ?></option>
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
                                <option value="<?php echo $student->lga ?>"><?php echo $student->lga ?></option>
                                <option value="Potiskum">Potiskum</option>
                                <option value="Geidam">Geidam</option>
                                <option value="Nguru">Nguru</option>
                                <option value="Gashua">Gashua</option>
                                <option value="Damaturu">Damaturu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control col" name="address"><?php echo $student->address ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input value="<?php echo $student->password ?>" id="middle-name"
                                class="form-control col form-control-sm" type="text" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Current
                            Class</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="middle-name" class="form-control col form-control-sm" name="current_class_id">
                                <option
                                    value="<?php echo $student->current_class_id == 0 ? null : $student->current_class_id  ?>">
                                    <?php echo $student->current_class_id == 0 ? null : Classes::find_by_id($student->current_class_id)->name ?>
                                </option>
                                <?php $classes = Classes::find_all();
                                foreach ($classes as $class) : ?>
                                <option value="<?php echo $class->id ?>"><?php echo $class->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $student->id ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-sm btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>