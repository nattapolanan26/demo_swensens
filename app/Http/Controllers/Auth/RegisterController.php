<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $data = json_decode(Cookie::get('step1'), TRUE);
        // dd($request->all());
        // dd($data[0]);
        try {

            $dataUser = [
                'name' => $data[0]['name'],
                'last_name' => $data[0]['last_name'],
                'email' =>  $data[0]['email'],
                'password' => Hash::make($data[0]['password']),
                'mobile' => $data[0]['mobile'],
                'birthday_day' => $data[0]['birthday_day'],
                'birthday_month' => $data[0]['birthday_month'],
                'birthday_year' => $data[0]['birthday_year'],
                'special_spacify' => $data[0]['special_spacify'],
                'special_day' => $data[0]['special_day'],
                'special_month' => $data[0]['special_month'],
                'special_year' => $data[0]['special_year'],
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'google_address' => $request->google_address,
                'country' => $request->country,
                'delivery_type' => $request->delivery_type ? $request->delivery_type : null,
                'name_location' => $request->name_location ?$request->name_location : null,
                'villages' => $request->villages ? $request->villages : null,
                'number_home' => $request->number_home,
                'street' => $request->street,
                'district' => $request->district,
                'area' => $request->area,
                'province' => $request->province,
                'post_code' => $request->post_code,
                'more_details' => $request->more_details ? $request->more_details : null,
                'member_card' => $request->member_card ? $request->member_card : null,
            ];

            User::create($dataUser);

            Alert::success('Success', 'เพิ่มข้อมูลสำเร็จ')->position('top-end')->autoClose(1500);

            return redirect('/login');
        } catch (\Exception $e) {
            return response()->view($e, 500);
        }
    }

    public function registerStep2(Request $request)
    {
        $item_array[] = $request->all();
        $item_data    = json_encode($item_array);
        Cookie::queue('step1', $item_data);

        return view('auth.register2');
    }

    public function registerStep3(Request $request)
    {
        $data_address[0] = $request->all();

        // dd($data_address[0]);
        return view('auth.register3', compact('data_address'));
    }
}
