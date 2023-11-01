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
    formUrl = "includes/insert_batch_subject.php";
  } else if (method === "PUT") {
    // formUrl = "includes/update_batch.php";
  }

  let form = document.querySelector("#batchSubjectForm");
  const saveBtn = document.querySelector("#save_btn");

  let html;
  // =========SUBMITTING THE STUDENT FORM =============
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Convert to an object
    // let formObj = $("#batchSubjectForm").serialize();
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
        // $("#batchSubjectForm").css("opacity", ".5");
        saveBtn.textContent = "Loading...";
        saveBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "Subject added successfully") {
          successAction("Success!", "Subject added successfully.", "info");
          //   $("#batchSubjectForm").css("opacity", "");
          //   $("#batchSubjectForm")[0].reset();

          // $("table").closest("tr").append(html);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;

          setTimeout(() => {
            location = location.href;
          }, 1000);
        }
        if (response.message == "Failed to add subject for students") {
          successAction(
            "Warning!",
            "Failed to add subject for students.",
            "warning"
          );
          //   setTimeout(() => {
          //     location = location.href;
          //   }, 1000);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
        }
        if (
          response.message == "Failed to add subject to batch_subject table"
        ) {
          successAction(
            "Warning!",
            "Failed to add subject to batch_subject table.",
            "warning"
          );
          //   setTimeout(() => {
          //     location = location.href;
          //   }, 1000);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
        }
        if (
          response.message == "Subject already exists for this batch and term"
        ) {
          successAction(
            "Warning!",
            "Subject already exists for this batch and term.",
            "warning"
          );
          //   setTimeout(() => {
          //     location = location.href;
          //   }, 1000);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
        } else if (response.message == "No students found in this batch") {
          successAction(
            "Warning!",
            "No students found in this batch. You need to add at least a student before assigning a subject",
            "warning"
          );
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
        }
      },
    });
  });
};
