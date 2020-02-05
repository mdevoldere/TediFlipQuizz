<?php

interface IModel
{
    public function getAll(): array;

    public function get($id): array;
}
