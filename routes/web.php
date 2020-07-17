<?php

// APIのURL以外のリクエストに対してはindexテンプレートを返す
// 画面遷移はフロントエンドのVueRouterが制御する
Route::get('/{any?}', fn() => view('index'))->where('any', '.+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
