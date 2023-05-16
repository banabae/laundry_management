function(o) {
  var e = t(this);
  t("html, body").stop().animate({
    scrollTop: t(e.attr("href")).offset().top
  }, 1e3, "easeInOutExpo"), o.preventDefault()
}