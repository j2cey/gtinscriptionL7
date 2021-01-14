<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Requests\Participant\CreateParticipantRequest;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $formInput = $request->all();

        dd($formInput, $request);

        $new_participant = Participant::create([
            'nom' => $formInput['nom'],
            'nomgroupe' => $formInput['nomgroupe'],
            'email' => $formInput['email'],
            'phone' => $formInput['phone'],
            'complementinfos' => $formInput['complementinfos'],
            'reglementvalide' => $request->getCheckValue('reglementvalide'),
        ]);

        // verifyAndStoreFile( Request $request, $fieldname_rqst, $fieldname_db, $directory = 'unknown', $oldimage = ' ' )
        $new_participant->verifyAndStoreFile($request, 'fichiervideo', 'fichiervideo', 'participants_fichiersvideo_dir');

        $new_participant->verifyAndStoreFile($request, 'fichierpieceidentite', 'fichierpieceidentite', 'participants_fichiersidentite_dir');

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
}
