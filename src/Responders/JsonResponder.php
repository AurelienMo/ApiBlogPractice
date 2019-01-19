<?php

declare(strict_types=1);

/*
 * This file is part of ApiBlogPractice
 *
 * (c) Aurelien Morvan <morvan.aurelien@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Responders;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class JsonResponder
 */
class JsonResponder
{
    /**
     * @param string|null $datas
     * @param int         $statusCode
     * @param array       $additionalHeaders
     *
     * @return Response
     */
    public static function response(?string $datas, int $statusCode = Response::HTTP_OK, array $additionalHeaders = [])
    {
        return new Response(
            $datas,
            $statusCode,
            array_merge(
                $additionalHeaders,
                [
                    'Content-Type' => 'application/json',
                ]
            )
        );
    }
}
