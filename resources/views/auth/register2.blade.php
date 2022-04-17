@extends('layouts.app')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
    .error {
        color: red !important;
        font-size: 1em;
    }

    #loading {
        position: fixed;
        background-color: rgba(255, 255, 255, 0.7);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 10000;
    }

    #loading img {
        margin-left: 43%;
        margin-top: 40%;
        max-width: 80px;
    }

    input:read-only {
        background: #ececec;
    }

    .modal-header .close {
        margin-top: -px;
        font-size: 2em;
        background: transparent;
        width: 60px;
        height: 60px;
        color: white;
        border: 0px;
        opacity: 1;
        position: fixed;
    }

    #delivery_info {
        font-size: 1em;
        border: 1px solid #b78009;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        background: #b78009;
        color: white;
        line-height: 1em;
        width: 100%;
    }

    .delivery_info {
        font-size: 1.3em;
        border: 1px solid #b78009;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        background: #b78009;
        color: white;
        line-height: 1em;
        width: 100%;
    }

    #map {
        height: 600px;
    }

    #description {
        font-family: 'Kanit', sans-serif;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
        font-family: 'Kanit', sans-serif;
        font-size: 1.5em;
    }

    span#place-address {
        font-size: 1.5em;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    #pac-container {
        background: #e2091a;
        padding: 8px;
        margin-top: 16px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-size: 1em;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fdfdfd;
        color: #e2091b;
        font-size: 1em;
        font-weight: 300;
        border-radius: 10px;
        text-overflow: ellipsis;
        width: 100%;
        text-align: center;
        height: auto;
        padding: 3px 12px;
        line-height: 1;
    }

    :-ms-input-placeholder.form-control {
        line-height: 1;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #e2091a;
        font-size: 1.5em;
        font-weight: 500;
        padding-top: 10px;
    }

    .modal .input-light {
        font-size: 1em;
    }

    #infowindow-content {
        font-family: 'Kanit', sans-serif;
        background-color: #fff;
        border-radius: 5px;
        text-align: center;
    }

    .button {
        font-family: 'Kanit', sans-serif;
        font-size: 1em;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        -webkit-appearance: none;
        outline: none;
        border: none;
        box-sizing: border-box;
        position: relative;
        transition: all .2s ease-out;
    }

    @media (min-width: 1200px) {
        #header {
            height: 70px;
        }
    }

    @media (max-width: 767px) {
        button.close.close-xs {
            margin-top: -8px !important;
            font-size: 2em !important;
        }

        .delivery-time {
            padding: 0px !important;
        }

        #delivery_info {
            font-size: 1em !important;
        }

        .delivery_info {
            font-size: 1em !important;
        }

        h1.heading.text-center {
            font-size: 1em;
        }

        #pac-container {
            margin-top: 0px
        }
    }

    button#btn-select {
        font-size: 1.2em;
    }

    .modal-dialog {
        margin: 20vh auto 0px auto
    }
