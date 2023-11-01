"use strict";

const loadForm = function (method) {
  let formUrl;

  const successAction = function (alertHeading, alertText, alertIcon) {
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
    formUrl = "pay_fee.php";
  }

  // Move these variable declarations inside the functions to ensure the elements exist
  function submitSplitPayment() {
    let term_id = document.querySelector("#term_id");
    let paymentForm = document.querySelector("#feePaymentForm");
    let saveBtn = document.querySelector("#makePaymentBtn");
    let student_id = document.querySelector("#student_id").value;
    let payment_method = document.querySelector("#payment_method").value;
    let amountToPay = parseFloat(
      document.querySelector("#amount_to_pay").value
    );

    // Check for null or undefined values for each variable

    // if (
    //   !term_id ||
    //   !paymentForm ||
    //   !saveBtn ||
    //   !student_id ||
    //   !payment_method ||
    //   isNaN(amountToPay)
    // ) {
    //   console.error("One or more elements not found or invalid values.");
    //   return;
    // }

    paymentForm.addEventListener("submit", function (e) {
      e.preventDefault();

      // Move these variable assignments inside the event listener
      student_id = student_id.value;
      payment_method = payment_method.value;
      const paymentData = [];
      let overAllExtraBalance = 0;

      // Get all the rows in the table body
      const rows = document.querySelectorAll("#dataTable tbody tr");

      let currentIndex = 0;
      while (currentIndex < rows.length) {
        const row = rows[currentIndex];
        const cell = row.querySelector("td:nth-child(7)");

        if (cell) {
          const rowOutstandingAmount = parseFloat(
            cell.textContent.replace(/[^\d.]/g, "")
          );

          // Calculate extraBalance
          const extraBalance = amountToPay - rowOutstandingAmount;

          // Check if there is a next row available and extraBalance is positive
          if (currentIndex + 1 < rows.length && extraBalance > 0) {
            // Calculate the amount to pay for this row
            const amountToPayForThisRow =
              currentIndex === 0 ? amountToPay : extraBalance;

            // Create a payment data object for this row
            const paymentDataObject = {
              id: row.querySelector("td:first-child a").getAttribute("id"),
              amountToBePaid: rowOutstandingAmount,
              extraBalance: extraBalance,
              amountToPay: amountToPayForThisRow,
              itemName: row.querySelector("td:nth-child(1)").textContent.trim(),
              // Add other properties as needed
            };

            // Push the payment data object to the paymentData array
            paymentData.push(paymentDataObject);

            // Update amountToPay for the next row
            amountToPay -= amountToPayForThisRow;

            // Move to the next row
            currentIndex++;
          } else {
            // Check if there's no next row and extraBalance is positive
            if (currentIndex + 1 === rows.length && extraBalance > 0) {
              // Set overAllExtraBalance to extraBalance and break out of the loop
              overAllExtraBalance = extraBalance;
              break;
            }

            // Stop the loop if extraBalance is negative or less than 1
            if (extraBalance <= 0) {
              break;
            }

            // Move to the next row
            currentIndex++;
          }
        } else {
          // Handle the case where the cell is not found in the row
          // You may want to log an error or take appropriate action.
          currentIndex++;
        }
      }

      // Now you have the overall extraBalance stored in overAllExtraBalance
      console.log("overAllExtraBalance:", overAllExtraBalance);

      // Now you have the paymentData array containing data for the rows with extraBalance set as amountToPay.

      // Send a single AJAX request with all the data in paymentData
      $.ajax({
        url: formUrl,
        method: "POST",
        data: {
          student_id: student_id,
          amount_to_pay_now: amountToPay,
          payment_method: payment_method,
          term_id: term_id,
          paymentData: JSON.stringify(paymentData),
        },
        beforeSend: function () {
          saveBtn.textContent = "Loading...";
          saveBtn.disabled = true;
        },
        success: function (data) {
          console.log(data);
          // $("#load").html(data);
        },
        complete: function () {
          // Restore the button text and enable it after the AJAX request is complete
          saveBtn.textContent = "Make Payment";
          saveBtn.disabled = false;
        },
        error: function (error) {
          // Handle AJAX errors here
          console.error("AJAX error:", error);
        },
      });
    });
  }
  function paySingleFee() {
    // Similar changes for the variables in this function
    let term_id = document.querySelector("#single_term_id").value;
    let paymentForm = document.querySelector("#singleFeePaymentForm");
    let saveBtn = document.querySelector("#saveSinglePaymentBtn");
    let student_id = document.querySelector("#single_student_id").value;
    let payment_method = document.querySelector("#payment_method_single").value;
    let amountToPay = document.querySelector("#amount_to_pay_single").value;
    // let amountToPay = parseFloat(
    //   document.querySelector("#amount_to_pay_single").value
    // );
    let item_id = document.querySelector("#item_id").value;
    let outstanding = parseFloat(document.querySelector("#outstanding").value);

    // if (
    //   !term_id ||
    //   !paymentForm ||
    //   !saveBtn ||
    //   !student_id ||
    //   !payment_method ||
    //   !item_id ||
    //   isNaN(amountToPay)
    // ) {
    //   console.error("One or more elements not found or invalid values.");
    //   return;
    // }

    paymentForm.addEventListener("submit", function (e) {
      e.preventDefault(); // Prevent the default form submission behavior

      // Move these variable assignments inside the event listener

      $.ajax({
        url: "pay_fee.php",
        method: "POST",
        data: {
          student_id: student_id,
          amount_to_pay_now: document.querySelector("#amount_to_pay_single")
            .value,
          payment_method: document.querySelector("#payment_method_single")
            .value,
          outstanding: outstanding,
          item_id: item_id,
          paymentData: 1,
          term_id: term_id,
        },
        beforeSend: function () {
          saveBtn.textContent = "Loading...";
          saveBtn.disabled = true;
        },
        success: function (data) {
          console.log(data);
          $("#load").html(data);
          // location = `pay_fee.php?student_id=${student_id}`;
          $("#addSingleDeuFeeModal").modal("hide");
        },
        complete: function () {
          // Restore the button text and enable it after the AJAX request is complete
          saveBtn.textContent = "Make Payment";
          saveBtn.disabled = false;
        },
        error: function (error) {
          // Handle AJAX errors here
          console.error("AJAX error:", error);
        },
      });
    });
  }

  submitSplitPayment();
  paySingleFee();
};

// Call the loadForm function with the desired method
// loadForm("POST");
