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
                        <input type="text" name="nom" class="form-control" placeholder="Nom" aria-describedby="basic-addon3" v-model="participantForm.nom">
                    </div>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('nom')" v-text="participantForm.errors.get('nom')"></small></p>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="nomgroupe" placeholder="Nom du Groupe" v-model="participantForm.nomgroupe">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('nomgroupe')" v-text="participantForm.errors.get('nomgroupe')"></small></p>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email address" aria-describedby="basic-addon4" v-model="participantForm.email">
                        <span class="input-group-addon" id="basic-addon4"><i class="ti-email"></i></span>
                    </div>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('email')" v-text="participantForm.errors.get('email')"></small></p>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Numéro Téléphone" v-model="participantForm.phone">
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('phone')" v-text="participantForm.errors.get('phone')"></small></p>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" :placeholder="identiteFilePlaceholder" readonly>
                    <input type="file" name="fichierpieceidentite" id="fichierpieceidentite" ref="fichierpieceidentite" @change="handleIdentiteFileUpload" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                    </span>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('fichierpieceidentite')" v-text="participantForm.errors.get('fichierpieceidentite')"></small></p>
                </div>

                <div class="form-group input-group file-group">
                    <input type="text" class="form-control file-value" :placeholder="videoFilePlaceholder" readonly>
                    <input type="file" name="fichiervideo" id="fichiervideo" ref="fichiervideo" @change="handleVideoFileUpload" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-white file-browser" type="button"><i class="fa fa-upload"></i></button>
                    </span>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('fichiervideo')" v-text="participantForm.errors.get('fichiervideo')"></small></p>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="complementinfos" placeholder="Complément information" rows="3" v-model="participantForm.complementinfos"></textarea>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('complementinfos')" v-text="participantForm.errors.get('complementinfos')"></small></p>
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="reglementvalide" class="custom-control-input" v-model="participantForm.reglementvalide">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Je reconnais avoir pris connaissance du règlement du jeu Montre Ton Moov et m’engage, sans réserve à en respecter les dispositions du fait de mon inscription.</span>
                    </label>
                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="participantForm.errors.has('reglementvalide')" v-text="participantForm.errors.get('reglementvalide')"></small></p>
                </div>

                <button class="btn btn-primary btn-block" type="button" @click="createParticipant()" :disabled="!isValidCreateForm">Valider</button>
                <div class="form-group">
                    <p class="text-sm">
                        <small>
                            En cas de difficultés rencontrées lors de l’envoi des fichiers, écrivez -nous à
                            <span class="text text-bold text-warning">
                            montretonmoov@moov-africa.ga
                            </span>
                        </small>
                    </p>
                </div>
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
        props: {
            getfileuploadmaxsize_prop: 0,
            getvideouploadmaxsize_prop: 0,
        },
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
                errors: [],
                selectedVideoFile : null,
                selectedVideoFileName : "Selectionnez votre fichier identité...",
                selectedIdentiteFile : null,
                identiteFilePlaceholder : "Chargez votre fichier Identité...(" + this.getfileuploadmaxsize_prop + " Mo max)",
                videoFilePlaceholder : "Chargez votre Vidéo...(" + this.getvideouploadmaxsize_prop + " Mo max)",
            }
        },
        methods: {
            handleIdentiteFileUpload(event) {
                this.selectedIdentiteFile = event.target.files[0];
                this.selectedIdentiteFileName = (typeof this.selectedIdentiteFile !== 'undefined') ? this.selectedIdentiteFile.name : 'Selectionnez votre fichier identité...';
            },
            handleVideoFileUpload(event) {
                this.selectedVideoFile = event.target.files[0];
                this.selectedVideoFileName = (typeof this.selectedVideoFile !== 'undefined') ? this.selectedVideoFile.name : 'Selectionnez votre fichier video...';
            },
            createParticipant() {
                this.loading = true

                const fd = new FormData();
                fd.append('fichierpieceidentite', this.selectedIdentiteFile);
                fd.append('fichiervideo', this.selectedVideoFile);

                this.participantForm
                    .post('/participants', fd)
                    .then(newparticipant => {
                        this.loading = false
                        window.noty({
                            message: 'Votre inscription a été enregistrée, merci pour votre participation !',
                            type: 'success'
                        })
                        this.resetForm();

                    }).catch(error => {
                    this.loading = false
                });
            },
            resetForm() {
                //this.participantForm.nom = ''
                //this.participantForm.nomgroupe = ''
                //this.participantForm.email = ''
                //this.participantForm.phone = ''
                //this.participantForm.fichierpieceidentite = ''
                //this.participantForm.fichiervideo = ''
                //this.participantForm.complementinfos = ''
                //this.participantForm.reglementvalide = ''
                this.participantForm.reset();
                this.$refs.fichierpieceidentite.value = '';
                this.$refs.fichiervideo.value = '';
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
