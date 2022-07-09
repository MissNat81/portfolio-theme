jQuery(function ($) {
  /*Click on dark mode icon. Add dark mode classes 
    and wrappers. 
    Store user preference through sessions*/
  jQuery(".wpnm-button").click(function () {
    //Show either moon or sun
    jQuery(".wpnm-button").toggleClass("active");
    //If dark mode is selected
    if (jQuery(".wpnm-button").hasClass("active")) {
      //Add dark mode class to the body
      jQuery("body").addClass("dark-mode");
      //Save user preference to Storage
      localStorage.setItem("darkMode", true);
    } else {
      jQuery("body").removeClass("dark-mode");
      localStorage.removeItem("darkMode");
    }
  });
  //Check Storage. Display user preference
  if (localStorage.getItem("darkMode")) {
    jQuery("body").addClass("dark-mode");
    jQuery(".wpnm-button").addClass("active");
  }
});
