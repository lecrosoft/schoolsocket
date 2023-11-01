"use strict";

const loadFormQuestion = function (method) {
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
    formUrl = "includes/insert_question.php";
  } else if (method === "PUT") {
    formUrl = "includes/update_exam_group.php";
  }

  let form = document.querySelector("#question_form");
  const saveBtn = document.querySelector("#save_btn");

  let html;
  // =========SUBMITTING THE STUDENT FORM =============
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Serialize the form data
    const formData = new FormData(document.querySelector("#question_form"));

    $("[name^='correct_answer']").each(function (index) {
      // Check if the radio button is checked
      if ($(this).is(":checked")) {
        // If checked, set its value to "true"
        formData.append(`correct_answer[${index}]`, "true");
      } else {
        // If not checked, set its value to "false"
        formData.append(`correct_answer[${index}]`, "false");
      }
    });

    console.log(formData);
    console.log(JSON.stringify(formData));

    $.ajax({
      url: formUrl,
      method: "POST",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        // $("#question_form").css("opacity", ".5");
        // saveBtn.textContent = "Loading...";
        // saveBtn.disabled = true;
      },
      success: function (response) {
        console.log(response.message);
        if (response.message == "success") {
          successAction("Success!", "Question  Successfully Added.", "info");
          $("#question_form").css("opacity", "");
          $("#question_form")[0].reset();

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
