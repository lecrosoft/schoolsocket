$(document).ready(function () {
  $(".select2").select2();
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;

  let academy_session = $("#academy_session").val().toLowerCase();
  let classes = $("#class").val();
  let tableRow = "";
  let table = "";
  const addBtn = document.querySelector("#add");
  document.querySelector("#add").addEventListener("click", function () {
    formMethod = "POST";
    $("#batch_form")[0].reset();
    document.querySelector("#batchModalLabel").textContent = "Add Batch";

    // document.querySelector("#arm").value = "";
    // document.querySelector("#batch_class").value = "";
    // document.querySelector("#academic_session").value = "";

    // formMethod = "PUT";
    loadForm(formMethod);
    $("#addBatchModal").modal("show");
  });

  const getTableData = function (url) {
    table = $("table").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },

      columns: [
        {
          data: "class_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a href="batch?b_id=${row.batch_id}">${row.abbreviation} ${row.arm} ${row.session_title}</a>`;
            }
            return data;
          },
        },
        {
          data: "class_teacher_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.class_teacher_id) {
                data = `<a href="e_profile?e_id=${row.user_id}">${row.surname} ${row.first_name} ${row.middle_name}</a>`;
              } else {
                data = `<span class="label label-warning">Not Assigned</span>`;
              }
            }

            return data;
          },
        },
        {
          data: "assistant_class_teacher_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.assistant_class_teacher_id) {
                data = `<a href="e_profile?e_id=${row.a_user_id}">${row.a_surname} ${row.a_first_name} ${row.a_middle_name}</a>`;
              } else {
                data = `<span class="label label-warning">Not Assigned</span>`;
              }
            }
            return data;
          },
        },

        {
          data: "student_count",
        },

        {
          data: "class_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `          <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item"  href="student_profile.php?s_id=${row.batch_id}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>View Batch</a>

                                    <a class="dropdown-item linkTeacherBtn" id=${row.batch_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Assign Teacher</a>
                                                                        <a class="dropdown-item  editBtn" id=${row.batch_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit Batch</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.batch_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete Batch</a>

                                </div>
                            </div>`;
            }
            return data;
          },
        },
      ],

      footerCallback: function (tfoot, data, start, end, display) {
        var api = this.api(),
          data;
        var intVal = function (i) {
          return typeof i === "string"
            ? i.replace(/[\$,]/g, "") * 1
            : typeof i === "number"
            ? i
            : 0;
        };

        var amtTotal = api
          .column(3, {
            search: "applied",
          })
          .data()
          .reduce(function (a, b) {
            return intVal(a) + intVal(b);
          }, 0);
        $(tfoot).find("td").eq(3).html(amtTotal.toLocaleString("en-US"));
      },
    });
    // 000
  };
  getTableData(
    `includes/fetchBatchesData.php?academy_session=${academy_session}&&class=${classes}`
  );

  // getTableData(
  //   `fetchData.php?search_keywords=${search_keywords}&&status=${status}&&batch=${batch}`
  // );

  // Redraw the table
  // table.draw();

  // Redraw the table based on the custom input
  //  $("#searchInput,#status,#batch");
  $("#academy_session,#class").bind("keyup change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    academy_session = $("#academy_session").val().toLowerCase();
    classes = $("#class").val();
    tableRow = "";

    // console.log(table.draw());
    $("table").DataTable().clear();
    $("table").DataTable().destroy();
    getTableData(
      `includes/fetchBatchesData.php?academy_session=${academy_session}&&class=${classes}`
    );
  });
  const tableClass = document.querySelector(".table");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });
  tableClass.addEventListener("click", function (e) {
    let clickedBtn = e.target;

    console.log(clickedBtn);

    if (clickedBtn.classList.contains("editBtn")) {
      e.preventDefault();
      let batchId = clickedBtn.getAttribute("id");
      $.ajax({
        url: "includes/edit_batch.php",
        method: "POST",
        dataType: "json",
        data: { batchId },
        success: function (response) {
          console.log(response);
          // $(".student_modal_scontent").html(data);
          document.querySelector("#batchModalLabel").textContent =
            "Ediit Batch";
          // changeId("form", "editForm");

          // document.querySelector("#batchId").value = response[0].user_id;
          // document.querySelector("#surname").value = response[0].surname;
          // document.querySelector("#firstname").value = response[0].first_name;
          // document.querySelector("#middlename").value = response[0].middle_name;
          document.querySelector("#batchId").value = response[0].batch_id;
          document.querySelector("#arm").value = response[0].arm;

          document.querySelector("#batch_class").value = response[0].class_id;

          document.querySelector("#academic_session").value =
            response[0].session_id;

          formMethod = "PUT";
          loadForm(formMethod);
          $("#addBatchModal").modal("show");

          loadForm(formMethod);
          $("#addBatchModal").modal("show");
        },
      });
    }

    // LINK PARENT BUTTON
    if (clickedBtn.classList.contains("linkTeacherBtn")) {
      e.preventDefault();
      batchId = clickedBtn.getAttribute("id");

      $.ajax({
        url: "includes/get_batch.php",
        method: "POST",
        dataType: "json",
        data: { batchId },
        success: function (response) {
          // document.querySelector("#batchToLink").textContent = response[0].arm;

          document.querySelector("#batchToLinkId").value = response[0].batch_id;

          linkTeacher();
          $("#linkTeachertModal").modal("show");
        },
      });
    }
    if (clickedBtn.classList.contains("deleteBtn")) {
      e.preventDefault();
      batchId = clickedBtn.getAttribute("id");
      $.ajax({
        url: "includes/get_batch.php",
        method: "POST",
        dataType: "json",
        data: { batchId },
        success: function (response) {
          // document.querySelector("#batchToLink").textContent = response[0].arm;

          if (response[0].student_count > 0) {
            // alert("cant Delete a class with active student");
            const swalWithBootstrapButtons_one = Swal.mixin({
              customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
              },
              buttonsStyling: false,
            });

            swalWithBootstrapButtons_one.fire({
              title: "Alert!",
              text: "You can't delete a batch with active students!",
              icon: "warning",

              confirmButtonText: "OK!",

              reverseButtons: true,
            });
          } else {
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
                    url: "includes/delete_batch.php",
                    method: "POST",
                    dataType: "json",
                    data: { batchId },
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
        },
      });
    }

    // END OF  LINK PARENT BUTTON
  });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============
});
