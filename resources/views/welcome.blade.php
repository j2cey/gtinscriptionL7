@extends('layouts.app')

@section('header')
    <header class="header header-inverse h-fullscreen pb-80" data-parallax="{{ asset('assets/img/CONCOURS_MUSIC_900_900px.jpg') }}" data-overlay="8">
        <div class="row">

        </div>
        <div class="container text-center">

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <h1 class="display-4 hidden-sm-down">
                        Concours
                        <p>« Montre Ton Moov »</p>
                        de Moov Africa-Gabon Telecom
                    </h1>
                    <h1 class="hidden-md-up">lorem ipsum</h1>
                    <br>
                    <p class="lead text-white fs-20 hidden-sm-down">
                        Faites parler <span class="fw-400"><span class="mark-border">votre Talent</span></span> en participant au concours <br> « montre ton moov ».</p>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-reglement">
                        <span></span>
                    </a>
                    <br><br>
                    <div class="col-12 align-self-end text-center">
                        <a class="btn btn-lg btn-round w-200 btn-secondary-outline mr-16" href="#" data-scrollto="section-reglement">Cliquez Ici</a>
                    </div>
                </div>

            </div>

        </div>
    </header>
@stop

@section('content')

    <section class="section section-inverse pb-0 overflow-hidden" id="section-reglement" style="background-color: #50748e">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-md-8 pb-70">
                    <h2>Détail sur le jeu concours</h2>

                    <div class="row">
                        <div class="col-12 col-md-4 feature-2">
                            <p class="feature-icon"><i class="icon-target"></i></p>
                            <h6>Principe</h6>
                            <p>Les participants devront réaliser une brève prestation artistique de leur choix, la filmer en respectant les règles de l’éthique et de la morale, puis la poster sur le site web : http://montretonmoov.moov-africa.ga/ .</p>
                        </div>

                        <div class="col-12 col-md-4 feature-2">
                            <p class="feature-icon"><i class="icon-scope"></i></p>
                            <h6>Eligibilité</h6>
                            <p>La participation est ouverte à toute personne physique âgée de 16 ans et plus, résidant à Libreville, ou à l’intérieur du pays, à l’exception du personnel de Gabon Télécom, de ses prestataires, des  sociétés organisatrices, de celles ayant pris part à la mise en place du jeu ainsi qu’aux membres de leurs familles respectives.</p>
                        </div>

                        <div class="col-12 col-md-4 feature-2">
                            <p class="feature-icon">
                                <i class="icon-gears"></i>
                            </p>
                            <h6>Règlement</h6>
                            <p>Cliquer ci-dessous pour consulter le règlement.</p>
                            <p>
                                <a class="fw-600 fs-12" href="{{ asset('uploads/pdf/REGLEMENT_JEU_MONTRE_TON_MOOV.VF.pdf') }}">Règlement <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                            </p>
                            <p>
                                <a class="btn btn-xs btn-round w-200 btn-secondary-outline mr-16" href="#" data-scrollto="section-formulaire">Inscrivez-vous</a>
                            </p>
                        </div>
                    </div>

                </div>


                <div class="col-12 col-md-4">
                    <img src="{{ asset('assets/img/CONCOURS_MUSIC_900_900px.jpg') }}" alt="..." data-aos="slide-up">
                </div>

            </div>

        </div>
    </section>

    <section class="section" id="section-formulaire">
        <div class="container">

            <div class="row">
                @if (session()->has('msg_success'))
                    <div class="alert alert alert-success">
                        {{ session()->get('msg_success') }}
                    </div>
                @endif
                @if (session()->has('msg_primary'))
                    <div class="col alert alert-primary">
                        {{ session()->get('msg_primary') }}
                    </div>
                @endif
                @if (session()->has('msg_danger'))
                    <div class="col alert alert-danger">
                        {{ session()->get('msg_danger') }}
                    </div>
                @endif
            </div>


            <div class="row">

                <div class="col-12 col-lg-5 align-self-center text-center">
                    <h3 class="heading-alt fw-300">Formulaire d'Inscription</h3><br>
                    <p>Veuillez remplir correctement tous les champs de ce formulaire d’inscription et envoyer votre vidéo de participation après avoir lu entièrement  le règlement du jeu.</p>
                    <br>

                    <form action="{{ route('participants.store')  }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="alert alert-success" style="display: none;">We received your request and will contact you back soon.</div>

                        <input type="hidden" name="subject" value="Request demo">

                        <div class="form-group">
                            <input class="form-control" type="text" name="nom" placeholder="Nom">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="nomgroupe" placeholder="Nom du Groupe">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Adresse e-mail">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="phone" placeholder="Numéro Téléphone">
                        </div>

                        <div class="form-group input-group file-group">
                            <input type="text" class="form-control file-value" placeholder="Pièce d'identité..." readonly>
                            <input type="file" name="fichierpieceidentite" id="fichier" multiple>
                            <span class="input-group-btn">
                                <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                            </span>
                        </div>

                        <div class="form-group input-group file-group">
                            <input type="text" class="form-control file-value" placeholder="Chargez votre Vidéo..." readonly>
                            <input type="file" name="fichiervideo" id="fichier" multiple>
                            <span class="input-group-btn">
                                <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                            </span>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="complementinfos" placeholder="Complément information" rows="3"></textarea>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">Valider</button>
                    </form>
                </div>


                <div class="col-12 offset-lg-1 col-lg-6 p-90 hidden-md-down">
                    <img src="{{ asset('assets/img/Logo_Moov_Africa_Fond_Blanc.png') }}" alt="..." data-aos="fade-up">
                </div>

            </div>



        </div>
    </section>

@stop
