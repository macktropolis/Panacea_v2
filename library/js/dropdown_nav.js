// Create the dropdown base
$("<select class=\"nav top-nav\" />").appendTo("nav.site");

// Create default option "Go to..."
$("<option />", {
   "selected": "selected",
   "value"   : "",
   "text"    : "Go to..."
}).appendTo("nav.site select");

// Populate dropdown with menu items
$("nav.site a").each(function() {
 var el = $(this);
 $("<option />", {
     "value"   : el.attr("href"),
     "text"    : el.text()
 }).appendTo("nav.site select");
});

$("nav.site select").change(function() {
  window.location = $(this).find("option:selected").val();
});