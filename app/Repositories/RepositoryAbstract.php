<?php

namespace App\Repositories;

use Nahid\JsonQ\Jsonq;

abstract class RepositoryAbstract
{
    protected string $path;

    protected Jsonq $builder;

    public function __construct()
    {
        $this->path = sprintf(
            '%s/%s/%s.json',
            env('ROOT_PATH', '/var/www/html'),
            env('DATA_PATH', 'database/data'),
            $this->getDataFileName(),
        );

        $this->builder = new Jsonq($this->path);
    }

    abstract protected function getDataFileName(): string;
}
