<h2>Registration Succesfully</h2>


<p>
    Dear {{$user->username}}, <br/>
    Please active your account  clicking the following Link. <br/>

<a href="{{config('app.url')}}/verify/{{$user ->email_verification_token}}" >
    Click Here to active your account
</a>
</p>




