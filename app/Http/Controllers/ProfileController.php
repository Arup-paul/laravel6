<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller {
    public function profileUpdate( Request $request ) {
        $data   = [];
        $inputs = $request->except( '_token' );

        $validator = Validator::make( $inputs, [
            'email' => 'required|email',
            'username' => 'required',
        ] );

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors( $validator );
        }

        $user = User::find( auth()->user()->id );
        //$path = $user->profile_photo;

        // if ( $request->hasFile( 'profile_photo' ) ) {
        //     $profile_photo = $request->file( 'profile_photo' );
        //     $path          = $profile_photo->store( 'uploads' );
        //     unlink( 'uploads/' . $user->profile_photo );
        // }
        // $user->update( [
        //     'username' => trim( $request->input( 'username' ) ),
        //     'email' => trim( $request->input( 'email' ) ),
        //     'profile_photo' => $path,
        // ] );
        $data = [
             'username' => trim( $request->input( 'username' ) ),
             'email' => trim( $request->input( 'email' ) ),
        ];

        if ( $request->hasFile( 'profile_photo' ) ) {
            $profile_photo = $request->file( 'profile_photo' );
            $path          = $profile_photo->store( 'uploads' );
            unlink( 'uploads/'.auth()->user()->profile_photo );
            $data['profile_photo'] = $path;

        }
        $user->update( $data );

        session()->flash( 'message', 'Profile Update Succesfully' );
        return redirect()->route( 'dashboard' );

    }
}
