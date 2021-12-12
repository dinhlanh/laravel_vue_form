<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService extends BaseService
{
    /**
     * Store contact
     *
     * @param  array $data
     * @return boolean
     */
    public static function store(array $data)
    {
        return ContactRepository::store($data);
    }
}
