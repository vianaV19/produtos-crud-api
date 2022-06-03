<?php
declare(strict_types=1);

use App\Application\Actions\Product\DeleteProductAction;
use App\Application\Actions\Product\UpdateProductAction;
use App\Application\Actions\Product\ListProductsAction;
use App\Application\Actions\Product\AddProductAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Exception\HttpNotFoundException;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    $app->group('/api/v1', function (Group $group) {

        $group->get('/produtos/lista/{id}', ListProductsAction::class);

        $group->post('/produtos/adiciona', AddProductAction::class );

        $group->put('/produtos/atualiza/{id}', UpdateProductAction::class );

        $group->delete('/produtos/remove/{id}', DeleteProductAction::class );
    });


};