</style>
@section('content')
    <main class="sm:container sm:mx-auto page-checkout-customer-info">
        <div class="sm:max-w-7xl sm:mx-auto">
            <div class="checkout-step-bar">
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-1 col-md-12 col-md-offset-2 register_header">
                        <h2 class="sm:text-xl text-red-600 sm:rounded-t-md text-center">ลงทะเบียนสมัครสมาชิกสเวนเซ่นส์</h2>
                        <ul>
                            <li class="step-item active">
                                <a href="#" class="bubble"></a>
                                <a href="#" class="step-name">
                                    <span class="name font-xs mt-4">ข้อมูลลูกค้า</span>
                                </a>
                            </li>
                            <li class="step-item active">
                                <a href="#" class="bubble"></a>
                                <a href="#" class="step-name">
                                    <span class="name font-xs  mt-4">ที่อยู่ปัจจุบัน</span>
                                </a>
                            </li>
                            <li class="step-item">
                                <a href="#" class="bubble"></a>
                                <a href="#" class="step-name">
                                    <span class="name font-xs mt-4">ยืนยันข้อมูลทั้งหมด</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="pac-container">
            <input id="pac-input" type="text" class="form-control" placeholder="ค้นหาที่อยู่">
        </div>
        <div class="container-fluid">

            <div id="map"></div>
        </div>
        <div id="infowindow-content">
            <span id="place-address"></span>
            <center><button type="button" id="btn-select" class="button btn-block button-orange"
                    style="margin-top: 10px; padding-left: 0; padding-right: 0;" tabindex="0"><span
                        class="hidden-xs">เลือกสถานที่นี้</span><span
                        class="visible-xs font-xs">เลือกสถานที่นี้</span></button></center>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title delivery_info">ที่อยู่ปัจจุบัน</h4>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> --}}
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('register-step-3') }}" id="new_location"
                            method="post">
                            @csrf
                            <input id="latitude" name="latitude" type="hidden">
                            <input id="longitude" name="longitude" type="hidden">
                            <input id="google_address" name="google_address" type="hidden">
                            <input id="country" name="country" type="hidden">
                            <input id="delivery_type" name="delivery_type" type="hidden">
                            <div class="form-group hidden">
                                <label>ระบุชื่อสถานที่ เช่น บ้าน, ที่ทำงาน</label>
                                <input id="name_location" name="name_location" type="text"
                                    placeholder="ระบุชื่อสถานที่ เช่น บ้าน,  ที่ทำงาน" class="input input-light">
                            </div>
                            <div class="form-group">
                                <label>อาคาร/หมู่บ้าน</label>
                                <input id="villages" name="villages" type="text" placeholder="อาคาร/หมู่บ้าน"
                                    class="input input-light">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>เลขที่*</label>
                                    <input id="number_home" name="number_home" type="text" placeholder="เลขที่"
                                        class="input input-light" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>ถนน/ซอย*</label>
                                    <input id="street" name="street" type="text" placeholder="ถนน/ซอย"
                                        class="input input-light" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>แขวง/ตําบล*</label>
                                    <input id="district" name="district" type="text" placeholder="แขวง/ตําบล"
                                        class="input input-light" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>เขต/อําเภอ*</label>
                                    <input id="area" name="area" type="text" placeholder="เขต/อําเภอ"
                                        class="input input-light" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>จังหวัด*</label>
                                    <input id="province" name="province" type="text" placeholder="จังหวัด"
                                        readonly="readonly" class="input input-light" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>รหัสไปรษณีย์*</label>
                                    <input id="post_code" name="post_code" type="tel" placeholder="รหัสไปรษณีย์"
                                        minlength="5" maxlength="5" size="5" class="input input-light" required>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:0px">
                                <label>จุดสังเกตุ/สถานที่ใกล้เคียง/รายละเอียดเพิ่มเติม*</label>
                                <textarea id="more_details" name="more_details" rows="2" placeholder="จุดสังเกตุ/สถานที่ใกล้เคียง/รายละเอียดเพิ่มเติม"
                                    class="input input-light" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <button type="button" class="back-button btn-block"
                                        onclick="goBack()">เลือกที่อยู่ใหม่</button>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <button type="submit" class="next-button btn-block">ยืนยันที่อยู่</button>
                                </div>
                            </div>
                            <input type="hidden" id="out_space" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
        <script>
            var marker = "";
            var map;
            var infowindow = "";
            var infowindowContent = "";
            var place = "";
            var currentLatLng = "";
            var browserHasGeolocation = true;

            function getMarkerAddressName(latLng) {
                currentLatLng = latLng;
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                        "location": latLng
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            place = results[0];
                            showPlaceFromMarker(place);
                        } else
                            console.log("Unable to retrieve your address" + "<br />");
                    });
            }

            function placeMarkerAndGetAddress(latLng, map) {
                currentLatLng = latLng;
                if (marker) {
                    marker.setMap(null);
                }
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    draggable: true,
                });

                //marker.addListener('drag', handleEvent);
                marker.addListener('dragend', handleEvent);
                getMarkerAddressName(latLng);
            }

            function showCurrentPosition(position) {
                $("#loading").hide();
                currentLatLng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.panTo(currentLatLng);
                placeMarkerAndGetAddress(currentLatLng, map);
            }

            function initGeoLocation() {
                infowindow = new google.maps.InfoWindow();
                infowindowContent = document.getElementById('infowindow-content');
                infowindow.setContent(infowindowContent);
                currentLatLng = {
                    lat: 13.714793,
                    lng: 100.5835619
                };
                map = new google.maps.Map(document.getElementById('map'), {
                    center: currentLatLng,
                    zoom: 17
                });
                initMap(currentLatLng);
                if (navigator.geolocation) {
                    browserHasGeolocation = true;
                    navigator.geolocation.getCurrentPosition(showCurrentPosition, locationError, {
                        enableHighAccuracy: true,
                        maximumAge: 0,
                        timeout: 30000
                    });
                } else {
                    $("#loading").hide();
                    browserHasGeolocation = false;
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            }

            function locationError(error) {
                var errorTypes = {
                    0: "An unknown error occurred.",
                    1: "ไม่สามารถระบุตำแหน่งปัจจุบันของคุณได้ โปรดเปิดการใช้งานค้นหาตำแหน่งในเบราเซอร์และอุปกรณ์ของคุณ",
                    2: "Position is currently unavailable.",
                    3: "User took to long to grant/deny permission."
                };
                var errorMessage = errorTypes[error.code];
                if (error.code == 0 || error.code == 2) {
                    errorMessage += " " + error.message;
                }
                console.log(errorMessage);
                alert(errorMessage);
                /*
                infowindow.setPosition(currentLatLng);
                infowindow.setContent(browserHasGeolocation ?
                                      '<span style="color:red;">Error: The Geolocation service failed.' + errorMessage + '</span>':
                                      '<span style="color:red;">Error: Your browser doesn\'t support geolocation.</span>');
                infowindow.open(map);
                */
            }

            function handleLocationError(browserHasGeolocation, infowindow, pos) {
                alert("ไม่สามารถแสดงพิกัดปัจจุบันของคุณได้ โปรดเปิดการใช้งานค้นหาตำแหน่งบนเบราเซอร์ของคุณ");
                /*
                infowindow.setPosition(pos);
                infowindow.setContent('<span style="color:red;">ไม่สามารถแสดงพิกัดปัจจุบันของคุณได้.</span><br/><span style="color:red;">โปรดเปิดการใช้งานค้นหาตำแหน่งบนเบราเซอร์ของคุณ</span>');

                infowindow.open(map);
                */
            }

            function showPlaceFromMarker(place) {
                console.log("showPlaceFromMarker");
                console.log(JSON.stringify(place));
                infowindow.close();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    alert("No details available for input: '" + place.name + "'");
                    return;
                }
                localStorage.setItem("address", place.name);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].long_name || ''),
                        (place.address_components[1] && place.address_components[1].long_name || ''),
                        (place.address_components[2] && place.address_components[2].long_name || '')
                    ].join(' ');
                }
                //Fill Form
                $("#latitude").val(currentLatLng.lat);
                $("#longitude").val(currentLatLng.lng);
                place_name = "";
                if (place.formatted_address) {
                    console.log(place.formatted_address);
                    $("#google_address").val(place.formatted_address);
                }
                if (place.name) {
                    place_name = place.name;
                }
                //clear old value
                $("#name_location").val("");
                $("#number_home").val("");
                $("#villages").val("");
                $("#street").val("");
                $("#district").val("");
                $("#area").val("");
                $("#province").val("");
                $("#post_code").val("");
                $("#country").val("");
                var showPlace = place_name;
                $.each(place.address_components, function(key, value) {

                    type = JSON.stringify(value.types);
                    console.log(value);

                    /*if(type.includes("name")){
                        place_name = value.long_name;
                        showPlace += place_name;
                    }*/

                    if (type.includes("street_number")) {
                        $("#number_home").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("route")) {
                        $("#street").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality_level_2")) {
                        $("#district").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality")) {
                        $("#area").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality_level_1")) {
                        $("#area").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality")) {
                        $("#area").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("administrative_area_level_1")) {
                        $("#province").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("postal_code")) {
                        $("#post_code").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("country")) {
                        $("#country").val(value.long_name);
                        showPlace += " " + value.long_name;
                    }
                });

                $("#villages").val(place_name);
                console.log(showPlace);
                infowindowContent.children['place-address'].textContent = showPlace;
                //infowindowContent.children['place-address'].textContent = place.formatted_address;
                infowindow.open(map, marker);
            }

            function showSearchPlaceAddress(place) {
                console.log(JSON.stringify(place));
                currentLatLng = {
                    'lat': place.geometry.location.lat,
                    'lng': place.geometry.location.lng
                };
                infowindow.close();
                marker.setVisible(false);
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                localStorage.setItem("address", place.name);
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17); // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].long_name || ''),
                        (place.address_components[1] && place.address_components[1].long_name || ''),
                        (place.address_components[2] && place.address_components[2].long_name || '')
                    ].join(' ');
                }
                //console.log(JSON.stringify(place.geometry));
                //infowindowContent.children['place-icon'].src = place.icon;
                //Fill Form
                $("#latitude").val(currentLatLng.lat);
                $("#longitude").val(currentLatLng.lng);
                place_name = "";
                if (place.formatted_address) {
                    console.log(place.formatted_address);
                    $("#google_address").val(place.formatted_address);
                }
                if (place.name) {
                    place_name = place.name;
                }
                //clear old value
                $("#name_location").val("");
                $("#number_home").val("");
                $("#villages").val("");
                $("#street").val("");
                $("#district").val("");
                $("#area").val("");
                $("#province").val("");
                $("#post_code").val("");
                $("#country").val("");

                var showPlace = place_name;
                $.each(place.address_components, function(key, value) {

                    type = JSON.stringify(value.types);
                    console.log(value);

                    /*if(type.includes("name")){
                        place_name = value.long_name;
                        showPlace += place_name;
                    }*/

                    if (type.includes("street_number")) {
                        $("#number_home").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("route")) {
                        $("#street").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality_level_2")) {
                        $("#district").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality")) {
                        $("#area").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality_level_1")) {
                        $("#area").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("sublocality")) {
                        $("#area").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("administrative_area_level_1")) {
                        $("#province").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("postal_code")) {
                        $("#post_code").val(value.long_name);
                        showPlace += " " + value.long_name;
                    } else if (type.includes("country")) {
                        $("#country").val(value.long_name);
                        showPlace += " " + value.long_name;
                    }
                });

                $("#villages").val(place_name);
                console.log(showPlace);
                infowindowContent.children['place-address'].textContent = showPlace;
                infowindow.setContent(infowindowContent);
                //infowindowContent.children['place-address'].textContent = place.formatted_address;
                infowindow.open(map, marker);
            }

            function handleEvent(event) {
                console.log(event.latLng.lat(), event.latLng.lng());
                var latLng = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                };
                getMarkerAddressName(latLng);
            }

            function initMap(currentLatLng) {
                map.addListener('click', function(e) {
                    placeMarkerAndGetAddress(e.latLng, map);
                });

                var card = document.getElementById('pac-card');
                var input = document.getElementById('pac-input');
                var types = document.getElementById('type-selector');
                var strictBounds = document.getElementById('strict-bounds-selector');
                last_address = localStorage.getItem("address");
                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
                var autocomplete = new google.maps.places.Autocomplete(input);
                // Bind the map's bounds (viewport) property to the autocomplete object,
                // so that the autocomplete requests use the current map bounds for the
                // bounds option in the request.
                autocomplete.bindTo('bounds', map);
                marker = new google.maps.Marker({
                    map: map,
                    ////anchorPoint: new google.maps.Point(0, -29),
                    draggable: true,
                });
                autocomplete.addListener('place_changed', function() {
                    place = autocomplete.getPlace();
                    showSearchPlaceAddress(place);
                    $("#pac-input").val("");
                });

                //$('#pac-input').val(last_address);
                //autocomplete.setOptions({strictBounds: true});
            }

            function goBack() {
                $("#myModal").modal('hide');
            }
            $("#btn-select").click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "https://www.swensens1112.com/api/find_nearest_shop",
                    data: {
                        'lat': currentLatLng.lat,
                        'lng': currentLatLng.lng
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        //console.log("success find_nearest_shop" +  JSON.stringify(data));
                        $("#delivery_type").html(data.delivery_type);
                        $("#out_space").val(0);
                        $("#myModal").modal('show');
                    },
                    error: function(errMsg) {
                        console.log("error find_nearest_shop " + JSON.stringify(errMsg));
                    }
                });
            });
        </script>
    @endsection
