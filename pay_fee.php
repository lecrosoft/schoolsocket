<?php include_once('includes/head.php') ?>
<?php include_once('includes/generalStats.php') ?>
<!-- <div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">SchoolSocket</p>
    </div>
</div> -->
<?php
if (isset($_POST['student_id'])) {
    $output = array();
    $response = array('message' => '', 'status' => 0);
    // $session_Id = $_POST['session_Id'];

    $user_Id = $_POST['student_id'];
    $amount_to_pay_now = $_POST['amount_to_pay_now'];
    $payment_method = $_POST['payment_method'];
    $term_Id = $_POST['term_id'];
    $item_id = $_POST['item_id'];

    $pay_method_sql = "SELECT * FROM `payment_method` WHERE `payment_method`.`id` = '" . $payment_method . "'";
    $query_pay_method_sql = $db->query($pay_method_sql);
    $row = mysqli_fetch_assoc($query_pay_method_sql);
    extract($row);



    $sql = "SELECT `abbreviation`,`arm`,`user`.`mobile_number`,`user`.`batch_id`,
    `student_category`.`student_category`,`bloodgroup`.`bloodgroup`,
    `session_title`,`user`.* FROM `user` 
LEFT JOIN `batch` ON `user`.`batch_id` = `batch`.`batch_id` 
LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
LEFT JOIN `bloodgroup` ON `bloodgroup`.`bloodgroup_id` = `user`.`blood_group_id` 
LEFT JOIN `student_category` ON `student_category`.`student_category_id` = `user`.`student_category_id` 
LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` 
WHERE `user`.`user_id` = $user_Id
";
    $query_sql = $db->query($sql);
    $row = mysqli_fetch_assoc($query_sql);
    extract($row);
    $student_batch_id = $batch_id;
    // $sql1 = "SELECT YEAR(date_of_birth) as year FROM `user` WHERE `user_id` = $id";
    // $query_sql = $db->query($sql1);
    // $row2 = mysqli_fetch_assoc($query_sql);
    // $year = $row2['year'];
    // $current_year = date('Y');
}



$item_sql = "SELECT * FROM `student_invoice` LEFT JOIN `item` ON `student_invoice`.`item_id` = `item`.`item_id` WHERE  `student_invoice`.`id` = '" . $item_id . "'";
$query_item_sql = $db->query($item_sql);
$row = mysqli_fetch_assoc($query_item_sql);
extract($row);
?>


<div class="container-fluid" id="load">

    <?php include_once('includes/payment_content.php')
    ?>


</div>
<!-- /.container-fluid -->


<!-- ================================ADD GUARDIAN MODAL ============================ -->



<!-- ================================ADD GUARDIAN MODAL ============================ -->
<script>
    document.querySelector("#proceed").addEventListener("click", function() {
        var item_id = document.getElementById("item_id").value;
        var outstanding = document.getElementById("outstanding").value;
        var amtTopay = parseFloat(document.getElementById("amtTopay").value);
        var user_id = document.getElementById("user_id").value;
        var selected_termId = document.getElementById("selected_termId").value;
        var payment_date = document.getElementById("payment_date").value;
        var selectedPayMethod = document.getElementById("selectedPayMethod").value;
        var wallet_balance = document.getElementById("wallet_balance").value;
        if (selectedPayMethod === 'Wallet') {

            if (wallet_balance < amtTopay) {
                alert('Sorry, the balance in your wallet is insufficient for the payment amount you intend to make. Please choose another payment method.')
            } else {
                alert("you can proceed to pay with your wallet")
            }


        }
        if (amtTopay > outstanding) {

            amtToBeAddedToWallet = amtTopay - outstanding
            alert(`The amount you entered is more than the outstanding fee. Therefore, ${amtToBeAddedToWallet} will be added to this student's wallet and can be used to make future payments.`)


        }

        // $.ajax({
        //     url: "includes/insert_fee_payment.php",
        //     method: "POST",
        //     data: {
        //         student_id: student_id,
        //         amount_to_pay_now: amountToPay,
        //         payment_method: payment_method,
        //         term_id: term_id,
        //         paymentData: JSON.stringify(paymentData),
        //     },
        //     beforeSend: function() {
        //         saveBtn.textContent = "Loading...";
        //         saveBtn.disabled = true;
        //     },
        //     success: function(data) {
        //         console.log(data);
        //         // $("#load").html(data);
        //     },
        //     complete: function() {
        //         // Restore the button text and enable it after the AJAX request is complete
        //         saveBtn.textContent = "Make Payment";
        //         saveBtn.disabled = false;
        //     },
        //     error: function(error) {
        //         // Handle AJAX errors here
        //         console.error("AJAX error:", error);
        //     },
        // });
    })
</script>