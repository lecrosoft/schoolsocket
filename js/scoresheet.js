const loadScoresheetList = function () {
  console.log("kkkk");
  $(".select2").select2();
  console.log("php");

  // ================================BEFORE TABLE =================================

  // ================================BEFORE TABLE =================================

  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let term_Id = document.getElementById("termId").value;
  let batch_Id = document.getElementById("batchId").value;
  let subject_id = document.getElementById("subject_id").value;
  let session_id = document.getElementById("session_id").value;
  console.log("subject value:" + subject_id);
  let tableRow = "";
  let table;

  let assessment = [];
  let x = [];
  let userids = [];

  $.ajax({
    url: `includes/fetchBatchStudentInSubjectListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}&subject_id=${subject_id}`,
    method: "POST",
    dataType: "json",
    success: function (data) {
      data.forEach((d, index) => {
        userids.push(d.user_id);
        // assessment.add(d.id);
        // assessment_name.add(d.assessment_name);
        if (d.assesment_name) {
          if (assessment.includes(d.assesment_name)) {
          } else {
            let items = {
              batch_id: d.batch_id,
              assessment_id: d.id,
              assessment_name: d.assesment_name,
            };
            x.push(items);
            assessment.push(d.assesment_name);
          }
        }
      });
      // call a function here
      if (x.length > 0) {
        let score = getStudentAssessmentScore(x, userids);
      } else {
        getStudent(userids);
      }
    },
  });

  function getStudent(userids) {
    $.ajax({
      url: "includes/fetchStudentDetails.php",
      method: "POST",
      dataType: "json",
      data: { userids },
      success: function (data) {
        let dataset = "";

        const result = {};
        console.log("Schooldata", data);

        data.forEach((d, index) => {
          dataset += `
                    <tr>
                        <td><a href='${d.userid}'>${d.student}</a></td>
                    </tr>
          
                    `;
        });

        document.getElementById("tbody").innerHTML = dataset;

        // for (const item of data) {
        //   const { student, userid, assessment_name, ...score } = item;
        //   const name = student.charAt(0).toUpperCase() + student.slice(1);
        //   if (!result[name]) {
        //     result[name] = { [assessment_name]: { ...score }, userid, student };
        //   } else {
        //     result[name][assessment_name] = { ...score };
        //   }
        // }

        // Object.keys(result).forEach(function eachKey(key) {
        //   if (assessment.length > 0) {
        //     let x = createDynamicTD(result[key], assessment);
        //     document.getElementById("tbody").appendChild(x);
        //   } else {
        //     console.log("result", result);
        //   }
        // });
      },
      error: function (obj, status, err) {
        console.log(err);
      },
    });
    return true;
  }

  function getStudentAssessmentScore(x, userids) {
    $.ajax({
      url: "includes/fetchScoresheetData.php",
      method: "POST",
      dataType: "json",
      data: { userids, x },
      success: function (data) {
        let dataset = "";
        let student_name = "";

        const result = {};
        console.log("data", data);
        for (const item of data) {
          const { student, userid, assessment_name, assessment_id, ...score } =
            item;
          const name = student.charAt(0).toUpperCase() + student.slice(1);
          if (!result[name]) {
            result[name] = {
              [assessment_name]: { ...score, assessment_id: assessment_id },
              userid,
              student,
              assessment_id,
            };
          } else {
            result[name][assessment_name] = {
              ...score,
              assessment_id: assessment_id,
            };
          }
        }

        Object.keys(result).forEach(function eachKey(key) {
          if (assessment.length > 0) {
            let x = createDynamicTD(result[key], assessment);
            document.getElementById("tbody").appendChild(x);
          } else {
            console.log("result", result);
          }
        });

        active_tbody();
      },
      error: function (obj, status, err) {
        console.log(err);
      },
    });
    return true;
  }

  function createDynamicTD(data, assessment) {
    const newObject = {
      student: data["student"],
      ...data,
    };

    console.log("new", newObject);
    let tr = document.createElement("tr");

    Object.keys(newObject).forEach(function eachKey(key) {
      if (typeof newObject[key] == "string" && key == "student") {
        let td = document.createElement("td");
        let td_data = document.createTextNode(`${newObject[key]}`);
        td.appendChild(td_data);
        tr.appendChild(td);
      }

      if (typeof newObject[key] == "string" && key == "userid") {
        let td = document.createElement("td");
        let td_data = document.createTextNode(`${newObject[key]}`);
        td.classList.add("hidden");
        td.appendChild(td_data);
        tr.appendChild(td);
      }

      if (typeof newObject[key] == "object") {
        let td = document.createElement("td");
        let td_input = document.createElement("input");
        let td_assessment_id = document.createElement("input");
        let td_userid = document.createElement("input");

        td_input.classList.add("form-control");
        td_input.classList.add("scoreclass");
        td_input.type = "number";

        td_userid.value = newObject.userid;
        td_assessment_id.value = newObject[key]["assessment_id"];
        td_input.value = newObject[key]["score"];

        td_assessment_id.classList.add("hidden");
        td_userid.classList.add("hidden");

        td.appendChild(td_input);
        td.appendChild(td_assessment_id);
        td.appendChild(td_userid);

        tr.appendChild(td);
      }
    });
    //let button = `<button class="btn btn-primary">Add</button>`;
    let td = document.createElement("td");
    let button = document.createElement("button");
    let button_title = document.createTextNode(`update`);
    button.appendChild(button_title);
    button.classList.add("btn");
    button.classList.add("btn-sm");
    button.classList.add("btn-primary");
    // button.disabled = true;
    td.appendChild(button);

    td.style.width = "10%";
    td.style.flex = "display";
    td.style.alignItems = "flex-start";
    td.style.justifyContent = "center";
    //td.classList.add("hidden");

    tr.appendChild(td);

    return tr;
  }

  const getTableData = function (url) {
    table = $(".scoresheetTable").DataTable({
      //   searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
    });
    // 000
  };
  getTableData();

  const tableClass = document.querySelector(".studentTable");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });
  tableClass.addEventListener("click", function (e) {
    let clickedBtn = e.target;

    console.log(clickedBtn);

    if (clickedBtn.classList.contains("editBtn")) {
      e.preventDefault();
      let userId = clickedBtn.getAttribute("id");
      $.ajax({
        url: "includes/edit_student.php",
        method: "POST",
        dataType: "json",
        data: { userId },
        success: function (response) {
          console.log(response);
          // $(".student_modal_scontent").html(data);
          document.querySelector("#studentModalLabel").textContent =
            "Edit Students";
          // changeId("form", "editForm");

          document.querySelector("#userId").value = response[0].user_id;
          document.querySelector("#surname").value = response[0].surname;
          document.querySelector("#firstname").value = response[0].first_name;
          document.querySelector("#middlename").value = response[0].middle_name;
          document.querySelector("#dateofbirth").value =
            response[0].date_of_birth;
          document.querySelector("#gender").value = response[0].gender;
          document.querySelector("#admission_number").value =
            response[0].admission_number;
          document.querySelector("#religion").value = response[0].religion;
          document.querySelector("#mobile_number").value =
            response[0].mobile_number;
          document.querySelector("#batch_Id_id").value =
            response[0].batch_Id_id;
          document.querySelector("#student_cat_id").value =
            response[0].student_category_id;
          document.querySelector("#blood_group").value =
            response[0].blood_group_id;
          document.querySelector("#student_type").value =
            response[0].student_type;
          document.querySelector("#health_info").value =
            response[0].health_info;
          document.querySelector("#address").value = response[0].address;
          document.querySelector("#email").value = response[0].email;
          document.querySelector("#nationalty").value =
            response[0].nationality_id;
          document.querySelector("#state").value =
            response[0].state_of_origin_id;
          // document.querySelector("#lga").value =
          //   response[0].local_gov_of_origin;
          // document.querySelector("#lga").textContent =
          //   response[0].local_gov_of_origin;
          document.querySelector("#lgaOption").value =
            response[0].local_gov_of_origin;
          document.querySelector("#lgaOption").textContent =
            response[0].local_gov_of_origin;

          formMethod = "PUT";

          $(".photo_div").toggleClass("hidden");
          $(".batch_Id_div").toggleClass("hidden");
          loadForm(formMethod);

          $("#addStudentModal").modal("show");
        },
      });
    }

    // LINK PARENT BUTTON

    if (clickedBtn.classList.contains("deleteBtn")) {
      e.preventDefault();
      userId = clickedBtn.getAttribute("id");
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "includes/delete.php",
              method: "POST",
              dataType: "json",
              data: { userId },
              success: function (response) {
                console.log(response.message);
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Your file has been deleted.",
                  "success"
                );
                setTimeout(() => {
                  location = location.href;
                }, 2000);
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
            );
          }
        });
    }

    // END OF  LINK PARENT BUTTON
  });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============

  // Get a reference to the table and the button
  var scoresheet = document.querySelector("#scoresheet");
  var addAssessmentButton = document.querySelector("#addAssessmentButton");

  // Add event listener for the button
  addAssessmentButton.addEventListener("click", function () {
    $("#assessmentModal").modal("show");
  });
  const showMoreBtn = document.querySelector(".show_more_btn");
  const more_details = document.querySelector(".more_details");
  showMoreBtn.addEventListener("click", function (e) {
    e.preventDefault();
    more_details.classList.toggle("hidden");
    if (more_details.classList.contains("hidden")) {
      showMoreBtn.textContent = "Show More";
    } else {
      showMoreBtn.textContent = "Show Less";
    }
  });
};
const toggleSwitch = document.getElementById("switch");
toggleSwitch.checked = true;
if (toggleSwitch.checked) {
  this.value = "YES";
} else {
  this.value = "NO";
}
console.log(this.value);
toggleSwitch.addEventListener("change", function () {
  if (this.checked) {
    this.value = "YES";
  } else {
    this.value = "NO";
  }
  console.log(this.value);
});
const toggleScoreSwitch = document.getElementById("score_switch");
toggleScoreSwitch.checked = true;
if (toggleScoreSwitch.checked) {
  this.value = "YES";
} else {
  this.value = "NO";
}
console.log(this.value);
toggleScoreSwitch.addEventListener("change", function () {
  if (this.checked) {
    this.value = "YES";
  } else {
    this.value = "NO";
  }
  console.log(this.value);
});

