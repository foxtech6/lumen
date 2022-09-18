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
            config('data.root_path', '/var/www/html'),
            config('data.data_path', 'database/data'),
            $this->getDataFileName(),
        );

        $this->builder = new Jsonq($this->path);
    }

    abstract protected function getDataFileName(): string;
}
