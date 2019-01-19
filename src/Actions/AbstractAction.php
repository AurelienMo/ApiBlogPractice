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

namespace App\Actions;

use App\Responders\JsonResponder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractAction
 */
abstract class AbstractAction
{
    /**
     * @param string|null $datas
     * @param int         $statusCode
     * @param array       $addHeaders
     *
     * @return Response
     */
    public function sendResponse(?string $datas, int $statusCode = 200, array $addHeaders = [])
    {
        return JsonResponder::response($datas, $statusCode, $addHeaders);
    }
}
