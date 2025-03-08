<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\LaptopModel|null $laptopModel
 * @method static \Database\Factories\LaptopProcessorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor query()
 * @property int $id
 * @property int $model_id
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $cores
 * @property string|null $threads
 * @property string|null $base_clock
 * @property string|null $turbo_clock
 * @property string|null $tdp_watt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereBaseClock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereCores($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereTdpWatt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereThreads($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereTurboClock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopProcessor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LaptopProcessor extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'brand', 'model', 'cores', 'threads', 'base_clock', 'turbo_clock', 'tdp_watt'];
    public function laptopModel() {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
