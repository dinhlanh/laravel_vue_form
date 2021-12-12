<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;


class ContactRepository extends BaseRepository
{
    /**
     * Store contact
     *
     * @param  array $data
     * @return boolean
     */
    public static function store(array $data)
    {
        DB::beginTransaction();
        try {
            $contact = Contact::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'message' => $data['message'],
            ]);

            if (!$contact) {
                return false;
            }

            DB::commit();

            return true;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('error', [__CLASS__, __FUNCTION__, [$e->getMessage()]]);

            return false;
        }
    }
}
