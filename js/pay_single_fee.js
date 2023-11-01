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

  function paySingleFee() {
    term_id = document.querySelector("#single_term_id").value;
    paymentForm = document.querySelector("#singleFeePaymentForm");
    saveBtn = document.querySelector("#saveSinglePaymentBtn");
    paymentForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const student_id = document.querySelector("#single_student_id").value;
      const payment_method = document.querySelector(
        "#payment_method_single"
      ).value;
      amountToPay = parseFloat(
        document.querySelector("#amount_to_pay_single").value
      );
      $.ajax({
        url: formUrl,
        method: "POST",
        data: {
          student_id: student_id,
          amountToPay: amountToPay,
          payment_method: payment_method,
          term_id: term_id,
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

  // Now you have the paymentData array containing data for the rows with extraBalance set as amountToPay.

  // Send a single AJAX request with all the data in paymentData
};

// Call the loadForm function with the desired method
// loadForm("POST");
