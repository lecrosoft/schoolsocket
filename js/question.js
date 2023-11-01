$(document).ready(function () {
  const removeTr = function () {
    const delBtn = document.querySelectorAll(".btn_del");

    for (const d of delBtn) {
      d.addEventListener("click", function (e) {
        e.preventDefault();
        this.parentElement.remove();
      });
    }
  };

  const optionValue = function () {
    const radioContainers = document.querySelectorAll(".radio-container");

    for (const container of radioContainers) {
      const radioBtn = container.querySelector('input[type="radio"]');
      radioBtn.value = false; // Set all radio buttons to false initially

      radioBtn.addEventListener("change", function () {
        // Set the value of all radio buttons in this container to false initially
        for (const otherRadio of container.querySelectorAll(
          'input[type="radio"]'
        )) {
          otherRadio.value = false;
        }
        // Set the value of the checked radio button to true
        if (this.checked) {
          this.value = true;
        }
      });
    }
  };

  removeTr();
  optionValue();

  const html = `<div class="d-flex mb-3 radio-container" style="gap:0.5rem">
    <input type="text" name="option[]" class="form-control" placeholder="Enter Option" required>
    <input type="radio" class="custom-radio-question" name="correct_answer[0]" value="true">
    <span style="white-space: nowrap;">Correct Answer</span>
    <button type="button" class="btn btn-danger btn_del btn-sm"><i class="fa fa-times"></i></button>
</div>`;

  const addItemBtn = document.querySelector("#add_item");
  addItemBtn.addEventListener("click", function (e) {
    e.preventDefault();
    const optionDiv = document.querySelector("#option-div");
    const newOption = document.createElement("div");
    newOption.innerHTML = html;
    optionDiv.appendChild(newOption);
    removeTr();
    optionValue();
  });

  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let subject_id = $("#subject_id").val().toLowerCase();
  let exam_id = $("#exam_id").val();
  let tableRow = "";
  let table = "";
  const addBtn = document.querySelector("#add");
  document
    .querySelector("#add_question_btn")
    .addEventListener("click", function () {
      formMethod = "POST";
      $(".select2").select2();
      $("#question_form")[0].reset();
      document.querySelector("#questionModalLabel").textContent =
        "Create New question";
      //
      //   document.querySelector("#question_id").value = "";
      //   document.querySelector("#question_name").value = "";

      //   document.querySelector("#question_batch_id").value = "";

      //   document.querySelector("#question_batch_id").text = "";
      //   document.querySelector("#term_question").value = "";
      //   document.querySelector("#term_question").text = "";

      formMethod = "POST";
      loadFormQuestion(formMethod);
      $("#addQuestionModal").modal("show");
    });

  const getTableTwoData = function (url) {
    table = $(".question_table").DataTable({
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
              data = `<a href="view_card?">${row.subject_name}</a>`;
            }
            return data;
          },
        },
        {
          data: "exam_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data: "exam_name";
            }
            return data;
          },
        },
        {
          data: "question",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a href="batch?b_id=${row.question_id}">${row.question}</a>`;
            }

            return data;
          },
        },
        {
          data: "question_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `          <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item linkTeacherBtn" id=${row.question_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Recalculate</a>
                                                                        <a class="dropdown-item  editBtn" id=${row.question_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.question_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete</a>

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
  getTableTwoData(
    `includes/fetchQuestionData.php?subject_id=${subject_id}&exam_id=${exam_id}`
  );

  // getTableData(
  //   `fetchData.php?search_keywords=${search_keywords}&&status=${status}&&batch=${batch}`
  // );

  // Redraw the table
  // table.draw();

  // Redraw the table based on the custom input
  //  $("#searchInput,#status,#batch");
  $("#subject_id,#exam_id").bind("keyup change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    subject_id = $("#subject_id").val().toLowerCase();
    exam_id = $("#exam_id").val();

    tableRow = "";

    // console.log(table.draw());
    $(".question_table").DataTable().clear();
    $(".question_table").DataTable().destroy();
    getTableTwoData(
      `includes/fetchQuestionData.php?subject_id=${subject_id}&exam_id=${exam_id}`
    );
  });
  const tableClass = document.querySelector(".question_table");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });
  tableClass.addEventListener("click", function (e) {
    let clickedBtn = e.target;

    console.log(clickedBtn);

    if (clickedBtn.classList.contains("editBtn")) {
      e.preventDefault();

      // $("#editReportCardModal").modal("show");
      let questionId = clickedBtn.getAttribute("id");
      $.ajax({
        url: "includes/edit_question.php",
        method: "POST",
        dataType: "json",
        data: { questionId },
        success: function (response) {
          console.log(response);
          // $(".student_modal_scontent").html(data);

          document.querySelector("#questionModalLabel").textContent =
            "Edit question";

          document.querySelector("#question_id").value =
            response[0].question_id;
          document.querySelector("#question_name").value =
            response[0].question_name;

          document.querySelector("#question_batch_id").value =
            response[0].batch_id;
          document.querySelector("#term").value = response[0].term_id;
          document.querySelector("#start_date").value = response[0].start_date;
          document.querySelector("#end_date").value = response[0].end_date;
          document.querySelector("#mode").value = response[0].mode;
          document.querySelector("#cut_off_percent").value =
            response[0].passing_percentage;
          document.querySelector("#instruction").value =
            response[0].instruction;
          document.querySelector("#duration").value =
            response[0].question_duration;
          document.querySelector("#type").value = response[0].question_type;
          document.querySelector("#show_result_immediately_after").value =
            response[0].result_after_finish;
          document.querySelector("#e_pin").value =
            response[0].view_result_with_pin;

          formMethod = "PUT";
          loadFormQuestion(formMethod);
          $("#addQuestionModal").modal("show");
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
      questionId = clickedBtn.getAttribute("id");

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
            url: "includes/delete_question_group.php",
            method: "POST",
            dataType: "json",
            data: { questionId },
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
