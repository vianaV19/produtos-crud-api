<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Action;
use App\Application\Models\Produto;

class DeleteProductAction extends Action
{

    protected function action(): Response
    {
        $produto = Produto::findOrFail( $this->args['id'] );
        $produto->delete();

        return $this->respondWithData($produto);
    }
}
