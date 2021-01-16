<?php

namespace App\Http\Requests\Participant;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\ISearchFormRequest;

use Illuminate\Foundation\Http\FormRequest;

class FetchRequest extends FormRequest  implements ISearchFormRequest
{
    use SearchRequest;

    /**
     * @inheritDoc
     */
    protected function orderByFields() : array
    {
        return ['nom', 'email'];
    }

    /**
     * @inheritDoc
     */
    protected function defaultOrderByField() : string
    {
        return 'nom';
    }

    protected function getCustomPayload()
    {
        $payload = "";
        $payload = $this->addToPayload($payload, 'search', $this->search);
        $payload = $this->addToPayload($payload, 'datecreate_du', substr($this->datecreate_du, 0, 10));
        $payload = $this->addToPayload($payload, 'datecreate_au', substr($this->datecreate_au, 0, 10));

        return $payload;
    }
}
