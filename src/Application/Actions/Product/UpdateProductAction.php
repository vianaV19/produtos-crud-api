<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Action;
use App\Application\Models\Produto;

class UpdateProductAction extends Action
{

    protected function action(): Response
    {
        $dados = $this->request->getParsedBody();

        $produto = Produto::findOrFail( $this->args['id'] );
        $produto->update( $dados );

        return $this->respondWithData($produto);
    }
}
