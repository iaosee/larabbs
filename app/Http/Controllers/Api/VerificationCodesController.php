<?php

namespace App\Http\Controllers\Api;

use Overtrue\EasySms\EasySms;
use App\Http\Requests\Api\VerificationCodeRequest;

// 继承的是 Api
class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;

        // 生成6位随机数，左侧补0
        $code = str_pad(random_int(1, 999999), 6, 0, STR_PAD_LEFT);

        if (app()->environment('production')) {
            try {
                $result = $easySms->send($phone, [
                    'content'  =>  "【Lbbs社区】您的验证码是{$code}。如非本人操作，请忽略本短信",
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('yunpian')->getMessage();
                return $this->response->errorInternal($message ?? '短信发送异常');
            }
        }

        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return $this->response->array([
            // 'code' => $code,
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'message' => '短信发送成功',
            'status_code' => 201,
        ])->setStatusCode(201);
    }

}
