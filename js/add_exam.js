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
    formUrl = "includes/insert_exam.php";
  } else if (method === "PUT") {
    formUrl = "includes/update_exam_group.php";
  }

  let form = document.querySelector("#exam_form");
  const saveBtn = document.querySelector("#save_btn");

  let html;
  // =========SUBMITTING THE STUDENT FORM =============
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Convert to an object
    // let formObj = $("#exam_form").serialize();
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
      beforeSend: function () {
        $("#exam_form").css("opacity", ".5");
        saveBtn.textContent = "Loading...";
        saveBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "success") {
          successAction("Success!", "Exam Successfully Added.", "info");
          $("#exam_form").css("opacity", "");
          $("#exam_form")[0].reset();

          // $("table").closest("tr").append(html);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;

          setTimeout(() => {
            location = location.href;
          }, 1000);
        } else if (response.message == "update_success") {
          successAction("Success!", "Exam  Successfully Updated.", "info");
          setTimeout(() => {
            location = location.href;
          }, 1000);
        }
      },
    });
  });
};
