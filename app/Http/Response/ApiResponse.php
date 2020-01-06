<?php
declare(strict_types=1);

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class ApiResponse extends JsonResponse
{
    public static function success($response): self
    {
        return new static([
            'data' => $response,
        ]);
    }

    public static function error(\Exception $exception): self
    {
        return new static([
            'error' => $exception->getMessage()
        ]);
    }

    public static function emptySuccess(): self
    {
        return new static([
            'data' => 'success',
            'meta' => [
                'status' => 204
            ]
        ]);
    }
}