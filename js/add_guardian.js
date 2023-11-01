"use strict";
$(document).ready(function () {
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

  let form = document.querySelector("#form");
  const saveBtn = document.querySelector("#save_btn");
  //   const photo = document.querySelector(".photo");

  //   function resetFile() {
  //     const file = document.querySelector(".photo");
  //     file.value = "";
  //   }
  // =========SUBMITTING THE STUDENT FORM =============
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Convert to an object
    // let formObj = $("#form").serialize();
    let formObj = new FormData(this);

    console.log(formObj);
    console.log(JSON.stringify(formObj));
    $.ajax({
      url: "includes/insert_guardian.php",
      method: "POST",
      data: formObj,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#form").css("opacity", ".5");
        saveBtn.textContent = "Loading...";
        saveBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "success") {
          $.toast({
            heading: "Success!",
            text: "Guardian Successfully Added.",
            position: "top-right",
            loaderBg: "#ff6849",
            icon: "info",
            hideAfter: 3500,
            stack: 6,
          });
          $("#form").css("opacity", "");
          $("#form")[0].reset();
          saveBtn.textContent = "Save";
          saveBtn.disabled = false;
          setTimeout(() => {
            location = location.href;
          }, 300);
          //   resetFile();

          //   var drEvent = $(".photo").dropify();
          //   drEvent = drEvent.data("dropify");
          //   drEvent.resetPreview();
          //   drEvent.clearElement();
        }
      },
    });
  });
});
