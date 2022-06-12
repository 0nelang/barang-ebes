<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqControllerbru;
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

//view App
Route::get('/', 'IndexController@index');
Route::get('storagelink', function () {
    Artisan::call('storage:link');
});
Route::get('katalog', function () {
    return view('katalog');
});
Route::get('katalogv2', function () {
    return view('katalogv2');
});

Route::get('autocomplete', 'IndexController@autocomplete')->name('autocomplete');

Route::get('coffee', 'PageController@coffee');
Route::get('jaket', 'BatikController@index');
Route::get('jaket/{category}', 'BatikController@category')->name('batik.category');
Route::post('batik-data', 'BatikController@data');

Route::get('parka', 'BusanaController@index');
Route::post('busana-data', 'BusanaController@data');

Route::get('vest', 'AksesorisController@index');
Route::post('aksesoris-data', 'AksesorisController@data');

Route::get('dekorasi', 'DekorasiController@index');
Route::post('dekorasi-data', 'DekorasiController@data');

Route::get('bahan_batik', 'BahanBatikController@index');

Route::get('artikel', 'ArtikelWebController@index');
Route::get('artikel/{slug}', 'ArtikelWebController@detail');

Route::get('brand', 'PengrajinController@index')->name('pengrajin');
Route::get('brand/{id}/{name}', 'PengrajinController@detail')->name('pengrajin.detail');
Route::get('produk-pengrajin/{user_id}', 'PengrajinController@product')->name('pengrajin.all.product');
Route::post('pengrajin-data', 'PengrajinController@data')->name('pengrajin.data');

Route::get('produk/{type}/{category}', 'ProductWebController@index')->name('product.all');
Route::get('produk-detail/{id}/{name}', 'ProductWebController@detail')->name('product.web.detail');
Route::post('data-produk', 'ProductWebController@data')->name('product.web.data');

Route::get('tentang', 'AboutWebController@index');

Route::get('search', 'SearchController@index')->name('search');
Route::post('search-data', 'SearchController@data')->name('search.data');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('dashboard', 'DashboardController');
    // Route::resource('faq', 'FaqController');

    Route::resource('product', 'ProductController');
    Route::resource('home-product', 'HomeProductController');

    Route::get('product/category/{id}', 'ProductController@category');
    Route::get('product/subcategory/{id}', 'ProductController@subcategory');
    Route::post('product/image/destroy', 'ProductController@imageDestroy');
    Route::post('product/detail/destroy', 'ProductController@detailDestroy');
    Route::get('getProduct', 'ProductController@getProduct')->name('getProduct'); 
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::put('profile-update/{user}', 'UserController@profileUpdate')->name('profile.update');

    Route::resource('banner', 'BannerController');
    Route::get('banner/delete/{id}', 'BannerController@destroy')->name('banner.destroy');

    Route::resource('article', 'ArticleController');
    Route::get('article/delete/{id}', 'ArticleController@destroy')->name('article.destroy');
    Route::post('article-attach', 'ArticleController@attach')->name('article.attach.store');
    Route::post('article-attach-destroy', 'ArticleController@attachDestroy')->name('article.attach.destroy');

    Route::resource('user', 'UserController');

    Route::resource('about', 'AboutController');
    Route::post('about-attach', 'AboutController@attach')->name('about.attach.store');
    Route::post('about-attach-destroy', 'AboutController@attachDestroy')->name('about.attach.destroy');
    Route::delete('about/value/{id}', 'AboutController@valueDestroy');

    Route::resource('setting', 'SettingController');

    Route::get('faq','FaqControllerbru@index')->name('faq.index');
    Route::get('faq/create','FaqControllerbru@create')->name('faq.create');
    Route::post('faq','FaqControllerbru@store')->name('faq.store');
    Route::get('faq/{faq:id}','FaqControllerbru@show')->name('faq.show');
    Route::put('faq/update/{faq:id}','FaqControllerbru@update')->name('faq.update');
    Route::get('faq/delete/{faq:id}','FaqControllerbru@destroy')->name('faq.destroy');
});

Auth::routes();
