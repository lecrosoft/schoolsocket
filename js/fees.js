const feeConfigButton = function () {
  const feeConfigButton = document.getElementById("fees_config");
  feeConfigButton.addEventListener("click", function () {
    $("#feeConfigurationModal").modal("show");
  });
  $(".fee_config_btn").on("click", function () {
    $.ajax({
      url: "includes/fetch_invoice_template.php",
      method: "POST",
      success: function (data) {
        $(".fee_config_modal_title").text("Create Invoice Template");
        $(".fee_config_modal_body").html(data);
      },
    });
  });
};
