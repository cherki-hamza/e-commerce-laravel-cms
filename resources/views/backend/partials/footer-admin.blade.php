
<footer class="main-footer">
    <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
    <strong>Copyright &copy; 2021 <a href="#">cherki-hamza</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- Start Core Plugins
         =====================================================================-->
<!-- jQuery -->
@include('sweetalert::alert')
<script src="{{asset('assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="{{asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- lobipanel -->
<script src="{{asset('assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
<!-- Pace js -->
<script src="{{asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.min.js')}}" type="text/javascript"></script>
<!-- table-export js -->
<script src="{{asset('assets/plugins/table-export/tableExport.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/table-export/jquery.base64.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/table-export/html2canvas.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/table-export/sprintf.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/table-export/jspdf.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/table-export/base64.js')}}" type="text/javascript"></script>
<!-- CRMadmin frame -->
<script src="{{asset('assets/dist/js/custom.js')}}" type="text/javascript"></script>
<!-- End Core Plugins
   =====================================================================-->
<!-- Start Theme label Script
   =====================================================================-->
<!-- Dashboard js -->
<script src="{{asset('assets/dist/js/dashboard.js')}}" type="text/javascript"></script>
@yield('my-scripts')
<!-- End Theme label Script =====================================================================-->
</body>

</html>
