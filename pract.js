document.addEventListener("DOMContentLoaded", function () {
  var links = document.querySelectorAll('a[href^="#"]');

  links.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      var targetId = this.getAttribute("href");
      document.querySelector(targetId).scrollIntoView();
    });
  });
  var tap = document.querySelector("#arr-bubble");
  window.addEventListener("scroll", function () {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      tap.style.display = "flex";
    } else {
      tap.style.display = "none";
    }
  });
  tap.addEventListener("click", function () {
    window.scrollTo(0, 0);
  });
  var copy = document.querySelector(".prtners").cloneNode(true);
  document.querySelector(".list-part").appendChild(copy);
  var clickButt = document.querySelector(".top-mid-butt");
  clickButt.addEventListener("click", function (a) {
    a.preventDefault();
    document.querySelector("#contacts").scrollIntoView();
  });
});
