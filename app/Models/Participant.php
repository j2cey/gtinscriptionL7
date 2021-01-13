<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Traits\Image\HasImageFile;

/**
 * Class Participant
 * @package App\Models
 *
 * @property integer $id
 * @property string $uuid
 * @property bool $is_default
 * @property string $tags
 * @property integer|null $status_id
 *
 * @property string $nom
 * @property string $nomgroupe
 * @property string $email
 * @property string $phone
 * @property string $fichierpieceidentite
 * @property string $fichiervideo
 * @property string $complementinfos
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Participant extends BaseModel
{
    use HasImageFile;
    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [

        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [

        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    #endregion
}
