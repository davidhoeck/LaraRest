# LaraRest
[![Latest Stable Version](https://poser.pugx.org/davidhoeck/lararest/v/stable)](https://packagist.org/packages/davidhoeck/lararest)
[![License](https://poser.pugx.org/davidhoeck/lararest/license)](https://packagist.org/packages/davidhoeck/lararest)
[![Latest Unstable Version](https://poser.pugx.org/davidhoeck/lararest/v/unstable)](https://packagist.org/packages/davidhoeck/lararest)

Keep your API routes file clean and generate your CRUD routes via LaraRest.

## STEP 1
Install LaraRest via Composer.
```
composer require davidhoeck/lararest
```

## STEP 2 
Create your eloquent models.

## STEP 3
Go to your `api.php` in the `routes` folder.

## STEP 4
Initialize the `RestApiProvider`. Just paste the following lines of code,
at the top of your `api.php` file.
```
/** @var \DavidHoeck\LaraRest\RestApiProvider $apiProvider */
$apiProvider = new \DavidHoeck\LaraRest\RestApiProvider();
```

## STEP 5 
Hook your models into the provider. Add every model your want your CRUD REST routes to be generate.
```
$apiProvider->addModel( new User() );
```

## EXAMPLE 
The following line of code ...
```
$apiProvider->addModel( new User() );
```
... produces these routes. 

| Method  | URI                    | Name              | Action                                      | Middleware |
|---------|------------------------|-------------------|---------------------------------------------|------------|
|GET | api/users               | api.users.index    | App\Http\Controllers\UserController@index    | api        |
|DELETE   | api/users               | api.users.create   | App\Http\Controllers\UserController@create   | api        |
|GET | api/users/paginate      | api.users.paginate | App\Http\Controllers\UserController@paginate | api        |
|GET | api/users/{id}          | api.users.find     | App\Http\Controllers\UserController@find     | api        |
|PUT      | api/users/{id}          | api.users.update   | App\Http\Controllers\UserController@update   | api        |
|DELETE   | api/users/{id}          | api.users.delete   | App\Http\Controllers\UserController@delete   | api        |
