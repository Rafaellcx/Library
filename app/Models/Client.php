<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property mixed $birth
 * @property string $document_number
 * @property string $active
 */
class Client extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected
        $table = 'clients';

    protected
        $keyType = 'integer';

    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected
        $fillable = ['first_name', 'last_name', 'email', 'birth', 'document_number', 'active'];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'birth' => 'date',
        'document_number' => 'string',
        'active' => 'boolean',
    ];

    public function rent(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rent::class);
    }

    public function getClientFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
