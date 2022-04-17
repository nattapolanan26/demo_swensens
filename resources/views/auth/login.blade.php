@extends('layouts.app')

@section('content')
    @include('sweetalert::alert')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-transparent">

                    <header class="sm:text-2xl text-red-600 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md text-center">
                        {{ __('เข้าสู่ระบบ') }}
                    </header>
                    <form class="w-full px-6 space-y-6 sm:px-12 sm:space-y-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        @if (\Session::has('error'))
                            <div class="bg-red-100 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
                                <span>{!! \Session::get('error') !!}</span>
                            </div>
                        @endif
                        <div class="md:flex md:items-center">
                            {{-- <input id="identity" type="identity" class="form-input w-full @error('identity') border-red-500 @enderror"
                                name="identity" value="{{ old('identity') }}" required autocomplete="identity"
                                placeholder="อีเมล หรือ รหัสผู้ใช้งาน" autofocus> --}}

                            <input type="text" name="identity" id="identity" required="" class="input" value=""
                                placeholder="อีเมล หรือ ชื่อผู้ใช้">
                            @error('identity')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="md:flex md:items-center">
                            <input type="password" name="password" id="password" required=""
                                class="input @error('password') border-red-500 @enderror" value="" placeholder="รหัสผ่าน">
                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none whitespace-no-wrap p-2 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-600 hover:bg-red-700 sm:py-2">
                                {{ __('เข้าสู่ระบบด้วยอีเมล') }}
                            </button>


                            <p class="w-full text-center text-gray-700 my-6 sm:text-md sm:my-8">
                                {{ __('หากคุณยังไม่ได้เป็นสมาชิกคลิกเลย >') }}
                                <a class="text-red-600 hover:text-red-700 underline hover:underline"
                                    href="{{ route('register') }}">
                                    {{ __('สมัครสมาชิกใหม่') }}
                                </a>
                            </p>
                            <p class="w-full text-center text-gray-700 mb-8 sm:text-md sm:mb-8">
                                <a class="text-red-600 hover:text-red-700 underline hover:underline" href="#">
                                    {{ __('แจ้งลืมรหัสผ่าน ?') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection
