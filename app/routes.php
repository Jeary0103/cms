<?php 
Route::get('admin','Admin/Index/index');
// Route::get('/','Home/Index/index');
// 
Route::get('sadmin','Sadmin/Index/index');

Route::get('list_{id}','Home/Index/category');
Route::get('article_{id}','Home/Index/article');





Route::get('sadmin2','Sadmin2/Index/index');


Route::get('test','Admin/Test/index');













?>