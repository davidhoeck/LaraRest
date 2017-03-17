# LaraRest
The simplest way to create CRUD REST API routes with Laravel. 

## STEP 1 
Create your eloquent models.

## STEP 2
Go to your `api.php` in the `routes` folder.

## STEP 3
Initialize the `RestApiProvider`. Just paste the following lines of code,
at the top of your `api.php` file.
```
/** @var \DavidHoeck\LaraRest\RestApiProvider $apiProvider */
$apiProvider = new \DavidHoeck\LaraRest\RestApiProvider();
```

## STEP 4 
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
|GET | api/user               | api.user.index    | App\Http\Controllers\UserController@index    | api        |
|DELETE   | api/user               | api.user.create   | App\Http\Controllers\UserController@create   | api        |
|GET | api/user/paginate      | api.user.paginate | App\Http\Controllers\UserController@paginate | api        |
|GET | api/user/{id}          | api.user.find     | App\Http\Controllers\UserController@find     | api        |
|PUT      | api/user/{id}          | api.user.update   | App\Http\Controllers\UserController@update   | api        |
|DELETE   | api/user/{id}          | api.user.delete   | App\Http\Controllers\UserController@delete   | api        |
