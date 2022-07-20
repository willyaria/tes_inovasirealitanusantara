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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Customer</h4>
                                <a href="{{ url('/add_customer') }}"><button class="btn btn-success waves-effect waves-light" style="margin-bottom: 10px;">Tambah Data</button></a>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="customer" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%">ID</th>
                                                <th style="width: 10%">Nama Customer Type</th>
                                                <th style="width: 10%">Nama Customer</th>
                                                <th style="width: 15%">Alamat</th>
                                                <th style="width: 10%">Tanggal Lahir</th>
                                                <th style="width: 10%">Longitude</th>
                                                <th style="width: 10%">Latitude</th>
                                                <th style="width: 10%">Keterangan</th>
                                                <th style="width: 7%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

						                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <footer class="footer"> Aceng Willy Aria Pranata </footer>
        </div>
    </div>

    <!-- View modal delete -->
    <div id="delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Information Delete</h4>
                </div>
                <div class="modal-body">
                    Are you sure deleted data ?<br>
                    ID = <label id="hapus_id"></label>
                    <input type="hidden" name="id_hapus" id="id_hapus" value=""/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="button" id="deleteConfirm" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Delete</button>
                </div>
            </div>
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
    <!-- start - This is for export functionality only -->
    <!-- Notify -->
    <script src="{{url('themes/wong-urip/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });

    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{url('themes/wong-urip/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

    <script type="text/javascript">
	var table;
	
	$(document).ready(function() {
		table = $('#customer').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
			processing: true,
			serverSide: true,
			"ordering": 'true',
			"order": [0, 'desc'],
			ajax: "{{ url('/') }}",
			columns: 
			[
				{ data: 'id', name: 'id' },               
				{ data: 'customer_type', name: 'customer_type' },
				{ data: 'nama', name: 'nama' },
				{ data: 'alamat', name: 'alamat' },
				{ data: 'tanggal_lahir', name: 'tanggal_lahir' },
				{ data: 'longitude', name: 'longitude' },
				{ data: 'latitude', name: 'latitude' },
				{ data: 'keterangan', name: 'keterangan' },
				{ data: 'action', name: 'action' }
			]
		});
	});
	
	//Menuju ke halaman edit
	$(document).on('click', '.edit', function(){
		user_id = $(this).attr('id');
		var url = "edit_customer/"+user_id;
        window.open(url, "_self");		
	});
	
	//Menampilkan view modal untuk delete
	$(document).on('click', '.delete', function(){
		user_id = $(this).attr('id');
		$('#id_hapus').val(user_id);
        $('#hapus_id').html(user_id);
        $('#delete_modal').modal('show');
	});
	
	//Proses delete
	$('#deleteConfirm').click(function(){
		$.ajax({
			url:"hapus_customer/"+user_id,
			beforeSend:function(){
				
			},
			success:function(data)
			{
				table.ajax.reload(null,false);
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
			complete:function () {

            } 
		})
	});
	
    </script>
</body>

</html>
