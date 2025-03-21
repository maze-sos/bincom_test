<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    protected $table = 'polling_unit';
    protected $primaryKey = 'uniqueid';
    public $timestamps = false; 
    protected $fillable = [
        'polling_unit_id',
        'ward_id',
        'lga_id',
        'uniquewardid',
        'polling_unit_number',
        'polling_unit_name',
        'polling_unit_description',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];

    public function results()
    {
        return $this->hasMany(AnnouncedPuResult::class, 'polling_unit_uniqueid', 'uniqueid');
    }
}
