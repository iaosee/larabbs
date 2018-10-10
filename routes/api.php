<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

$api = app('Dingo\Api\Routing\Router');

/* $api->version('v1', function($api) {
    $api->get('version', function() {
        return response('this is version v1');
    });
});
 */

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {

    // 获取API版本
    $api->get('version', function() {
        return response(['version' => 'this is version v1']);
    });

    // 限制API调用频率
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function($api) {

        // 发送短信验证码
        $api->post('verificationCodes', 'VerificationCodesController@store')
            ->name('api.verificationCodes.store');

        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');

        // 图片验证码
        $api->post('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');
    });
/* 

// 微信登录授权 API 
https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx9c5af9f69a479e42&redirect_uri=http://larabbs.me&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect
// 获取 access_token
https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx9c5af9f69a479e42&secret=0a7357d2d64c7cf7318b6533fd0c1732&code=021mvTam0wEt0k1KjMcm0wlvam0mvTaE&grant_type=authorization_code
// 通过 access_token获取个人信息
https://api.weixin.qq.com/sns/userinfo?access_token=14_7ldaakR9ip09llIm4JgXv27QmdetFNjRraG1ySc56lLGDp71VTUXsFpdFAfiJuJI8qLbxsZE1prQ8PXQekecPA&openid=oZWeA1kh89fxklY12H57j0GNVy28&lang=zh_CN


$accessToken = '14_7ldaakR9ip09llIm4JgXv27QmdetFNjRraG1ySc56lLGDp71VTUXsFpdFAfiJuJI8qLbxsZE1prQ8PXQekecPA';
$openID = 'oZWeA1kh89fxklY12H57j0GNVy28';
$driver = Socialite::driver('weixin');
$driver->setOpenId($openID);
$oauthUser = $driver->userFromToken($accessToken);
*/
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});