$(document).ready(function () {
    "use strict";
//////////
    var oTable = $('#table').dataTable({

        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "includes/datasource/messages.php",
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td:eq(0)', nRow).html('<input type="checkbox" value="' + aData[0] + '" name="folders[]" />');
            $('td:eq(1)', nRow).html(aData[1]);
            $('td:eq(2)', nRow).html('<div class="cell" >' + aData[2] + '</div>');
            $('td:eq(3)', nRow).html('<div class="cell">' + aData[3] + '</div>');
            $('td:eq(4)', nRow).html('<a href="messages.php?file=' + aData[4] + '"><span class="glyphicon glyphicon-fullscreen"></span></a>');
        }

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
                $.getJSON('ajax/delete_messages.php', {ids: values}, function (data) {
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
