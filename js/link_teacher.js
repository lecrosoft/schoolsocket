"use strict";

const linkTeacher = function () {
  let formUrl = "includes/insert_link_teacher.php";
  //   let formUrl;

  // Translated

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
  //   if (method === "POST") {
  //     formUrl = "includes/insert_student.php";
  //   } else if (method === "PUT") {
  //     formUrl = "includes/update_student.php";
  //   }
  // Used events
  //  =====================END OF DROPIFY=====================

  let linkTeacherForm = document.querySelector("#linkTeacherForm");
  const linkTeacherBtn = document.querySelector("#linkTeacherBtn");

  let html;
  // =========SUBMITTING THE STUDENT FORM =============
  linkTeacherForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Convert to an object
    // let formObj = $("#form").serialize();
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
        // $("#form").css("opacity", ".5");
        // linkTeacherBtn.textContent = "Loading...";
        // linkTeacherBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "success") {
          successAction(
            "Success!",
            "Class Teacher   Successfully Linked.",
            "info"
          );
          //   $("#form").css("opacity", "");
          //   $("#form")[0].reset();

          // $("table").closest("tr").append(html);
          linkTeacherBtn.textContent = "Save";
          linkTeacherBtn.disabled = false;
          setTimeout(() => {
            location = location.href;
          }, 1000);
        } else if (response.message == "failed") {
          successAction(
            "Failed!",
            "Assistant Teacher Already Exist.",
            "warning"
          );
        }
      },
    });
  });
};
