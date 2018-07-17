
    $( document ).ready(function() {

        $('#manufacturerName').keyup(function() {
            var $th = $(this);
            $th.val($th.val().replace(/(\s{2,})|[^a-zA-Z']/g, ' '));
            $th.val($th.val().replace(/^\s*/, ''));
        });
        
        $('#add_manufacture').click(function(){ 
            var _that = $(this), 
                form = _that.closest('form'),      
                formData = new FormData(form[0]),
                f_action = form.attr('action');  
            $.ajax({
                type: "POST",
                url: f_action,
                data: formData, //only input
                processData: false,
                contentType: false,
                dataType: "JSON",
                beforeSend: function () {
                  
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.status == 1){
                        toastr.success(data.message);
                        setInterval(function(){ 
                            location.reload();
                        }, 3000);
                    }else {
                        toastr.error(data.message);
                    } 
                },
                error:function (){
                    
                }
            });
        });

        $('#modelName').keyup(function() {
            var $th = $(this);
            $th.val($th.val().replace(/(\s{2,})|[^a-zA-Z']/g, ' '));
            $th.val($th.val().replace(/^\s*/, ''));
        });

        $('#add_model').click(function(){ 
            var _that = $(this), 
                form = _that.closest('form'),      
                formData = new FormData(form[0]),
                f_action = form.attr('action');  
            $.ajax({
                type: "POST",
                url: f_action,
                data: formData, //only input
                processData: false,
                contentType: false,
                dataType: "JSON",
                beforeSend: function () {
                  
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.status == 1){
                        toastr.success(data.message);
                        setInterval(function(){ 
                            location.reload();
                        }, 3000);
                    }else {
                        toastr.error(data.message);
                    } 
                },
                error:function (){
                    
                }
            });
        });

        var base_url = $('#base_url').attr('data-base-url');
        var modelList = $('#modelList').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' servermside processing mode.
            "order": [], //Initial no order.
            "lengthChange": false,
            "oLanguage": {
                "sEmptyTable" : 'No data found',
            },
            // Load data for the table's content from an Ajax source
            "ajax": { 
                "url":  base_url+"home/modelList",
                "type": "POST",
                "dataType": "json",
                "dataSrc": function (jsonData) {

                return jsonData.data;
                }
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                { orderable: false, targets: -1 },

            ]

        });

    });

    function updateStatus(name){
        
        var base_url = $('#base_url').attr('data-base-url');
        $.ajax({
            type: "POST",
            url: base_url+"home/updateCount",
            data: {name:name}, //only input
            dataType: "JSON",
            beforeSend: function () {
              
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status == 1){
                    toastr.success(data.message);
                    setInterval(function(){ 
                        location.reload();
                    }, 3000);
                }else {
                    toastr.error(data.message);
                } 
            },
            error:function (){
                
            }
        });
    }



 







