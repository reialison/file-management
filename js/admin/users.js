$(document).ready(function () {
    $(".password_adv").passStrength({
        shortPass: "top_shortPass",
        badPass: "top_badPass",
        goodPass: "top_goodPass",
        strongPass: "top_strongPass",
        baseStyle: "top_testresult",
        userid: ".user_id_adv",
        messageloc: 1
    });
    var oTable = $('#table').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "includes/datasource/users.php",
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if (aData[0] != 1) {
                $('td:eq(0)', nRow).html('<input type="checkbox" value="' + aData[0] + '" name="users[]" /></div>');
            } else {
                $('td:eq(0)', nRow).html('<input type="checkbox" disabled /></div>');
            }
            $('td:eq(1)', nRow).html( aData[1] );
            $('td:eq(2)', nRow).html( aData[2] );
            $('td:eq(3)', nRow).html( aData[3] );
            $('td:eq(4)', nRow).html( aData[4] );
            $('td:eq(5)', nRow).html( aData[5] );
            $('td:eq(6)', nRow).html( "<div style='max-width: 276px;overflow: hidden'>"+aData[6]+"</div>" );
            $('td:eq(7)', nRow).html( aData[7] );
            $('td:eq(8)', nRow).html('<div style="width: 90px"><span style="float:left;width: 70px">' + aData[8] + '</span>' +
                '<a style="float:right;"  href="edit_user.php?id=' + aData[0] + '"><span class=" glyphicon glyphicon-pencil"></span></a></div>');
        }
    });

    $('#btndeleteselected').on('click',function () {
        var countSelected = $('input[type=checkbox]:checked').length;
        if (countSelected != 0) {
            if (confirmDelete()) {

                $("#msgCont").html('');
                var values = new Array();
                $.each($("input[name='users[]']:checked"), function () {
                    values.push($(this).val());
                });
                $.getJSON('ajax/delete_user.php', {ids: values}, function (data) {
                    $("#msgCont").append(data.mes);
                    $("#msgCont").append(data.mesSuc);
                })
                oTable.fnDraw()

            }
        } else {
            alert('Nothing selected.');
        }
    });

    //Examples of how to assign the Colorbox event to elements
    $("#btnAdd").colorbox({inline: true, width: "735px", scrolling: false, overlayClose: false});
    $("#chkAllExtension").on('click',function () {
        $('input[type=checkbox].chkExtension').each(function () {
            $(this).wrap('<span class="typeCheck active"></span>').css({display: 'none'});
        });
    });
    $("#unchkAllExtension").on('click',function () {
        $('input[type=checkbox].chkExtension').each(function () {
            $(this).wrap('<span class="typeCheck"></span>').css({display: 'none'});
        });
    });
    $("#chkAllUploadDirectory").on('click',function () {
        $('input[type=checkbox].chkUploadDir').each(function () {
            $(this).wrap('<span class="typeCheck active"></span>').css({display: 'none'});
        });
    });
    $("#unchkAllUploadDirectory").on('click',function () {
        $('input[type=checkbox].chkUploadDir').each(function () {
            $(this).wrap('<span class="typeCheck"></span>').css({display: 'none'});
        });
    });
    $(document).on('cbox_closed', function (e) {
        $(".top_badPass").hide();
        var form = $(e.currentTarget).find("form");
        form.find("input[type='text']").each(function () {
            $(this).val("");
        })
        form.find("select").each(function () {
            $(this).val("");
            $(this).parent().find(".text").html($(this).find('option').eq(0).text())
        })
        form.find("input[type='checkbox']").each(function () {
            $(this).removeAttr("checked");
            $(this).parent().removeClass("active");
        })
    });
});

function randomPassword() {
    chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    pass = "";
    for (x = 0; x < 10; x++) {
        i = Math.floor(Math.random() * 62);
        pass += chars.charAt(i);
    }
    ff1.password.value = pass;
    $(".top_testresult").remove();
}

function confirmDelete() {
    return confirm("Are you sure to delete selected user?");
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
            $(this).prop("checked",false).parent().removeClass("active");
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
