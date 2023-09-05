<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = ['category_id','title','description','author','source_id','status','image'];

    public function scopeStatus(Builder $query): Builder
    {
        if (request()->has('f')) {
            return $query->where('status', request()->query('f'));
        }
        return $query;
    }

    //связи
    public function category(): BelongsTo
    {
        return $this->BelongsTO(Category::class,'category_id');
    }

    public function source(): BelongsTo
    {
        return $this->BelongsTO(Source::class,'source_id');
    }
}
