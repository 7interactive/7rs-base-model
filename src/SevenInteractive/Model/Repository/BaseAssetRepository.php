<?php

declare(strict_types=1);

namespace SevenInteractive\Model\Repository;

abstract class BaseAssetRepository extends BaseRepository
{

    abstract public function getChildClassName(): string;

}