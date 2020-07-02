<?php

namespace App\Console\Commands;

use App\Mail\PostNotification;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailUsers extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email users who have not posted yet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $users       = User::with('posts')->select( 'email','username' )->get();
        $email_users = $users->filter( function ( $user ) {
            return $user->posts->count() === 0;
        } );

       if($email_users->count() > 0){
           $email_users->map(function ($user){
            Mail::to($user->email)->send(new PostNotification($user));
           });


    }
}
}
