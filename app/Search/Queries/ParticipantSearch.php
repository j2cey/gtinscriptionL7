<?php


namespace App\Search\Queries;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Builder;

class ParticipantSearch
{
    use EloquentSearch;

    /**
     * @inheritDoc
     */
    protected function query()//: Builder
    {
        $query = Participant::query();

        if ($this->params->search->hasFilter()) {
            $query
                ->where('nom', 'like', '%'.$this->params->search->search.'%')
                ->orWhere('email', 'like', '%'.$this->params->search->search.'%');
        }

        return $query;
    }
}
