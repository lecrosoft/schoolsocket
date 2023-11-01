const loadSubjectList = function () {
  console.log("kkkk fuck");
  $(".select2").select2();
  console.log("php");
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let term_Id = document.getElementById("termId").value;
  let batch_Id = document.getElementById("batchId").value;
  const subject_batch_id = document.getElementById("subject_batch_id");
  subject_batch_id.value = batch_Id;
  const term_id = (document.getElementById("term_id").value = term_Id);
  let tableRow = "";
  let subject_table;
  $("#add_batch_subject").click(function () {
    $("#addSubjectModal").modal("show");
    formMethod = "POST";
    loadForm(formMethod);
  });

  const getSubjectTableData = function (url) {
    subject_table = $(".subject_table").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },

      columns: [
        {
          data: "subject_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a class="" href="subject?id=${row.id}&b_id=${row.batch_id}">
                ${row.subject_name}</a>`;
            }
            return data;
          },
        },

        {
          data: "employee_count",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `${row.employee_count}`;
            }
            return data;
          },
        },

        {
          data: "elective",
        },

        {
          data: "id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `          <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item"  href="student_profile.php?s_id=${row.id}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>View Profile</a>
                                    <a class="dropdown-item  editBtn" id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit Profile</a>
                                    <a class="dropdown-item linkParentBtn" id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Link Parent/Guardian</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete Student</a>

                                </div>
                            </div>`;
            }
            return data;
          },
        },
      ],
    });
    // 000
  };
  getSubjectTableData(
    `includes/fetchBatchSubjectListData.php?batch_Id=${batch_Id}`
  );

  //   $("#termId,#batchId").bind("change", function () {
  //     // search_keywords = $("#searchInput").val().toLowerCase();
  //     term_Id = document.getElementById("termId").value;
  //     batch_Id = document.getElementById("batchId").value;
  //     tableRow = "";

  //     alert("jkk");
  //     // alert(term_Id);
  //     // alert("Good");
  //     // console.log(table.draw());
  //     $("table").DataTable().clear();
  //     $("table").DataTable().destroy();
  //     getSubjectTableData(
  //       `includes/fetchBatchStudentListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}`
  //     );
  //   });

  const subjectTableClass = document.querySelector(".subject_table");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============
};
const toggleSwitch = document.getElementById("switch");
toggleSwitch.value = "NO";
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
