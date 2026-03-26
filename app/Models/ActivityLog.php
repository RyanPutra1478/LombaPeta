<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'description',
        'properties',
        'ip_address'
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper to log activity
     */
    public static function log($action, $modelType = null, $modelId = null, $description = null, $properties = null)
    {
        return self::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => $modelType,
            'model_id' => $modelId,
            'description' => $description,
            'properties' => $properties,
            'ip_address' => request()->ip(),
        ]);
    }

    /**
     * Helper to log model changes (diff)
     */
    public static function logModelChange($model, $action, $description = null)
    {
        $changes = [];
        $dirty = $model->getDirty();
        
        foreach ($dirty as $key => $newValue) {
            // Skip timestamp columns
            if (in_array($key, ['created_at', 'updated_at', 'deleted_at'])) continue;
            
            $oldValue = $model->getOriginal($key);
            
            // Only log if values are actually different
            if ($oldValue != $newValue) {
                $changes[$key] = [
                    'old' => $oldValue,
                    'new' => $newValue
                ];
            }
        }

        return self::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => class_basename($model),
            'model_id' => $model->id,
            'description' => $description,
            'properties' => ['changes' => $changes],
            'ip_address' => request()->ip(),
        ]);
    }
}
