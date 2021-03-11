<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        return $request->user();
    }

    public function login()
    {

        if (User::where('email', '=', request('email'))->exists()) {
            $user = User::where('email', '=', request('email'))->first();
            if (($user->lisansbitistarihi > new Date())) {
                if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                    $user = Auth::user();
                    $success['token'] = $user->createToken('Eticaret')->accessToken;
                    return response()->json(['success' => $success], 200);
                } else {
                    return response()->json(['error' => 'Kullanıcı Bilgilerinde Hata Bulunmaktadır.'], 401);
                }
            } else {
                return response()->json(['error' => 'Lisans Süreniz Dolmuştur.'], 401);
            }
        } else {
            return response()->json(['error' => 'Böyle Bir Kullanıcı Bulunamadı'], 401);
        }
    }

    /**
     * Register api
     *
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $input["firstname"] = $request["isim"];
        $input["lastname"] = $request["soyisim"];
        $input["email"] = $request["email"];
        $input["phone"] = $request["phone"];
        $input["amac"] = $request["amac"];
        $input["filesize"] = 'free';
        $input["dosyaboyutu"] = 2000000000;
        if ($request->hasFile("profil")) {
            $path = $request->file("profil")->store("public/" . $request->file("profil")->getClientOriginalName());
            $input["profil"] = $path;
        } else {
            $input["profil"] = "profil.jpg";
        }
        $input["lisanslimi"] = false;
        $input['password'] = bcrypt($request['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('Eticaret')->accessToken;
        $success['firstname'] = $user->firstname;
        $success['lastname'] = $user->lastname;
        $success['rol'] = $user->rol;
        $success['profil'] = Storage::disk("public")->url($user->profil);
        $success['lisanslimi'] = $user->lisanslimi;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return JsonResponse
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }


}
