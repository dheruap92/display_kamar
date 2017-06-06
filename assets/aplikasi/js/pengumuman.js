$(document).ready(function(){
   //datatables
    table = $('#mytable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"bed/admin/pengumuman/list",
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

});

// reload table
function reload_table() {
    table.ajax.reload(null,false);
} 

function add() {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add'); // Set Title to Bootstrap modal title
}

function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable

    var url,alert_text;
    if (save_method=='add') {
        url = base_url+"bed/admin/pengumuman/tambah";
        alert_text = "Data Berhasil Ditambahkan";
    } else {
        url = base_url+"bed/admin/pengumuman/ubah";
        alert_text = "Data Berhasi Di Update";
    }


    // ajax add data
    var formData = $("#form").serialize();
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                bootbox.alert(alert_text);
                reload_table();
            } else {
                for (i=0;i<data.inputerror.length;i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                } 
            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (e)
        {
            bootbox.alert('Error adding / update data');
            console.log(e.responseText);
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}

function hapus(id) {
    bootbox.confirm("Are you sure?", function(result) {
        if(result) {
            $.ajax({
                url : base_url+"bed/admin/pengumuman/hapus",
                type: "POST",
                data: {"id":id},
                dataType: "JSON",
                success: function(data)
                {
         
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form').modal('hide');
                        bootbox.alert("Data Berhasil Dihapus");
                        reload_table();
                    } 
                },
                error: function (e)
                {
                   console.log(e.responseText);
                }
            });
        }
    });
}

function update(id)
{

    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"bed/admin/pengumuman/edit/",
        type: "POST",
        data : {"id":id},
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_pk"]').val(data.id_pengumuman);
            $('[name="judul"]').val(data.judul);
            $('[name="text_pengumuman"]').val(data.text_pengumuman);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pengumuman'); // Set title to Bootstrap modal title
 
 
        },
        error: function (e)
        {
            console.log(e.responseText);
        }
    });
}

function bulk_delete() {
    var list_id = [];
    $('.data-check:checked').each(function() {
        list_id.push(this.value);
    });
    if (list_id.length > 0) {
        bootbox.confirm("Are you sure?", function(result) {
        if(result) {
            $.ajax({
                url : base_url+"quote/ajax_bulk_delete/",
                type: "POST",
                data: {id:list_id},
                dataType: "JSON",
                success: function(data)
                {
         
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form').modal('hide');
                        bootbox.alert("Data Berhasil Dihapus");
                        reload_table();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    bootbox.alert('Error Delete Data');
                }
            });
        }
    });
    }
}

