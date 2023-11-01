<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home2" type="button" role="tab" aria-controls="pills-home2" aria-selected="true">Due Fees</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile2" aria-selected="false">Transactions</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact2" aria-selected="false">Fee Config</button>
    </li>

</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab">
        <?php include('single_student_fees_list.php') ?>

    </div>
    <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php include('single_student_fees_list.php') ?>
    </div>
    <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>