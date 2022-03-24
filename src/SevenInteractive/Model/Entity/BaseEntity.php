<?php

declare(strict_types=1);

namespace SevenInteractive\Model\Entity;


abstract class BaseEntity
{
    /** @var bool */
    public $shouldBeLogged = false;
}
