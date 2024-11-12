<?php

namespace App\dao;

use App\Models\Scenariste;

class ServiceScenariste
{
    public function getScenaristes()
    {
        try {
            return Scenariste::all();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
