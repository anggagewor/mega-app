<?php

namespace App\Models;

use Database\Factories\LaptopProcessorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property-read LaptopModel|null $laptopModel
 * @method static LaptopProcessorFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopProcessor newModelQuery()
 * @method static Builder<static>|LaptopProcessor newQuery()
 * @method static Builder<static>|LaptopProcessor query()
 * @property int $id
 * @property int $model_id
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $cores
 * @property string|null $threads
 * @property string|null $base_clock
 * @property string|null $turbo_clock
 * @property string|null $tdp_watt
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopProcessor whereBaseClock($value)
 * @method static Builder<static>|LaptopProcessor whereBrand($value)
 * @method static Builder<static>|LaptopProcessor whereCores($value)
 * @method static Builder<static>|LaptopProcessor whereCreatedAt($value)
 * @method static Builder<static>|LaptopProcessor whereId($value)
 * @method static Builder<static>|LaptopProcessor whereModel($value)
 * @method static Builder<static>|LaptopProcessor whereModelId($value)
 * @method static Builder<static>|LaptopProcessor whereTdpWatt($value)
 * @method static Builder<static>|LaptopProcessor whereThreads($value)
 * @method static Builder<static>|LaptopProcessor whereTurboClock($value)
 * @method static Builder<static>|LaptopProcessor whereUpdatedAt($value)
 * @mixin Eloquent
 */
class LaptopProcessor extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'brand', 'model', 'cores', 'threads', 'base_clock', 'turbo_clock', 'tdp_watt'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
