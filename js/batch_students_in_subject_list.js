const loadStudentList = function () {
  $(".select2").select2();
  console.log("php");
  // let search_keywords = $("#searchInput").val().toLowerCase();
  let formMethod;
  let term_Id = document.getElementById("termId").value;
  let batch_Id = document.getElementById("batchId").value;
  let subject_id = document.getElementById("subject_id").value;

  console.log("subject value:" + subject_id);
  let tableRow = "";
  let table;
  const getTableData = function (url) {
    table = $(".studentTable").DataTable({
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
          data: "class_name",
          render: function (data, type, row, meta) {
            if (type === "display") {
              data = `${row.abbreviation} ${row.arm}`;
            }
            return data;
          },
        },

        {
          data: "admission_number",
        },
        {
          data: "admission_date",
        },

        // {
        //   data: "arm",
        //   render: function (data, type, row, meta) {
        //     if (type === "display") {
        //       data = `          <div class="dropdown no-arrow">
        //                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        //                             <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        //                         </a>
        //                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

        //                             <a class="dropdown-item"  href="student_profile.php?s_id=${row.user_id}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>View Profile</a>
        //                             <a class="dropdown-item  editBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit Profile</a>
        //                             <a class="dropdown-item linkParentBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Link Parent/Guardian</a>
        //                             <a class="dropdown-item deleteBtn"  id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete Student</a>

        //                         </div>
        //                     </div>`;
        //     }
        //     return data;
        //   },
        // },
      ],
    });
    // 000
  };
  getTableData(
    `includes/fetchBatchStudentInSubjectListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}&subject_id=${subject_id}`
  );

  $("#termId,#batchId").bind("change", function () {
    // search_keywords = $("#searchInput").val().toLowerCase();
    term_Id = document.getElementById("termId").value;
    batch_Id = document.getElementById("batchId").value;
    subject_id = document.getElementById("subject_id").value;
    tableRow = "";
    // alert(term_Id);
    // alert("Good");
    // console.log(table.draw());
    $(".studentTable").DataTable().clear();
    $(".studentTable").DataTable().destroy();
    getTableData(
      `includes/fetchBatchStudentInSubjectListData.php?term_Id=${term_Id}&batch_Id=${batch_Id}&subject_id=${subject_id}`
    );
  });

  const tableClass = document.querySelector(".studentTable");
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
};
