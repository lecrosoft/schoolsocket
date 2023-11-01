$(document).ready(function () {
  const senderId = document.querySelector("#sender_id").value;
  const selectContact = document.querySelector("#select_contact");
  const messageBody = document.querySelector("#message_body");
  const apiKey = document.querySelector("#api_key").value;
  const sendSmsBtn = document.querySelector("#send_sms_btn");
  const balanceBtn = document.querySelector(".msg_balance");
  const contactGroup = selectContact.value;
  const message_template = document.querySelector("#sms_template");

  message_template.addEventListener("change", function () {
    template_id = message_template.value;
    $.ajax({
      url: "includes/get_message_template.php",
      method: "POST",
      data: { template_id },
      dataType: "json",
      success: function (response) {
        console.log(response[0].content);
        messageBody.textContent = response[0].content;
      },
    });
  });

  const fieldCheckAlert = function (msg) {
    Swal.fire(`Empty field`, `${msg}`, `warning`);
  };

  // FETCH  CONTACT  FROM DB
  const contact = async function () {
    try {
      const res = await fetch(
        `includes/send_sms.php?select_contact=${
          document.querySelector("#select_contact").value
        }`
      );
      const numberData = await res.json();
      if (!res.ok) throw new Error(`${numberData.message},${res.status}`);
      console.log(numberData.member);
      // END OF FETCH  CONTACT FROM DB

      const dataTwo = {
        to: numberData.member,
        from: senderId,
        sms: document.querySelector("#message_body").value,
        type: "plain",
        channel: "generic",
        api_key: apiKey,
      };

      var data = JSON.stringify(dataTwo);
      const request = await fetch("https://api.ng.termii.com/api/sms/send", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: data,
      });
      let alertClass;
      let alertMessage;
      const response = await request.json();
      console.log(response);
      const message = response.message;
      const balance = response.balance;
      const messageId = response.message_id;
      const messageSent = document.querySelector("#message_body").value;
      const contactGroupSelected =
        document.querySelector("#select_contact").value;
      //   SEND MESSAGE BUTTON ALTER FUNCTION
      const alterSendButton = function (
        alertClassActive,
        alertMessageActive,
        buttonText,
        disable
      ) {
        alertClass = alertClassActive;
        alertMessage = alertMessageActive;
        sendSmsBtn.textContent = buttonText;
        sendSmsBtn.disabled = disable;
      };
      //   END OF SEND MESSAGE BUTTON ALTER FUNCTION

      // MESSAGE SUCCESS CHECK
      if (response.message === "Successfully Sent") {
        balanceBtn.textContent = balance;
        alterSendButton("success", "Good Job", "SEND MESSAGE", false);

        // SUBMIT TO DATABASE MESSAGE HISTORY AND UPDATE MESSAGE BALANCE
        const updateDatabase = await fetch("update_sms.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            messageId,
            balance,
            message,
            senderId,
            contactGroupSelected,
            messageSent,
          }),
        });
        const getDataBaseData = await updateDatabase.json();
        console.log(getDataBaseData);
        //END OF SUBMIT TO DATABASE MESSAGE HISTORY AND UPDATE MESSAGE BALANCE

        messageBody.value = "";
      } // END OF MESSAGE SUCCESS CHECK
      else {
        alterSendButton("warning", "Message Failed", "TRY AGAIN", false);
      }
      Swal.fire(`${alertMessage}`, `${message}!`, `${alertClass}`); // GENERAL RESPONSE MESSAGE
    } catch (err) {
      //   Swal.fire(`Error`, `${err}!`, `warning`);
      console.log(err);
      sendSmsBtn.disabled = false;
      sendSmsBtn.textContent = "TRY AGAIN";
      //   alterSendButton("", "", "TRY AGAIN", false); OF
    }
  };

  //   SEND SMS BUTTON CLICK EVENTS
  sendSmsBtn.addEventListener("click", function () {
    //   e.preventDefault();SalesloadingSalesloading
    if (document.querySelector("#select_contact").value === "") {
      fieldCheckAlert("The Contact group can not be empty!");
    }
    if (document.querySelector("#message_body").value === "") {
      fieldCheckAlert("The message content can not be empty!");
    } else {
      this.textContent = "SENDING...";
      this.disabled = true;
      contact();
    }
  });
  //  END  SEND SMS BUTTON CLICK EVENTS
});
