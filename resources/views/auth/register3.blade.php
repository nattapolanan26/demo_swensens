@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto page-checkout-customer-info">
        <div class="sm:max-w-7xl sm:mx-auto">
            <div class="checkout-step-bar">
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-1 col-md-12 col-md-offset-2">
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
                            <li class="step-item active">
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
        <div class="sm:max-w-3xl sm:mx-auto sm:mt-10">
            <div class="flex">
                <div class="w-full">
                    <section class="flex flex-col break-words bg-transparent">
                        <form class="w-full px-6 space-y-6 sm:px-1 sm:space-y-2" method="POST" action="{{ route('create-register') }}">
                            @csrf
                            @php $data = json_decode(Cookie::get('step1'), TRUE); @endphp
                            <div class="form-group">
                                <label>ยืนยันข้อมูลทั้งหมด</label>
                                <div class="bg_white col-md-12 col-xs-12" style="margin:20px 0;padding: 20px;">
                                    <div class="form-group">
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>ชื่อ - นามสกุล</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span>{{ $data[0]['name'] ." ". $data[0]['last_name'] }}</span>
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>หมายเลขบัตรสเวนเซ่นส์การ์ด</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span> ---- ---- -- -- - </span>
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>อีเมล</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span style="word-wrap: break-word;">{{ $data[0]['email'] }}</span>
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>เบอร์โทรศัพท์มือถือ</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span>{{ $data[0]['mobile'] }}</span>
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>วันเกิด</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span>{{ $data[0]['birthday_day'] . " / " . $data[0]['birthday_month'] . " / " . $data[0]['birthday_year'] }}</span>
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>วันพิเศษ</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span> -- / -- / ----
                                                </span>
                                                <span> (-)
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-md-5 col-sm-6 col-xs-12">
                                                <label>ที่อยู่</label>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                <span>
                                                    {{ $data_address[0]['name_location'] ." ". $data_address[0]['villages']." ". $data_address[0]['number_home']." ". $data_address[0]['street']." ". $data_address[0]['district']." ". $data_address[0]['area']." ". $data_address[0]['province']; }}
                                                    <br><br>
                                                    {{ $data_address[0]['post_code'] }}
                                                    <br><br>
                                                    {{ $data_address[0]['more_details'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input name="latitude" type="hidden" value="{{ $data_address[0]['latitude'] }}">
                            <input name="longitude" type="hidden" value="{{ $data_address[0]['longitude'] }}">
                            <input name="google_address" type="hidden" value="{{ $data_address[0]['google_address'] }}">
                            <input name="country" type="hidden" value="{{ $data_address[0]['country'] }}">
                            <input name="delivery_type" type="hidden" value="{{ $data_address[0]['delivery_type'] }}">
                            <input type="hidden" name="name_location" value="{{ $data_address[0]['name_location'] }}">
                            <input type="hidden" name="villages" value="{{ $data_address[0]['villages'] }}">
                            <input type="hidden" name="number_home" value="{{ $data_address[0]['number_home'] }}">
                            <input type="hidden" name="street" value="{{ $data_address[0]['street'] }}">
                            <input type="hidden" name="district" value="{{ $data_address[0]['district'] }}">
                            <input type="hidden" name="area" value="{{ $data_address[0]['area'] }}">
                            <input type="hidden" name="province" value="{{ $data_address[0]['province'] }}">
                            <input type="hidden" name="post_code" value="{{ $data_address[0]['post_code'] }}">
                            <input type="hidden" name="more_details" value="{{ $data_address[0]['more_details'] }}">
                            <div class="flex flex-wrap">
                                <button type="submit"
                                    class="w-full select-none whitespace-no-wrap p-2 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-600 hover:bg-red-700">
                                    {{ __('ยืนยัน') }}
                                </button>

                                {{-- <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                    {{ __('Already have an account?') }}
                                    <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
                                        href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </p> --}}
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
    {{-- <script>
        let data = JSON.parse('<?=Cookie::get('step1')?>');

        $("#name_txt").text(data[0].name + "  " + data[0].last_name);
        $("#email_txt").text(data[0].email);
        $("#telephone_txt").text(data[0].telephone);
        $("#birthday").text(data[0].birthday_day + " / " + data[0].birthday_month + " / " + data[0].birthday_year);
    </script> --}}
@endsection
