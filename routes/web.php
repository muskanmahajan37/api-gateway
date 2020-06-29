<?php

// Auth routes
$router->post('/login', 'AuthController@authenticate');
$router->post('/register', 'AuthController@register');
$router->get("/test",'AuthController@test');


# Todo: Rron implemento Loginin me github.
$router->get('logintest', 'Social\LoginController@git');
$router->get('/sign-in/github', 'Social\LoginController@github');
$router->get('/sign-in/github/redirect', 'Social\LoginController@githubRedirect');

# Todo: Move payments to protected route.
$router->get("/payments/all", 'Payment\PaymentController@index');
$router->get("/payments/{payment}", 'Payment\PaymentController@show');
$router->post("/payments/create",'Payment\PaymentController@create');
$router->delete("/payments/delete",'Payment\PaymentController@destroy');

$router->get("/customers/all", 'Payment\PaymentController@showAllCustomers');
$router->get("/customers/{customer}", 'Payment\PaymentController@showCustomer');
$router->delete("/customers/{customer}",'Payment\PaymentController@deleteCustomer');

// User
$router->get('users/{user}/services', 'Service\ServiceController@findByUser');
$router->get('/profile/{username}', 'UserController@getUserByUsername');

//Skills
$router->post('skills', 'Profile\SkillController@store');
$router->get('skills', 'Profile\SkillController@index');
$router->get('/skills/{skill}', 'Profile\SkillController@show');
$router->get('users/{user}/skills', 'Profile\SkillController@findByUser');
$router->delete('/skills/{skill}', 'Profile\SkillController@destroy');
$router->patch('skills/{skill}','Profile\SkillController@update');

//Certifications
$router->post('certifications', 'Profile\CertificationController@store');
$router->get('certifications', 'Profile\CertificationController@index');
$router->get('/certifications/{certification}', 'Profile\CertificationController@show');
$router->get('users/{user}/certifications', 'Profile\CertificationController@findByUser');
$router->delete('/certifications/{certification}', 'Profile\CertificationController@destroy');
$router->patch('certifications/{certification}','Profile\CertificationController@update');


//Education
$router->post('educations', 'Profile\EducationController@store');
$router->get('educations', 'Profile\EducationController@index');
$router->get('/educations/{education}', 'Profile\EducationController@show');
$router->get('users/{user}/educations', 'Profile\EducationController@findByUser');
$router->delete('/educations/{education}', 'Profile\EducationController@destroy');
$router->patch('educations/{education}','Profile\EducationController@update');


//Languages
$router->post('languages', 'Profile\LanguageController@store');
$router->get('languages', 'Profile\LanguageController@index');
$router->get('/languages/{language}', 'Profile\LanguageController@show');
$router->get('users/{user}/languages', 'Profile\LanguageController@findByUser');
$router->delete('/languages/{language}', 'Profile\LanguageController@destroy');
$router->patch('languages/{language}','Profile\LanguageController@update');


// Node micro test
$router->get("/charge", 'Payment\PaymentController@index');

// Services
$router->get('/services', 'Service\ServiceController@index');
$router->get('services/{service}', 'Service\ServiceController@show');

// Categories - Subcategories
$router->get('/categories/{category}/services', 'Service\ServiceController@findByCategory');
$router->get('/categories', 'Service\CategoryController@index');
$router->get('/categories/{category}', 'Service\CategoryController@show');
$router->get('/categories/{category}/subcategories', 'Service\SubCategoryController@findByCategory');
$router->get('/subcategories', 'Service\SubCategoryController@index');
$router->get('subcategories/{subcategory}/services', 'Service\ServiceController@findBySubCategory');

//mail
$router->get('mail', 'EmailController@sendEmail');

// Protected Routes
$router->group(['middleware' => 'jwt.auth'], function () use ($router) {
    //users
    $router->get('/users', 'UserController@index');
    $router->get('/users/{user}', 'UserController@show');
    $router->delete('/users/{user}', 'UserController@destroy');
    $router->patch('/users/{user}', 'UserController@update');

    //services
    $router->delete('services/{service}', 'Service\ServiceController@destroy');
    $router->post('services', 'Service\ServiceController@store');
    $router->patch('services/{service}', 'Service\ServiceController@update');

    //categories
    $router->post('categories', 'Service\CategoryController@store');
    $router->put('categories/{category}', 'Service\CategoryController@update');

    //subcategories
    $router->post('subcategories', 'Service\SubCategoryController@store');
    $router->get('subcategories/{subcategory}', 'Service\SubCategoryController@show');
    $router->put('subcategories/{subcategory}', 'Service\SubCategoryController@update');

    //authors
    $router->get('/authors', 'Author\AuthorController@index');
    $router->post('/authors', 'Author\AuthorController@store');
    $router->get('/authors/{author}', 'Author\AuthorController@show');
    $router->put('/authors/{author}', 'Author\AuthorController@update');
    $router->patch('/authors/{author}', 'Author\AuthorController@update');
    $router->delete('/authors/{author}', 'Author\AuthorController@destroy');


    //Payment service routes

});




