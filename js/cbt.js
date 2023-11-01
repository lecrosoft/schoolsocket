$(document).ready(function () {
  $(".select2").select2();
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let session_id = $("#session_id").val().toLowerCase();
  let term_id = $("#term_id").val();
  let batch_id = $("#batch_id").val();
  let tableRow = "";
  let table = "";
  const addBtn = document.querySelector("#add");
  document.querySelector("#add").addEventListener("click", function () {
    formMethod = "POST";
    $("#exam_form")[0].reset();
    document.querySelector("#examModalLabel").textContent = "Create New Exam";

    document.querySelector("#exam_id").value = "";
    document.querySelector("#exam_name").value = "";

    document.querySelector("#exam_batch_id").value = "";

    document.querySelector("#exam_batch_id").text = "";
    document.querySelector("#term").value = "";
    document.querySelector("#term").text = "";
    document.querySelector("#start_date").value = "";
    document.querySelector("#end_date").text = "";

    // formMethod = "PUT";
    loadForm(formMethod);
    $("#addExamModal").modal("show");
  });

  const getTableData = function (url) {
    table = $(".exam-table").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },

      columns: [
        {
          data: "exam_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a href="view_card?">${row.exam_name}</a>`;
            }
            return data;
          },
        },
        {
          data: "batch_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a href="batch?b_id=${row.batch_id}">${row.abbreviation} ${row.arm} ${row.session_title}</a>`;
            }

            return data;
          },
        },
        {
          data: "term_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data: "term_name";
            }
            return data;
          },
        },

        {
          data: "start_date",
        },
        {
          data: "end_date",
        },
        {
          data: "exam_status",
        },

        {
          data: "exam_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `          <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item linkTeacherBtn" id=${row.exam_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Recalculate</a>
                                                                        <a class="dropdown-item  editBtn" id=${row.exam_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.exam_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete</a>

                                </div>
                            </div>`;
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
      //     .column(3, {
      //       search: "applied",
      //     })
      //     .data()
      //     .reduce(function (a, b) {
      //       return intVal(a) + intVal(b);
      //     }, 0);
      //   $(tfoot).find("td").eq(3).html(amtTotal.toLocaleString("en-US"));
      // },
    });
    // 000
  };
  getTableData(
    `includes/fetchExamData.php?session_id=${session_id}&batch_id=${batch_id}&term_id=${term_id}`
  );

  // getTableData(
  //   `fetchData.php?search_keywords=${search_keywords}&&status=${status}&&batch=${batch}`
  // );

  // Redraw the table
  // table.draw();

  // Redraw the table based on the custom input
  //  $("#searchInput,#status,#batch");
  $("#session_id,#term_id,#batch_id").bind("keyup change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    session_id = $("#session_id").val().toLowerCase();
    term_id = $("#term_id").val();
    batch_id = $("#batch_id").val();
    tableRow = "";

    // console.log(table.draw());
    $(".exam-table").DataTable().clear();
    $(".exam-table").DataTable().destroy();
    getTableData(
      `includes/fetchExamData.php?session_id=${session_id}&batch_id=${batch_id}&term_id=${term_id}`
    );
  });
  const tableClass = document.querySelector(".exam-table");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });
  tableClass.addEventListener("click", function (e) {
    let clickedBtn = e.target;

    console.log(clickedBtn);

    if (clickedBtn.classList.contains("editBtn")) {
      e.preventDefault();

      // $("#editReportCardModal").modal("show");
      let examId = clickedBtn.getAttribute("id");
      $.ajax({
        url: "includes/edit_exam.php",
        method: "POST",
        dataType: "json",
        data: { examId },
        success: function (response) {
          console.log(response);
          // $(".student_modal_scontent").html(data);

          document.querySelector("#examModalLabel").textContent = "Edit Exam";

          document.querySelector("#exam_id").value = response[0].exam_id;
          document.querySelector("#exam_name").value = response[0].exam_name;

          document.querySelector("#exam_batch_id").value = response[0].batch_id;
          document.querySelector("#term").value = response[0].term_id;
          document.querySelector("#start_date").value = response[0].start_date;
          document.querySelector("#end_date").value = response[0].end_date;
          document.querySelector("#mode").value = response[0].mode;
          document.querySelector("#cut_off_percent").value =
            response[0].passing_percentage;
          document.querySelector("#instruction").value =
            response[0].instruction;
          document.querySelector("#duration").value = response[0].exam_duration;
          document.querySelector("#type").value = response[0].exam_type;
          document.querySelector("#show_result_immediately_after").value =
            response[0].result_after_finish;
          document.querySelector("#e_pin").value =
            response[0].view_result_with_pin;

          formMethod = "PUT";
          loadForm(formMethod);
          $("#addExamModal").modal("show");
        },
      });
    }

    // LINK PARENT BUTTON
    // if (clickedBtn.classList.contains("linkTeacherBtn")) {
    //   e.preventDefault();
    //   batchId = clickedBtn.getAttribute("id");

    //   $.ajax({
    //     url: "includes/get_batch.php",
    //     method: "POST",
    //     dataType: "json",
    //     data: { batchId },
    //     success: function (response) {
    //       // document.querySelector("#batchToLink").textContent = response[0].arm;

    //       document.querySelector("#batchToLinkId").value = response[0].batch_id;

    //       linkTeacher();
    //       $("#linkTeachertModal").modal("show");
    //     },
    //   });
    // }
    if (clickedBtn.classList.contains("deleteBtn")) {
      e.preventDefault();
      examId = clickedBtn.getAttribute("id");

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "includes/delete_exam_group.php",
            method: "POST",
            dataType: "json",
            data: { examId },
            success: function (response) {
              if (response.message === "deleted") {
                Swal.fire("Deleted!", "Record has been deleted.", "success");
                setTimeout(() => {
                  location = location.href;
                }, 1000);
              }
            },
          });
        }
      });
    }

    // END OF  LINK PARENT BUTTON
  });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============
});
