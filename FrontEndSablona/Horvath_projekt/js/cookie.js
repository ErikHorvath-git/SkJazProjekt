document.addEventListener("DOMContentLoaded", function() {
    let cookieAlert = document.getElementById("cookieAlert");
    let acceptButton = document.getElementById("acceptCookies");
  
    // Skontrolovať či už cookie neexistuje
    if (!getCookie("cookiesAccepted")) {
      cookieAlert.style.display = "block";
    }
  
    acceptButton.onclick = function() {
      setCookie("cookiesAccepted", "true", 365); // Cookie na 365 dni
      cookieAlert.style.display = "none";
    };
  });
  
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }
  
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }
  