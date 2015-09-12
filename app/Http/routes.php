<?php

function gravatar($email, $d, $s)
{
	$path = '//www.gravatar.com/avatar/' . md5($email) . '?';

	return $path . http_build_query(compact('d', 's'));
}

resource('shoutouts', 'SiteController');

Route::get('/', [
	'as' => 'home',
	'uses' => 'SiteController@index'
]);
