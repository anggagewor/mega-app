<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\LaptopModel|null $laptopModel
 * @method static \Database\Factories\LaptopPortFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort query()
 * @property int $id
 * @property int $model_id
 * @property string $port_type
 * @property int $quantity
 * @property string|null $version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort wherePortType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaptopPort whereVersion($value)
 * @mixin \Eloquent
 */
class LaptopPort extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'port_type', 'quantity', 'version'];
    public function laptopModel() {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
