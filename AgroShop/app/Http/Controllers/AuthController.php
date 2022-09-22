<?php

namespace App\Http\Controllers;


use App\Models\Aids;
use App\Models\Countries;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "phoneNumber" => ["required"],
            "password" => ["required", "min:6"]
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(("/"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth("web")->logout();
        return redirect(route("checkPhoneNumberExist"));
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    //  public function userData(){
    //        $data = User::orderBy('id')->take(1)->get();
    //        return view('/', [
    //            'User' => $data,
    //
    //            ]);
    //    }


    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "phoneNumber" => ["required", "string", "unique:users,phoneNumber"],
            "farmer" => ['required'],
            "password" => ["required", "confirmed"]
        ]);

        $user = User::create([
            "name" => $data["name"],
            "phoneNumber" => $data["phoneNumber"],
            "farmer" => $data["farmer"],
            "password" => bcrypt($data["password"])
        ]);

        if($user) {
            //event(new Registered($user));
            auth("web")->login($user);
        }

        return redirect('/');
    }

    public function showProfile(Request $request)
    {

        $userAuth = Auth::user()->query();

            $userP = $userAuth
                ->leftJoin('locations', function ($join) {
                    $join->on('users.location_id', '=', 'locations.id')
                        ->leftJoin('countries', function ($join) {
                            $join->on('locations.country_id', '=', 'countries.id');

                        })->leftJoin('regions', function ($join) {
                            $join->on('locations.region_id', '=', 'regions.id');

                        })->leftJoin('subregions', function ($join) {
                            $join->on('locations.subregion_id', '=', 'subregions.id');

                        });
                })->paginate();

        $user = Auth::user();

        return view("profile", compact('user', 'userP'));
    }

    public function editProfile(Request $request){
        $user = User::find(Auth::user()->user_id);


        if ($user){
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();

            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }


    public function showCheckPhoneNumberExist(){
        return view('auth.checkPhoneNumberExist');
    }


    public function checkPhoneNumberExist(Request $request)
    {

        if (isset($_GET['phoneNumber'])) {
            session_start();
            $_SESSION['phoneNumber'] = $_GET['phoneNumber'];
        }

        $data = $request->validate([
            "phoneNumber" => ["required"],
        ]);

        if (DB::table('Users')->where('phoneNumber', $data)->exists()) {
            return redirect('/login');
        } else {
            return redirect('/register');
        }

    }

}
