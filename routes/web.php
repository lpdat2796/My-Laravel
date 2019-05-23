<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('xinchao/{ten}', function () {
    return view('welcome');
});
//Test
Route::get('showdb',function()
{
	$data=DB::table('tblbaiviet')->get();
	$cot=DB::table('tblbaiviet')->select('idbaiviet','noidung')->get();
	$dieukien=DB::table('tblbaiviet')->where('idbaiviet','<',5)->get();
	//$join=DB::table('tblbaiviet')->join('tbldanhmucbaiviet','iddanhmucbaiviet','=','iddanhmucbaiviet')->get();
	$baiviet1=DB::table('tblbaiviet')->where('iddanhmucbaiviet',1)->orderBy('idbaiviet','desc')->first();//lấy ra 1 dòng
	//$cotbaiviet=DB::table('tbldanhmucbaiviet')::select('idbaiviet','title')->get();
	//$dem=DB::table('tbldanhmucbaiviet')::all()->count();
	//Xóa
	//$xoa=DB::table('tbldanhmucbaiviet')::find(1);//1 là id
	//$xoa->delete();
	print_r($baiviet1);
});

//Web

Route::get('Goicontroller','MyController@Xinchao');

Route::get('index.html',['as'=>'trangchu','uses'=>'MyController@getIndex']);

Route::get('list-new.html/{id}',['as'=>'list','uses'=>'MyController@getList']);

Route::get('content.html/{id}',['as'=>'content','uses'=>'MyController@getContent']);

Route::get('dangnhap.html',['as'=>'dangnhap','uses'=>'MyController@getDangnhap']);

Route::post('dangnhap.html',['as'=>'dangnhap','uses'=>'MyController@postDangnhap']);

Route::get('dangky.html',['as'=>'dangky','uses'=>'MyController@getDangky']);

Route::post('dangky.html',['as'=>'dangky','uses'=>'MyController@postDangky']);

Route::get('refresh_captcha', 'MyController@refreshCaptcha')->name('refresh_captcha');

Route::get('captcha_test',['as'=>'captcha','uses'=>'MyController@create_captcha']);

Route::post('index.html',['as'=>'dangnhap_index','uses'=>'MyController@postDangnhap_index']);

Route::get('tim-mat-khau.html',['as'=>'quenmatkhau','uses'=>'MyController@getquenmatkhau']);

Route::post('tim-mat-khau.html',['as'=>'quenmatkhau','uses'=>'MyController@postquenmatkhau']);

Route::get('gui-mail/{id}/{token}',['as'=>'send-mail','uses'=>'MyController@activeUser']);

//Route::get('send-mail',['as'=>'dathang','uses'=>'MyController@postCheckout']);

Route::get('dang-xuat',['as'=>'dangxuat','uses'=> 'MyController@getLogout']);

//Route::get('sendmail',['as'=>'sendmail1','uses'=>'MyController@sendmail']);
/* Route::group(['middleware'=>'CheckUser'],function()
{
	Route::get('reset-mat-khau/{code}',['as'=>'resetmatkhau','uses'=>'MyController@getReset']);
	Route::post('reset-mat-khau/{code}',['as'=>'resetmatkhau','uses'=>'MyController@postReset']);
});
 */
Route::get('reset-mat-khau',['as'=>'resetmatkhau','uses'=>'MyController@getReset']);

Route::post('reset-mat-khau',['as'=>'resetmatkhau','uses'=>'MyController@postReset']);

/* Route::get('dangnhap.html/{provider}/',['as'=>'provider_dangnhap','uses'=>'MyController@redirectToProvider']);

Route::get('dangnhap.html/{provider}/callback',['as'=>'provicer_dangnhap_callback','uses'=>'MyController@handleProviderCallback']); */
/* Route::get('auth/facebook', 'MyController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'MyController@handleProviderCallback'); */

Route::get('redirect',['as'=>'dangnhap_facebook','uses'=> 'MyController@redirect']);
Route::get('callback', 'MyController@callback');

