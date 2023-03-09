$(document).ready(function () {
    "use strict";
    $(".password_adv").passStrength({
        shortPass: "top_shortPass",
        badPass: "top_badPass",
        goodPass: "top_goodPass",
        strongPass: "top_strongPass",
        baseStyle: "top_testresult",
        userid: ".user_id_adv",
        messageloc: 1
    });
});
function chkExtensions(formname, checktoggle) {
    var checkboxes = new Array();
    checkboxes = document[formname].getElementsByTagName('input');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == 'checkbox') {
            if (checkboxes[i].className == 'chkExtension') {
                checkboxes[i].checked = checktoggle;
                if (checktoggle) {
                    $(checkboxes[i]).attr("checked", "checked").parent().addClass('active');
                } else {
                    $(checkboxes[i]).removeAttr("checked").parent().removeClass('active');
                }
            }
        }
    }
}
function chkFolders(checktoggle) {
    $(".folder").find("input[type='checkbox']").each(function () {
        if (checktoggle) {
            $(this).attr("checked", "checked").parent().addClass("active");
        } else {
            $(this).removeAttr("checked").parent().removeClass("active");
        }
    })
}
function chkUploadDirectory(formname, checktoggle) {
    var checkboxes = new Array();
    checkboxes = document[formname].getElementsByTagName('input');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == 'checkbox') {
            if (checkboxes[i].className == 'chkUploadDir') {
                checkboxes[i].checked = checktoggle;
            }
        }
    }
}
function randomPassword() {
    chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    pass = "";
    for (x = 0; x < 10; x++) {
        i = Math.floor(Math.random() * 62);
        pass += chars.charAt(i);
    }
    ff1.password.value = pass.trim();
    $(".top_testresult").remove();
}
