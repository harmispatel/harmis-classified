{{--
    THIS IS EDIT PROPERTIES PAGE FOR ADMIN PANEL
    ----------------------------------------------------------------------------------------------
    editProperties.blade.php
    It Displayed Selected Edit Property Form With Selected Data.
    ----------------------------------------------------------------------------------------------
--}}

@extends('common.layout')

@section('title', 'Add Properties')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary my-4">
                            <div class="card-header">
                                <h3 class="card-title">Site Setting</h3>
                            </div>
                            <form action="{{route('settingsupdate')}}" id="quickForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- {{ method_field('PUT') }} --}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="hlogo">Header Logo</label>
                                        <input type="file" id="hlogo" name="hlogo" class="form-control">
                                        @php
                                            $img = isset($setting['hlogo']) ? $setting['hlogo'] : '';
                                        @endphp
                                        <img src="{{ asset('public/image/'. $img) }}" style="height: 100px; width: 60px; margin-top: 20px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="flogo">Footer Logo</label>
                                        <input type="file" id="flogo" name="flogo" class="form-control">
                                        @php
                                            $img = isset($setting['flogo']) ? $setting['flogo'] : '';
                                        @endphp
                                        <img src="{{ asset('public/image/'. $img) }}" style="height: 100px; width: 60px; margin-top: 20px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPrice">Description</label>
                                        <textarea class="form-control" name="setting[description]" id="summernote_1">{{ isset($setting['description']) ? $setting['description'] : '' }}</textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Contactus Location</label>
                                        <input type="text" name="setting[contactus]" value="{{ isset($setting['contactus']) ? $setting['contactus'] : '' }}" class="form-control" placeholder="Enter IOS app link">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="autocomplete">Address</label>
                                        <input type="text" id="autocomplete" value="{{ isset($setting['address']) ? $setting['address'] : '' }}" name="setting[address]" class="form-control">
                                        <input type="hidden" name="setting[latitude]" value="{{ isset($setting['latitude']) ? $setting['latitude'] : '' }}" id="latitude" class="form-control">
                                        <input type="hidden" name="setting[longitude]" value="{{ isset($setting['longitude']) ? $setting['longitude'] : '' }}" id="longitude" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>IOS App Link</label>
                                        <input type="text" name="setting[iosapplink]" value="{{ isset($setting['iosapplink']) ? $setting['iosapplink'] : '' }}" class="form-control" placeholder="Enter IOS app link">
                                    </div>
                                    <div class="form-group">
                                        <label>Android App Link</label>
                                        <input type="text" name="setting[androidapplink]" value="{{ isset($setting['androidapplink']) ? $setting['androidapplink'] : '' }}" class="form-control" placeholder="Enter android app link">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="setting[twitter]" value="{{ isset($setting['twitter']) ? $setting['twitter'] : '' }}" class="form-control" placeholder="Enter Twitter link">
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="setting[facebook]" value="{{ isset($setting['facebook']) ? $setting['facebook'] : '' }}" class="form-control" placeholder="Enter Facebook link">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" name="setting[instagram]" value="{{ isset($setting['instagram']) ? $setting['instagram'] : '' }}" class="form-control" placeholder="Enter Instagram link">
                                    </div>
                                    <div class="form-group">
                                        <label>Linkdin</label>
                                        <input type="text" name="setting[linkedin]" value="{{ isset($setting['linkedin']) ? $setting['linkedin'] : '' }}" class="form-control" placeholder="Enter Kinkedin link">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="setting[address]" value="{{ isset($setting['address']) ? $setting['address'] : '' }}" class="form-control" placeholder="Enter Address link">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="setting[mobile]" value="{{ isset($setting['mobile']) ? $setting['mobile'] : '' }}" class="form-control" placeholder="Enter Mobile link">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="setting[email]" value="{{ isset($setting['email']) ? $setting['email'] : '' }}" class="form-control" placeholder="Enter Email link">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
         window.onload = function () {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("ddlYears");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = 1900; i <= currentYear; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        };


        $(document).ready(function () {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        });

        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });
        }    
    </script>    
@endsection