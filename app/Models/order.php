<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['customer','phone','email','category_id','source_id','description'];

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
