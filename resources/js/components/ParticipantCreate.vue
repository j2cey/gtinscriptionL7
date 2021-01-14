<template>
    <div class="row">

        <div class="col-12 col-lg-5 align-self-center text-center">
            <h3 class="heading-alt fw-300">Formulaire d'Inscription</h3><br>
            <p>Veuillez remplir correctement tous les champs de ce formulaire d’inscription et envoyer votre vidéo de participation après avoir lu entièrement  le règlement du jeu.</p>
            <br>

            <form enctype="multipart/form-data">
                <ul class="alert alert-danger" v-if="errors.length > 0">
                    <p class="text-center" v-for="error in errors" :key="errors.indexOf(error)">
                        {{ error }}
                    </p>
                </ul>

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
</template>

<script>
    export default {
        name: "ParticipantCreate"
    }
</script>

<style scoped>

</style>
