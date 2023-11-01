"use strict";
const loadAttendanceForm = function (method) {
  let attendanceFormUrl;

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
    attendanceFormUrl = "includes/insert_batch_attendance.php";
  } else if (method === "PUT") {
    attendanceFormUrl = "includes/update_batch.php";
  }

  let attendanceForm = document.querySelector("#submit_attendance_form");
  const saveBtn = document.querySelector("#save_btn");

  let html;
  // =========SUBMITTING THE STUDENT attendanceForm =============
  attendanceForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Convert to an object
    // let attendanceFormObj = $("#batchSubjectattendanceForm").serialize();
    // let attendanceFormObj = new FormData(this);
    let attendanceFormObj = new FormData(this);
    // Manually append the button value to the form data
    // attendanceFormObj.append(
    //   "attendance_value",
    //   document.getElementById("myButton").value
    // );
    $('button[name="attendance_value[]"]').each(function () {
      attendanceFormObj.append("attendance_value[]", $(this).val());
    });

    console.log(attendanceFormObj);
    console.log(JSON.stringify(attendanceFormObj));

    $.ajax({
      url: attendanceFormUrl,
      method: "POST",
      data: attendanceFormObj,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        // $("#batchSubjectattendanceForm").css("opacity", ".5");
        saveBtn.textContent = "Loading...";
        saveBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "success") {
          successAction("Success!", "Attendance Successfully Added.", "info");
          //   $("#batchSubjectattendanceForm").css("opacity", "");
          //   $("#batchSubjectattendanceForm")[0].reset();

          // $("table").closest("tr").append(html);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;

          setTimeout(() => {
            location = location.href;
          }, 1000);
        }
        if (response.message == "Exist") {
          successAction(
            "Warning!",
            "Subject Already Exist In This Batch.",
            "warning"
          );
          //   setTimeout(() => {
          //     location = location.href;
          //   }, 1000);
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
        } else if (response.message == "no_student") {
          successAction(
            "Warning!",
            "No Student  In This Batch. You need to add at least a student before assigning a subject",
            "warning"
          );
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
        }
      },
    });
  });
};
