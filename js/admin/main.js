"use strict";
function showAlert(val) {
    var path = document.getElementById("'" + val + "'").value;
    alert(path);
}
function showString(str) {
    alert("id: " + str);
}
function viewImage(imgTitle, path) {
    $("#imgValue").html($.colorbox({href: path, initialHeight: 'auto', initialWidth: 'auto', maxWidth: '1000px', title: imgTitle}));
}
function viewAudio(id) {
    $("#audioValue").html($.colorbox({href: "includes/mp3.php?id=" + id, className: "inline", iframe: true, width: "480px", height: "200px"}));
}
function viewVideo(id) {
    $("#videoValue").html($.colorbox({href: "includes/video.php?id=" + id, className: "inline", iframe: true, width: "80%", height: "72%", maxWidth: '1100px'}));
}
function viewPdf(path) {
    $("#pdfValue").html($.colorbox({href: "includes/pdf/web/viewer.php?pdf=" + path, className: "inline", iframe: true, width: "100%", height: "100%", maxWidth: '1100px'}));
}
function viewCode(code) {
    $("#codeValue").html($.colorbox({href: "includes/google-code-prettify/view.php?file=" + code, className: "inline", iframe: true, width: "100%", height: "100%", maxWidth: '1100px'}));
}
function viewDoc(path) {
    $("#docValue").html($.colorbox({href: "https://docs.google.com/viewer?url=" + path + "&embedded=true", className: "inline", iframe: true, width: "100%", height: "100%", maxWidth: '1100px'}));
}
