{{--
    THIS IS JAVASCRIPT LINK PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    js.blade.php
    It's Included All JS Links & Custom JS.
    It Is Used For Admin Panel's Bottom Part.
    ----------------------------------------------------------------------------------------------
--}}

<!-- jQuery -->
<script src={{ asset("public/jquery/jquery.min.js")}}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{ asset("public/jquery-ui/jquery-ui.min.js")}}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset("public/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- ChartJS -->
<script src={{ asset("public/chart.js/Chart.min.js")}}></script>
<!-- Sparkline -->
<script src={{ asset("public/sparklines/sparkline.js")}}></script>
<!-- JQVMap -->
<script src={{ asset("public/jqvmap/jquery.vmap.min.js")}}></script>
<script src={{ asset("public/jqvmap/maps/jquery.vmap.usa.js")}}></script>
<!-- jQuery Knob Chart -->
<script src={{ asset("public/jquery-knob/jquery.knob.min.js")}}></script>
<!-- daterangepicker -->
<script src={{ asset("public/moment/moment.min.js")}}></script>
<script src={{ asset("public/daterangepicker/daterangepicker.js")}}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset("public/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
<!-- Summernote -->
<script src={{ asset("public/summernote/summernote-bs4.min.js")}}></script>
<!-- overlayScrollbars -->
<script src={{ asset("public/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{ asset("public/dist/js/adminlte.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("public/dist/js/demo.js")}}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset("public/dist/js/pages/dashboard.js")}}></script>