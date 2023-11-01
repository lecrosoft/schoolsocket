let sessionId = document.getElementById("session_id").value;
let termId = document.getElementById("term_id").value;
let batchId = document.getElementById("batch_id").value;

const startExamButton = function () {
  const startExamBtn = document.querySelectorAll(".startExamBtn");
  for (d of startExamBtn) {
    d.addEventListener("click", function () {
      const examId = this.getAttribute("id");
      alert(examId);

      $.ajax({
        url: "includes/fetchExam.php",
        method: "POST",
        data: { examId },
        success: function (data) {
          //   $(".exam_modal_title").text("Create Invoice Template");
          $(".exam-modal-content").html(data);
        },
      });

      $("#startExamModal").modal("show");
    });
  }
};
startExamButton();
