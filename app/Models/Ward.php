<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'ward';  
    protected $primaryKey = 'uniqueid';  
    public $timestamps = false; 
    protected $fillable = [
        'ward_id',
        'lga_id',
        'ward_name',
        'ward_description',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];

    public function lga()
    {
        return $this->belongsTo(Lga::class, 'lga_id', 'lga_id');
    }

    public function pollingUnits()
    {
        return $this->hasMany(PollingUnit::class, 'uniqueid', 'uniqueid');
    }
}
