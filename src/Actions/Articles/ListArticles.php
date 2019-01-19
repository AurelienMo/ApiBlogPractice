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

namespace App\Actions\Articles;

use App\Actions\AbstractAction;
use App\Domains\Articles\ListArticles\Loader;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ListArticles
 */
class ListArticles extends AbstractAction
{
    /** @var Loader */
    protected $loader;

    /**
     * ListArticles constructor.
     *
     * @param Loader $loader
     */
    public function __construct(
        Loader $loader
    ) {
        $this->loader = $loader;
    }

    /**
     * List all articles
     *
     * @Route("/articles", name="list_articles", methods={"GET"})
     *
     * @return Response
     */
    public function listArticles()
    {
        $datas = $this->loader->load();

        return $this->sendResponse($datas);
    }
}
