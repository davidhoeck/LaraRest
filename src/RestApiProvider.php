<?php

namespace DavidHoeck\LaraRest;

use CaseHelper\CaseHelperFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use ReflectionClass;

/**
 * Class RestApiProvider
 * @package DavidHoeck\LaraRest
 */
class RestApiProvider
{
    const METHOD_INDEX = "index";
    const METHOD_CREATE = "create";
    const METHOD_GET = "find";
    const METHOD_UPDATE = "update";
    const METHOD_DELETE = "delete";
    const METHOD_PAGINATE = "paginate";

    public function __construct()
    {
        //Just an empty constructor
    }

    /**
     * Add a new model to the API
     * @param Model $model
     */
    public function addModel(Model $model){

        /** @var ReflectionClass $reflect */
        $reflect = new ReflectionClass($model);

        /** @var string $className */
        $className = $reflect->getShortName();

        $this->registerRoutes($className);
    }

    /**
     * Registers all CRUD and additional routes
     * @param $className
     */
    private function registerRoutes($className){

        $ch = CaseHelperFactory::make(CaseHelperFactory::INPUT_TYPE_PASCAL_CASE);

        $modelEndpoint = str_plural( $ch->toKebabCase( $className ) );

        $controllerName = ucfirst( $className ) . "Controller";


        Route::get('/' . $modelEndpoint, $controllerName . '@' . self::METHOD_INDEX)
            ->name('api.' . $modelEndpoint . '.' . self::METHOD_INDEX);

        Route::get('/' . $modelEndpoint . '/paginate', $controllerName . '@' . self::METHOD_PAGINATE)
            ->name('api.' . $modelEndpoint . '.' . self::METHOD_PAGINATE);

        Route::get('/' . $modelEndpoint . '/{id}', $controllerName . '@' . self::METHOD_GET)
            ->name('api.' . $modelEndpoint . '.' . self::METHOD_GET);

        Route::put('/' . $modelEndpoint . '/{id}', $controllerName . '@' . self::METHOD_UPDATE)
            ->name('api.' . $modelEndpoint . '.' . self::METHOD_UPDATE);

        Route::delete('/' . $modelEndpoint . '/{id}', $controllerName . '@' . self::METHOD_DELETE)
            ->name('api.' . $modelEndpoint . '.' . self::METHOD_DELETE);

        Route::post('/' . $modelEndpoint, $controllerName . '@' . self::METHOD_CREATE)
            ->name('api.' . $modelEndpoint . '.' . self::METHOD_CREATE);


    }

}
