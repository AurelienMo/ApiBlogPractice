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

namespace App\Domains\Articles\ListArticles;

use App\Domains\AbstractLoader;
use App\Entity\Article;

/**
 * Class Loader
 */
class Loader extends AbstractLoader
{
    protected function obtainDatasFromDatabase()
    {
        return $this->getRepository()->findAll();
    }

    protected function getClassName()
    {
        return Article::class;
    }
}
