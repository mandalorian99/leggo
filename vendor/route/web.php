<?php 
# routes.php 
# include web routes of the application 
Route::set('index.php',function(){
	controller::view('index.blade') ;
});
Route::set('home',function(){
	controller::view('home.blade') ;
});

Route::set('admin',function(){
	adminController::view('admin.blade') ;
}) ;

Route::set('stops',function(){
	BusStopController::view('bus_stop.blade');
});

Route::set('check',function(){
	BusStopController::get_bus_stop_coords() ;
})
 
?>