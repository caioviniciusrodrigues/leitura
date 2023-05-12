<?php

//Rotas Padrões do sistema

Route::get('/', 'HomeController@index')->name('home.index');

Route::resource('apartamento', ApartamentoController::class);

Route::post('apartamento/search', 'ApartamentoController@index')->name('apartamento.search');
Route::get('api/apartamentos', 'ApartamentoController@apiApartamentos')->name('api.apartamentos');


Route::resource('leitura', LeituraController::class);

Route::post('leitura/search', 'LeituraController@index')->name('leitura.search');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    Route::resource('usuarios', 'UsuarioController');
    Route::get('usuarios/papel/{id}', 'UsuarioController@papel')->name('usuarios.papel');
    Route::post('usuarios/papel/{papel}', 'UsuarioController@papelStore')->name('usuarios.papel.store');
    Route::delete('usuarios/papel/{usuario}/{papel}', 'UsuarioController@papelDestroy')->name('usuarios.papel.destroy');

    Route::resource('papeis', 'PapelController');

    Route::get('papeis/permissao/{id}', 'PapelController@permissao')->name('papeis.permissao');
    Route::post('papeis/permissao/{permissao}', 'PapelController@permissaoStore')->name('papeis.permissao.store');
    Route::delete('papeis/permissao/{papel}/{permissao}', 'PapelController@permissaoDestroy')->name('papeis.permissao.destroy');

});

//Rota não encontrada
Route::fallback(function () {
    return view('404');
});


Route::group(['prefix' => 'permissaoddr',  'middleware' => 'auth'], function() {

    Route::resource('permissaoddr', PermissaoController::class);

});







