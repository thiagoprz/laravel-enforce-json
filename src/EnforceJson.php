<?php
namespace Thiagoprz\EnforceJson;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class EnforceJson
 * @package Thiagoprz\EnforceJson
 */
class EnforceJson
{
    /**
     * @param Request $request
     * @param \Closure $next
     * @param boolean $allowUpload
     * @return JsonResponse
     */
    public function handle(Request $request, \Closure $next, $allowUpload = false)
    {
        $applicationJson = 'application/json';
        $contentType = $request->header('Content-Type');
        $validRequest = $request->header('Accept') == $applicationJson && ($contentType == $applicationJson || ($allowUpload && strpos($contentType, 'multipart/form-data') !== false));
        if (!$validRequest) {
            return response()->json(__('Invalid request.'), 400);
        }
        return $next($request);
    }
}
