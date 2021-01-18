<?php

namespace App\Models;

use App\Traits\Base\Uuidable;
use Illuminate\Database\Eloquent\Model;

class StatutVideo extends Model
{
    use Uuidable;

    protected $guarded = [];

    #region Scopes

    public function scopeDefault($query, $exclude = []) {
        return $query
            ->where('is_default', true)->whereNotIn('id', $exclude);
    }

    public function scopeActive($query) {
        return $query
            ->where('code', 'active');
    }

    public function scopeInactive($query) {
        return $query
            ->where('code', 'inactive');
    }

    public function scopeCoded($query, $code) {
        return $query
            ->where('code', $code);
    }

    #endregion
}
