<?php

namespace App\Models;

use Database\Factories\LaptopPortFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property-read LaptopModel|null $laptopModel
 * @method static LaptopPortFactory factory($count = null, $state = [])
 * @method static Builder<static>|LaptopPort newModelQuery()
 * @method static Builder<static>|LaptopPort newQuery()
 * @method static Builder<static>|LaptopPort query()
 * @property int $id
 * @property int $model_id
 * @property string $port_type
 * @property int $quantity
 * @property string|null $version
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|LaptopPort whereCreatedAt($value)
 * @method static Builder<static>|LaptopPort whereId($value)
 * @method static Builder<static>|LaptopPort whereModelId($value)
 * @method static Builder<static>|LaptopPort wherePortType($value)
 * @method static Builder<static>|LaptopPort whereQuantity($value)
 * @method static Builder<static>|LaptopPort whereUpdatedAt($value)
 * @method static Builder<static>|LaptopPort whereVersion($value)
 * @mixin Eloquent
 */
class LaptopPort extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'port_type', 'quantity', 'version'];

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'model_id');
    }
}
