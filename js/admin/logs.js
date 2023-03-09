$(document).ready(function () {
    "use strict";
//////////
    var oTable = $('#table').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "includes/datasource/logs.php",
        "aaSorting": [[ 1, "desc" ]],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $('td:eq(0)', nRow).html(aData[0] );
            $('td:eq(1)', nRow).html(aData[1] );
            $('td:eq(2)', nRow).html( aData[2] );
        }

    });
/////////////////
});
