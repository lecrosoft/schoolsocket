"use strict";

const linkParent = function () {
  let formUrl = "includes/insert_link_parent.php";
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

  let linkParentForm = document.querySelector("#linkParentForm");
  const linkParentBtn = document.querySelector("#linkParentBtn");

  function resetFile() {
    const file = document.querySelector(".photo");
    file.value = "";
  }

  let html;
  // =========SUBMITTING THE STUDENT FORM =============
  linkParentForm.addEventListener("submit", function (e) {
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
        $("#form").css("opacity", ".5");
        linkParentBtn.textContent = "Loading...";
        linkParentBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "success") {
          successAction(
            "Success!",
            "Student and Parent  Successfully Linked.",
            "info"
          );
          $("#form").css("opacity", "");
          $("#form")[0].reset();

          // $("table").closest("tr").append(html);
          linkParentBtn.textContent = "Save";
          linkParentBtn.disabled = false;
          resetFile();
          setTimeout(() => {
            location = location.href;
          }, 3000);
        } else if (response.message == "update_success") {
          successAction("Success!", "Student Successfully Updated.", "info");
        }
      },
    });
  });
};
