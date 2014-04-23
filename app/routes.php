<?php



Route::get('reagent-add',array('as'=>'reagentAdd','uses'=>'ReagentController@add'));
Route::post('reagent-add',array('as'=>'reagentAdd','uses'=>'ReagentController@store','before'=>'csrf'));
Route::get('deceased-add',array('as'=>'deceasedAdd_step2','uses'=>'DeceasedController@add'));