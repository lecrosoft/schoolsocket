$(document).ready(function () {
  $(".select2").select2();
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;

  // let status = $("#status").val().toLowerCase();
  // let batch = $("#batch").val();
  let tableRow = "";
  let table = "";

  const addBtn = document.querySelector("#addGuardianBtn");
  document
    .querySelector("#addGuardianBtn")
    .addEventListener("click", function () {
      // formMethod = "POST";
      // $("#form")[0].reset();
      // document.querySelector("#lgaOption").value = "";
      // document.querySelector("#lgaOption").textContent = "";
      // document.querySelector("#state").value = "";
      // document.querySelector("#student_cat_id").value = "";
      // document.querySelector("#blood_group").value = "";
      // document.querySelector("#nationalty").value = "";
      // document.querySelector("#studentModalLabel").textContent =
      //   "Create Students";

      // removeClass(".photo_div", "hidden");
      // removeClass(".batch_div", "hidden");

      // loadForm(formMethod);
      $("#addGuardianModal").modal("show");
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
          data: "surname",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.admission_number) {
                data = `<a class="dropdown-list-image" href="student_profile?id=${
                  row.user_id
                }"><img src="img/${
                  row.photo == "" ? "undraw_profile.svg" : row.photo
                }"alt="user" class="img-circle rounded-circle" />
                ${
                  row.surname + " " + row.first_name + " " + row.middle_name
                }</a><span> 
                (${row.admission_number})</span>`;
              } else {
                data = `<a class="dropdown-list-image" href="student_profile?id=${
                  row.user_id
                }"><img src="img/${
                  row.photo == "" ? "undraw_profile.svg" : row.photo
                }"alt="user" class="img-circle rounded-circle" />
                ${
                  row.surname + " " + row.first_name + " " + row.middle_name
                }</a><span>`;
              }
            }
            return data;
          },
        },
        {
          data: "gender",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.gender == "Male") {
                data = "M";
              } else if (row.gender == "Female") {
                data = "F";
              } else {
                data = "";
              }
            }
            return data;
          },
        },
        {
          data: "batch_id",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `${row.class_name} ${row.arm}`;
            }
            return data;
          },
        },

        {
          data: "linked_status",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.linked_status == "Linked") {
                data = `<a href="parent_profile.php?p_id=${row.parent_id}" class="">${row.parent_fullname}</a>`;
              } else {
                data = `<span class="label label-warning">Not Assigned</span>`;
              }
            }
            return data;
          },
        },
        {
          data: "date_created",
        },
        {
          data: "status",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.status == "Active") {
                data = `<span class="label label-success">${row.status}</span>`;
              } else {
                data = `<span class="label label-danger">${row.status}</span>`;
              }
            }
            return data;
          },
        },
        {
          data: "surname",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `          <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item"  href="student_profile.php?s_id=${row.user_id}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>View Profile</a>
                                    <a class="dropdown-item  editBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit Profile</a>
                                    <a class="dropdown-item linkParentBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Link Parent/Guardian</a>
                                    <a class="dropdown-item deleteBtn"  id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete Student</a>

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
  getTableData(`includes/fetchData.php?status=${status}&&batch=${batch}`);

  // getTableData(
  //   `fetchData.php?search_keywords=${search_keywords}&&status=${status}&&batch=${batch}`
  // );

  // Redraw the table
  // table.draw();

  // Redraw the table based on the custom input
  //  $("#searchInput,#status,#batch");
  $("#status,#batch").bind("keyup change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    status = $("#status").val().toLowerCase();
    batch = $("#batch").val();
    tableRow = "";

    // console.log(table.draw());
    $("table").DataTable().clear();
    $("table").DataTable().destroy();
    getTableData(`includes/fetchData.php?status=${status}&&batch=${batch}`);
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
          document.querySelector("#batch_id").value = response[0].batch_id;
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
          $(".batch_div").toggleClass("hidden");
          loadForm(formMethod);

          $("#addStudentModal").modal("show");
        },
      });
    }

    // LINK PARENT BUTTON
    if (clickedBtn.classList.contains("linkParentBtn")) {
      e.preventDefault();
      userId = clickedBtn.getAttribute("id");

      $.ajax({
        url: "includes/edit_student.php",
        method: "POST",
        dataType: "json",
        data: { userId },
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
});
const toggleSwitch = document.getElementById("switch");
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

const score_switch = document.getElementById("score_switch");
if (score_switch.checked) {
  this.value = "YES";
} else {
  this.value = "NO";
}
console.log(this.value);
score_switch.addEventListener("change", function () {
  if (this.checked) {
    this.value = "YES";
  } else {
    this.value = "NO";
  }
  console.log(this.value);
});
