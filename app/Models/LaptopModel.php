<?php

namespace App\Models;

use Database\Factories\LaptopModelFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property-read LaptopBrand|null $brand
 * @property-read Collection<int, LaptopPort> $ports
 * @property-read int|null $ports_count
 * @property-read LaptopPowerSpec|null $powerSpecs
 * @property-read LaptopProcessor|null $processor
 * @property-read Collection<int, LaptopRamSlot> $ramSlots
 * @property-read int|null $ram_slots_count
 * @property-read Collection<int, LaptopStorageSlot> $storageSlots
 * @property-read int|null $storage_slots_count
 * @method static LaptopModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopModel newModelQuery()
 * @method static Builder<static>|LaptopModel newQuery()
 * @method static Builder<static>|LaptopModel query()
 * @property int $id
 * @property int $brand_id
 * @property string $model
 * @property string|null $part_number
 * @property string|null $release_year
 * @property string|null $weight
 * @property string|null $display_size
 * @property string|null $resolution
 * @property string|null $battery_capacity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, LaptopGpu> $gpus
 * @property-read int|null $gpus_count
 * @method static Builder<static>|LaptopModel whereBatteryCapacity($value)
 * @method static Builder<static>|LaptopModel whereBrandId($value)
 * @method static Builder<static>|LaptopModel whereCreatedAt($value)
 * @method static Builder<static>|LaptopModel whereDisplaySize($value)
 * @method static Builder<static>|LaptopModel whereId($value)
 * @method static Builder<static>|LaptopModel whereModel($value)
 * @method static Builder<static>|LaptopModel wherePartNumber($value)
 * @method static Builder<static>|LaptopModel whereReleaseYear($value)
 * @method static Builder<static>|LaptopModel whereResolution($value)
 * @method static Builder<static>|LaptopModel whereUpdatedAt($value)
 * @method static Builder<static>|LaptopModel whereWeight($value)
 * @property-read Collection<int, LaptopModelFeature> $features
 * @property-read int|null $features_count
 * @property-read Collection<int, LaptopModelGallery> $galleries
 * @property-read int|null $galleries_count
 * @mixin Eloquent
 */
class LaptopModel extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'model', 'part_number', 'release_year', 'weight', 'display_size', 'resolution', 'battery_capacity'];

    public function brand()
    {
        return $this->belongsTo(LaptopBrand::class, 'brand_id');
    }

    public function processor()
    {
        return $this->hasOne(LaptopProcessor::class, 'model_id');
    }

    public function gpus()
    {
        return $this->hasMany(LaptopGpu::class, 'model_id');
    }

    public function ramSlots()
    {
        return $this->hasOne(LaptopRamSlot::class, 'model_id');
    }

    public function storageSlots()
    {
        return $this->hasOne(LaptopStorageSlot::class, 'model_id');
    }

    public function ports()
    {
        return $this->hasMany(LaptopPort::class, 'model_id');
    }

    public function powerSpecs()
    {
        return $this->hasOne(LaptopPowerSpec::class, 'model_id');
    }

    public function features(): Builder|HasMany|LaptopModel
    {
        return $this->hasMany(LaptopModelFeature::class, 'laptop_model_id');
    }

    public function galleries(): Builder|HasMany|LaptopModel
    {
        return $this->hasMany(LaptopModelGallery::class, 'laptop_model_id');
    }
}
