<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0",
 *         title="Library Api",
 *         description="Mini Project created to study some items like Contracts, factories, seeders, dependency injection, docker and Swagger in Laravel 8.<br><br>Develped by <strong>Rafael Lessa de Castro Xavier</strong>",
  *      @OA\Contact(
 *          email="rafaellessacastro@hotmail.com"
 *      )
 *     )
 *
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
