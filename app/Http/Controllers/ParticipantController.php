<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Resources\SearchCollection;
use App\Http\Requests\Participant\FetchRequest;
use App\Http\Resources\Participant as ParticipantResource;
use App\Http\Requests\Participant\CreateParticipantRequest;
use App\Repositories\Contracts\IParticipantRepositoryContract;

use Exception;
use \Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;

class ParticipantController extends Controller
{
    /**
     * @var IParticipantRepositoryContract
     */
    private $repository;

    /**
     * ParticipantController constructor.
     *
     * @param IParticipantRepositoryContract $repository [description]
     */
    public function __construct(IParticipantRepositoryContract $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('participants.index')
            ->with('perPage', new Collection(config('system.per_page')))
            ->with('defaultPerPage', config('system.default_per_page'));
    }

    /**
     * Fetch records.
     *
     * @param  FetchRequest     $request [description]
     * @return SearchCollection          [description]
     */
    public function fetch(FetchRequest $request)
    {
        return new SearchCollection(
            $this->repository->search($request), ParticipantResource::class
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateParticipantRequest $request)
    {
        //instantiate class with file
        //$track = new GetId3( request()->file('fichiervideo') );
        //dd($track, $track->getPlaytimeSeconds(), $track->extractInfo(), $track->getArtwork());

        $formInput = $request->all();

        //dd($formInput, $request);

        $new_participant = Participant::create([
            'nom' => $formInput['nom'],
            'nomgroupe' => $formInput['nomgroupe'],
            'email' => $formInput['email'],
            'phone' => $formInput['phone'],
            'complementinfos' => $formInput['complementinfos'],
            'reglementvalide' => $request->getCheckValue('reglementvalide'),
        ]);

        // verifyAndStoreFile( Request $request, $fieldname_rqst, $fieldname_db, $directory = 'unknown', $oldimage = ' ' )
        $video_filename = $new_participant->verifyAndStoreFile($request, 'fichiervideo', 'fichiervideo', 'participants_fichiersvideos_dir');

        $new_participant->verifyAndStoreFile($request, 'fichierpieceidentite', 'fichierpieceidentite', 'participants_fichiersidentite_dir');

        $new_participant->setVideoDuration("fichiervideo_duree",'participants_fichiersvideos_dir',$new_participant->fichiervideo);
        //$new_participant->setVideoFormat("fichiervideo_type",'participants_fichiersvideos_dir',$new_participant->fichiervideo);
        //$new_participant->setVideoParameters($request,'participants_fichiersvideos_dir', 'fichiervideo', 'fichiervideo', 'fichiervideo_duree', 'fichiervideo_artwork');
        //$new_participant->setVideoParameters($request, 'participants_fichiersvideos_dir', 'fichiervideo', 'fichiervideo_duree', 'fichiervideo_artwork');

        //session()->flash('msg_success', 'Inscription effectuéé avec succès.');
        return $new_participant;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }

    public function getvideofile($uuid)
    {
        $participant = Participant::where('uuid', $uuid)->first();
        $filename = $participant->fichiervideo;
        $file_dir = config('app.' . 'participants_fichiersvideos_dir');
        $path = $file_dir . '/' . $filename;
        $participant->update([
            'videotelecharge' => true,
            'videotelecharge_date' => Carbon::now(),
        ]);
        /**this will force download your file**/
        return response()->download($path);
    }
}
