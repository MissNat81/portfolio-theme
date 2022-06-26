// jQuery(".title1").on("click", function () {
//   jQuery(".content1").toggle();
// });

// jQuery(".title2").on("click", function () {
//   jQuery(".content2").toggle();
// });

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
