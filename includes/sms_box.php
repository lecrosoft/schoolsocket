<?php $balance_sql = "SELECT `balance` FROM `sms_settings` WHERE `id` = 1";
$query_balance_sql = $db->query($balance_sql);
$row = mysqli_fetch_assoc($query_balance_sql);
extract($row);

?>
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4 form-group">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <select name="" id="sms_template" class="form-control">
                            <option value="">Select Message Template</option>

                            <?php
                            $template_sql = "SELECT * FROM `message_template`";
                            $query_template_sql = $db->query($template_sql);
                            while ($row = mysqli_fetch_assoc($query_template_sql)) {
                                extract($row);

                            ?>
                                <option value="<?php echo $id ?>"><?php echo $template_title ?></option>
                            <?php
                            };


                            ?>
                        </select>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class=" col-xl-3 col-md-6 mb-4 form-group">

        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <button type="button" class="btn  btn-primary">
                            SMS Unit Balance &nbsp; <span class="badge badge-light text-dark msg_balance"><?php echo $balance; ?></span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4 form-group">


    </div>
</div>




<!-- ================== PAGE HEADER COMES IN ==================== -->

<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <h4 class="card-title ">

                    </h4>

                    <!-- ====================== tab starts ============================= -->
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <?php
                            $mail_sql = 'SELECT * FROM `sms_settings` WHERE `sms_settings`.`id` = 1';
                            $query_mail_sql = $db->query($mail_sql);
                            $row = mysqli_fetch_assoc($query_mail_sql);
                            extract($row);
                            ?>
                            <div class="form-group col-md-6">
                                <input type="text" hidden name="user_name" class="receipient_email_array form-control" placeholder="Sender Name" Value="<?php echo $sender_name ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" hidden name="sender_api" id="api_key" class=" form-control" placeholder="Api" Value="<?php echo $api_key ?>">
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Select Sender ID</label>
                                <select name="sender_id" class=" form-control form-select" id="sender_id">
                                    <?php $sql = "SELECT * FROM `sms_sender_id`";
                                    $query_sql = $db->query($sql);

                                    while ($row = mysqli_fetch_assoc($query_sql)) {
                                        extract($row);
                                        echo "<option value='$sender_id'>$sender_id</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Which group do you want to send SMS to</label>
                                <select name="select_contact" id="select_contact" class="form-control form-select">
                                    <option value="">===Select Group === </option>
                                    <option value="parent_only">Parent Only </option>
                                    <option value="all_staffs">All Staffs </option>
                                    <option value="academic_staffs">All Academic Staffs </option>
                                    <option value="non_academic_staffs">All Non Academic Staffs </option>
                                    <option value="debtors">Debtors</option>
                                    <option value="Alumni">Alumni</option>
                                </select>
                            </div>

                        </div>


                        <div class="message-content">
                            <div class="form-group">
                                <label for="">Message Text</label>
                                <textarea class="form-control" name="body" id="message_body" cols="30" rows="10" placeholder="Enter your message here"></textarea>
                            </div>
                            <button type="button" name="send" id="send_sms_btn" class="btn btn-primary">SEND MESSAGE</button>
                        </div>
                    </form>



                </div>

            </div>
        </div>


    </div>
</div>