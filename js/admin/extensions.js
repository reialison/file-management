$(document).ready(function () {
"use strict";
//Examples of how to assign the Colorbox event to elements
    $("#btnAdd").colorbox({inline: true, innerWidth: "620px", overlayClose: false});
//////////
    var oTable = $('#table').dataTable({

        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "includes/datasource/extensions.php",
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td:eq(0)', nRow).html('<input type="checkbox" value="' + aData[0] + '" name="extensions[]" />');
            $('td:eq(1)', nRow).html('<div class="cell">' + aData[1] + '</div>');
        }, "aaSorting": []

    });
/////////////////
    $('#btndeleteselected').on('click',function () {
        var countSelected = $("input[name='extensions[]']:checked").length;
        if (countSelected != 0) {
            if (confirmDelete()) {
                $("#msgCont").html('');
                var values = new Array();
                $.each($("input[name='extensions[]']:checked"), function () {
                    values.push($(this).val());
                });
                $.getJSON('ajax/delete_extension.php', {ids: values}, function (data) {
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
    return confirm("Are you sure to delete selected extension?");
}

$(document).on('cbox_closed', function (e) {
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
