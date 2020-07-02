<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'email', 128 )->unique();
            $table->string( 'username', 128 )->unique();
            $table->string( 'password' );
            $table->string( 'profile_photo' );
            $table->string( 'status' )->default( 0 );
            $table->timestamp( 'email_verified_at' )->nullable();
            $table->string( 'email_verification_token' )->nullable();
            $table->rememberToken();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists( 'users' );
    }
}
