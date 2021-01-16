<?php


namespace App\Repositories\Eloquent;

use App\Search\Queries\Search;
use App\Search\Queries\ParticipantSearch;
use App\Http\Requests\ISearchFormRequest;
use App\Repositories\Contracts\IParticipantRepositoryContract;

class ParticipantRepository implements IParticipantRepositoryContract
{
    /**
     * @inheritDoc
     */
    public function search(ISearchFormRequest $request): Search
    {
        return new ParticipantSearch(
            $request->requestParams(), $request->requestOrder()
        );
    }
}
