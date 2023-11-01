const loadStudentAccessment = function () {
  console.log("kkkk");
  $(".select2").select2();
  console.log("php");

  // const addBtn = document.querySelector("#addDeuFeeModal");

  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let session_id = document.getElementById("session_id").value;
  let term_id = document.getElementById("term_id").value;
  let student_id = document.getElementById("student_id").value;

  let tableRow = "";
  let table;

  const getTableData = function (url) {
    table = $(".student_assessment").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },

      columns: [
        {
          data: "assesment_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.score < row.possible_points / 2) {
                data = `<a class="text-danger" href="assessment?a_id=${row.id}">
                ${row.assesment_name}</a>`;
              } else {
                data = `<a href="assessment?a_id=${row.id}">
                ${row.assesment_name}</a>`;
              }
            }
            return data;
          },
        },

        {
          data: "subject_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `${row.subject_name}`;
              if (row.score < row.possible_points / 2) {
                data = `<span class="text-danger">${row.subject_name}</span>`;
              } else {
                data = `<span>${row.subject_name}</span>`;
              }
            }
            return data;
          },
        },
        {
          data: "category_name",
        },

        {
          data: "due_date",
        },

        {
          data: "score",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.score < row.possible_points / 2) {
                data = `<span class="text-danger">${row.score}</span>/</span>${row.possible_points}</span>`;
              } else {
                data = `<span>${row.score}/${row.possible_points}</span>`;
              }
            }
            return data;
          },
        },
      ],

      // footerCallback: function (tfoot, data, start, end, display) {
      //   var api = this.api(),
      //     data;
      //   var intVal = function (i) {
      //     return typeof i === "string"
      //       ? i.replace(/[\$,]/g, "") * 1
      //       : typeof i === "number"
      //       ? i
      //       : 0;
      //   };

      //   var amtTotal = api
      //     .column(2, {
      //       search: "applied",
      //     })
      //     .data()
      //     .reduce(function (a, b) {
      //       return intVal(a) + intVal(b);
      //     }, 0);
      //   $(tfoot).find("td").eq(2).html(amtTotal.toLocaleString("en-US"));
      // },
    });
    // 000
  };
  getTableData(
    `includes/fetchStudentAssessmentData.php?session_id=${session_id}&term_id=${term_id}&student_id=${student_id}`
  );

  $("#session_id,#term_id").bind("change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    session_id = document.getElementById("session_id").value;
    term_id = document.getElementById("term_id").value;
    student_id = document.getElementById("student_id").value;

    tableRow = "";
    // alert(term_Id);
    // alert("Good");
    // console.log(table.draw());
    $(".student_assessment").DataTable().clear();
    $(".student_assessment").DataTable().destroy();
    getTableData(
      `includes/fetchStudentAssessmentData.php?session_id=${session_id}&term_id=${term_id}&student_id=${student_id}`
    );
  });

  const tableClass = document.querySelector(".student_assessment");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============
};
