<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Events</h1>
    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm add-event"><i class="fas fa-download fa-sm text-white-50"></i> Add-Event</a>
</div>



<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">

            <div class="container py-5" id="page-container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>


            <!-- Event Details Modal -->

            <!-- Event Details Modal -->
            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title">Event Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body rounded-0">
                            <div class="container-fluid">

                                <dl>
                                    <dt class="text-muted">Title</dt>
                                    <dd id="title" class="fw-bold fs-4"></dd>
                                    <hr>
                                    <dt class="text-muted">Description</dt>
                                    <dd id="description" class=""></dd>
                                    <dt class="text-muted">Start</dt>
                                    <dd id="start" class=""></dd>
                                    <dt class="text-muted">Is Holiday?</dt>
                                    <dd id="holiday" class=""></dd>
                                    <dt class="text-muted">Location</dt>
                                    <dd id="location" class=""></dd>
                                </dl>



                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <div class="text-end">
                                <!-- <button type="button" class="btn btn-primary btn-sm rounded-0" id="register" data-id="">Register For events</button> -->
                                <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                                <button type="button" class="btn btn-secondary btn-sm rounded-0 btn-close" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->




            <!-- ADD Event modal -->

            <div id="dataModal2" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="">
                            <form action="includes/save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <!-- <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div> -->
                                <div class="toggle-switch">
                                    <label class="form-label">Is Holiday ?
                                    </label>
                                    <input type="hidden" id="" name="is_holiday" value="NO" class="toggle-switch-checkbox">
                                    <input type="checkbox" id="switch" name="is_holiday" class="toggle-switch-checkbox">
                                    <label for="switch" class="toggle-switch-label"></label>
                                    <div class="toggle-switch-label-text">
                                        <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="location" class="control-label">Location</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="location" id="location" required>
                                </div>
                            </form>

                            <div class="card-footer">
                                <div class="text-center">
                                    <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                    <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>

    </div>
</div>