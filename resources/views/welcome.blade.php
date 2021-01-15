@extends('layouts.app')

@section('header')
    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url({{ asset('assets/img/FORMAT_1542_759_Plan_de_travail_1.jpg') }})" data-overlay="8">

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

                    <p class="text text-primary">
                        Et gagnez jusqu'à 700 000 CFA
                    </p>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-reglement">
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

            <header class="section-header">
                <h2>Détails sur le jeu concours</h2>
                <p>Le jeu concours Montre ton Moov consiste en l’exécution d’une prestation artistique dans des domaines variés, en groupe ou en individuel mettant en valeur la diversité de la culture africaine.</p>
            </header>


            <div class="row gap-y">

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-scope"></i></p>
                    <h6>Principe</h6>
                    <p class="text text-justify">Les participants devront réaliser une brève prestation artistique de leur choix, la filmer en respectant les règles de l’éthique et de la morale, puis la poster sur le site web : http://montretonmoov.moov-africa.ga/ .</p>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-presentation"></i></p>
                    <h6>Eligibilité</h6>
                    <p class="text text-justify">La participation est ouverte à toute personne physique âgée de 16 ans et plus, résidant à Libreville, ou à l’intérieur du pays, à l’exception du personnel de Gabon Télécom, de ses prestataires, des  sociétés organisatrices, de celles ayant pris part à la mise en place du jeu ainsi qu’aux membres de leurs familles respectives.</p>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gears"></i></p>
                    <h6>Règlement</h6>
                    <p>Cliquer ci-dessous pour consulter le règlement.</p>
                    <p>
                        <a class="fw-600 fs-12" href="{{ asset('uploads/pdf/REGLEMENT_JEU_MONTRE_TON_MOOV.VF.pdf') }}">Règlement <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                    </p>
                    <p>
                        <a class="btn btn-xs btn-round w-200 btn-warning mr-16" href="#" data-scrollto="section-formulaire">Inscrivez-vous</a>
                    </p>
                </div>

            </div>

            <div class="row gap-y">

                <div class="col-12 col-md-8 feature-2">
                    <p class="feature-icon text-info"><i class="icon-tools"></i></p>
                    <h6>Sélection des Gagnants</h6>
                    <p>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">Analyse et pré-sélection des vidéos par un membre du jury composé d’un artiste, de l’agence digitale et d’un huissier de justice.</span>
                        <br>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">Mise en ligne sur la page Facebook des 10 meilleures vidéos présélectionnées suivant les critères d’originalité de la prestation et de la maîtrise du domaine.</span>
                        <br>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">Vote des internautes sur la page Facebook des meilleures vidéos parmi celles short listées par les membres du jury.</span>
                        <br>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">Classement des 3 meilleures prestations en fonction du nombre cumulé d’interactions (likes, commentaires et partages) suscitées pendant une période de 1 semaine. Le premier de  la liste étant de facto qualifié à la finale.</span>
                    </p>
                </div>

                <div class="col-12 col-md-4 feature-2">
                    <p class="feature-icon text-info"><i class="icon-gift"></i></p>
                    <h6>Attribution des Lots</h6>
                    <ul class="list-unstyled">
                        Pour les 3 meilleures prestations de chaque phase pendant 3 semaines :
                        <ul class="contacts-list-status">
                            <li>250 000 F CFA  pour le premier (de facto finaliste)</li>
                            <li>150 000F CFA pour le second</li>
                            <li>100 000F CFA pour le 3ème</li>
                        </ul>
                        Pour le grand gagnant de finale
                        <ul class="contacts-list-status">
                            <li>500 000 FCFA</li>
                        </ul>
                    </ul>
                </div>

            </div>

        </div>
    </section>

    <section class="section" id="section-formulaire">
        <div class="container">

            <participant-create></participant-create>

        </div>
    </section>

@stop
