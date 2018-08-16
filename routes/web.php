<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'AdminController@index'
	]);

	Route::resource('role','RoleController');

	Route::resource('pegawai','PegawaiController');

	Route::resource('pengaduan','PengaduanController');

	Route::get('pengaduan-disetujui',[
		'as'	=>	'pengaduan.disetujui',
		'uses'	=>	'PengaduanController@approved'
	]);

	Route::get('pengaduan-ditolak',[
		'as'	=>	'pengaduan.ditolak',
		'uses'	=>	'PengaduanController@rejected'
	]);

});

Route::group(['prefix'=>'user','as'=>'user.'], function(){

	Route::resource('/profile','UserProfileController',['only' => ['show','update']]);

	Route::resource('pengaduan','PengaduanController',['only' => ['index','show']]);

	Route::get('pengaduan-disetujui',[
		'as'	=>	'pengaduan.disetujui',
		'uses'	=>	'PengaduanController@approved'
	]);

	Route::get('pengaduan-ditolak',[
		'as'	=>	'pengaduan.ditolak',
		'uses'	=>	'PengaduanController@rejected'
	]);

	Route::get('tolak-pengaduan/{pengaduanId}',[
		'as'	=>	'tolak.pengaduan',
		'uses'	=>	'PengaduanApprovalController@reject'
	]);

	Route::get('setujui-pengaduan/{pengaduanId}',[
		'as'	=>	'setujui.pengaduan',
		'uses'	=>	'PengaduanApprovalController@approve'
	]);

	Route::post('comment-pengaduan',[
		'as'	=>	'comment.pengaduan',
		'uses'	=>	'CommentController@postPengaduanComment'
	]);

	Route::post('team-pengaduan',[
		'as'	=>	'team.pengaduan',
		'uses'	=>	'PengaduanTeamController@attachTeamToModal'
	]);


});