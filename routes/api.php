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


$API_V1 = function($api) {

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

        // 图片验证码
        $api->post('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');

        // 发送短信验证码
        $api->post('verificationCodes', 'VerificationCodesController@store')
            ->name('api.verificationCodes.store');

        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');

        // 用户登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');

        // 第三方登录
        $api->post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')
            ->name('api.socials.authorizations.store');

        // 刷新 token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');

        // 删除 token
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');

        // 获取分类
        $api->get('categories', 'CategoriesController@index')
            ->name('api.categories.index');

        // 文章列表
        $api->get('topics', 'TopicsController@index')
            ->name('api.topics.index');

        // 某个用户的发布的文章
        $api->get('users/{user}/topics', 'TopicsController@userIndex')
            ->name('api.users.topics.index');

        // 文章详情
        $api->get('topics/{topic}', 'TopicsController@show')
            ->name('api.topics.show');

        /* ********************************************************** */

        // 需要 token 验证的接口
        $api->group(['middleware' => 'api.auth'], function($api) {
            // 当前登录用户信息
            $api->get('user', 'UsersController@me')
                ->name('api.user.show');

            // 修改登录用户信息
            $api->patch('user', 'UsersController@update')
                ->name('api.user.update');
            
            // 图片资源
            $api->post('images', 'ImagesController@store')
                ->name('api.images.store');

            // 发布文章
            $api->post('topics', 'TopicsController@store')
                ->name('api.topics.store');

            // 修改文章
            $api->patch('topics/{topic}', 'TopicsController@update')
                ->name('api.topics.update');

            // 删除文章
            $api->delete('topics/{topic}', 'TopicsController@destroy')
                ->name('api.topics.destroy');

            // 发布文章回复
            $api->post('topics/{topic}/replies', 'RepliesController@store')
                ->name('api.topics.replies.store');

            // 删除文章回复
            $api->delete('topics/{topic}/replies/{reply}', 'RepliesController@destroy')
                ->name('api.topics.replies.destroy');
            
            // 
        });

    });
};


$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['serializer:array', 'bindings'],
], $API_V1);


/* 
// 微信登录授权 API 
https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx9c5af9f69a479e42&redirect_uri=http://larabbs.me&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect
// 获取 access_token
https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx9c5af9f69a479e42&secret=0a7357d2d64c7cf7318b6533fd0c1732&code=011FdnC40w1VDK11FMF40flgC40FdnCe&grant_type=authorization_code
// 通过 access_token获取个人信息
https://api.weixin.qq.com/sns/userinfo?access_token=14_7ldaakR9ip09llIm4JgXv27QmdetFNjRraG1ySc56lLGDp71VTUXsFpdFAfiJuJI8qLbxsZE1prQ8PXQekecPA&openid=oZWeA1kh89fxklY12H57j0GNVy28&lang=zh_CN


$accessToken = '14_7ldaakR9ip09llIm4JgXv27QmdetFNjRraG1ySc56lLGDp71VTUXsFpdFAfiJuJI8qLbxsZE1prQ8PXQekecPA';
$openID = 'oZWeA1kh89fxklY12H57j0GNVy28';
$driver = Socialite::driver('weixin');
$driver->setOpenId($openID);
$oauthUser = $driver->userFromToken($accessToken);
*/

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});