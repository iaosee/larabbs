<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Transformers\UserTransformer;
use App\Models\User;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);

        if( !$verifyData ) {
            return $this->response->error('验证码 key 已失效', 422);
        }

        if( !hash_equals($verifyData['code'], $request->verification_code) ) {
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        // return $this->response->created();
        return $this->response->item($user, new UserTransformer())
                    ->setMeta([
                        'token_type' => 'Bearer',
                        'access_token' => \Auth::guard('api')->fromUser($user),
                        'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
                    ])->setStatusCode(201);
    }

    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }
    
}
