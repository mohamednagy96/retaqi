<?php




Route::get('teacher','TeacherController@teacherProfile');
Route::get('profile','ProfileController@profile');
Route::post('updateprofile','ProfileController@updateProfile');

Route::post('supscribe','SubscriptionController@supscribe');






