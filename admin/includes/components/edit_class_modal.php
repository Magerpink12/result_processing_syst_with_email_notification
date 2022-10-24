<div class="modal fade bs-example-modal-lg" id="modal<?php echo $class->id ?>" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-dark">
                <h4 class="modal-title text-light" id="myModalLabel">Update Class Detail
                </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form enctype="multipart/form-data" class="" method="POST">
                <div class="modal-body">


                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Class
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" name="name" required="required"
                                class="form-control form-control-sm " value="<?php echo $class->name ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Class Form
                            Master</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control col form-control-sm " name="form_master_id">
                                <option value="<?php echo $class->form_master_id ?>">
                                    <?php echo Teacher::find_by_id($class->form_master_id)->name ?></option>
                                <?php $teachers = Teacher::find_all();
                                foreach ($teachers as $teacher) : ?>
                                <option value="<?php echo $teacher->id ?>"><?php echo $teacher->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>



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

                                    $subjects_decoded = json_decode($class->subjects) ?? array();
                                    foreach ($subjects as $subject) :
                                    ?>
                                    <li>
                                        <p>
                                            <input <?php if (in_array($subject->subject_code, $subjects_decoded)) {
                                                            echo "checked";
                                                        } ?> type="checkbox" name="subjects[]"
                                                value="<?php echo $subject->subject_code ?>" class="flat"><strong>
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




                <input type="hidden" name="id" value="<?php echo $class->id ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-sm btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>