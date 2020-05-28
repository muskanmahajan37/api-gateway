
<?php

#public routes
$router->post('/login','AuthController@authenticate');
$router->post('/register','AuthController@register');
$router->get('/services', 'Service\ServiceController@index');
$router->get('/categories/{category}/services', 'Service\ServiceController@findByCategory');

$router->get('/categories','Service\CategoryController@index');
$router->get('/categories/{category}','Service\CategoryController@show');
$router->get('/categories/{category}/subcategories', 'Service\SubCategoryController@findByCategory');
$router->get('/subcategories','Service\SubCategoryController@index');
$router->get('subcategories/{subcategory}/services', 'Service\ServiceController@findBySubCategory');
$router->get('users/{user}/services', 'Service\ServiceController@findByUser');

$router->group(['middleware' => 'jwt.auth'], function() use ($router){
    # users
    $router->get('/users','UserController@index');
    $router->get('/users/{user}','UserController@show');
    $router->delete('/users/{user}','UserController@destroy');
    $router->patch('/users/{user}','UserController@update');


    $router->get('services/{service}','Service\ServiceController@show');
    $router->post('services', 'Service\ServiceController@store');
    $router->patch('services/{service}','Service\ServiceController@update');
    $router->delete('services/{service}','Service\ServiceController@destroy');

    $router->post('subcategories', 'Service\SubCategoryController@store');
    $router->get('subcategories/{subcategory}', 'Service\SubCategoryController@show');
    $router->put('subcategories/{subcategory}', 'Service\SubCategoryController@update');

    $router->post('categories', 'Service\CategoryController@store');
    $router->put('categories/{category}','Service\CategoryController@update');

    $router->get('/authors', 'Author\AuthorController@index');
    $router->post('/authors', 'Author\AuthorController@store');
    $router->get('/authors/{author}', 'Author\AuthorController@show');
    $router->put('/authors/{author}', 'Author\AuthorController@update');
    $router->patch('/authors/{author}', 'Author\AuthorController@update');
    $router->delete('/authors/{author}', 'Author\AuthorController@destroy');



});




