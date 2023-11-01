const loadStudentAttendance = function () {
  console.log("kkkk");
  $(".select2").select2();
  console.log("php");
  let from = document.querySelector("#from").value;
  let to = document.querySelector("#to").value;
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let term_Id = document.getElementById("term_id").value;
  let student_id = document.getElementById("student_id").value;
  //   let batch_Id = document.getElementById("batchId").value;
  let session_id = document.getElementById("session_id").value;
  let tableRow = "";
  let table;

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
          data: "atttendance_date",
        },
        {
          data: "attendance_value",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.attendance_value == "Present") {
                data = `<button type="button" class="fa fa-check text-primary attendance_btn" style="border:none;outline:none;height:40px; width:40px;" name="attendance_value[]" value="Present" > </button>`;
              } else if (row.attendance_value == "Absent") {
                data = `<button type="button" class="fa fa-times text-danger attendance_btn" style="border:none;outline:none;height:40px; width:40px;" name="attendance_value[]" value="Present" > </button>`;
              }
            }
            return data;
          },
        },

        {
          data: "late",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<input type="text" disabled name="late[]" class="form-control" value="${row.late}">`;
            }
            return data;
          },
        },
        {
          data: "user_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<input type="text" disabled class="form-control shadow-nonet" style="border:none;outline:none" name="half_day[]" value="${row.half_day}">`;
            }
            return data;
          },
        },
        {
          data: "user_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<input type="text" class="form-control shadow-nonet"  disabled style="border:none;outline:none" name="comment[]" value="${row.comment}">`;
            }
            return data;
          },
        },
      ],
    });
    // 000
  };
  getTableUpdatedData(
    `includes/fetch_single_student_AttendanceListData.php?term_Id=${term_Id}&student_id=${student_id}&from=${from}&to=${to}&session_id=${session_id}`
  );

  $("#from,#to").bind("change", function () {
    from = document.querySelector("#from").value;
    to = document.querySelector("#to").value;
    //  search_keywords = $("#searchInput").val().toLowerCase();
    formMethod;
    term_Id = document.getElementById("term_id").value;
    student_id = document.getElementById("student_id").value;
    //    batch_Id = document.getElementById("batchId").value;
    session_id = document.getElementById("session_id").value;
    tableRow = "";
    table;

    // alert(term_Id);
    // alert("Good");
    // console.log(table.draw());
    $(".attendanceTable").DataTable().clear();
    $(".attendanceTable").DataTable().destroy();
    getTableUpdatedData(
      `includes/fetch_single_student_AttendanceListData.php?term_Id=${term_Id}&student_id=${student_id}&from=${from}&to=${to}&session_id=${session_id}`
    );
  });

  const tableClass = document.querySelector(".attendanceTable");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });

  // LINK PARENT BUTTON

  // END OF  LINK PARENT BUTTON

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============
};
