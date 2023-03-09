$(document).ready(function () {
    "use strict";
    $("#approve_yes").on('click',function () {
        document.getElementById('approve').style.display = 'block';
    });
    $("#approve_no").on('click',function () {
        document.getElementById('approve').style.display = 'none';
    });
    $("[name='require_login_download']").on('click',function(){
        var val = $(this).val();
        if(val=='2'){
            $("#public_directory_cont").show();
        }else{
            $("#public_directory_cont").hide();
        }
    });
    $("[name='smtp_protocol']").on('change',function(){
        var $el = $(this);
        switch($el.val()){
            case "php_mail": $(".sendmail_cont").hide();$(".smtp_cont").hide();
                break;
            case "sendmail":$(".sendmail_cont").show();$(".smtp_cont").hide();
                break;
            case "smtp":$(".sendmail_cont").hide();$(".smtp_cont").show();
                break;
        }
    });
});
function showEmail() {
    var emails = document.getElementById("li_emails");
    emails.classList.add("settings-tab-selected");
    var UserSetting = document.getElementById("li_UserSetting");
    UserSetting.classList.remove("settings-tab-selected");
    var showDatabaseTools = document.getElementById("li_DatabaseTools");
    showDatabaseTools.classList.remove("settings-tab-selected");
    var showAdminSettings = document.getElementById("li_AdminSettings");
    showAdminSettings.classList.remove("settings-tab-selected");
    document.getElementById('Page1').style.display = "block";
    document.getElementById('Page2').style.display = "none";
    document.getElementById('Page3').style.display = "none";
    document.getElementById('Page4').style.display = "none";
}
function showUserSetting() {
    var UserSetting = document.getElementById("li_UserSetting");
    UserSetting.classList.add("settings-tab-selected");
    var emails = document.getElementById("li_emails");
    emails.classList.remove("settings-tab-selected");
    var showDatabaseTools = document.getElementById("li_DatabaseTools");
    showDatabaseTools.classList.remove("settings-tab-selected");
    var showAdminSettings = document.getElementById("li_AdminSettings");
    showAdminSettings.classList.remove("settings-tab-selected");
    document.getElementById('Page1').style.display = "none";
    document.getElementById('Page2').style.display = "none";
    document.getElementById('Page3').style.display = "block";
    document.getElementById('Page4').style.display = "none";
}
function showDatabaseTools() {
    var showDatabaseTools = document.getElementById("li_DatabaseTools");
    showDatabaseTools.classList.add("settings-tab-selected");
    var UserSetting = document.getElementById("li_UserSetting");
    UserSetting.classList.remove("settings-tab-selected");
    var emails = document.getElementById("li_emails");
    emails.classList.remove("settings-tab-selected");
    var showAdminSettings = document.getElementById("li_AdminSettings");
    showAdminSettings.classList.remove("settings-tab-selected");
    document.getElementById('Page1').style.display = "none";
    document.getElementById('Page2').style.display = "none";
    document.getElementById('Page3').style.display = "none";
    document.getElementById('Page4').style.display = "block";
}
function showAdminSettings() {
    var showAdminSettings = document.getElementById("li_AdminSettings");
    showAdminSettings.classList.add("settings-tab-selected");
    var showDatabaseTools = document.getElementById("li_DatabaseTools");
    showDatabaseTools.classList.remove("settings-tab-selected");
    var UserSetting = document.getElementById("li_UserSetting");
    UserSetting.classList.remove("settings-tab-selected");
    var emails = document.getElementById("li_emails");
    emails.classList.remove("settings-tab-selected");
    document.getElementById('Page1').style.display = "none";
    document.getElementById('Page2').style.display = "block";
    document.getElementById('Page3').style.display = "none";
    document.getElementById('Page4').style.display = "none";
}

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
function download_backup() {
    document.getElementById('backup_img').innerHTML = "<img style=\"margin-left: 20px; width: 31px; position: relative; height: 31px;\" src=\"images/backup_loading.gif\">";
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var file = xhr.responseText;
            document.getElementById('backup_img').innerHTML = "<button type=\"button\" class=\"btn btn-info\"  onclick='window.location.href = \"download.php?file="+file+"\"'>Download Backup</button>";

            //window.location.href = file;
        }
    };
    xhr.open("GET", "includes/backup_create.php", true);
    xhr.send();
}
