<?php
namespace Thiagoprz\EnforceJson;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

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
    public function handle(Request $request, \Closure $next, $allowUpload = false): JsonResponse
    {
        $contentType = $request->getContentType();
        $validRequest = $request->header('Accept') == 'application/json' && ($contentType == 'json' || ($allowUpload && strpos($contentType, 'multipart/form-data') !== false));
        if (!$validRequest) {
            return response()->json(__('Invalid request.'), 400);
        }
        return $next($request);
    }
}
