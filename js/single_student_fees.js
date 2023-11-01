const loadStudentInvoiceList = function () {
  $(".select2").select2();
  console.log("php");

  // const addBtn = document.querySelector("#addDeuFeeModal");

  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let session_Id = document.getElementById("sessionId").value;
  let term_Id = document.getElementById("termId").value;
  let user_Id = document.getElementById("userId").value;

  let tableRow = "";
  let table;

  document
    .querySelector("#pay_due_fee_btn")
    .addEventListener("click", function () {
      formMethod = "POST";

      // $("#batch_form")[0].reset();
      // document.querySelector("#batchModalLabel").textContent = "Add Batch";
      // document.querySelector("#arm").value = "";
      // document.querySelector("#batch_class").value = "";
      // document.querySelector("#academic_session").value = "";
      // formMethod = "PUT";

      loadForm(formMethod);
      $("#addDeuFeeModal").modal("show");
    });

  const getTableData = function (url) {
    table = $(".due_fee_table").DataTable({
      searching: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      ajax: {
        url: url,
        dataSrc: "",
      },

      columns: [
        // {
        //   data: "total_fees",
        //   render: function (data, type, row, meta) {
        //     if (type === "display") {
        //       data = `<input class="check-box" type="checkbox">`;
        //     }
        //     return data;
        //   },
        // },
        {
          data: "item_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `<a id=${row.id} href="items">
                ${row.item_name}</a>`;
            }
            return data;
          },
        },

        {
          data: "term_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `${row.term_name}`;
            }
            return data;
          },
        },
        {
          data: "total",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = parseInt(row.total).toLocaleString("en-US");
            }
            return data;
          },
        },

        {
          data: "discount",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = parseInt(row.discount).toLocaleString("en-US");
            }
            return data;
          },
        },
        {
          data: "expected_amount",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = parseInt(row.expected_amount).toLocaleString("en-US");
            }
            return data;
          },
        },
        {
          data: "amount_paid",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = parseInt(row.amount_paid).toLocaleString("en-US");
            }
            return data;
          },
        },
        {
          data: "outstanding",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = parseInt(row.outstanding).toLocaleString("en-US");
            }
            return data;
          },
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

                                    <a class="dropdown-item payBtn" id=${row.id}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Pay</a>
                                    <a class="dropdown-item  editBtn" id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Add Discount</a>
                                    <a class="dropdown-item  editBtn" id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Remove Discount</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Remove</a>

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
    `includes/fetchStudentInvoiceListData.php?session_Id=${session_Id}&term_Id=${term_Id}&user_Id=${user_Id}`
  );

  $("#sessionId,#termId").bind("change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    session_Id = document.getElementById("sessionId").value;
    term_Id = document.getElementById("termId").value;

    tableRow = "";
    // alert(term_Id);
    // alert("Good");
    // console.log(table.draw());
    $(".due_fee_table").DataTable().clear();
    $(".due_fee_table").DataTable().destroy();
    getTableData(
      `includes/fetchStudentInvoiceListData.php?session_Id=${session_Id}&term_Id=${term_Id}&user_Id=${user_Id}`
    );
  });

  const tableClass = document.querySelector(".due_fee_table");
  // editBtnClass.addEventListener("click", function (e) {
  //   e.preventDefault();
  // });
  tableClass.addEventListener("click", function (e) {
    let clickedBtn = e.target;

    console.log(clickedBtn);

    if (clickedBtn.classList.contains("editBtn")) {
      e.preventDefault();
      let dataId = clickedBtn.getAttribute("id");
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

    if (clickedBtn.classList.contains("payBtn")) {
      e.preventDefault();
      dataId = clickedBtn.getAttribute("id");

      $.ajax({
        url: "includes/fetch_data_by_id.php?table=student_invoice",
        method: "POST",
        dataType: "json",
        data: { dataId },
        success: function (response) {
          document.querySelector("#item_id").value = response[0].id;

          document.querySelector("#outstanding").value =
            response[0].outstanding;
          loadForm(formMethod);
          $("#addSingleDeuFeeModal").modal("show");
        },
      });
    }

    // LINK PARENT BUTTON
    if (clickedBtn.classList.contains("linkParentBtn")) {
      e.preventDefault();
      user_Id = clickedBtn.getAttribute("id");

      $.ajax({
        url: "includes/edit_student.php",
        method: "POST",
        dataType: "json",
        data: { user_Id },
        success: function (response) {
          document.querySelector("#studentToLink").textContent =
            response[0].admission_number == ""
              ? response[0].surname + " " + response[0].first_name
              : response[0].surname +
                " " +
                response[0].first_name +
                " " +
                "(" +
                response[0].admission_number +
                ")";

          document.querySelector("#studentToLinkId").value =
            response[0].user_id;

          linkParent();
          $("#linkParentModal").modal("show");
        },
      });
    }
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
};
