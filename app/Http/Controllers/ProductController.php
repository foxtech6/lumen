<?php

namespace App\Http\Controllers;

use App\Actions\ListProductsAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Nahid\QArray\Exceptions\InvalidNodeException;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @param ListProductsAction $action
     *
     * @return JsonResponse|MessageBag
     * @throws InvalidNodeException
     */
    public function index(Request $request, ListProductsAction $action): JsonResponse|MessageBag
    {
        $validator = Validator::make(
            [
                'category' => $request->get('category'),
                'priceLessThan' => $request->get('priceLessThan'),
            ],
            [
                'category' => 'string|nullable|min:3|max:100',
                'priceLessThan' => 'string|nullable|min:1|max:8',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        return response()->json($action->run(
            $request->get('category'),
            $request->get('priceLessThan')
        ));
    }
}
