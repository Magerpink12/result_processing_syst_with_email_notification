<div class="modal fade bs-example-modal-lg" id="modal<?php echo $subject->id ?>" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-dark">
                <h4 class="modal-title text-light" id="myModalLabel">Update Subject Detail
                </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form enctype="multipart/form-data" class="" method="POST">
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" name="name" required="required"
                                class="form-control form-control-sm " value="<?php echo $subject->name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Subject
                            Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" name="subject_code" required="required"
                                class="form-control form-control-sm " value="<?php echo $subject->subject_code ?>">
                        </div>
                    </div>


                </div>
                <input type="hidden" name="id" value="<?php echo $subject->id ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-sm btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>