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

	Route::get('pengaduan-disetujui-team',[
		'as'	=>	'pengaduan.disetujui.team',
		'uses'	=>	'PengaduanController@pengaduanWithTeam'
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

	Route::resource('report', 'ReportController');

	Route::resource('inv-report', 'InvReportController');

	Route::get('tolak-laporan/{laporanId}',[
		'as'	=>	'tolak.laporan',
		'uses'	=>	'LaporanApprovalController@reject'
	]);

	Route::get('setujui-laporan/{laporanId}',[
		'as'	=>	'setujui.laporan',
		'uses'	=>	'LaporanApprovalController@approve'
	]);

	Route::get('pengaduan-disetujui-report',[
		'as'	=>	'pengaduan.disetujui.report',
		'uses'	=>	'ReportController@pengaduanWithReport'
	]);

	Route::get('pengaduan-disetujui-report-disetujui',[
		'as'	=>	'pengaduan.disetujui.report.approved',
		'uses'	=>	'ReportController@pengaduanWithReportApproved'
	]);

	Route::get('pengaduan-disetujui-report-ditolak',[
		'as'	=>	'pengaduan.disetujui.report.rejected',
		'uses'	=>	'ReportController@pengaduanWithReportRejected'
	]);

});