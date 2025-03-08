<?php

namespace App\Models;

use Database\Factories\LaptopGpuFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property-read LaptopModel|null $laptopModel
 * @method static LaptopGpuFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopGpu newModelQuery()
 * @method static Builder<static>|LaptopGpu newQuery()
 * @method static Builder<static>|LaptopGpu query()
 * @property int $id
 * @property int $model_id
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $vram
 * @property int|null $is_integrated
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopGpu whereBrand($value)
 * @method static Builder<static>|LaptopGpu whereCreatedAt($value)
 * @method static Builder<static>|LaptopGpu whereId($value)
 * @method static Builder<static>|LaptopGpu whereIsIntegrated($value)
 * @method static Builder<static>|LaptopGpu whereModel($value)
 * @method static Builder<static>|LaptopGpu whereModelId($value)
 * @method static Builder<static>|LaptopGpu whereUpdatedAt($value)
 * @method static Builder<static>|LaptopGpu whereVram($value)
 * @mixin Eloquent
 */
class LaptopGpu extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'brand', 'model', 'vram', 'is_integrated'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
