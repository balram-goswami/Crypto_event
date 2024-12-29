<?php

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\{
    UserEvent,
    Admin,
    EventType,
    User
};

function appName()
{
	return config('app.name');
}
function siteUrl()
{
	return 'https://localhost.com';
}
function publicPath($url = null)
{
	return asset($url);
}
function assetPath($url = null)
{
	return asset('assets/' . $url);
}
function publicbasePath()
{
	return '/public';
}
function basePath()
{
	return base_path('/public/');
}
function getUser($user_id)
{
	return User::where('id', $user_id)->select('*')->get()->first();
}