{{--
    THIS IS JAVASCRIPT LINK PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    js.blade.php
    It's Included All JS Links & Custom JS.
    It Is Used For Admin Panel's Bottom Part.
    ----------------------------------------------------------------------------------------------
--}}

{{-- <script src="{{ asset('public/js/bootstrap.min.js')}}"></script> --}}
{{-- <script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('public/js/wow.min.js')}}"></script>
<script src="{{ asset('public/js/custom.js')}}"></script>
<script src="{{ asset('public/plugins/toastr/toastr.min.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <!-- jQuery library -->
    <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/custom.js') }}"></script>
    <script>
        new WOW().init();
    </script>



<!-- ✅ FIRST - Load JQuery ✅ -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script> --}}

<!-- ✅ SECOND - Load JQuery Validate ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>

<!-- ✅ THIRD - Load Additional Methods ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>

{{-- clusterd / Googal Map Api--}}
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js"></script>
{{-- clusterd --}}


@yield('js')

{{-- language --}}
<script>
    function setLenguage()
    {
        var lang = $('#language :selected').val();
        $.ajax({
            type: "POST",
            url: "{{ route('set-language') }}",
            data : {
                "_token" : "{{ csrf_token() }}",
                "lang" : lang
            },
            dataType: 'json',
            success: function(res){
                if(res.success == 1)
                {
                    location.reload();
                }
            }
        });
    }
</script>

{{-- google map api kay='enter google map api key' --}}
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap&v=weekly"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsf7LHMQFIeuA_7-bR7u7EXz5CUaD6I2A&callback=initMap&v=weekly"></script> --}}

