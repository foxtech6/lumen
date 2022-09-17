<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(["finally"]);
    }
}
