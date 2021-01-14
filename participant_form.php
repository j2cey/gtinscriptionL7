@section()
<div class="row">

        <div class="col-12 col-lg-5 align-self-center text-center">
            <h3 class="heading-alt fw-300">Formulaire d'Inscription</h3><br>
            <p>Veuillez remplir correctement tous les champs de ce formulaire d’inscription et envoyer votre vidéo de participation après avoir lu entièrement  le règlement du jeu.</p>
            <br>

            <form action="{{ route('participants.store')  }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

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

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p class="text-center">
                        {{$error}}
                    </p>
                    @endforeach
                </ul>
                @endif

                <div class="form-group {{ $errors->has('nom') ? 'has-danger' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3"><i class="ti-user"></i></span>
                        <input type="text" name="nom" class="form-control" placeholder="Nom" aria-describedby="basic-addon3">
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="nomgroupe" placeholder="Nom du Groupe">
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email address" aria-describedby="basic-addon4">
                        <span class="input-group-addon" id="basic-addon4"><i class="ti-email"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Numéro Téléphone">
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" placeholder="Pièce d'identité..." readonly>
                    <input type="file" name="fichierpieceidentite" id="fichierpieceidentite" multiple>
                    <span class="input-group-btn">
                                <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                            </span>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" placeholder="Chargez votre Vidéo..." readonly>
                    <input type="file" name="fichiervideo" id="fichiervideo" multiple>
                    <span class="input-group-btn">
                                <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                            </span>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="complementinfos" placeholder="Complément information" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="reglementvalide" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Règlement Lu et Approuvé ?</span>
                    </label>
                </div>

                <button class="btn btn-primary btn-block" type="submit">Valider</button>
            </form>
        </div>


        <div class="col-12 offset-lg-1 col-lg-6 p-90 hidden-md-down">
            <img src="{{ asset('assets/img/Logo_Moov_Africa_Fond_Blanc.png') }}" alt="..." data-aos="fade-up">
        </div>

    </div>
