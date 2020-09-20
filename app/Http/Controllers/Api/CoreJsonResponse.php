<?php

namespace App\Http\Controllers\Api;

use App\Helper\EmptyData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


trait CoreJsonResponse
{
    /**
     * The request has succeeded.
     *
     * @param array|null $data
     * @param array|null $meta
     * @param string|null $message
     * @param array|null $errors
     * @return JsonResponse
     */
    protected function ok(?array $data = null, ?array $meta = null, ?string $message = null, ?array $errors = null): JsonResponse
    {
        return response()->json($this->body(
            $data,
            $message ?? trans('api.success.success'),
            $meta,
            $errors,
            200
        ), 200);
    }



    /**
     * The request has succeeded.
     *
     * @param AnonymousResourceCollection $collection
     * @param string|null $message
     * @return JsonResponse
     */
    protected function okWithPagination(AnonymousResourceCollection $collection, ?string $message = null): JsonResponse
    {
        $collection = json_decode($collection->toResponse(app('request'))->getContent(), true);
        if ($collection) {
            return $this->ok($collection['data'], $collection['meta'], $message);
        }
        return $this->ok(null, null, trans('api.empty_data'));
    }



    protected function body(?array $data = null,
                            ?string $message = null,
                            ?array $meta = null,
                            ?array $errors = null,
                            ?int $status = 200): array
    {
        return [
            'status' => $status,
            'message' => $message?? EmptyData::string(),
            'response' => [
                'data' => $data?? EmptyData::object(),
                'meta' => $meta?? EmptyData::object(),
            ],
            'errors' => $errors?? EmptyData::object()
        ];
    }


    /**
     * The request requires user authentication.
     *
     * @param array|null $errors
     * @param string|null $message
     * @param mixed $data Response body
     * @param array|null $meta
     * @return JsonResponse
     */
    protected function unauthorized(?array $errors = null, ?string $message = null, ?array $data = null, ?array $meta = null): JsonResponse
    {
        return response()->json($this->body(
            $data,
            $message ?? trans('api.errors.unauthorized'),
            $meta,
            $errors,
            401
        ), 200);
    }

    /**
     * The server understood the request, but is refusing to fulfill it.
     * Authorization will not help and the request SHOULD NOT be repeated.
     *
     * @param array|null $errors
     * @param string|null $message
     * @param array|null $data
     * @param array|null $meta
     * @return JsonResponse
     */
    protected function forbidden(?array $errors = null, ?string $message = null, ?array $data = null, ?array $meta = null): JsonResponse
    {
        return response()->json($this->body(
            $data,
            $message ?? trans('api.errors.forbidden'),
            $meta,
            $errors,
            403
        ), 200);
    }

    /**
     * The server has not found anything matching the Request-URI.
     * No indication is given of whether the condition is temporary or permanent.
     *
     * @param array|null $errors
     * @param string|null $message
     * @param mixed $data Response body
     * @param array|null $meta
     * @return JsonResponse
     */
    protected function notFound(?array $errors = null, ?string $message = null, ?array $data = null, ?array $meta = null): JsonResponse
    {
        return response()->json($this->body(
            $data,
            $message ?? trans('api.errors.not_found'),
            $meta,
            $errors,
            404
        ), 200);
    }

    /**
     * The server has not found anything matching the Request-URI.
     * No indication is given of whether the condition is temporary or permanent.
     *
     * @param array|null $errors
     * @return JsonResponse
     */
    protected function serverError(?array $errors = null): JsonResponse
    {
        return response()->json($this->body(
            null,
            $message ?? trans('api.errors.server_error'),
            null,
            $errors,
            500
        ), 200);
    }

    /**
     * The server understands the content type of the request entity,
     * and the syntax of the request entity is correct,
     * but was unable to process the contained instructions.
     *
     * @param array|null $errors
     * @param string|null $message
     * @param array|null $data
     * @param array|null $meta
     * @return JsonResponse
     */
    protected function invalidRequest(?array $errors = null, ?string $message = null, ?array $data = null, ?array $meta = null): JsonResponse
    {
        return response()->json($this->body(
            $data,
            $message ?? trans('api.errors.invalid'),
            $meta,
            $errors,
            422
        ), 200);
    }
}
