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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/candidatos', function () {
    return view('candidatos');
});
Route::get('/candidaturas', function () {
    return view('candidaturas');
});


Route::resource('offer','offerController');
Route::resource('candidate','candidateController');
Route::resource('candidacy','candidacyController');

Route::get('/countOffers', 'offerController@countOffers');
Route::get('/pdfview',array('as'=>'pdfview','uses'=>'pdf@generateOfferPDF'));

Route::get('/countries','otherController@countries');
Route::get('/provinces','otherController@provinces');
Route::get('/provinces/{id}','otherController@towns');
Route::get('/checkidentity/{id}','candidateController@checkidentity');
Route::post('/findcandidate','candidateController@findcandidate');
Route::post('/uploadCV','candidateController@uploadCV')->name('uploadCV');
Route::get('/oget','candidacyController@oget');
Route::get('/cget','candidacyController@cget');
Route::get('/cfromo','offerController@candidatesfromoffer');
Route::post('/chkvpar','candidacyController@checkvalidapar');
