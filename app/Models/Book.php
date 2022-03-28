<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


///**
// * @property string $title
// * @property string $author
// * @property string $description
// * @property int $year_edition
// * @property float $price
// * @property int $category_id
// */
class Book extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected
        $table = 'books';

    protected
        $keyType = 'integer';

    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected
        $fillable = ['title', 'author', 'description', 'year_edition', 'price', 'category_id'];

    protected $casts = [
        'title' => 'string',
        'author' => 'string',
        'description' => 'string',
        'year_edition' => 'integer',
        'price' => 'float',
        'category_id' => 'integer',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class);
    }
}
