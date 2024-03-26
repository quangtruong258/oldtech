<?php

namespace App\Services\Interfaces;
/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function pagination();
    public function create($request);
}
