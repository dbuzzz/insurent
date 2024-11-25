$(document).ready(function(){
	showDatatable();
});



function showDatatable(){
    $('#cat_datatable').DataTable().destroy();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"/order/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'info', name: 'info'},
            {data: 'address', name: 'address'},
            {data: 'location', name: 'location', orderable: false, searchable: false},
            {data: 'total', name: 'total'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function order_status(id = "") {
    status = $('#order_status').val();
    $.ajax({
        url: siteUrl +"/order/order_status",
        data: { id: id, status: status},
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    reset();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    reset();
                }
        },
    });
}
