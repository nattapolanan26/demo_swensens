@extends('layouts.app')

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
                            <li class="step-item">
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
        <div class="sm:max-w-xl sm:mx-auto sm:mt-10">
            <div class="flex">
                <div class="w-full">
                    <section class="flex flex-col break-words bg-transparent">
                        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-2" method="POST" id="register_form"
                            action="{{ route('register-step-2') }}">
                            @csrf

                            <div class="form-group">
                                <div class="form-group">
                                    <label>ข้อมูลส่วนตัว*</label>
                                </div>
                                <input id="name" type="text" class="input w-full" name="name" value="{{ old('name') }}"
                                    placeholder="ชื่อ*" autofocus>

                                @error('name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="last_name" type="text" class="input w-full" name="last_name"
                                    value="{{ old('last_name') }}" placeholder="นามสกุล*">

                                @error('last_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="input input-light" id="register_email" name="email"
                                    onchange="return check_email();" placeholder="อีเมล*" value="" autocomplete="off">

                                @error('email')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="register_password" required=""
                                    class="input" value="" placeholder="รหัสผ่าน*">
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="input input-light" id="confirm_password"
                                    name="confirm_password" placeholder="กรุณากรอกยืนยันรหัสผ่าน*" value="">
                                @error('confirm_password')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="input input-light" name="mobile" id="register_mobile"
                                    onkeypress="return chkNumber(this)" placeholder="เบอร์โทรศัพท์มือถือ*" maxlength="10"
                                    value="">
                                @error('register_mobile')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>วันเกิด*</label>
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-1/3 pr-1 mb-6 md:mb-0" id="date_day">
                                        <select name="birthday_day" id="birthday_day" class="input">
                                            <option value="">วัน</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                        @error('birthday_day')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/3 pr-1 mb-6 md:mb-0" id="date_month">
                                        <select name="birthday_month" id="birthday_month" class="input">
                                            <option value="">เดือน</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        @error('birthday_month')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/3 pr-1 mb-6 md:mb-0" id="date_year">
                                        <select name="birthday_year" id="birthday_year" class="input">
                                            <option value="">ปี</option>
                                            <option value="2011">2554</option>
                                            <option value="2010">2553</option>
                                            <option value="2009">2552</option>
                                            <option value="2008">2551</option>
                                            <option value="2007">2550</option>
                                            <option value="2006">2549</option>
                                            <option value="2005">2548</option>
                                            <option value="2004">2547</option>
                                            <option value="2003">2546</option>
                                            <option value="2002">2545</option>
                                            <option value="2001">2544</option>
                                            <option value="2000">2543</option>
                                            <option value="1999">2542</option>
                                            <option value="1998">2541</option>
                                            <option value="1997">2540</option>
                                            <option value="1996">2539</option>
                                            <option value="1995">2538</option>
                                            <option value="1994">2537</option>
                                            <option value="1993">2536</option>
                                            <option value="1992">2535</option>
                                            <option value="1991">2534</option>
                                            <option value="1990">2533</option>
                                            <option value="1989">2532</option>
                                            <option value="1988">2531</option>
                                            <option value="1987">2530</option>
                                            <option value="1986">2529</option>
                                            <option value="1985">2528</option>
                                            <option value="1984">2527</option>
                                            <option value="1983">2526</option>
                                            <option value="1982">2525</option>
                                            <option value="1981">2524</option>
                                            <option value="1980">2523</option>
                                            <option value="1979">2522</option>
                                            <option value="1978">2521</option>
                                            <option value="1977">2520</option>
                                            <option value="1976">2519</option>
                                            <option value="1975">2518</option>
                                            <option value="1974">2517</option>
                                            <option value="1973">2516</option>
                                            <option value="1972">2515</option>
                                            <option value="1971">2514</option>
                                            <option value="1970">2513</option>
                                            <option value="1969">2512</option>
                                            <option value="1968">2511</option>
                                            <option value="1967">2510</option>
                                            <option value="1966">2509</option>
                                            <option value="1965">2508</option>
                                            <option value="1964">2507</option>
                                            <option value="1963">2506</option>
                                            <option value="1962">2505</option>
                                            <option value="1961">2504</option>
                                            <option value="1960">2503</option>
                                            <option value="1959">2502</option>
                                            <option value="1958">2501</option>
                                            <option value="1957">2500</option>
                                            <option value="1956">2499</option>
                                            <option value="1955">2498</option>
                                            <option value="1954">2497</option>
                                            <option value="1953">2496</option>
                                            <option value="1952">2495</option>
                                            <option value="1951">2494</option>
                                            <option value="1950">2493</option>
                                            <option value="1949">2492</option>
                                            <option value="1948">2491</option>
                                            <option value="1947">2490</option>
                                            <option value="1946">2489</option>
                                            <option value="1945">2488</option>
                                            <option value="1944">2487</option>
                                            <option value="1943">2486</option>
                                            <option value="1942">2485</option>
                                            <option value="1941">2484</option>
                                            <option value="1940">2483</option>
                                            <option value="1939">2482</option>
                                            <option value="1938">2481</option>
                                            <option value="1937">2480</option>
                                            <option value="1936">2479</option>
                                            <option value="1935">2478</option>
                                            <option value="1934">2477</option>
                                            <option value="1933">2476</option>
                                            <option value="1932">2475</option>
                                            <option value="1931">2474</option>
                                            <option value="1930">2473</option>
                                            <option value="1929">2472</option>
                                            <option value="1928">2471</option>
                                            <option value="1927">2470</option>
                                            <option value="1926">2469</option>
                                            <option value="1925">2468</option>
                                            <option value="1924">2467</option>
                                            <option value="1923">2466</option>
                                            <option value="1922">2465</option>
                                            <option value="1921">2464</option>
                                            <option value="1920">2463</option>
                                            <option value="1919">2462</option>
                                        </select>
                                        @error('birthday_year')
                                            <p class="text-red-500 text-md italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>วันพิเศษ (ไม่บังคับ)</label>
                                <input type="text" class="input input-light" name="special_spacify" id="special_spacify"
                                    onkeypress="" placeholder="เช่น วันครบรอบ, วันเกิดแฟน, วันเกิดลูก" value="">
                            </div>
                            <div class="form-group" style="display: none" id="special_date">
                                <div id=''>
                                    <div class="flex flex-wrap">
                                        <div class="w-full md:w-1/3 pr-1 mb-6 md:mb-0" id="date_day">
                                            <select name="special_day" id="special_day" class="input" required="">
                                                <option value="">วันพิเศษ</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>

                                        <div class="w-full md:w-1/3 pr-1 mb-6 md:mb-0">
                                            <select name="special_month" id="special_month" class="input"
                                                required="">
                                                <option value="">เดือน</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="w-full md:w-1/3 pr-1 mb-6 md:mb-0">
                                            <select name="special_year" id="special_year" class="input"
                                                required="">
                                                <option value="">ปี</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-checkbox" id="privacy_policy_terms_and_conditions">
                                    <span class="checkbox-text">
                                        <span class="icon-checkbox"></span>ฉันได้อ่านและยอมรับ <a target="_blank"
                                            href="/th/terms-and-conditions"> ข้อกำหนดการใช้งาน </a>และ<a target="_blank"
                                            href="/th/privacy-policy"> นโยบายความเป็นส่วนตัว </a>ของสเวนเซ่นส์</span>
                                </div>
                            </div>
                            <input type="hidden" name="check_privacy_policy_terms_and_conditions"
                                id="check_privacy_policy_terms_and_conditions" value="0">
                            <div class="form-group">
                                <div class="custom-checkbox" id="sub">
                                    <span class="checkbox-text">
                                        <span class="icon-checkbox"></span>ฉันยินยอมรับข้อมูลข่าวสาร
                                        กิจกรรมส่งเสริมการขายต่างๆ จากสเวนเซ่นส์และ <a target="_blank"
                                            href="https://www.minor.com/th/affiliated-companies">บริษัทในเครือ</a>
                                        โดยเราจะเก็บข้อมูลของท่านไว้เป็นความลับ สามารถศึกษาเงื่อนไข/ข้อตกลง<a
                                            target="_blank" href="/th/privacy-policy"> นโยบายความเป็นส่วนตัว
                                        </a>เพิ่มเติมได้ที่เว็บไซต์ของบริษัทฯ</span>
                                </div>
                                <input type="hidden" name="check_sub" id="check_sub" value="0">
                            </div>

                            <div class="flex flex-wrap">
                                <button type="submit"
                                    class="w-full select-none whitespace-no-wrap p-2 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-600 hover:bg-red-700">
                                    {{ __('ถัดไป') }}
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        $(function() {
            var info = $('.info');
            $('#register_email').mailtip({
                onselected: function(mail) {
                    info.text('you choosed email: ' + mail)
                }
            });
        });
    </script>
    <script type="text/javascript">
        var member_card_is_valid = false;
        $('#member_card').keyup(function() {
            $('#member_error').hide();
        });
        $("#member_card").bind("paste", function(e) {
            isNullMemberCardAndExpireDate();
        });

        $('#member_card').change(function() {
            isNullMemberCardAndExpireDate();
        });
        $('#day').change(function() {
            isNullMemberCardAndExpireDate();
        });
        $('#month').change(function() {
            isNullMemberCardAndExpireDate();
        });
        $('#year').change(function() {
            isNullMemberCardAndExpireDate();
        });

        function isNullMemberCardAndExpireDate() {
            var member_card = $('#member_card').val();
            var day = $('#day').val();
            var month = $('#month').val();
            var year = $('#year').val();

            if (member_card.length == 13 || member_card.length == 15) {
                if (day && month && year) {
                    checkMembercard();
                } else {

                    $('#member_error').show();
                    $('#member_error').text('กรุณากรอกวันหมดอายุบัตร');
                    $('#member_card').focus();
                    $('#member_error').addClass('error');
                    $('#member_error').removeClass('color_green');
                    member_card_is_valid = false;
                }
            } else {

                $('#member_error').show();
                $('#member_error').text('บัตรสเวนเซ่นส์การ์ดต้องมีหมายเลข 13 หรือ 15 หลัก');
                $('#member_card').focus();
                $('#member_error').addClass('error');
                $('#member_error').removeClass('color_green');
                member_card_is_valid = false;
            }
        }

        function checkMembercard() {
            $.ajax({
                type: "get",
                url: "https://www.swensens1112.com/api/ovs/card/validate_register",
                dataType: "json",
                data: {
                    member_card: $('#member_card').val(),
                    add_card: 0,
                    day: $('#day').val(),
                    month: $('#month').val(),
                    year: $('#year').val(),
                    name: $('#name').val(),
                    last_name: $('#lname').val(),
                    email: $('#register_email').val(),
                    mobile: $('#register_mobile').val(),
                    birthday_day: $('#birthday_day').val(),
                    birthday_month: $('#birthday_month').val(),
                    birthday_year: $('#birthday_year').val()
                },
                beforeSend: function() {
                    $('#member_card_loading_page').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#member_card_loading").show();
                },
                success: function(data) {
                    setTimeout(function() {
                        // console.log(data);
                        if (data.status == 0) {
                            $('#member_error').show();
                            $('#member_error').text('ขออภัย หมายเลขบัตรสมาชิกนี้ ถูกใช้งานแล้ว');
                            $('#member_card').focus();
                            $('#member_error').addClass('error');
                            $('#member_error').removeClass('color_green');
                            member_card_is_valid = false;
                        }
                        if (data.status == 1) {
                            console.log("submitHandler OK");
                            $('#member_error').show();
                            $('#member_error').text('');
                            $('#member_error').addClass('color_green');
                            $('#member_error').removeClass('error');
                            member_card_is_valid = true;
                        }
                        if (data.status == -1) {
                            $('#member_error').show();
                            $('#member_error').text(
                                'ขออภัย ไม่พบหมายเลขบัตรสมาชิกนี้ *หมายเหตุ : สำหรับบัตรสมาชิกใหม่สามารถลงทะเบียนได้ในวันถัดไป'
                            );
                            $('#member_card').focus();
                            $('#member_error').addClass('error');
                            $('#member_error').removeClass('color_green');
                            member_card_is_valid = false;
                        }
                        if (data.status == 2) {
                            if (!data.day || !data.month || !data.month) {
                                $('#member_error').text('กรุณากรอกวันหมดอายุบัตร');
                            } else {
                                $('#member_error').text('ขออภัย ท่านกรอกวันหมดอายุไม่ถูกต้อง');
                            }
                            $('#member_error').show();
                            $('#member_card').focus();
                            $('#member_error').addClass('error');
                            $('#member_error').removeClass('color_green');
                            member_card_is_valid = false;
                        }
                        if (data.status == 3) {
                            $('#member_error').show();
                            $('#member_error').text('ขออภัย บัตรสมาชิกของท่านหมดอายุแล้ว');
                            $('#member_card').focus();
                            $('#member_error').addClass('error');
                            $('#member_error').removeClass('color_green');
                            member_card_is_valid = false;
                        }
                        if (data.status == 4) {
                            $('#member_error').show();
                            $('#member_error').text('ขออภัย ไม่พบหมายเลขบัตรสมาชิกนี้');
                            $('#member_card').focus();
                            $('#member_error').addClass('error');
                            $('#member_error').removeClass('color_green');
                            member_card_is_valid = false;
                        }
                        $('#member_card_loading_page').modal({
                            backdrop: 'static',
                            keyboard: true
                        });
                        $('#member_card_loading_page').modal('hide');
                    }, 3000);
                },
                error: function() {
                    console.log("member card error");
                    member_card_is_valid = false;
                }
            });
        }
        $('#special_spacify').keyup(function() {

            if ($('#special_spacify').val() == '') {
                $('#special_day').prop('required', false);
                $('#special_month').prop('required', false);
                $('#special_year').prop('required', false);
                $('#special_day').val('');
                $('#special_month').val('');
                $('#special_year').val('');
                $('#special_date').hide();
            } else {
                $('#special_day').prop('required', true);
                $('#special_month').prop('required', true);
                $('#special_year').prop('required', true);
                $('#special_date').show();
            }
        });

        function check_member_card() {

        }
        $('#sub').click(function() {
            if ($('#check_sub').val() == 0) {
                $('#sub').addClass('active');
                $('#check_sub').val(1);
            } else {
                $('#sub').removeClass('active');
                $('#check_sub').val(0);
            }
        });

        $('#privacy_policy_terms_and_conditions').click(function() {
            if ($('#check_privacy_policy_terms_and_conditions').val() == 0) {
                $('#privacy_policy_terms_and_conditions').addClass('active');
                $('#check_privacy_policy_terms_and_conditions').val(1);
            } else {
                $('#privacy_policy_terms_and_conditions').removeClass('active');
                $('#check_privacy_policy_terms_and_conditions').val(0);
            }
        });

        $("#register_form").validate({
            rules: {
                name: "required",
                last_name: "required",
                member_card: {
                    maxlength: 15
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#register_password"
                },
                email: {
                    required: true,
                    email: true
                },
                /*confirm_email: {
                    required: true,
                    email: true,
                    equalTo: "#register_email"
                },*/
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                },
                birthday_day: "required",
                birthday_month: "required",
                birthday_year: "required",
            },
            messages: {
                name: "กรุณากรอกชื่อ",
                last_name: "กรุณากรอกนามสกุล",
                member_card: {
                    required: "กรุณากรอกบัตรสเวนเซ่นส์การ์ด Member Card",
                    minlength: "บัตรสเวนเซ่นส์การ์ดต้องมีหมายเลข 13 หรือ 15 หลัก"
                },
                password: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "กรอกรหัสผ่านความยาว 6 ตัวอักษรขึ้นไป"
                },
                confirm_password: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "กรอกรหัสผ่านความยาว 6 ตัวอักษรขึ้นไป",
                    equalTo: "รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง"
                },
                email: "กรุณากรอกอีเมลที่ถูกต้อง",
                /*
                confirm_email: "กรุณากรอกอีเมลที่ถูกต้อง",
                confirm_email: {
                    required: "กรุณากรอกยืนยันอีเมล",
                    equalTo: "อีเมลไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง"
                },*/
                mobile: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    minlength: "กรุณากรอกหมายเลขโทรศัพท์ให้ครบ 10หลัก",
                    maxlength: "กรุณากรอกหมายเลขโทรศัพท์ให้ครบ 10หลัก",
                },
                birthday_day: "กรุณากรอกวัน",
                birthday_month: "กรุณากรอกเดือน",
                birthday_year: "กรุณากรอกปี",
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            // callback for custom error display
            showErrors: function(errorMap, errorList) {
                    // summary of number of errors on form
                    var msg = "Your form contains " + this.numberOfInvalids() + " errors, see details below.<br/>"
                    // loop through the errorMap to display the name of the field and the error
                    $.each(errorMap, function(key, value) {
                        msg += key + ": " + value + "<br/>";
                    });
                    // place error text inside box
                    $("#errormessages").html(msg);
                    // also show default labels from errorPlacement callback
                    this.defaultShowErrors();
                    // toggle the error summary box
                    if (this.numberOfInvalids() > 0) {
                        $("#errormessages").show();
                    } else {
                        $("#errormessages").hide();
                    }
                } // end showErrors callback
                ,
            submitHandler: function(form) {

                var cal_birthday_day = $('#birthday_day').val();
                var cal_birthday_month = $('#birthday_month').val();
                var cal_birthday_year = $('#birthday_year').val();

                if (calculateAge(cal_birthday_month, cal_birthday_day, cal_birthday_year) < 10) {
                    var span = document.createElement("alert_span");
                    span.innerHTML =
                        "<h1>ท่านไม่สามารถสร้างบัญชีผู้ใช้ได้ <br>เนื่องจากท่านมีอายุไม่ถึงเกณฑ์ขั้นต่ำ (อายุ 10 ปีหรือมากกว่า)<h1>";

                    swal({
                        //title: span,
                        content: span,
                        allowOutsideClick: "true"
                    });
                    return false;
                }

                var check_privacy_policy_terms_and_conditions = $("#check_privacy_policy_terms_and_conditions")
                    .val();

                if (check_privacy_policy_terms_and_conditions != 1) {
                    alert(
                        "โปรดอ่านและยอมรับ ข้อกำหนดการใช้งาน นโยบายความเป็นส่วนตัวของสเวนเซ่นส์ ก่อนดำเนินการต่อ"
                    );
                    return false;
                }

                var email = $("#register_email").val();
                var LastThree = email.substr(email.length - 4);
                if (LastThree == ".con") {
                    swal('กรุณากรอกอีเมลที่ถูกต้อง');
                    $('#register_email').css('color', 'red');
                    $('#register_email').focus();
                    return false;
                }

                if ($('#member_card').val()) {
                    if (member_card_is_valid) {
                        form.submit();
                    } else {
                        window.location.href = "#name";
                    }
                } else {
                    $form.submit();
                }

            }

        });

        function calculateAge(birthMonth, birthDay, birthYear) {
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();
            var currentMonth = currentDate.getMonth();
            var currentDay = currentDate.getDate();
            var calculatedAge = currentYear - birthYear;

            if (currentMonth < birthMonth - 1) {
                calculatedAge--;
            }
            if (birthMonth - 1 == currentMonth && currentDay < birthDay) {
                calculatedAge--;
            }
            console.log(calculatedAge);
            return calculatedAge;
        }
        $('#birthday_year').change(function() {
            /*
                var cal_birthday_day = $('#birthday_day').val();
                var cal_birthday_month = $('#birthday_month').val();
                var cal_birthday_year = $('#birthday_year').val();

               if(calculateAge(cal_birthday_month,cal_birthday_day,cal_birthday_year) < 10){


                  var span = document.createElement("alert_span");
                  span.innerHTML = "<h1>ท่านไม่สามารถสร้างบัญชีผู้ใช้ได้ <br>เนื่องจากท่านมีอายุไม่ถึงเกณฑ์ขั้นต่ำ (อายุ 10 ปีหรือมากกว่า)<h1>";

                  swal({
                      //title: span,
                      content: span,
                      allowOutsideClick: "true"
                  });
                }
                */
        });
        $('#birthday_month').change(function() {
            $('#birthday_day_').empty().append('<option value=""> </option>');
            if (this.value == '01' || this.value == '03' || this.value == '05' || this.value == '07' || this
                .value == '08' || this.value == '10' || this.value == '12') {
                for (i = 1; i <= 31; i++) {
                    $('#birthday_day_').append('<option value=' + i + '>' + i + '</option');
                }
            }
            if (this.value == '04' || this.value == '06' || this.value == '09' || this.value == '11') {
                for (i = 1; i <= 30; i++) {
                    $('#birthday_day_').append('<option value=' + i + '>' + i + '</option');
                }
            }
            if (this.value == '02') {
                for (i = 1; i <= 28; i++) {
                    $('#birthday_day_').append('<option value=' + i + '>' + i + '</option');
                }
            }
            if ('th' == 'en') {
                for (i = 2011; i >= 1919; i--) {
                    $('#birthday_year').append('<option value=' + i + '>' + i + '</option');
                }
            } else {
                for (i = 2011; i >= 1919; i--) {
                    var thai_year = i + 543;
                    $('#birthday_year').append('<option value=' + i + '>' + thai_year + '</option');
                }
            }
        });

        $('#special_month').change(function() {
            console.log('test')
            $('#special_day_').empty().append('<option value=""> </option>');
            if (this.value == '01' || this.value == '03' || this.value == '05' || this.value == '07' || this
                .value == '08' || this.value == '10' || this.value == '12') {
                for (i = 1; i <= 31; i++) {
                    $('#special_day_').append('<option value=' + i + '>' + i + '</option');
                }
            }
            if (this.value == '04' || this.value == '06' || this.value == '09' || this.value == '11') {
                for (i = 1; i <= 30; i++) {
                    $('#special_day_').append('<option value=' + i + '>' + i + '</option');
                }
            }
            if (this.value == '02') {
                for (i = 1; i <= 28; i++) {
                    $('#special_day_').append('<option value=' + i + '>' + i + '</option');
                }
            }
            if ('th' == 'en') {
                for (i = 1919; i <= 2011; i++) {
                    $('#special_year').append('<option value=' + i + '>' + i + '</option');
                }
            } else {
                for (i = 1919; i <= 2011; i++) {
                    var thai_year = i + 543;
                    $('#special_year').append('<option value=' + i + '>' + thai_year + '</option');
                }
            }
        })
        // $(function() {
        //     $('#date_year').datetimepicker({
        //         format: 'YYYY'
        //     });
        //     $('#date_month').datetimepicker({
        //         format: 'MM'
        //     });
        //     $('#date_day').datetimepicker({
        //         format: 'DD'
        //     });
        //     $('#spe_year').datetimepicker({
        //         format: 'YYYY'
        //     });
        //     $('#spe_month').datetimepicker({
        //         format: 'MM'
        //     });
        //     $('#spe_day').datetimepicker({
        //         format: 'DD'
        //     });
        // });

        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;
        }

        $("#register_email").keyup(function() {
            $('#check_email_val').hide();
            $('#check_email_null').hide();
            $('#check_email').hide();
            $('#check_email_success').hide();
            $("#register_email").removeClass("error_input");
            $("#register_email").removeClass("success_input");
        });
        $("#confirm_password").keyup(function() {
            $("#register_password").removeClass("success_input");
            $("#register_password").removeClass("error_input");
            $('#check_password').hide();
            $('#password_false').hide();
        });
    </script>
@endsection
