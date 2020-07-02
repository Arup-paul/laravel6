<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller {
    public function register() {
        return view( 'frontend.auth.register' );
    }

    public function processRegister( Request $request ) {
        $inputs = $request->except( '_token' );

        $validator = Validator::make( $inputs, [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
            'profile_photo' => 'required',
        ] );

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors( $validator )->withInput();
        }

        $profile_photo = $request->file( 'profile_photo' );
        $path          = $profile_photo->store( 'uploads' );

        //  $user = DB::table('users')->insert([
        //     'email'=>trim($request->input('email')),
        //     'username'=>trim($request->input('username')),
        //     'password'=>bcrypt($request->input('password')),
        //     'profile_photo'=>$path,
        //     'email_verification_token' => uniqid( time() . request()->input( 'email' ) . Str::random( 16 ) ),
        //  ]);

        $user = User::create( [
            'email' => trim( $request->input( 'email' ) ),
            'username' => trim( $request->input( 'username' ) ),
            'password' => bcrypt( $request->input( 'password' ) ),
            'profile_photo' => $path,
            'email_verification_token' => uniqid( time() . request()->input( 'email' ) . Str::random( 16 ) ),
        ] );



        session()->flash( 'message', 'User Register Done' );
        return redirect()->back();

    }

    public function showUserList() {
        $data = [];
        // $data['users'] = DB::table('users')->get();
        $data['users'] = User::all();
        return view( 'frontend.auth.show', $data );
    }

    public function showUser( $id ) {
        $data         = [];
        $data['user'] = User::find( $id );
        return view( 'frontend.auth.user', $data );
    }

    public function updateUser( $id, Request $request ) {
        $inputs = $request->except( '_token' );

        $validator = Validator::make( $inputs, [
            'email' => 'required|email',
            'username' => 'required',
            'profile_photo' => 'image|max:10240',
        ] );

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors( $validator )->withInput();
        }

        $user = User::find( $id );
        $path = $user->profile_photo;

        if ( $request->hasFile( 'profile_photo' ) ) {
            $profile_photo = $request->file( 'profile_photo' );
            $path          = $profile_photo->store( 'uploads' );
            unlink( 'uploads/' . $user->profile_photo );
        }

        //update the user

//    DB::table('users')->where('id',$id)->update([
        //        'username' => $request->input('username'),
        //        'username' => $request->input('username'),
        //        'profile_photo' => $path,
        //    ]);

        $user->update( [
            'username' => trim( $request->input( 'username' ) ),
            'email' => trim( $request->input( 'email' ) ),
            'profile_photo' => $path,
        ] );

        session()->flash( 'message', 'User Update Succesfully' );
        return redirect()->back();

    }

    public function deleteUser( $id ) {
        $user = User::find( $id );
        $user->delete();

        session()->flash( 'message', 'User Delete Succesfully' );
        return redirect()->route( 'register' );
    }

    public function userLogin() {
        return view( 'Frontend.Auth.login' );
    }

    public function processLogin( Request $request ) {
        //validation
        $inputs = $request->except( '_token' );

        $inputs['status'] = 1;

        $validator = Validator::make( $inputs, [
            'email' => 'required|email',
            'password' => 'required',
        ] );
        if ( $validator->fails() ) {
            return redirect()->back()->withErrors( $validator )->withInput();
        }

        //check if the user exists

        if ( Auth::attempt( $inputs ) ) {
            session()->flash( 'message', 'Login Succesfully ' );
            return redirect()->route( 'dashboard' );
        };

        session()->flash( 'message', 'Invalid Credentials or Your account not verified' );
        return redirect()->back();

    }

    public function logout() {
        Auth::logout();
        session()->flash( 'message', 'You Have Been logout' );
        return redirect()->route( 'userLogin' );
    }

    public function verifyEmail($token){
        $user = User::where('email_verification_token',trim($token))->first();

        if(null == $user){
            session()->flash( 'message', 'Invalid Token' );
            return redirect()->route( 'register' );
        }

        $user->update([
           'status' => '1',
           'email_verification_token'=> null
        ]);
        auth()->login($user);
        return redirect()->route('dashboard');
    }

}
