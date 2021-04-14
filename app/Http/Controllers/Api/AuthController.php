<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use \App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {


    public function __construct()
    {
       $this->middleware('auth:api', ['except' => ['login','register']]);
    }

	public function register(UserRegisterRequest $request) {
		$user = User::create([
			'email' => $request->email,
			'name' => $request->name,
			'password' => bcrypt($request->password),
		]);
        $user->assignRole(User::USER_ROLE_client_USER);

		if (!$token =auth()->guard('api')->attempt($request->only(['email', 'password']))) {
			return abort(401);
		};
		return $this->createNewToken($token,$user->id);
		return (new UserResource($request->user()))->additional([
			'meta' => [
				'token' => $token,
			],
		]);

	}

	public function login(UserLoginRequest $request) {
		if (!$token = auth()->guard('api')->attempt($request->only(['email', 'password']))) {
			return response()->json([
				'errors' => [
					'email' => ['Sorry we cant find you with those details.'],
				],
			], 422);
		};
        $user=User::where('email',$request->email)->first();
        return $this->createNewToken($token,$user->id);
		return (new UserResource($request->user()))->additional([
			'meta' => [
				'token' => $token,
			],
		]);


	}

	public function user() {
        return (new UserResource(auth()->user()));
	}
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(['user' => auth()->user()]);
    }
    protected function createNewToken($token,$id){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user_id' => $id//auth()->user()
        ]);
    }


	public function update(UserUpdateRequest $request)
    {
        $user=auth()->user();
        $user->update([
            'email' => $request->email,
            'name' => $request->name,

        ]);
         if(isset($request->password))
             $user->password= bcrypt($request->password);

        return $user;
    }

	public function logout() {
		auth('api')->logout();
	}
}
