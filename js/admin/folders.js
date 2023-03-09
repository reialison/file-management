$(document).ready(function () {
"use strict";
//Examples of how to assign the Colorbox event to elements
    $("#btnAdd").colorbox({inline: true, innerWidth: "620px", overlayClose: false});
    var oTable = $('#table').dataTable({

        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "includes/datasource/folders.php",
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if (aData[1] == 'uploads') {
                $('td:eq(0)', nRow).html('<input type="checkbox" value="" disabled name="folders[]" />');
                $('td:eq(1)', nRow).html(aData[1]);
                $('td:eq(2)', nRow).html('<div class="cel">' + aData[2] + '</div>');
                $('td:eq(3)', nRow).html('<div class="cell"><a href="edit_folder.php?id=' + aData[0] + '"><span class=" glyphicon glyphicon-pencil"></span></a></div>');
            } else {
                $('td:eq(0)', nRow).html('<input type="checkbox" value="' + aData[0] + '" name="folders[]" />');
                $('td:eq(1)', nRow).html(aData[1]);
                $('td:eq(2)', nRow).html(aData[2]);
                $('td:eq(3)', nRow).html($level=='admin'?'<a href="edit_folder.php?id=' + aData[0] + '"><span class=" glyphicon glyphicon-pencil"></span></a>':'&nbsp');
            }
        }, "aaSorting": []

    });
/////////////////
    $('#btndeleteselected').on('click',function () {
        var countSelected = $('input[type=checkbox]:checked').length;
        if (countSelected != 0) {
            if (confirmDelete()) {
                $("#msgCont").html('');
                var values = new Array();
                $.each($("input[name='folders[]']:checked"), function () {
                    values.push($(this).val());
                });
                $.getJSON('ajax/delete_folder.php', {ids: values}, function (data) {
                    $("#msgCont").append(data.mes);
                    $("#msgCont").append(data.mesSuc);
                })
                oTable.fnDraw()
            }
        } else {
            alert('Nothing selected.');
        }
    });
});
function confirmDelete() {
    return confirm("Are you sure to delete selected folder?");
}

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