// =====================submit form ==================

let form = document.querySelector("#assessmentForm");
const saveBtn = document.querySelector("#save_btn");
const photo = document.querySelector(".photo");

function resetFile() {
  const file = document.querySelector(".photo");
  file.value = "";
}
// =========SUBMITTING THE STUDENT FORM =============
form.addEventListener("submit", function (e) {
  e.preventDefault();

  // Convert to an object
  // let formObj = $("#form").serialize();
  let formObj = new FormData(this);

  console.log(formObj);
  console.log(JSON.stringify(formObj));
  $.ajax({
    url: "includes/insert_assessment.php",
    method: "POST",
    data: formObj,
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function () {
      $("#assessmentForm").css("opacity", ".5");
      saveBtn.textContent = "Loading...";
      saveBtn.disabled = true;
    },
    success: function (response) {
      console.log(response.message);
      if (response.message == "success") {
        // Get the number of assessment columns currently in the table
        var numAssessments =
          scoresheet.querySelector("thead tr").childElementCount - 2;

        // Prompt the user to enter the name and max score of the new assessment
        var assessmentName = document.querySelector("#abbreviation").value;
        var abbreviation = document.querySelector("#abbreviation").value;
        var maxScore = document.querySelector("#possible_points").value;

        // Create a new table header cell for the assessment column
        var newHeaderCell = document.createElement("th");
        newHeaderCell.style.width = "100px";

        newHeaderCell.innerHTML = `<div class="d-flex flex-column">
        <div class="assessment_title scoresheet_th">${abbreviation}</div>
        <div class="abbreviation text-primary" style="">
          ${assessmentName}
        </div>
        <div class="max-score text-primary">${maxScore}</div>
      </div>`;

        // Create a new table data cell for each student in the assessment column
        scoresheet.querySelectorAll("tbody tr").forEach(function (studentRow) {
          var newDataCell = document.createElement("td");
          newDataCell.min = 1;
          var newInputField = document.createElement("input");
          newInputField.type = "number";
          newInputField.classList.add("form-control");
          newInputField.name = "score" + (numAssessments + 1);
          newInputField.max = maxScore;
          newDataCell.appendChild(newInputField);
          studentRow.appendChild(newDataCell);
        });

        // Append the new header cell to the table header row
        scoresheet.querySelector("thead tr").appendChild(newHeaderCell);

        $.toast({
          heading: "Success!",
          text: "Assessment Successfully Added.",
          position: "top-right",
          loaderBg: "#ff6849",
          icon: "info",
          hideAfter: 3500,
          stack: 6,
        });
        $("#assessmentForm").css("opacity", "");
        $("#assessmentForm")[0].reset();
        saveBtn.textContent = "Save";
        saveBtn.disabled = false;
        resetFile();

        var drEvent = $(".photo").dropify();
        drEvent = drEvent.data("dropify");
        drEvent.resetPreview();
        drEvent.clearElement();
      }
    },
  });
});

