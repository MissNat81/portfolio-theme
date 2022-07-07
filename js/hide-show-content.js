jQuery(document).ready(function () {
  jQuery(".content2").hide();
});

jQuery(".btn-1").on("click", function () {
  jQuery(".content2").hide();
  jQuery(".content1").show();
});

jQuery(".btn-2").on("click", function () {
  jQuery(".content1").hide();
  jQuery(".content2").show();
});
