<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property mixed $client
 * @property string $status
 * @property mixed $devolution_date
 * @property integer $client_id
 */
class Rent extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected
        $table = 'rents';

    protected
        $keyType = 'integer';

    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected
        $fillable = ['status', 'devolution_date', 'client_id'];

    protected $casts = [
        'status' => 'string',
        'devolution_date' => 'date',
        'client_id' => 'integer',
    ];

    public function getStatus($status = null)
    {
        $opStatus = [
            'opened' => 'opened',
            'closed' => 'closed',
        ];

        if (!$status) {
            return $opStatus;
        }

        return $opStatus[$status];
    }

    protected $appends = ['client_full_name'];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function rentDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RentDetails::class);
    }

    public function getClientFullNameAttribute(): string
    {
        return $this->client->first_name . ' ' . $this->client->last_name;
    }

    public function getDevolutionDateFormattedAttribute()
    {
        return date("d/m/Y", strtotime($this->devolution_date));
    }

    public function getTotalPriceAttribute(): float
    {
//        $total = 0;
//        $rentDetails = $this->rentDetails;
//        foreach ($rentDetails as $rentDetailItem) {
//            $total += $rentDetailItem->book->price;
//        }
        return $this->rentDetails->sum('book_price');
    }
}
