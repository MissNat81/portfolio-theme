jQuery(function ($) {
  /*Click on dark mode icon. Add dark mode classes and wrappers.
    Store user preference through sessions*/
  $(".wpnm-button").click(function () {
    //     //Show either moon or sun
    $(".wpnm-button").toggleClass("active");
    //If dark mode is selected
    if ($(".wpnm-button").hasClass("active")) {
      //Add dark mode class to the body
      $("body").addClass("dark-mode");
      //       //Save user preference to Storage
      localStorage.setItem("darkMode", true);
    } else {
      $("body").removeClass("dark-mode");
      localStorage.removeItem("darkMode");
    }
  });
  //   //Check Storage. Display user preference
  if (localStorage.getItem("darkMode")) {
    $("body").addClass("dark-mode");
    $(".wpnm-button").addClass("active");
  }
});

// jQuery(function ($) {
//   //Create the cookie object
//   var cookieStorage = {
//     setCookie: function setCookie(key, value, time, path) {
//       var expires = new Date();
//       expires.setTime(expires.getTime() + time);
//       var pathValue = "";
//       if (typeof path !== "undefined") {
//         pathValue = "path=" + path + ";";
//       }
//       document.cookie =
//         key +
//         "=" +
//         value +
//         ";" +
//         pathValue +
//         "expires=" +
//         expires.toUTCString();
//     },
//     getCookie: function getCookie(key) {
//       var keyValue = document.cookie.match("(^|;) ?" + key + "=([^;]*)(;|$)");
//       return keyValue ? keyValue[2] : null;
//     },
//     removeCookie: function removeCookie(key) {
//       document.cookie = key + "=; Max-Age=0; path=/";
//     },
//   };

//   //Click on dark mode icon. Add dark mode classes and wrappers. Store user preference through sessions
//   $(".wpnm-button").click(function () {
//     //Show either moon or sun
//     $(".wpnm-button").toggleClass("active");
//     //If dark mode is selected
//     if ($(".wpnm-button").hasClass("active")) {
//       //Add dark mode class to the body
//       $("body").addClass("dark-mode");
//       cookieStorage.setCookie("yonkovNightMode", "true", 2628000000, "/");
//     } else {
//       $("body").removeClass("dark-mode");
//       setTimeout(function () {
//         cookieStorage.removeCookie("yonkovNightMode");
//       }, 100);
//     }
//   });

//   //Check Storage. Display user preference
//   if (cookieStorage.getCookie("yonkovNightMode")) {
//     $("body").addClass("dark-mode");
//     $(".wpnm-button").addClass("active");
//   }
// });
