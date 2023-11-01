const loadStudentAttendance = function () {
  console.log("kkkk");
  $(".select2").select2();
  console.log("php");
  let attendance_date = document.querySelector("#attendance_date").value;
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let term_Id = document.getElementById("termId").value;
  let batch_Id = document.getElementById("batchId").value;
  let session_id = document.getElementById("session_id").value;
  let tableRow = "";
  let table;

  $.ajax({
    url: "includes/find_attendance_date.php",
    method: "POST",
    dataType: "json",
    data: { attendance_date, term_Id, batch_Id, session_id },
    success: function (response) {
      console.log(response);
      if (response.message == "Attendance Not Taken") {
        document.querySelector("#attendanceStatus").textContent =
          "Attendance Not Taken";
        document
          .querySelector("#attendanceStatus")
          .classList.add("label-danger");
        getTableData(
          `includes/fetchBatchStudentListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}`
        );
      } else if (response.message == "Attendance Taken") {
        document.querySelector("#attendanceStatus").textContent =
          "Attendance Taken";
        document
          .querySelector("#attendanceStatus")
          .classList.add("label-success");
        getTableUpdatedData(
          `includes/updateAttendanceListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}&attendance_date=${attendance_date}`
        );
      }
    },
  });

  const getTableData = function (url) {
    table = $(".attendanceTable").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },
      columns: [
        {
          data: "surname",
          render: function (data, type, row, meta) {
            if (type === "display") {
              // Rendering the name and photo
              let name =
                row.surname + " " + row.first_name + " " + row.middle_name;
              let photo = row.photo == "" ? "undraw_profile.svg" : row.photo;
              let admissionNumber = row.admission_number
                ? `(${row.admission_number})`
                : "";

              data = `
              <input type="hidden" name="user_id[]" value="${row.user_id}">
              <a class="dropdown-list-image" href="student_profile?id=${row.user_id}">
                <img src="img/${photo}" alt="user" class="img-circle rounded-circle" />
                ${name}
              </a>
              <span>${admissionNumber}</span>`;
            }
            return data;
          },
        },
        {
          data: "user_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<button type="button" class="fa fa-check text-primary attendance_btn" style="border:none;outline:none;height:40px; width:40px;" name="attendance_value[]" value="Present" > </button>`;
            }
            return data;
          },
        },
        {
          data: "user_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<select class="form-select form-control" name="late[]"><option value="NO">NO</option><option value="YES">YES</option></select>`;
            }
            return data;
          },
        },
        {
          data: "user_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<input type="text" class="form-control shadow-nonet" style="border:none;outline:none" name="half_day[]" />`;
            }
            return data;
          },
        },
        {
          data: "user_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<input type="text" class="form-control shadow-nonet" style="border:none;outline:none" name="comment[]">`;
            }
            return data;
          },
        },
      ],
    });
  };
  const getTableUpdatedData = function (url) {
    table = $(".attendanceTable").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },
      columns: [
        {
          data: "surname",
          render: function (data, type, row, meta) {
            if (type === "display") {
              // Rendering the name and photo
              let name =
                row.surname + " " + row.first_name + " " + row.middle_name;
              let photo = row.photo == "" ? "undraw_profile.svg" : row.photo;
              let admissionNumber = row.admission_number
                ? `(${row.admission_number})`
                : "";

              data = `
              <input type="hidden" name="user_id[]" value="${row.user_id}">
              <a class="dropdown-list-image" href="student_profile?id=${row.user_id}">
                <img src="img/${photo}" alt="user" class="img-circle rounded-circle" />
                ${name}
              </a>
              <span>${admissionNumber}</span>`;
            }
            return data;
          },
        },
        {
          data: "attendance_value",
          render: function (data, type, row, meta) {
            if (type === "display") {
              // Rendering the attendance button
              let attendanceBtn =
                row.attendance_value == "Present"
                  ? "fa-check text-primary"
                  : "fa-times text-danger";
              let attendanceValue =
                row.attendance_value == "Present" ? "Present" : "Absent";

              data = `
              <button type="button" class="fa ${attendanceBtn} attendance_btn" style="border:none;outline:none;height:40px; width:40px;" name="attendance_value[]" value="${attendanceValue}"></button>`;
            }
            return data;
          },
        },
        {
          data: "late",
          render: function (data, type, row, meta) {
            if (type === "display") {
              // Rendering the late dropdown
              let lateOption =
                row.late == "NO"
                  ? `<option value="NO" selected>NO</option><option value="YES">YES</option>`
                  : `<option value="NO">NO</option><option value="YES" selected>YES</option>`;
              data = `<select class="form-select form-control" name="late[]">${lateOption}</select>`;
            }
            return data;
          },
        },
        {
          data: "half_day",
          render: function (data, type, row, meta) {
            if (type === "display") {
              // Rendering the half_day input
              data = `<input type="text" class="form-control shadow-nonet" style="border:none;outline:none" name="half_day[]" value="${
                row.half_day || ""
              }">`;
            }
            return data;
          },
        },
        {
          data: "comment",
          render: function (data, type, row, meta) {
            if (type === "display") {
              // Rendering the comment input
              data = `<input type="text" class="form-control shadow-nonet" style="border:none;outline:none" name="comment[]" value="${
                row.comment || ""
              }">`;
            }
            return data;
          },
        },
      ],
    });
  };
  // getTableData(
  //   `includes/fetchBatchStudentListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}`
  // );

  $("#attendance_date").bind("change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    attendance_date = document.querySelector("#attendance_date").value;
    // let search_keywords = $("#searchInput").val().toLowerCase();
    formMethod;
    term_Id = document.getElementById("termId").value;
    batch_Id = document.getElementById("batchId").value;
    session_id = document.getElementById("session_id").value;
    tableRow = "";
    table;

    $.ajax({
      url: "includes/find_attendance_date.php",
      method: "POST",
      dataType: "json",
      data: { attendance_date, term_Id, batch_Id, session_id },
      success: function (response) {
        console.log(response);
        if (response.message == "Attendance Not Taken") {
          document.querySelector("#attendanceStatus").textContent =
            "Attendance Not Taken";
          document
            .querySelector("#attendanceStatus")
            .classList.add("label-danger");
          $(".attendanceTable").DataTable().clear();
          $(".attendanceTable").DataTable().destroy();
          getTableData(
            `includes/fetchBatchStudentListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}`
          );
        } else if (response.message == "Attendance Taken") {
          document.querySelector("#attendanceStatus").textContent =
            "Attendance Taken";
          document
            .querySelector("#attendanceStatus")
            .classList.add("label-success");
          $(".attendanceTable").DataTable().clear();
          $(".attendanceTable").DataTable().destroy();
          getTableUpdatedData(
            `includes/updateAttendanceListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}&attendance_date=${attendance_date}`
          );
        }
      },
    });
    // alert(term_Id);
    // alert("Good");
    // console.log(table.draw());
    // $(".attendanceTable").DataTable().clear();
    // $(".attendanceTable").DataTable().destroy();
    // getTableData(
    //   `includes/fetchBatchStudentListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}`
    // );
  });

  // Event listener for marking attendance
  const tableClass = document.querySelector(".attendanceTable");

  tableClass.addEventListener("click", function (e) {
    let clickedBtn = e.target;
    let row = clickedBtn.closest("tr");
    let halfDayColumn = row.querySelector('input[name="half_day[]"]');
    let reasonColumn = row.querySelector('input[name="comment[]"]');

    if (clickedBtn.classList.contains("fa-check")) {
      e.preventDefault();

      $("#attendance-modal").modal("show");

      document
        .getElementById("absent-submit-btn")
        .addEventListener("click", function () {
          let reason = document.querySelector("#attendance-reason").value;
          let halfDay = document.querySelector("#switch").checked
            ? "Yes"
            : "No";

          halfDayColumn.value = halfDay;
          halfDayColumn.textContent = halfDay;
          reasonColumn.value = reason;
          reasonColumn.textContent = reason;

          clickedBtn.classList.remove("fa-check");
          clickedBtn.classList.remove("text-primary");
          clickedBtn.classList.add("fa-times");
          clickedBtn.classList.add("text-danger");
          clickedBtn.value = "Absent";

          document.querySelector("#attendance-reason").textContent = "";
          document.querySelector("#attendance-reason").value = "";
          document.querySelector("#switch").checked = false;

          $("#attendance-modal").modal("hide");
          return false;
        });
    } else if (clickedBtn.classList.contains("fa-times")) {
      e.preventDefault();

      clickedBtn.classList.remove("fa-times");
      clickedBtn.classList.remove("text-danger");
      clickedBtn.classList.add("fa-check");
      clickedBtn.classList.add("text-primary");
      clickedBtn.value = "Present";

      halfDayColumn.value = "";
      halfDayColumn.textContent = "";
      reasonColumn.value = "";
      reasonColumn.textContent = "";
    }
  });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============
};
