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
                        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-2" method="POST"
                            action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="form-group">
                                    <label>ข้อมูลส่วนตัว*</label>
                                </div>
                                <input id="name" type="text" class="input w-full @error('name') border-red-500 @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="ชื่อ*" autofocus>

                                @error('name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="lastname" type="text"
                                    class="input w-full @error('lastname') border-red-500 @enderror" name="lastname"
                                    value="{{ old('lastname') }}" placeholder="นามสกุล*">

                                @error('lastname')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="input w-full @error('email') border-red-500 @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="อีเมล*">

                                @error('email')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" required=""
                                    class="input @error('password') border-red-500 @enderror" value=""
                                    placeholder="รหัสผ่าน*">
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
                                <div style="overflow: hidden;">
                                    <div class="input-group date col-md-4 col-xs-4" id="">
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
                                    </div>
                                    <div class="input-group date col-md-4 col-xs-4" id="date_month">
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
                                    </div>
                                    <div class="input-group date col-md-4 col-xs-4" id="date_year">
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
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>วันพิเศษ (ไม่บังคับ)</label>
                                <input type="text" class="input input-light" name="special_spacify" id="special_spacify"
                                    onkeypress="" placeholder="เช่น วันครบรอบ, วันเกิดแฟน, วันเกิดลูก" value="">
                            </div>

                            <div class="form-group ">
                                <div class="checkbox me-lg-5 mr-1" id="privacy_policy_terms_and_conditions">
                                    <input type="checkbox" id="read_a3" name="read_a3" value="0"
                                        onclick="StatusPermission(this.value,this.id)" />
                                        <span class="content-customer-info">ฉันได้อ่านและยอมรับ <a target="_blank" href="/th/terms-and-conditions">
                                            ข้อกำหนดการใช้งาน </a>และ<a target="_blank" href="/th/privacy-policy">
                                            นโยบายความเป็นส่วนตัว </a>ของสเวนเซ่นส์</span>
                                    {{-- <span class="checkbox-text">

                                        ฉันได้อ่านและยอมรับ <a target="_blank" href="/th/terms-and-conditions">
                                            ข้อกำหนดการใช้งาน </a>และ<a target="_blank" href="/th/privacy-policy">
                                            นโยบายความเป็นส่วนตัว </a>ของสเวนเซ่นส์</span> --}}
                                </div>
                            </div>

                            <div class="custom-checkbox" id="sub">
                                <span class="content-customer-info">
                                    <span class="icon-checkbox"></span>ฉันยินยอมรับข้อมูลข่าวสาร กิจกรรมส่งเสริมการขายต่างๆ
                                    จากสเวนเซ่นส์และ <a target="_blank"
                                        href="https://www.minor.com/th/affiliated-companies">บริษัทในเครือ</a>
                                    โดยเราจะเก็บข้อมูลของท่านไว้เป็นความลับ สามารถศึกษาเงื่อนไข/ข้อตกลง<a target="_blank"
                                        href="/th/privacy-policy"> นโยบายความเป็นส่วนตัว
                                    </a>เพิ่มเติมได้ที่เว็บไซต์ของบริษัทฯ</span>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                    class="w-full select-none whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-600 hover:bg-red-700 sm:py-2">
                                    {{ __('ถัดไป') }}
                                </button>

                                <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                    {{ __('Already have an account?') }}
                                    <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
                                        href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
