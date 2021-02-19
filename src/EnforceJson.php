<?php
namespace Thiagoprz\EnforceJson;

use Illuminate\Http\Request;

/**
 * Class EnforceJson
 * @package Thiagoprz\EnforceJson
 */
class EnforceJson
{
    /**
     * @param Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, \Closure $next)
    {
        if ($request->header('Accept') !== 'application/json' || $request->getContentType() !== 'json') {
            return response()->json(__('Invalid request.'), 400);
        }
        return $next($request);
    }
}
