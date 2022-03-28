<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $rent_id
 * @property integer $book_id
 */
class RentDetails extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected
        $table = 'rent_details';

    protected
        $keyType = 'integer';

    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected
        $fillable = ['rent_id', 'book_id'];

    protected $casts = [
        'rent_id' => 'integer',
        'book_id' => 'integer',
    ];

    protected $appends = ['book_price'];

    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }

    public function book()
    {
        return $this->hasOne(Book::class,'id', 'book_id');
    }

    public function getBookPriceAttribute(): float
    {
        return $this->book->price;
    }

    public function getBookTitleAttribute(): string
    {
        return $this->book->title;
    }

    public function getRentStatusAttribute(): string
    {
        return $this->rent->status;
    }
}
