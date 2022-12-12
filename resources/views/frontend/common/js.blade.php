{{--
    THIS IS JAVASCRIPT LINK PAGE FOR FRONTSIDE/USERSIDE
    ----------------------------------------------------------------------------------------------
    js.blade.php
    It's Included All JS Links & Custom JS.
    It Is Used For Admin Panel's Bottom Part.
    ----------------------------------------------------------------------------------------------
--}}

<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/js/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('public/js/wow.min.js')}}"></script>
<script src="{{ asset('public/js/custom.js')}}"></script>
<script>
    new WOW().init();
</script>

<!-- ✅ FIRST - Load JQuery ✅ -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script> --}}

<!-- ✅ SECOND - Load JQuery Validate ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>

<!-- ✅ THIRD - Load Additional Methods ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>

@yield('js')
