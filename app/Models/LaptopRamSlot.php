<?php

namespace App\Models;

use Database\Factories\LaptopRamSlotFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property-read LaptopModel|null $laptopModel
 * @method static LaptopRamSlotFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopRamSlot newModelQuery()
 * @method static Builder<static>|LaptopRamSlot newQuery()
 * @method static Builder<static>|LaptopRamSlot query()
 * @property int $id
 * @property int $model_id
 * @property string $total_slots
 * @property string $max_capacity
 * @property string $ram_type
 * @property string $max_speed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopRamSlot whereCreatedAt($value)
 * @method static Builder<static>|LaptopRamSlot whereId($value)
 * @method static Builder<static>|LaptopRamSlot whereMaxCapacity($value)
 * @method static Builder<static>|LaptopRamSlot whereMaxSpeed($value)
 * @method static Builder<static>|LaptopRamSlot whereModelId($value)
 * @method static Builder<static>|LaptopRamSlot whereRamType($value)
 * @method static Builder<static>|LaptopRamSlot whereTotalSlots($value)
 * @method static Builder<static>|LaptopRamSlot whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopRamSlot extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'total_slots', 'max_capacity', 'ram_type', 'max_speed'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
