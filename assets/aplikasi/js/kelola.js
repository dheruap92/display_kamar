$(document).ready(function(){
   //datatables
    table = $('#paviliun_table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"bed/reservasi/kelola/list",
            "type": "POST",
            "error" : function (status) {
                console.log(status.responseText);
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //last column
            "orderable": false, //set not orderable
        },{ 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

    table2 = $('#kamar_table').DataTable({
    });
    table3 = $('#bed_table').DataTable({
    });

     //Date picker
    $('.datepicker').datepicker({
      format: 'yyyy/mm/dd',
      autoclose: true
    });

     //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().removeClass('has-error');
        $(this).next().empty();
    });

    // ceck all selecter
    $("#check-all").click(function() {
        $(".data-check").prop('checked',$(this).prop('checked'));
    });

    $("#kamar_table").hide();

});

// reload table
function reload_table() {
    table.ajax.reload(null,false);
} 

function lihat(id) {
    $("#kamar_table").show();
    $("#bed_table").hide();
    $("#kamar_t_b").html("");
    $.ajax({
        url : base_url+"bed/reservasi/kelola/list_kamar",
        type: "POST",
        data: {"id":id},
        dataType: "JSON",
        success: function(data)
        {
            var no = 1;
            if(data.status==1) {
                $.each(data.data,function(i,data){
                    var body = "<tr><td></td><td>"+no+"</td><td>"+data.nama_kamar+"</td><td>"+data.kelas+"</td><td>"+data.nama_paviliun+"</td><td><button class='btn btn-xs btn-default' data-rel='tooltip' title='Lihat' onclick='lihat_kamar(\""+data.id_kamar+"\")'><i class='ace-icon fa fa-eye bigger-120'></i></button></td></tr>";
                    $("#kamar_t_b").append(body);
                    no++;
                });
            } 
        },
        error: function (e)
        {
            alert(0,'Error adding / update data');
            console.log(e.responseText);
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}

function lihat_kamar(id) {
    $("#bed_t_b").html("");
    $("#bed_table").show();
    $.ajax({
        url : base_url+"bed/reservasi/kelola/list_bed",
        type: "POST",
        data: {"id":id},
        dataType: "JSON",
        success: function(data)
        {
            console.log(data.data);
            var no = 1;
            if(data.status==1) {
                $.each(data.data,function(i,data){
                   var body = "<tr><td></td><td>"+no+"</td><td>"+data.nama_paviliun+"</td><td>"+data.nama_kamar+"</td><td>"+data.kelas+"</td><td>"+data.no_bed+"</td><td>"+data.status+"</td><td><button class='btn btn-xs btn-default' data-rel='tooltip' title='Lihat' onclick='lihat_kamar(\""+data.id_kamar+"\")'><i class='ace-icon fa fa-eye bigger-120'></i></button></td></tr>";
                    $("#bed_t_b").append(body);
                    no++;  
                });
            } 
        },
        error: function (e)
        {
            alert(0,'Error adding / update data');
            console.log(e.responseText);
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}




