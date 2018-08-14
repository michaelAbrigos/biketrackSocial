<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_info;
use Input;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class AuthController extends Controller
{
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $credentials = $request->only('username', 'email', 'password');
        
        $rules = [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
        
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()],401);
        }

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        
        $user = User::create(['username' => $username, 'email' => $email, 'password' => Hash::make($password)]);

        $verification_code = str_random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
        $subject = "Please verify your email address.";
        Mail::send('email.verify', ['username' => $username, 'verification_code' => $verification_code],
            function($mail) use ($email, $username, $subject){
                $mail->from(getenv('FROM_EMAIL_ADDRESS'), "biketrack@gmail.com");
                $mail->to($email, $username);
                $mail->subject($subject);
            });
        return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.'],200);
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function verifyUser($verification_code)
    {
        $check = DB::table('user_verifications')->where('token',$verification_code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if($user->is_verified == 1){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Account already verified..'
                ]);
            }
            $user->update(['is_verified' => 1]);
            DB::table('user_verifications')->where('token',$verification_code)->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'You have successfully verified your email address.'
            ]);
        }
        return response()->json(['success'=> false, 'message'=> "Verification code is invalid."]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'message'=> $validator->messages()], 401);
        }
        
        $credentials['is_verified'] = 1;
        
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'message' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'message' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return response()->json(['token'=>$token], 200);
    }
    public function loginWeb(Request $request){
        
        $credentials = $request->only('email', 'password');
        
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()], 401);
        }
        
        $credentials['is_verified'] = 1;
        
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 404);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return view('Bike User.real-time-tracking');

    }
    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    public function recover(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
        try {
            Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject('Your Password Reset Link');
            });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['success' => false, 'error' => $error_message], 401);
        }
        return response()->json([
            'success' => true, 'data'=> ['message'=> 'A reset email has been sent! Please check your email.']
        ]);
    }

    public function informationSave(Request $request){

        $validator = Validator::make($data = Input::all(),User_info::$rules);
        
        if($validator->fails()){
            return response()->json(['success' => false, 'data'=> ['message'=> $validator->messages()]],401);
        } 

        User_info::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'birthday' => $request->bday,
            'gender' => $request->gender,
            'contact_number' => $request->contact,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zipcode,
            'user_id' => Auth::id()
        ]);

        return response()->json(['success' => true, 'data'=> ['message'=> 'Account setup successful']],200);
    }

    public function checkExists(){
        $user = User_info::find(Auth::id());
        $currentUser = User::find(Auth::id());
        $hasDevice = $currentUser->devices()->where('id',Auth::id())->exists();
        

        if($user && $hasDevice){
            $device = $currentUser->devices()->where('id',Auth::id())->first();
            return response()->json(['exists'=>"Exists",'user' => $user,'has_device'=>$hasDevice,'device_id',$device->id],200);
        }elseif($user && !$hasDevice){
            return response()->json(['exists'=>"Exists",'user' => $user,'has_device'=>$hasDevice],200);
        }elseif(!$user && $hasDevice){
            return response()->json(['exists'=>"nope",'user' => $user,'has_device'=>$hasDevice],200);
        }else{
            return response()->json(['exists'=>"nope",'user' => $user,'has_device'=>$hasDevice],200);
        }
       
    }


}
