<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;

/**
 * Here is the class responsible for registering new users in the application 
 * as well as the login function, where an authentication Token is generated 
 * for the user, also has the functionality to know if user is logged in. 
 * It also has the function of shifting.
 */
class UserController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Method responsible for registering new users in the application.
     */
    public function register(Request $request){
        $user = $this->user->create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);

        return response()->json(['status'=>true, 'message'=>'Usuário cadastrado com sucesso', 'data'=>$user]);
    }
    
    /**
     * Method responsible for logging users on the basis of email and password, 
     * and provide the token in case of successful validation of user access data.
     */
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        
        $token = null;
        
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['invalid_email_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    /**
     * Method responsible for providing the data of the user who is authenticated.
     */
    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        
        return response()->json(['result' => $user]);
    }
    
    /**
     * Method responsible for moving the user from the application.
     */
    public function logout(Request $request){
        $user = JWTAuth::toUser($request->token);
        
        return response()->json(['result' => $user]);
    }  
}
