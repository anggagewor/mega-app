<?php

namespace App\Models;

use Database\Factories\LaptopStorageSlotFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property-read LaptopModel|null $laptopModel
 * @method static LaptopStorageSlotFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopStorageSlot newModelQuery()
 * @method static Builder<static>|LaptopStorageSlot newQuery()
 * @method static Builder<static>|LaptopStorageSlot query()
 * @property int $id
 * @property int $model_id
 * @property string|null $storage_type
 * @property string|null $total_slots
 * @property string|null $max_capacity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopStorageSlot whereCreatedAt($value)
 * @method static Builder<static>|LaptopStorageSlot whereId($value)
 * @method static Builder<static>|LaptopStorageSlot whereMaxCapacity($value)
 * @method static Builder<static>|LaptopStorageSlot whereModelId($value)
 * @method static Builder<static>|LaptopStorageSlot whereStorageType($value)
 * @method static Builder<static>|LaptopStorageSlot whereTotalSlots($value)
 * @method static Builder<static>|LaptopStorageSlot whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopStorageSlot extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'storage_type', 'total_slots', 'max_capacity'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
