<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;

    protected $table = 'lga';  
    protected $primaryKey = 'lga_id';  
    public $timestamps = false; 

    protected $fillable = [
        'state_id',
        'lga_name',
        'lga_description',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];

    public function wards()
    {
        return $this->hasMany(Ward::class, 'lga_id', 'lga_id');
    }

    public function pollingUnits()
    {
        return $this->hasMany(PollingUnit::class, 'lga_id', 'lga_id');
    }
}
