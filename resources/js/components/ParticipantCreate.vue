<template>
    <div class="row">

        <div class="col-12 col-lg-5 align-self-center text-center">
            <h3 class="heading-alt fw-300">Formulaire d'Inscription</h3><br>
            <p>Veuillez remplir correctement tous les champs de ce formulaire d’inscription et envoyer votre vidéo de participation après avoir lu entièrement  le règlement du jeu.</p>
            <br>

            <form class="form-horizontal" @submit.prevent @keydown="participantForm.errors.clear()">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3"><i class="ti-user"></i></span>
                        <input type="text" name="nom" class="form-control" placeholder="Nom" aria-describedby="basic-addon3">
                    </div>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('nom')" v-text="participantForm.errors.get('nom')"></small></p>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="nomgroupe" placeholder="Nom du Groupe">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('nomgroupe')" v-text="participantForm.errors.get('nomgroupe')"></small></p>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email address" aria-describedby="basic-addon4">
                        <span class="input-group-addon" id="basic-addon4"><i class="ti-email"></i></span>
                    </div>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('email')" v-text="participantForm.errors.get('email')"></small></p>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Numéro Téléphone">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('phone')" v-text="participantForm.errors.get('phone')"></small></p>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" placeholder="Pièce d'identité..." readonly>
                    <input type="file" name="fichierpieceidentite" id="fichierpieceidentite" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                    </span>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('fichierpieceidentite')" v-text="participantForm.errors.get('fichierpieceidentite')"></small></p>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" placeholder="Chargez votre Vidéo..." readonly>
                    <input type="file" name="fichiervideo" id="fichiervideo" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                    </span>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('fichiervideo')" v-text="participantForm.errors.get('fichiervideo')"></small></p>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="complementinfos" placeholder="Complément information" rows="3"></textarea>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('complementinfos')" v-text="participantForm.errors.get('complementinfos')"></small></p>
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="reglementvalide" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Règlement Lu et Approuvé ?</span>
                    </label>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('reglementvalide')" v-text="participantForm.errors.get('reglementvalide')"></small></p>
                </div>

                <button class="btn btn-primary btn-block" type="button" @click="createParticipant()" :disabled="!isValidCreateForm">Valider</button>
            </form>
        </div>


        <div class="col-12 offset-lg-1 col-lg-6 p-90 hidden-md-down">
            <img src="assets/img/Logo_Moov_Africa_Fond_Blanc.png" alt="..." data-aos="fade-up">
        </div>

    </div>
</template>

<script>
    class Participant {
        constructor(participant) {
            this.nom = participant.nom || ''
            this.nomgroupe = participant.nomgroupe || ''
            this.email = participant.email || ''
            this.phone = participant.phone || ''
            this.fichierpieceidentite = participant.fichierpieceidentite || ''
            this.fichiervideo = participant.fichiervideo || ''
            this.complementinfos = participant.complementinfos || ''
            this.reglementvalide = participant.reglementvalide || ''
        }
    }

    export default {
        name: "ParticipantCreate",
        mounted() {
            this.editing = false
            this.participant = new Participant({})
            this.participantForm = new Form(this.participant)
        },
        data() {
            return {
                participant: {},
                participantForm: new Form(new Participant({})),
                participantId: null,
                editing: false,
                loading: false,
                errors: []
            }
        },
        methods: {
            createParticipant() {
                this.loading = true

                this.participantForm
                    .post('/participants')
                    .then(newparticipant => {
                        this.loading = false
                        window.noty({
                            message: 'Votre participation a été bien enregistrée. Merci et restez dans la MOOV',
                            type: 'success'
                        })

                    }).catch(error => {
                    console.log(error)
                    this.loading = false
                });
            }
        },
        computed: {
            isValidCreateForm() {
                return !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
