<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Traits\File\HasFile;
use App\Traits\Video\HasVideo;

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
 *
 * @property string $fichierpieceidentite
 * @property integer $fichierpieceidentite_size
 * @property string $fichierpieceidentite_type
 *
 * @property string $fichiervideo
 * @property integer $fichiervideo_size
 * @property string $fichiervideo_type
 * @property string $fichiervideo_duree
 * @property string $fichiervideo_artwork
 *
 * @property string $complementinfos
 * @property boolean $reglementvalide
 *
 * @property boolean $videotelecharge
 * @property Carbon $videotelecharge_date
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Participant extends BaseModel
{
    use HasFile, HasVideo;
    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'nom' => ['required'],
            'nomgroupe' => ['required'],
            'email' => ['email','required'],
            'phone' => ['required'],
            'reglementvalide' => ['required'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [
            'fichierpieceidentite' => ['required','file','max:8192'],
            'fichiervideo' => ['required','file','max:8192'],
        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules() {
        return [
            'nom.required' => 'Prière de Renseigner votre Nom',
            'nomgroupe.required' => 'Prière de Renseigner le Nom du Groupe',
            'email.required' => 'Prière de Renseigner votre adresse e-mail',
            'email.email' => 'Prière de Renseigner une adresse e-mail valide',
            'phone.required' => 'Prière de Renseigner votre Numéro de Phone',
            'fichierpieceidentite.required' => 'Prière de télécharger votre fichier identité',
            'fichierpieceidentite.file' => 'Prière de télécharger votre fichier identité',
            'fichierpieceidentite.max' => 'Prière de télécharger votre fichier identité',
            'fichiervideo.required' => 'Prière de télécharger votre vidéo',
            'reglementvalide.required' => 'Vous devez aprrouver le règlement !',
        ];
    }

    #endregion
}
