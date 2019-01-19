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

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 *
 * @ORM\Table(name="amo_article")
 * @ORM\Entity()
 */
class Article extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * Article constructor.
     *
     * @param string $title
     * @param string $content
     *
     * @throws \Exception
     */
    public function __construct(
        string $title,
        string $content
    ) {
        $this->title = $title;
        $this->content = $content;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
