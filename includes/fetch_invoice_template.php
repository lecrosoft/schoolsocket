<?php include_once('init.php') ?>
<form action="" id="invoice_form">
    <div class="row">
        <div class=" col-xl-3 col-md-6 mb-4 form-group">
            <label for="">SESSION </label>
            <select name="session_id" id="" class="form-control form-select">
                <?php
                $sql = "SELECT * FROM `academy_session` WHERE `academy_session`.`status` = 'Active'";
                $query_sql = $db->query($sql);
                $active_section_row = mysqli_fetch_assoc($query_sql);
                $active_section_name = $active_section_row['session_title'];
                $active_section_id = $active_section_row['session_id'];
                ?>
                <option value="<?php echo $active_section_id ?>"><?php echo $active_section_name ?></option>
            </select>
        </div>
        <div class="col-xl-3 col-md-6 mb-4 form-group">
            <label for="">TERM </label>
            <select name="term_id" id="" class="form-control form-select">
                <?php
                $sql = "SELECT * FROM `term` WHERE `term`.`status` = 'Active'";
                $query_sql = $db->query($sql);
                $active_term_row = mysqli_fetch_assoc($query_sql);
                $active_term_name = $active_term_row['term_name'];
                $active_term_id = $active_term_row['term_id'];
                ?>
                <option value="<?php echo $active_term_id ?>"><?php echo $active_term_name ?></option>
            </select>

        </div>



    </div>
    <hr>
    <div class="d-flex flex-column">
        <p>Invoice Template Content</p>
        <small> Items that are set as compulsory will be available in every student's invoice in the level selected below.</small>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Type</th>
                <th>*</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 30%; height:36px;">
                    <select class="select2 form-control form-select item" style="width: 100%; height:36px;" data-placeholder="" name="item_id[]" id="item_id" required>
                        <option value="">Select</option>
                        <?php
                        $query = $global::fetchAll('SELECT * FROM `item`');
                        while ($row = mysqli_fetch_array($query)) {
                            extract($row);
                        ?>
                            <option value=<?php echo $item_id ?>><?php echo $item_name ?></option>
                        <?php
                        }
                        ?>


                    </select>
                </td>
                <td style="width: 20%; height:36px;"><input type="number" min="1" class="form-control price" id="price" name="price[]" required></td>
                <td style="width: 10%; height:36px;"><input type="number" min="1" class="form-control qty" value="1" id="qty" name="qty[]" required></td>
                <td style="width: 20%; height:36px;"><input type="text" class="form-control total" name="total[]" id="total" readonly required></td>
                <td style="width: 20%; height:36px;"><select name="type[]" id="type" class="form-select form-control type">
                        <option value="Compulsary">Compulsary</option>
                        <option value="Optional">Optional</option>
                    </select></td>
                <td><button type="button" class="btn  btn-danger btn_del" id="btn_del"><i class=" fa fa-trash"></i></button></td>
            </tr>
        </tbody>
    </table>

    <div class="form-group">
        <button class="btn btn-primary" id="add_item">
            <i class="fa fa-plus"></i> Add Item
        </button>
    </div>
    <div class="form-group">
        <label for="">Additional Note</label>
        <textarea name="note" id="" cols="30" rows="10" style="height:100px" class="form-control">Additional Note</textarea>
    </div>
    <div class="form-group">
        <label for="">
            <p>Class Level</p>
            <small>Select a level to apply this invoice to.</small>
        </label>
        <select name="batch_id" id="" class="form-control form-select" required>
            <?php $sql = "SELECT `arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`abbreviation`,`session_title` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` WHERE `batch`.`invoice` IS NULL";
            $query_sql = $db->query($sql);
            while ($row = mysqli_fetch_assoc($query_sql)) {
                extract($row);
            ?>
                <option value="<?php echo $batch_id ?>"><?php echo $abbreviation . ' ' . $arm  . ' ' . $session_title ?></option>
            <?php
            }

            ?>
        </select>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" id="save_btn" class="btn btn-primary" href="">Save and Apply</button>
    </div>
