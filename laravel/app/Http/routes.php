<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





Route::get('register','SessionController@register');

Route::post('inregistrare','SessionController@StoreRegister');

Route::get('login','SessionController@login');

Route::post('autentificare','SessionController@StoreLogin');

Route::get('logout','SessionController@destroy');

Route::get('profil/{username}','UserController@profile');

Route::post('EditEmail','UserController@EditEmail');

Route::post('EditParola','UserController@EditParola');

Route::post('EditParola2/{email}','UserController@EditParola2');

Route::post('/TrimiteMesaj','MesajeController@TrimiteMesaj');

Route::get('profil/{username}/setarilecontului','ProfilController@setarilecontului');

Route::get('profil/{username}/mesaje','ProfilController@mesaje');

Route::get('profil/{username}/mesaje/{room_id}','MesajeController@room');



Route::get('profil/{username}/mesaje/mesaje-trimise','ProfilController@mesajetrimise');

Route::post('/stergemesajd','ProfilController@stergemesajd');

Route::get('profil/{username}/mesaje/sterge-mesaje/{mesaj_id}','ProfilController@stergemesaje');

Route::get('profil/{username}/trimite-mesaj','ProfilController@TrimiteMesaj');

Route::get('profil/{username}/modificareimagine','ProfilController@modificareimagine');

Route::post('/EditImagine','ProfilController@EditImagine');

Route::get('recuperareparola','UserController@RecuperareParola');

Route::post('parolanoua','UserController@ParolaNoua');

Route::post('parolanoua2','UserController@ParolaNoua2');

Route::get('/resetparola/{email}/{hash}','UserController@resetparola');

Route::get('/profil/{username}/datepersonale','ProfilController@datepersonale');

Route::post('/EditDate','ProfilController@EditDate');

Route::get('admin','SessionController@admin');

Route::get('/admin/totiuserii','AdminController@TotiUserii');

Route::get('/admin/introducerecategorii','AdminController@introducerecategorii');

Route::post('/EditCategorii','AdminController@EditCategorii');

Route::get('/topicnou','UserController@TopicNou');

Route::post('/EditTopic','UserController@EditTopic');

Route::get('/','UserController@ToateTopicurile');

Route::get('/topic/{categ_urlslug}/{topic_urlslug}','UserController@Topic');

Route::post('PostReply','UserController@PostReply');

Route::post('PostReplyReply','UserController@PostReplyReply');

Route::post('/likeAdd','UserController@likeAdd');

Route::post('/dislikeAdd','UserController@dislikeAdd');

Route::get('/topicdelete/{topic_urlslug}','UserController@TopicDelete');

Route::get('/replydelete/{reply_id}','UserController@ReplyDelete');

Route::get('/cauta/topicuri/{ceva}','UserController@SearchTopicuri');

Route::get('/cauta/raspunsuri/{ceva}','UserController@SearchRaspunsuri');

Route::get('/cauta/tags/{ceva}','UserController@SearchTags');

Route::post('raspunsacceptat','UserController@RaspunsAcceptat');

Route::get('/profil/{username}/topicuriproprii','UserController@topicuriproprii');

Route::get('/profil/{username}/raspunsuriproprii','UserController@raspunsuriproprii');

Route::get('/cautaresite','UserController@CautareSite');

Route::get('/cautare/{altceva}/{altcevaa}','UserController@CautareSiteForm');

Route::post('/vote','VotesController@Votes');

Route::get('/contact','UserController@contact');

Route::post('/contactnou','UserController@contactnou');

Route::post('/contactraspuns','UserController@contactraspuns');

Route::get('/tichete','TichetController@tichete');

Route::get('/tichet/{id}','TichetController@tichet');

