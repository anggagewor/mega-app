<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\LaptopModel|null $laptopModel
 * @method static \Database\Factories\LaptopPowerSpecFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec query()
 * @property int $id
 * @property int $model_id
 * @property string|null $adapter_watt
 * @property string|null $battery_watt_hour
 * @property string|null $charger_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereAdapterWatt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereBatteryWattHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereChargerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPowerSpec whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LaptopPowerSpec extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'adapter_watt', 'battery_watt_hour', 'charger_type'];
    public function laptopModel() {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
