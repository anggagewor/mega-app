<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\LaptopModel|null $laptopModel
 * @method static \Database\Factories\LaptopRamSlotFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot query()
 * @property int $id
 * @property int $model_id
 * @property string $total_slots
 * @property string $max_capacity
 * @property string $ram_type
 * @property string $max_speed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereMaxCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereMaxSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereRamType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereTotalSlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopRamSlot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LaptopRamSlot extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'total_slots', 'max_capacity', 'ram_type', 'max_speed'];
    public function laptopModel() {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
