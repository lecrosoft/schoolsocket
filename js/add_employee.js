"use strict";

const loadForm = function (method) {
  let formUrl;
  $(".dropify").dropify();

  // Translated
  $(".dropify-fr").dropify({
    messages: {
      default: "Glissez-déposez un fichier ici ou cliquez",
      replace: "Glissez-déposez un fichier ou cliquez pour remplacer",
      remove: "Supprimer",
      error: "Désolé, le fichier trop volumineux",
    },
  });
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
    formUrl = "includes/insert_employee.php";
  } else if (method === "PUT") {
    formUrl = "includes/update_student.php";
  }
  // Used events
  var drEvent = $("#input-file-events").dropify();

  drEvent.on("dropify.beforeClear", function (event, element) {
    return confirm(
      'Do you really want to delete "' + element.file.name + '" ?'
    );
  });

  drEvent.on("dropify.afterClear", function (event, element) {
    alert("File deleted");
  });

  drEvent.on("dropify.errors", function (event, element) {
    console.log("Has Errors");
  });

  var drDestroy = $("#input-file-to-destroy").dropify();
  drDestroy = drDestroy.data("dropify");
  $("#toggleDropify").on("click", function (e) {
    e.preventDefault();
    if (drDestroy.isDropified()) {
      drDestroy.destroy();
    } else {
      drDestroy.init();
    }
  });

  //  =====================END OF DROPIFY=====================

  let form = document.querySelector("#employeeForm");
  const saveBtn = document.querySelector("#save_btn");
  const photo = document.querySelector(".photo");

  function resetFile() {
    const file = document.querySelector(".photo");
    file.value = "";
  }

  let html;
  // =========SUBMITTING THE STUDENT FORM =============
  document
    .querySelector("#employeeForm")
    .addEventListener("submit", function (e) {
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
          $("#employeeForm").css("opacity", ".5");
          saveBtn.textContent = "Loading...";
          saveBtn.disabled = true;
        },
        success: function (response) {
          console.log(response.message);
          if (response.message == "success") {
            successAction("Success!", "Employee Successfully Added.", "info");
            $("#employeeForm").css("opacity", "");
            $("#employeeForm")[0].reset();
            // $("table").closest("tr").append(html);
            saveBtn.textContent = "Save";
            saveBtn.disabled = false;
            resetFile();

            var drEvent = $(".photo").dropify();
            drEvent = drEvent.data("dropify");
            drEvent.resetPreview();
            drEvent.clearElement();
            setTimeout(() => {
              location = location.href;
            }, 2000);
          } else if (response.message == "update_success") {
            successAction("Success!", "Employee Successfully Updated.", "info");
            setTimeout(() => {
              location = location.href;
            }, 2000);
          } else {
            successAction("Error!", "Failed.", "warning");
          }
        },
      });
    });
};
