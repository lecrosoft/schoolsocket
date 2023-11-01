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
    $("#batch_form")[0].reset();
    document.querySelector("#cardModalLabel").textContent =
      "Create New Card Group";

    document.querySelector("#card_id").value = "";
    document.querySelector("#card_name").value = "";

    document.querySelector("#flexRadioDefault1").checked = false;

    document.querySelector("#flexRadioDefault2").checked = false;

    document.querySelector("#card_batch_id").value = "";

    document.querySelector("#card_batch_id").text = "";
    document.querySelector("#term").value = "";
    document.querySelector("#term").text = "";
    document.querySelector("#template").value = "";
    document.querySelector("#template").text = "";

    // formMethod = "PUT";
    loadForm(formMethod);
    $("#addReportCardModal").modal("show");
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
          data: "card_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a href="view_card?id=${row.id}&t=${row.template_id}&s=${row.session_id}&trm=${row.term_id}">${row.card_name}</a>`;
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
          data: "type",
        },
        {
          data: "publish",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.publish == "YES") {
                data = `    <div class="toggle-switch">
                                    <input type="hidden" id="" name="publish" value="NO" class="toggle-switch-checkbox">
                                    <input type="checkbox" id="switch" name="publish" class="toggle-switch-checkbox" checked>
                                    <label for="switch" class="toggle-switch-label"></label>
                                    <div class="toggle-switch-label-text">
                                        <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                    </div>
                                </div>`;
              } else {
                data = `    <div class="toggle-switch">
                                    <input type="hidden" id="" name="publish" value="NO" class="toggle-switch-checkbox">
                                    <input type="checkbox" id="switch" name="publish" class="toggle-switch-checkbox">
                                    <label for="switch" class="toggle-switch-label"></label>
                                    <div class="toggle-switch-label-text">
                                        <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                    </div>
                                </div>`;
              }
            }
            return data;
          },
        },

        {
          data: "status",
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
                                    <a class="dropdown-item linkTeacherBtn" id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Recalculate</a>
                                                                        <a class="dropdown-item  editBtn" id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete</a>

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
    `includes/fetchCardGroupData.php?session_id=${session_id}&batch_id=${batch_id}&term_id=${term_id}`
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
    $("table").DataTable().clear();
    $("table").DataTable().destroy();
    getTableData(
      `includes/fetchCardGroupData.php?session_id=${session_id}&batch_id=${batch_id}&term_id=${term_id}`
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

      // $("#editReportCardModal").modal("show");
      let cardId = clickedBtn.getAttribute("id");
      $.ajax({
        url: "includes/edit_card_group.php",
        method: "POST",
        dataType: "json",
        data: { cardId },
        success: function (response) {
          console.log(response);
          // $(".student_modal_scontent").html(data);
          document.querySelector("#cardModalLabel").textContent =
            "Ediit Card Group";

          document.querySelector("#card_id").value = response[0].id;
          document.querySelector("#card_name").value = response[0].card_name;

          if (response[0].type == "Progress") {
            document.querySelector("#flexRadioDefault1").checked = true;
          }

          if (response[0].type == "Final") {
            document.querySelector("#flexRadioDefault2").checked = true;
          }

          document.querySelector("#card_batch_id").value = response[0].batch_id;

          document.querySelector("#card_batch_id").text = response[0].batch_id;
          document.querySelector("#term").value = response[0].term_id;
          document.querySelector("#term").text = response[0].term_id;
          document.querySelector("#template").value = response[0].template_id;
          document.querySelector("#template").text = response[0].template_id;

          formMethod = "PUT";
          loadForm(formMethod);
          $("#addReportCardModal").modal("show");
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
      cardId = clickedBtn.getAttribute("id");

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
            url: "includes/delete_card_group.php",
            method: "POST",
            dataType: "json",
            data: { cardId },
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
