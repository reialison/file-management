$(document).ready(function () {
    "use strict";
    $("#btnAdd").colorbox({inline: true, width: "700px", height: "513px"});
    $(".iframe").colorbox({iframe: true, width: "480px", height: "200px"});
    $(".callbacks").colorbox({
        onOpen: function () {
            alert('onOpen: colorbox is about to open');
        },
        onLoad: function () {
            alert('onLoad: colorbox has started to load the targeted content');
        },
        onComplete: function () {
            alert('onComplete: colorbox has displayed the loaded content');
        },
        onCleanup: function () {
            alert('onCleanup: colorbox has begun the close process');
        },
        onClosed: function () {
            alert('onClosed: colorbox has completely closed');
        }
    });
    $("#jquery_jplayer_1").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                mp3: "folder1/when_i_was_your_man.mp3"
            });
        },
        swfPath: "js",
        supplied: "mp3",
        wmode: "window",
        smoothPlayBar: true,
        keyEnabled: true
    });
    var oTable = $('#table').dataTable({

        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "../includes/datasource/files_public.php?idF=<?php echo($folderInfo['id'])?>",
        "oLanguage": {
            "sInfoFiltered": ""
        }


    });
/////////////////

});
function getStringImg(str) {
    return alert(str);
}
function confirmDelete() {
    return confirm("Are you sure to delete selected files?");
}
function viewImage(imgTitle, path) {
    $("#imgValue").html($.colorbox({href: '../'+path, initialHeight: 'auto', initialWidth: 'auto', maxWidth: '850px', title: imgTitle}));
}
function viewAudio(id) {
    $("#audioValue").html($.colorbox({href: "../includes/mp3.php?id=" + id, className: "inline", iframe: true, width: "480px", height: "200px"}));
}
function viewVideo(id) {
    $("#audioValue").html($.colorbox({href: "../includes/video.php?id=" + id, className: "inline", iframe: true, width: "80%", height: "72%"}));
}
function viewPdf(path) {
    $("#pdfValue").html($.colorbox({href: "../includes/pdf/web/viewer.php?pdf=" + path, className: "inline", iframe: true, width: "850px", height: "100%"}));
}
function viewCode(code) {
    $("#codeValue").html($.colorbox({href: "../includes/google-code-prettify/view.php?file=" + code, className: "inline", iframe: true, width: "950px", height: "100%", maxWidth: '1100px'}));
}
function viewDoc(path) {
    $("#docValue").html($.colorbox({href: "https://docs.google.com/viewer?url=" + path + "&embedded=true", className: "inline", iframe: true, width: "850px", height: "100%", maxWidth: '1100px'}));
}
