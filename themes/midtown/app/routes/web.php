<?php
/**
* Web Routes.
*/
use WPEmerge\Facades\Route;

Route::get()->where('post_template', 'templates/plain_page.php')->handle('PlainPageController@index');

Route::get()->where(function() { return is_blog(); })->handle('BlogController@index');

Route::get()->where(function(){
	return isset($_GET['s']);
})->handle('SearchController@index');

Route::get()->where('post_type', 'post')->handle('BlogController@index');

Route::get()->where('post_type', 'page')->handle('PageController@index');

Route::get()->where(function(){
	return is_404();
})->handle('NotFoundController@index');