<?php
declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Action;
use App\Application\Models\Produto;

class ListProductsAction extends Action{

   protected function action(): Response
   {    
      $id = $this->args['id'];

       $produto = Produto::findOrFail($id);
    
        return $this->respondWithData($produto);
   }

}

