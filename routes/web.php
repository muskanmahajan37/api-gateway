
<?php


$router->post('/login','AuthController@authenticate');
$router->post('/register','AuthController@register');
$router->get('/services', 'Service\ServiceController@index');
$router->get("/hello",'Python\PythonController@hello');


$router->group(['middleware' => 'jwt.auth'], function() use ($router){
    $router->get('services/{service}','Service\ServiceController@show');
    $router->post('services', 'Service\ServiceController@store');
    $router->patch('services/{service}','Service\ServiceController@update');
    $router->delete('services/{service}','Service\ServiceController@destroy');

    $router->post('subcategories', 'Service\SubCategoryController@store');
    $router->get('subcategories/{subcategory}', 'Service\SubCategoryController@show');
    $router->put('subcategories/{subcategory}', 'Service\SubCategoryController@update');

    $router->post('categories', 'Service\CategoryController@store');
    $router->get('categories','Service\CategoryController@index');
    $router->get('categories/{category}','Service\CategoryController@show');
    $router->put('categories/{category}','Service\CategoryController@update');
    $router->get('categories/{category}/subcategories', 'Service\SubCategoryController@findByCategory');

    $router->get('/authors', 'Author\AuthorController@index');
    $router->post('/authors', 'Author\AuthorController@store');
    $router->get('/authors/{author}', 'Author\AuthorController@show');
    $router->put('/authors/{author}', 'Author\AuthorController@update');
    $router->patch('/authors/{author}', 'Author\AuthorController@update');
    $router->delete('/authors/{author}', 'Author\AuthorController@destroy');

});