</form>
<script src=""></script>
<script>
    const removeTr = function() {
        const delBtn = document.querySelectorAll('.btn_del');

        for (d of delBtn) {
            d.addEventListener('click', function(e) {
                e.preventDefault();
                // console.log(this.parentElement.parentElement.remove(tr));
                this.parentElement.parentElement.remove('tr');
            })
        }
    }
    const calcFields = function() {

        const prices = document.querySelectorAll('.price')
        const qty = document.querySelectorAll('.qty')
        const calCprice = function() {
            const total = this.parentElement.parentElement.children[3].children[0];
            const qty = this.parentElement.parentElement.children[2].children[0];

            total.value = this.value * qty.value;
            console.log(total);
        }
        for (d of prices) {
            d.addEventListener('keyup', calCprice)
            d.addEventListener('change', calCprice)
        }
        const calcQty = function() {
            const total = this.parentElement.parentElement.children[3].children[0];
            const price = this.parentElement.parentElement.children[1].children[0];

            total.value = this.value * price.value;
            console.log(total);
        }
        for (d of qty) {
            d.addEventListener('keyup', calcQty);
            d.addEventListener('change', calcQty);
        }
    }
    calcFields();
    removeTr();
    let html = `<tr>
                <td style="width: 30%; height:36px;">
                    <select class="select2 form-control form-select item" style="width: 100%; height:36px;" data-placeholder="" name="item_id[]" id="item_id" required>
                        <option value="">Select</option>
                        <?php
                        $query = $global::fetchAll('SELECT * FROM `item`');
                        while ($row = mysqli_fetch_array($query)) {
                            extract($row);
                        ?>
                            <option value=<?php echo $item_id ?>><?php echo $item_name ?></option>
                        <?php
                        }
                        ?>


                    </select>
                </td>
                <td style="width: 20%; height:36px;"><input type="number" min="1" class="form-control price" id="price" name="price[]" required ></td>
                <td style="width: 10%; height:36px;"><input type="number" min="1" class="form-control qty" value="1" id="qty" name="qty[]" required ></td>
                <td style="width: 20%; height:36px;"><input type="text" class="form-control total" name="total[]" id="total" readonly></td>
                <td style="width: 20%; height:36px;"><select name="type[]" id="type" class="form-select form-control type" required >
                        <option value="Compulsary">Compulsary</option>
                        <option value="Optional">Optional</option>
                    </select></td>
                <td><button type="button" class="btn  btn-danger btn_del" id="btn_del"><i class="fa fa-trash"></i></button></td>
            </tr>`;

    const addItemBtn = document.querySelector('#add_item');
    addItemBtn.addEventListener('click', function(e) {
        e.preventDefault();
        // if (document.querySelector('.item').value == '') {
        //     alert('bibbi')
        // } else {
        //     $('tbody').append(html);
        // }

        $('tbody').append(html);
        removeTr();
        calcFields();
    })

    // $('.btn_del').on('click', function(e) {
    //     e.preventDefault()
    //     $(this).parent().parent().remove()
    // })
    let formMethod = "POST";
    const loadForm = function(method) {
        let formUrl;

        const successAction = function(alertHeading, alertText, alertIcon) {
            $.toast({
                heading: alertHeading,
                text: alertText,
                position: "top-right",
                loaderBg: "#ff6849",
                icon: alertIcon,
                hideAfter: 3500,
                stack: 6,
            });
        };
        if (method === "POST") {
            formUrl = "includes/insert_invoice.php";
        } else if (method === "PUT") {
            formUrl = "includes/update_batch.php";
        }

        let form = document.querySelector("#invoice_form");
        const saveBtn = document.querySelector("#save_btn");

        let html;
        // =========SUBMITTING THE STUDENT FORM =============
        form.addEventListener("submit", function(e) {
            e.preventDefault();

            // Convert to an object
            // let formObj = $("#invoice_form").serialize();
            let formObj = new FormData(this);

            console.log(formObj);
            console.log(JSON.stringify(formObj));

            $.ajax({
                url: formUrl,
                method: "POST",
                data: formObj,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#invoice_form").css("opacity", ".5");
                    saveBtn.textContent = "Loading...";
                    saveBtn.disabled = true;
                },
                success: function(response) {
                    console.log(response.message);
                    if (response.message == "success") {
                        successAction("Success!", "Invoice Successfully Created.", "info");
                        $("#invoice_form").css("opacity", "");
                        $("#invoice_form")[0].reset();

                        // $("table").closest("tr").append(html);
                        saveBtn.textContent = "Save";
                        saveBtn.disabled = false;

                        setTimeout(() => {
                            location = location.href;
                        }, 1000);
                    }
                    if (response.message == "failed") {
                        // successAction("Failed!", "Invoice can not be created for a batch with empty student.Go back to add student to the batch and come back to create invoice for this batch!", "warning");
                        // setTimeout(() => {
                        //     location = location.href;
                        // }, 2000);
                        const swalWithBootstrapButtons_one = Swal.mixin({
                            customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger",
                            },
                            buttonsStyling: false,
                        });

                        swalWithBootstrapButtons_one.fire({
                            title: "Alert!",
                            text: "Please add students to the batch before creating an invoice!",
                            icon: "warning",

                            confirmButtonText: "OK!",

                            reverseButtons: true,
                        });
                        setTimeout(() => {
                            location = location.href;
                        }, 2000);

                    }
                },
            });
        });
    };


    loadForm(formMethod);
</script>