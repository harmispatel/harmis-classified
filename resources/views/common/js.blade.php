{{--
    THIS IS JAVASCRIPT LINK PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    js.blade.php
    It's Included All JS Links & Custom JS.
    It Is Used For Admin Panel's Bottom Part.
    ----------------------------------------------------------------------------------------------
--}}

<!-- jQuery -->
<script src={{ asset("public/plugins/jquery/jquery.js")}}></script>
<!-- Bootstrap 5 -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<!-- Summernote -->
<script src={{ asset("public/plugins/summernote/summernote-bs4.min.js")}}></script>
<!-- overlayScrollbars -->
<script src={{ asset("public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{ asset("public/dist/js/adminlte.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("public/dist/js/demo.js")}}></script>
{{-- DataTable Js --}}
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>




<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{-- Google map --}}
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
