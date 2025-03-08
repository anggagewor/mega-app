<?php

namespace App\Models;

use Database\Factories\LaptopPowerSpecFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property-read LaptopModel|null $laptopModel
 * @method static LaptopPowerSpecFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopPowerSpec newModelQuery()
 * @method static Builder<static>|LaptopPowerSpec newQuery()
 * @method static Builder<static>|LaptopPowerSpec query()
 * @property int $id
 * @property int $model_id
 * @property string|null $adapter_watt
 * @property string|null $battery_watt_hour
 * @property string|null $charger_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopPowerSpec whereAdapterWatt($value)
 * @method static Builder<static>|LaptopPowerSpec whereBatteryWattHour($value)
 * @method static Builder<static>|LaptopPowerSpec whereChargerType($value)
 * @method static Builder<static>|LaptopPowerSpec whereCreatedAt($value)
 * @method static Builder<static>|LaptopPowerSpec whereId($value)
 * @method static Builder<static>|LaptopPowerSpec whereModelId($value)
 * @method static Builder<static>|LaptopPowerSpec whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopPowerSpec extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'adapter_watt', 'battery_watt_hour', 'charger_type'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
