<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Participant
 * @package App\Http\Resources
 *
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property string $nomgroupe
 * @property string $email
 * @property string $phone
 *
 * @property string $fichiervideo
 * @property string $fichiervideo_type
 * @property integer $fichiervideo_size
 * @property string $fichiervideo_duree
 *
 * @property string $complementinfos
 */
class Participant extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'nomgroupe' => $this->nomgroupe,
            'email' => $this->email,
            'phone' => $this->phone,
            'fichiervideo' => $this->fichiervideo,
            'fichiervideo_type' => $this->fichiervideo_type,
            'fichiervideo_size' => $this->fichiervideo_size,
            'fichiervideo_duree' => $this->fichiervideo_duree,
            'complementinfos' => $this->complementinfos,
            'edit_url' => route('participant.edit', $this->id),
            'destroy_url' => route('participant.getvideo', $this->uuid),
        ];
    }
}
