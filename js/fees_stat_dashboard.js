let sessionId = document.getElementById("session_id").value;
let termId = document.getElementById("term_id").value;
let batchId = document.getElementById("batch_id").value;

const fetchDashboard = function (url) {
  $.ajax({
    url: url,
    // method: "POST",
    // data: { sessionId, termId },
    success: function (data) {
      $("#fee_stat_div").html(data);
      feeConfigButton();
    },
  });
};
fetchDashboard(
  `includes/fees_stat_dashboard.php?sessionId=${sessionId}&termId=${termId}&batchId=${batchId}`
);
$("#session_id,#term_id,#batch_id").bind("change", function () {
  sessionId = document.getElementById("session_id").value;
  termId = document.getElementById("term_id").value;
  batchId = document.getElementById("batch_id").value;
  fetchDashboard(
    `includes/fees_stat_dashboard.php?sessionId=${sessionId}&termId=${termId}&batchId=${batchId}`
  );
});
