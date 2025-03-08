<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\LaptopModel|null $laptopModel
 * @method static \Database\Factories\LaptopStorageSlotFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot query()
 * @property int $id
 * @property int $model_id
 * @property string|null $storage_type
 * @property string|null $total_slots
 * @property string|null $max_capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereMaxCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereStorageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereTotalSlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopStorageSlot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LaptopStorageSlot extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'storage_type', 'total_slots', 'max_capacity'];
    public function laptopModel() {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
