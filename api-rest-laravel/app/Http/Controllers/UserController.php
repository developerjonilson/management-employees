<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Contributor;

/**
 * Here is the class responsible for registering new users in the application 
 * as well as the login function, where an authentication Token is generated 
 * for the user, also has the functionality to know if user is logged in. 
 * It also has the function of shifting.
 */
class UserController extends Controller
{
    private $user;
    private $contributor;
    public function __construct(User $user, Contributor $contributor){
        $this->user = $user;
        $this->contributor = $contributor;
    }

    /**
     * Method responsible for registering new users in the application.
     */
    public function register(Request $request){
        try {
            $contributor = $this->contributor->create([
                'cpf' => $request->get('cpf'),
                'pis' => $request->get('pis'),
                'position' => $request->get('position'),
                'team' => $request->get('team')
            ]);
            
            $user = $this->user->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'userable_id' => $contributor->id,
                'userable_type' => Contributor::class
            ]);
        } catch (JWTAuthException $e) {
            return response()->json(['status'=>false, 'message'=>'Erro ao cadastrar novo usuário']);
        }

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
        // return response()->json(compact('token'));
        return response()->json(['token' => $token], 200);
    }

    /**
     * Method responsible for providing the data of the user who is authenticated.
     */
    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->bearerToken());
        
        return response()->json(['result' => $user]);
    }
    
    /**
     * Method responsible for moving the user from the application.
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        
        try {
            JWTAuth::invalidate($request->token);
            return response()->json(['success' => true, 'message'=> "Lougout efetuado com sucesso."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Falha ao sair, por favor, tente novamente.'], 500);
        }
    }

    public function master() {
        $user = $this->user::find(2);

        // $userable = $user->master;
        $userable = $user->contributor;
        return response()->json(['result' => $userable]);
    }
}