// =====================submit form ==================

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

function active_tbody() {
  let term_Id = document.getElementById("termId").value;
  let batch_Id = document.getElementById("batchId").value;
  let subject_Id = document.getElementById("subjectId").value;
  let session_Id = document.getElementById("session_id").value;
  let details = [];
  let x = document.getElementById("tbody");

  x.addEventListener("click", function (e) {
    if (e.target.classList.contains("scoreclass")) {
      e.target.addEventListener("change", function (event) {
        parentElem = e.target.parentElement.parentElement;
        x = parentElem.lastElementChild;
        // x.children[0].disabled = false;
        x.children[0].addEventListener("click", function (e) {
          for (let i = 0; i < parentElem.children.length; i++) {
            if (parentElem.children[i].children[0] != undefined) {
              if (
                parentElem.children[i].children[0].classList.contains(
                  "scoreclass"
                )
              ) {
                if (parentElem.children[i]) {
                  let item = {
                    assessment_id: parentElem.children[i].children[1].value,
                    score: parentElem.children[i].children[0].value,
                    userid: parentElem.children[i].children[2].value,
                    session_id: session_Id,
                    batch_id: batch_Id,
                    term_id: term_Id,
                    subject_id: subject_Id,
                  };
                  details.push(item);
                }

                // console.log("items", item);
              }
            }
          }
          //Save
          $.ajax({
            url: `includes/saveassessment.php`,
            method: "POST",
            data: { data: details },
            dataType: "json",
            success: function (data) {
              details = [];
              successAction("Success!", data.message, "info");
            },
            error: function (obj, status, err) {
              console.log(err);
            },
          });
        });
      });
    }
  });
}

// function submitAccessment(data, btn) {
//   $.ajax({
//     url: `includes/saveassessment.php`,
//     method: "POST",
//     data: { data },
//     dataType: "json",
//     success: function (data) {
//       // call a function here
//       btn.disabled = true;
//       console.log("return", data);
//     },
//     error: function (obj, status, err) {
//       console.log(err);
//     },
//   });
// }
