let branchId = parseInt($("#branch_id").val());

let branchName = $("#branch_id").text();
let title = $("title").html();
let appLogo = $("#logo-to-use-on-print").val();
var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];
// $.ajax({
//   url: "save_schedule.php",
//   method: "POST",
//   data: {
//     branchId: branchId,
//   },
//   success: function () {
//     alert(branchId);
//   },
// });

$(function () {
  if (!!scheds) {
    Object.keys(scheds).map((k) => {
      var row = scheds[k];
      events.push({
        id: row.event_id,
        title: row.event_title,
        start: row.start_date,
        end: row.end_date,
        holiday: row.is_holiday,
      });
    });
  }
  var date = new Date();
  var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();

  calendar = new Calendar(document.getElementById("calendar"), {
    headerToolbar: {
      left: "prev,next today",
      right: "dayGridMonth,dayGridWeek,list",
      center: "title",
    },
    selectable: true,
    themeSystem: "bootstrap",
    //Random default events
    events: events,
    eventClick: function (info) {
      var _details = $("#event-details-modal");
      var id = info.event.id;
      if (!!scheds[id]) {
        _details.find("#title").text(scheds[id].event_title);
        _details.find("#description").text(scheds[id].description);
        _details.find("#start").text(scheds[id].sdate);
        // _details.find("#end").text(scheds[id].edate);
        _details.find("#holiday").text(scheds[id].is_holiday);
        _details.find("#location").text(scheds[id].location);
        _details
          .find("#event_income")
          .attr("href", "event_contribution?event_id=" + scheds[id].event_id);
        _details
          .find("#event_expense")
          .attr("href", "event_expenses?event_id=" + scheds[id].event_id);
        _details
          .find("#income")
          .text(parseInt(scheds[id].amount_collected).toLocaleString());
        _details
          .find("#expense")
          .text(parseInt(scheds[id].amount_spent).toLocaleString());
        _details
          .find("#balance")
          .text(parseInt(scheds[id].balance).toLocaleString());
        _details.find("#edit,#delete").attr("data-id", id);
        _details.modal("show");
      } else {
        alert("Event is undefined");
      }
    },
    eventDidMount: function (info) {
      // Do Something after events mounted
    },
    editable: true,
  });

  calendar.render();

  // Form reset listener
  $("#schedule-form").on("reset", function () {
    $(this).find("input:hidden").val("");
    $(this).find("input:visible").first().focus();
  });

  // Edit Button
  $("#edit").click(function () {
    var id = $(this).attr("data-id");
    if (!!scheds[id]) {
      var _form = $("#schedule-form");
      console.log(
        String(scheds[id].start_date),
        String(scheds[id].end_date).replace(" ", "\\t")
      );
      _form.find('[name="id"]').val(id);
      _form.find('[name="title"]').val(scheds[id].event_title);
      _form.find('[name="description"]').val(scheds[id].description);
      _form
        .find('[name="start_datetime"]')
        .val(String(scheds[id].start_date).replace(" ", "T"));
      // _form
      //   .find('[name="end_datetime"]')
      //   .val(String(scheds[id].end_date).replace(" ", "T"));
      _form
        .find('[name="is_holiday"]')
        .val(String(scheds[id].is_holiday).replace(" ", "T"));
      _form.find('[name="location"]').val(scheds[id].location);
      $("#event-details-modal").modal("hide");
      _form.find('[name="title"]').focus();
      $(".modal-title").html("Edit Event");
      $("#dataModal2").modal("show");
    } else {
      alert("Event is undefined");
    }
  });

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

  // Delete Button / Deleting an Event
  $("#delete").click(function () {
    var id = $(this).attr("data-id");
    if (!!scheds[id]) {
      var _conf = confirm("Are you sure to delete this scheduled event?");
      if (_conf === true) {
        location.href = "./delete_schedule.php?id=" + id;
      }
    } else {
      alert("Event is undefined");
    }
  });
});
