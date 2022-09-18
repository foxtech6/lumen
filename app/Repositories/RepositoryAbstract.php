<?php

namespace App\Repositories;

use Nahid\JsonQ\Jsonq;

abstract class RepositoryAbstract
{
    protected string $path;

    protected Jsonq $builder;

    public function __construct()
    {
        $this->buildPath()->build();
    }

    public function buildPath(string $dataPath = null): self
    {
        $this->path = sprintf(
            '%s/%s/%s.json',
            config('data.root_path', '/var/www/html'),
            $dataPath ?: config('data.data_path', 'database/data'),
            $this->getDataFileName(),
        );

        return $this;
    }

    public function build(): self
    {
        $this->builder = new Jsonq($this->path);

        return $this;
    }

    abstract protected function getDataFileName(): string;
}
