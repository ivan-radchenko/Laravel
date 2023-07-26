<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;
    protected $table = 'sources';
    public function getAll(): Collection
    {
        return DB::table($this->table)->get();
    }
}
