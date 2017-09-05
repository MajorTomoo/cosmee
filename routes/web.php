<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::get('/register', function () {
        return view('register');
});
Route::get('/signin', function () {
        return view('signin');
});
Route::get('/dashboard',[
 'uses'=>'UserController@getDashboard',
 'as'=>'dashboard' 
] 
);  
Route::get('/admin',[
    'uses'=>'HomeController@getAdminPage',
    'as'=>'admin',
    'middleware'=>'role',
    'role'=>['Admin']
]
    ); 
Route::get('/add-product',[
    'uses'=>'HomeController@getAddProduct',
    'as'=>'add-product',
    'middleware'=>'role',
    'role'=>['Admin']
]
    ); 

Route::get('/edit-product/{id}',[
    'uses'=>'ProductController@getEdit',
    'as'=>'edit-product',
    'middleware'=>'role',
    'role'=>['Admin']
]
    ); 
Route::get('/delete-product/{id}',[
    'uses'=>'ProductController@deleteProduct',
    'as'=>'delete-product',
    'middleware'=>'role',
    'role'=>['Admin']
]
    ); 
Route::get('/',[
    'uses'=>'HomeController@getHome',
    'as'=>'home'
]
    );  
Route::get('/logout',[
    'uses'=>'UserController@getLogOut',
    'as'=>'logout'
]
    ); 
Route::get('/productimg/{filedate}/{filename}',[
    
    'uses'=>'ProductController@getProductImage',
    'as'=>'account.img'
]
    ); 
 Route::post('/signup',[
 
 'uses'=>'UserController@postSignup',
 'as'=>'signup'   
 ]);
 Route::post('/signin',[
     
     'uses'=>'UserController@postSignin',
     'as'=>'signin'
 ]);
 //product management
 Route::post('/addproduct',[
     
     'uses'=>'ProductController@addProduct',
     'as'=>'addproduct',
     'middleware'=>'role',
     'role'=>['Admin']
 ]);
 Route::post('/editproduct',[
     
     'uses'=>'ProductController@editProduct',
     'as'=>'editproduct',
     'middleware'=>'role',
     'role'=>['Admin']
 ]);
        