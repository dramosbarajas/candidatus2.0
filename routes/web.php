<?php
//Middleware para gestionar los accesos a web mediante sesión 

Route::group(['middleware'=>'web'], function(){
    Route::auth();
    
    Route::get('/home','HomeController@index');   
    
    Route::get('/', function () {
        return redirect()->route('login');
    });
    
    Route::get('/ofertas', function () {
        return view('dashboard');
    });

    Route::get('/candidatos', function () {
        return view('candidatos');
    });
    
    Route::get('/candidaturas', function () {
        return view('candidaturas');
    });

});

//Middleware para gestionar las peticiones que vienen desde AJAX y tienen token 
Route::group(['middleware'=>['auth:api']], function(){
    
    //Rutas del controlador de ofertas
        Route::resource('offer','offerController')->except(['show','create','edit']);
        Route::get('/countOffers', 'offerController@countOffers');
        Route::get('/cfromo','offerController@candidatesfromoffer');
    
    //Rutas del controlador de candidatos
        Route::resource('candidate','candidateController')->except(['show','create','edit','update']);
        Route::get('/checkidentity/{id}','candidateController@checkidentity');
        Route::post('/findcandidate','candidateController@findcandidate');
        Route::post('/uploadCV','candidateController@uploadCV')->name('uploadCV');
   
    //Rutas del controlador de candidaturas
        Route::resource('candidacy','candidacyController')->except(['show','create','edit']);
        Route::post('/chkvpar','candidacyController@checkvalidapar');
        Route::get('/oget','candidacyController@oget');
        Route::get('/cget','candidacyController@cget');

    //Rutas del controlador de otherController
        Route::get('/countries','otherController@countries');
        Route::get('/provinces','otherController@provinces');
        Route::get('/provinces/{id}','otherController@towns');
    
    //Rutas del controlador de pdfController
        Route::get('/pdfview',array('as'=>'pdfview','uses'=>'pdf@generateOfferPDF'));
    
    //Rutas del controlador de mailController
        Route::post('sendemail', 'mailController@send_email');
    //Rutas del controlador de smsController
    
});
