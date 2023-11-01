<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="student_profile?id=<?php echo $user_Id ?>"><i class="fa fa-arrow-left"></i> Student Profile</a> </h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <h6>Pay Fees</h6>
                <div class="d-flex" style="gap: 1rem;">


                    <div class="picture">
                        <p class="text-gray-600 small">Student name</p>
                        <h5 class="fw-bold" style="margin-top: -0.7rem;text-transform:capitalize"><?php echo $surname . ' ' . $first_name . ' ' . $middle_name ?></h5>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex">
                    <div class="fee_detail">
                        <p class="text-success">Payment Method</p>
                        <h6 class="fw-bold" style="margin-top: -0.7rem;"><?php echo $payment_method ?></h6>
                        <div class="d-flex" style="gap: 1rem;">


                        </div>
                    </div>
                    <div class="options">
                        <i class="fa fa-pencil text-primary"></i>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex" style="gap:2rem">
                    <div class="fee_detail">
                        <p class="text-gray-600 small">Wallet Balance</p>
                        <h4 class="fw-bold text-primary" style="margin-top: -0.7rem;"><?php echo $currency_symbol ?><?php echo number_format($wallet_balance) ?></h4>
                    </div>
                    <div class="fee_detail">
                        <p class="text-gray-600 small">Due Fees</p>
                        <h4 class="fw-bold text-danger" style="margin-top: -0.7rem;"><?php echo $currency_symbol ?><?php echo number_format($outstanding) ?></h4>
                    </div>

                </div>
            </div>
        </div>

        <input type="hidden" id="item_id" value="<?php echo $id ?>" />
        <input type="hidden" id="outstanding" value="<?php echo $outstanding ?>" />
        <input type="hidden" id="amtTopay" value="<?php echo $amount_to_pay_now ?>" />
        <input type="hidden" id="user_id" value="<?php echo $user_Id ?>" />
        <input type="hidden" id="selected_termId" value="<?php echo $term_id ?>" />
        <input type="hidden" id="selectedPayMethod" value="<?php echo $payment_method ?>" />
        <input type="hidden" id="wallet_balance" value="<?php echo $wallet_balance ?>" />
        <input type="date" id="payment_date" class="form-control" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>" />


        <table class="table" id="fee_table">
            <thead>
                <tr>
                    <th>FEE TYPE</th>
                    <th>EXPECTED AMOUNT</th>
                    <th>INITIAL PAYMENT MADE</th>
                    <th>AMOUNT TO PAY</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $item_name ?></td>
                    <td><?php echo number_format($expected_amount) ?></td>
                    <td><?php echo number_format($amount_paid) ?></td>
                    <td><?php echo number_format($amount_to_pay_now) ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-primary">
                        Amount to pay <?php echo $currency_symbol ?><?php echo number_format($amount_to_pay_now) ?>
                        <br>
                        <button id="proceed" class="btn btn-success">Proceed</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Content Row -->