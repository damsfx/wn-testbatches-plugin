<?php namespace Hounddd\TestBatches\Models;

use Illuminate\Support\Facades\Bus;
use Model;

/**
 * Batch Model
 */
class Batch extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var \Illuminate\Bus\Batch|null Associated batch
     */
    protected \Illuminate\Bus\Batch|null $batch;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'job_batches';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'id' => 'string',
    ];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public function afterFetch()
    {
        $this->batch = Bus::findBatch($this->id);
    }


    public function getProgressAttribute()
    {
        return $this->batch->progress();
    }

    public function getBatch()
    {
        return $this->batch;
    }


    /**
     * Scope a query to only include active users.
     */
    public function scopeHideCompleted($query, $value)
    {
        if ($value == 2) {
            return $query->whereNull('finished_at');
        }

        if ($value == 1) {
            return $query->whereNull('finished_at')
                ->orWhere(function ($query) {
                    $query->whereNotNull('finished_at')
                        ->where('failed_jobs', '>', 0);
                });
        }
    }
}
