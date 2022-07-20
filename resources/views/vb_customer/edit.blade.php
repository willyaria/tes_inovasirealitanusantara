<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Tempe Penyet</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('themes/wong-urip/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('themes/wong-urip/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('themes/wong-urip/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{url('themes/wong-urip/css/style.css')}}" rel="stylesheet">
    <link href="{{url('themes/wong-urip/assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Customer Edit</h4>
                            
                            <?php
                                foreach ($customer_edit as $dt1)
                                {}
                            ?>
                            
                            <hr class="m-t-0 m-b-40">
                            {{ csrf_field() }}
                            
                                
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Tipe Customer</label>
                                <div class="col-sm-3">
                                    <select class="select2" id="type_customer" name="type_customer" style="width: 100%" autocomplete="off">
                                        <option value=""></option>
                                        <?php 
                                        foreach ($customer_type as $dt2) {
                                            if ($dt2->id==$dt1->id_m_customer_type) {
                                                $s='selected'; 
                                            } else {
                                                $s='';
                                            }
                                        ?>
                                        <option <?php echo $s ?>  value="<?php echo $dt2->id;?>"><?php echo $dt2->nama;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Customer</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?= $dt1->nama ?>" autocomplete="off">							
                                    <input type="hidden" class="form-control" id="id_customer" name="id_customer" value="<?= $dt1->id ?>" autocomplete="off">							
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $dt1->tanggal_lahir ?>" autocomplete="off">							
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Alamat Customer</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="alamat_customer" id="alamat_customer" rows="4" autocomplete="off"><?= $dt1->alamat ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Status</label>
                                <div class="col-sm-6 switch">
                                <?php if($dt1->status==0){ ?>
                                    <label> 
                                        <input name="cbapprove" id="cbapprove" onclick="on_approve()" type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                <?php } else { ?>
                                    <label>
                                        <input name="cbapprove" id="cbapprove" onclick="on_approve()" type="checkbox" checked>
                                        <span class="lever"></span>
                                    </label>
                                <?php } ?>
                                    <input type="hidden" class="form-control" name="status" id="status" autocomplete="off">
                                    <input type="hidden" class="form-control" name="not_view_edit" id="not_view_edit" value="<?= $dt1->status ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="keterangan_cus" id="keterangan_cus" rows="4" autocomplete="off"><?= $dt1->keterangan ?></textarea>
                                    </div>
                                </div>
                            </div>   
                            
                            <div class="form-group row m-b-2">
                                <div class="col-md-3"></div>
                                <div class="col-md-3 m-r-5">	
                                    <button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light" onclick="on_update()">Save</button>
                                    <button type="button" id="batal_btn" class="btn btn-danger waves-effect waves-light" onclick="on_back()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> Aceng Willy Aria Pranata </footer>
        </div>
    </div>

    

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('themes/wong-urip/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('themes/wong-urip/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{url('themes/wong-urip/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('themes/wong-urip/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('themes/wong-urip/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{url('themes/wong-urip/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{url('themes/wong-urip/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{url('themes/wong-urip/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{url('themes/wong-urip/js/custom.min.js')}}"></script>
    <!-- This is data table -->
    <script src="{{url('themes/wong-urip/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- Notify -->
    <script src="{{url('themes/wong-urip/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <!-- CK Editor -->
    <script src="{{url('themes/wong-urip/assets/plugins/ckeditor/ckeditor.js')}}" type="text/javascript" ></script>
    <!-- start - This is for export functionality only -->
    <script src="{{url('themes/wong-urip/assets/plugins/select2/dist/js/select2.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    
    <script src="{{url('themes/wong-urip/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

    <script type="text/javascript">
        $(".select2").select2({
            placeholder:'Select One'
        });
	
        function on_approve()
        {
            if ($('#cbapprove').is(':checked')) 
            {
                $("#status").val(1);
            } 
            else
            {
                $("#status").val(0);
            }
        }

        function on_update()
        {
            if (validation_data() == false) return;
            update_data();
        }

        function update_data()
        {
            var content = CKEDITOR.instances['keterangan_cus'].getData();
            $.ajax({
                type: "POST",
                url: "{{ url('update_customer') }}",
                data: {	
                    "_token"		: "{{ csrf_token() }}",
                    id_cus	    	: $("#id_customer").val(),
                    ty_cus	    	: $("#type_customer").val(),
                    nm_cus	        : $("#nama_customer").val(),
                    tgl_lhr		   	: $("#tanggal_lahir").val(),
                    al_cus	   		: $("#alamat_customer").val(),
                    stat	    	: $("#status").val(),
                    ket	    	    : content,
                } ,
                success:function(data){ 
                    on_back();
                    $.notify({
                        title: '<strong>INFORMATION!</strong>',
                        message: 'Successfully.'
                    },{
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "center"
                        }
                    });
                },
                statusCode: {
                    404: function() {

                        $.notify({
                            title: '<strong>Failed 404</strong>',
                            message: 'Save Failed.'
                        },{
                            type: 'danger',
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });

                    },
                    500: function() {
                        $.notify({
                            title: '<strong>Failed 500</strong>',
                            message: 'Save Failed.'
                        },{
                            type: 'danger',
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });
                    }
                },
                complete:function () {
                }
            });
        }

        function validation_data()
        {
            if (!$("#type_customer").val()) {
                $("#type_customer").focus();
                $.notify({
                    title: '<strong>INFORMASI!</strong>',
                    message: 'Nama Tipe Customer Tidak Boleh Kosong !'
                },{
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });
                
                return false;
            } 
            else if (!$("#nama_customer").val()) {
                $("#nama_customer").focus();
                $.notify({
                    title: '<strong>INFORMASI!</strong>',
                    message: 'Nama Customer Tidak Boleh Kosong !'
                },{
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });		
                return false;
            }
            else if (!$("#tanggal_lahir").val()) {
                $("#tanggal_lahir").focus();
                $.notify({
                    title: '<strong>INFORMASI!</strong>',
                    message: 'Tanggal Lahir Tidak Boleh Kosong !'
                },{
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });		
                return false;
            }
            else if (!$("#alamat_customer").val()) {
                $("#alamat_customer").focus();
                $.notify({
                    title: '<strong>INFORMASI!</strong>',
                    message: 'Alamat Customer Tidak Boleh Kosong !'
                },{
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });		
                return false;
            }
        }

        function on_back() {
            var url = '{{ url('/') }}';
            window.open(url, "_self");
        }
    </script>

<?php
	echo "<script type='text/javascript'>
		CKEDITOR.config.height='300px';
		CKEDITOR.replace('keterangan_cus',{ 
		filebrowserBrowseUrl : '". '{{ url() }}'."filemanager/dialognews.php?type=2&editor=ckeditor&fldr=', 
		filebrowserUploadUrl : '". '{{ url() }})'."filemanager/dialognews.php?type=2&editor=ckeditor&fldr=', 
		filebrowserImageBrowseUrl : '".  '{{ url() }}'."filemanager/dialognews.php?type=1&editor=ckeditor&fldr=' });
		</script>	";
?>
</body>

</html>
