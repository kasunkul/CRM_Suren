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

Route::get('/', function () {
    return view('pages/login');
});
Route::get('/dashboard', function () {
    return view('pages/dashboard');
});
Route::get('/customer_master', function () {
    return view('pages/customer_master');
});
Route::get('/customer_contacts', function () {
    return view('pages/customer_contacts');
});
Route::get('/customer_activities', function () {
    return view('pages/customer_activities');
});




//       GET / POST ROUTES Customer routes
Route::get('/add_new_cust', 'Customer_controller@add_new_cust_details');
Route::get('/get_all_cust', 'Customer_controller@load_all_cust');
Route::get('/remove_customer', 'Customer_controller@remove_customer');
Route::get('/edit_customer', 'Customer_controller@edit_customer');
Route::get('/get_cust_details', 'Customer_controller@get_cust_details');
Route::get('/get_all_cust_list_sel_2', 'Customer_controller@get_all_cust_list_sel_2');


//      GET / POST ROUTES contact routes
Route::get('/save_cust_contact', 'Contact_controller@save_cust_contact');
Route::get('/get_all_cont', 'Contact_controller@get_all_cont');
Route::get('/remove_contact', 'Contact_controller@remove_contact');
Route::get('/get_contact_detail', 'Contact_controller@get_contact_detail');
Route::get('/save_edit_contact', 'Contact_controller@save_edit_contact');

//      GET / POST ROUTES activity routes
Route::get('/save_activity_contact', 'Activity_controller@save_activity_contact');
Route::get('/get_all_activity', 'Activity_controller@get_all_activity');
Route::get('/remove_activity', 'Activity_controller@remove_activity');
Route::get('/get_activity_detail', 'Activity_controller@get_activity_detail');
Route::get('/save_edit_activity', 'Activity_controller@save_edit_activity');