<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\TransformerAbstract;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @param $data
     * @param TransformerAbstract $transformer
     * @param int $statusCode
     * @return object
     */
    public function response($data, TransformerAbstract $transformer, int $statusCode = 200): object
    {
        $data = is_object($data) ? fractal($data, $transformer)->toArray() : $data;

        $data['status'] = 200;
        $data['message'] = 'success';

        return response($data, $statusCode);
    }

    /**
     * @param LengthAwarePaginator $paginator
     * @param TransformerAbstract|callable $transformer
     * @return ResponseFactory
     */
    public function withPaginator(LengthAwarePaginator $paginator, $transformer)
    {
        $items = $paginator->getCollection();
        $paginatorData = fractal()->create()
            ->collection($items, $transformer)
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();

        return response(
            [
                'data' => [
                    'items' => $paginatorData['data'],
                    'pagination' => Arr::pull($paginatorData, 'meta.pagination'),
                ],
            ],
            200
        );
    }

    /**
     * @param \Exception|string $e
     * @param string|bool $customMessage
     * @param int $code
     * @return ResponseFactory|Response
     */
    public function responseWithError($e, $customMessage = false, $code = 500)
    {
        if ($code === 0) {
            $code = 404;
        }
        $data = [
            'error' => [
                'code' => $code,
                'message' => $customMessage ?? ((is_string($e) ? $e : $e->getMessage()))
            ],
        ];
        return response($data, $code);
    }
}
