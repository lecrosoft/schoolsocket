function generatePDF() {
  const element = document.getElementById("printCardDiv");
  const oldPage = document.body.innerHTML;
  document.body.innerHTML = element.innerHTML;
  window.print();
  document.body.innerHTML = oldPage;
}
// function generatePDF() {
//   const element = document.getElementById("printCardDiv");
//   const html = `
//     <!DOCTYPE html>
//     <html>
//       <head>
//         <meta charset="UTF-8">
//         <title>PDF Document</title>
//       </head>
//       <body>
//         ${element.outerHTML}
//       </body>
//     </html>
//   `;
//   const blob = new Blob([html], { type: "application/pdf" });
//   const url = URL.createObjectURL(blob);
//   const link = document.createElement("a");
//   link.href = url;
//   link.download = "myPDF.pdf";
//   link.click();
//   URL.revokeObjectURL(url);
// }

document.getElementById("student_id").addEventListener("change", function () {
  let userId = document.querySelector("#student_id").value;
  let card_name = document.querySelector("#card_name").value;
  let card_id = document.querySelector("#card_id").value;
  let batch_id = document.querySelector("#batch_id").value;
  let type = document.querySelector("#type").value;
  let term_id = document.querySelector("#term_id").value;
  let template_id = document.querySelector("#template_id").value;
  let session_id = document.querySelector("#session_id").value;
  let publish = document.querySelector("#publish").value;
  // alert(userId);
  let lat;
  $.ajax({
    url: "report_card_view.php",
    method: "POST",
    data: {
      userId,
      card_name,
      card_id,
      batch_id,
      term_id,
      type,
      template_id,
      session_id,
      publish,
    },
    beforeSend: function () {
      document.querySelector(".card_content").innerHTML = "..Loading";
    },
    success: function (response) {
      document.querySelector(".card_content").innerHTML = response;

      const printBtn = document.getElementById("printBtn");
      printBtn.addEventListener("click", generatePDF);
      // document.querySelector(".card_content").innerHTML = response;
    },
  });
});
