@section('css_ref')


        <!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{asset('/admin/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('/admin/dist/css/skins/_all-skins.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('/admin/plugins/iCheck/flat/blue.css') }}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{asset('/admin/plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{asset('/admin/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('/admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
<link href="{{asset('admin/Lobibox.min.css') }}" rel="stylesheet" type="text/css"/>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
{{--<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
{{--<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
{{--<!--[if lt IE 9]>--}}
{{--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
{{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
{{--<![endif]-->--}}


@show



@section('js_ref')
        <!-- jQuery 2.2.3 -->
<script src="{{asset('/admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('/admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('/admin/plugins/morris/morris.min.js') }}"></script>




<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function () {
        $(".example4").DataTable(
                {
                    "columnDefs": [
                        { "searchable": false, "targets": 4 },
                        { "searchable": false, "targets": 5 }
                    ]
            }
         );
        $('.example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        function note(msg,head)
        {
            Lobibox.notify(head, {
                msg: msg
            });

        }


        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '0d'
        })

    });
</script>

<!-- Sparkline -->
<script src="{{asset('/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{asset('/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/admin/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{asset('/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('/admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admin/dist/js/demo.js') }}"></script>
<script src="{{asset('admin/lobibox.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

@show