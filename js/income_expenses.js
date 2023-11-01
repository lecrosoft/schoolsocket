$(document).ready(function () {
  $(".select2").select2();
  let search_keywords = $("#searchInput").val().toLowerCase();
  let status = $("#status").val().toLowerCase();
  let gender = $("#gender").val();
  let tableRow = "";
  let table = "";

  const getTableData = function (url) {
    table = $("table").DataTable({
      searching: false,

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
              data =
                '<a href="' +
                "employees?source=edit&id=" +
                row.user_id +
                '">' +
                data +
                " " +
                row.first_name +
                " " +
                row.middle_name +
                "</a>";
            }
            return data;
          },
        },
        {
          data: "gender",
        },
        {
          data: "mobile_number",
        },
        {
          data: "nmber_of_wards",
          render: function (data, type, row, meta) {
            if (type === "display") {
              if (row.nmber_of_wards == 0) {
                data = `<span class="label label-warning">Not Asigned</span>`;
              } else {
                data = `<span class="label label-success">${row.nmber_of_wards}</span>`;
              }
            }
            return data;
          },
        },
        // {
        //   data: "unpaid_fee",
        //   render: function (data, type, row, meta) {
        //     if (type === "display") {
        //       data = `${parseInt(data).toLocaleString("en-US")}`;
        //     }
        //     return data;
        //   },
        // },
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
  };
  getTableData(
    `fetchGuardianData.php?search_keywords=${search_keywords}&&status=${status}&&gender=${gender}`
  );

  // Redraw the table
  // table.draw();

  // Redraw the table based on the custom input
  $("#searchInput,#status,#gender").bind("keyup change", function () {
    search_keywords = $("#searchInput").val().toLowerCase();
    status = $("#status").val().toLowerCase();
    gender = $("#gender").val();
    tableRow = "";

    // console.log(table.draw());
    // alert(gender);
    $("table").DataTable().clear();
    $("table").DataTable().destroy();
    getTableData(
      `fetchGuardianData.php?search_keywords=${search_keywords}&&status=${status}&&gender=${gender}`
    );
  });

  $(
    ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
  ).addClass("btn btn-primary me-1");

  // =========eND OF SUBMITTING THE STUDENT FORM =============

  $(".ajax").select2({
    ajax: {
      url: "https://api.github.com/search/repositories",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page,
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: params.page * 30 < data.total_count,
          },
        };
      },
      cache: true,
    },
    escapeMarkup: function (markup) {
      return markup;
    }, // let our custom formatter work
    minimumInputLength: 1,
    //templateResult: formatRepo, // omitted for brevity, see the source of this page
    //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  });

  $("#add_modal").click(function () {
    $(".add-guardian-modal").modal("show");
  });
});
