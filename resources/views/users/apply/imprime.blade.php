<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fiche | PERMUT+</title>
        <style>
            /*All page*/
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
            :root {
                --orange : #F8941E;
                --vert : #00A650;
            }
            *{
                font-family: Poppins;
                margin: 0;
                padding: 0;
                text-decoration: none;
                font-size: 12px;
            }
            body{
                font-size: 16px;
                word-wrap: break-word;
            }
            .paper{
                display: flex;
                justify-content: center;
            }
            .paper-content{
                width: 21cm;
                /* height: 29.7cm; */
                overflow: hidden;
            }
            /*End All page*/

            /*up*/
            .up{
                display: flex;
                justify-content: space-between;
                font-weight: 600;
            }
            .up *{
                max-width: 24rem;
            }
            .up .right{
                text-align: center;
            }
            .up .line{
                width: 10rem;
                border-top: black 2px dashed;
                text-align: center;
                margin: 0.5rem auto;
            }
            .up-big{
                font-size: 1.1rem;
            }
            /*end up*/
            /*object*/
            .object{
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: 1.2rem;
                font-weight: 600;
                margin: 0.5rem 0;
            }
            /*end object*/
            /*note*/
            .note{
                margin: 0.5rem;
            }
            .nota-bene .nb{
                width: 2rem;
                display: inline-block;
            }
            /*end note*/
            /*info*/
            .info{
                text-align: center;
            }
            /*end info*/
            /*fiche*/
            .fiche{
                margin: 1rem;
            }
            .fiche .fiche-person{
                margin: 2rem 0;
            }
            .fiche .fiche-person .fiche-up{
                text-align: center;
                font-size: 1.2rem;
                font-weight: 600;
            }
            .fiche .fiche-person .fiche-main{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .fiche .fiche-person .fiche-main .detail .form-group{
                display: flex;
                justify-content: space-between;
                margin: 0.5rem;
            }
            .fiche .fiche-person .fiche-main .detail .form-group .label{
                width: 13rem;
            }
            .fiche .fiche-person .fiche-main .detail .form-group .input{
                height: 1.5rem;
                padding: 0.1em 1em;
                width: 35rem;
                border: 1px solid #000;
            }
            .fiche .fiche-person .fiche-down{
                display: flex;
                justify-content: space-between;
                margin: 0.5rem 0;
            }
            .down .down-up{
                border: 1px solid #000;
                display: block;
                width: 28rem;
                text-align: center;
                margin: auto;
            }
            .down .down-main{
                display: flex;
                justify-content: space-between;
                margin: 2rem 0rem 3rem 0;
            }
            .button{
                display: flex;
                justify-content: center;
                margin : 1rem 0;
            }
            .download{
                background: var(--vert);
                padding: 0.5rem 1rem;
                color: #fff;
                border: 1px var(--vert) solid;
                font-weight: 600;
                border-radius: 0.3rem;
            }
            .download:hover{
                background: #fff;
                border: 1px var(--vert) solid;
                transition: 0.3s;
                color: #000;
                cursor: pointer;
            }
            /*end fiche*/

            /* print */

            @media print{
                .download{
                    display: none
                }
            }

            /* end print */



        </style>
    </head>
    <body>
        <div class="paper">
            <div class="paper-content">
                <div class="up">
                    <div class="left">
                        <div class="up-big">MINISTERE DE L'EDUCATION NATIONALE ET DE L'ENSEIGNEMENT TECHNIQUE</div>
                        <div class="left-line line"></div>
                        <div class="up-big">DIRECTION DES RESSOURCES HUMAINES</div>
                        <div>BP 807 Abidjan 04 - Tél : 20-21-90-47</div>
                    </div>
                    <div class="right">
                        <div class="up-big">REPUBLIQUE DE COTE D'IVOIRE</div>
                        <div class="right-line line"></div>
                        <div>Union - Discipline - Travail</div>
                    </div>
                </div>
                <div class="object">
                    <div>DEMANDE DE PERMUTATION</div>
                    <div>ANNEE SCOLAIRE 20....../ 20........</div>
                </div>
                <div class="note">
                    <div class="nota-bene">
                        <span class="nb">NB : </span>
                        <span>- Nul ne peut postuler en même temps pour les INEAT et EXEAT et les Permutations.</span>
                    </div>
                    <div class="nota-bene">
                        <span class="nb"> </span>
                        <span>- Toute demande d' EXEAT validée ne peut être annulée.</span>
                    </div>
                </div>
                <div class="fiche">
                    <div class="fiche-person">
                        <div class="fiche-up">
                            <div class="label">ENTRE</div>
                        </div>
                        <div class="fiche-main">
                            <div class="detail">
                                <div class="form-group">
                                    <div class="label">Nom et Prénoms</div>
                                    <div class="input">{{ Auth::user()->nom }} {{ Auth::user()->prenoms }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Nom de jeune fille</div>
                                    <div class="input">{{ Auth::user()->nom_fille ? Auth::user()->nom_fille :'' }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Date de naissance</div>
                                    <div class="input">{{ Auth::user()->datenaiss ? Auth::user()->datenaiss :'' }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Matricule</div>
                                    <div class="input">{{ Auth::user()->matricule }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Emploi</div>
                                    <div class="input">{{ Auth::user()->emploi ? Auth::user()->emploi :'' }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Direction Régionale</div>
                                    <div class="input">{{ $response->odren }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Inspection d'enseignement primaire</div>
                                    <div class="input">{{ $response->oiep }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Etablissement ou Service</div>
                                    <div class="input">{{ $response->oschool }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Fonction exercée</div>
                                    <div class="input">{{ Auth::user()->fonction ? Auth::user()->fonction :'' }}</div>
                                </div>
                            </div>
                            <div class="signature">Signature de l'interessé</div>
                        </div>
                        <div class="fiche-down">
                            <div>AVIS MOTIVE DU CHEF D'ETABLISSEMENT</div>
                            <div>AVIS DU DIRECTEUR REGIONAL</div>
                        </div>
                    </div>
                    <div class="fiche-person">
                        <div class="fiche-up">
                            <div class="label">ET</div>
                        </div>
                        <div class="fiche-main">
                            <div class="detail">
                                <div class="form-group">
                                    <div class="label">Nom et Prénoms</div>
                                    <div class="input">{{ $apply->user->nom }} {{ $apply->user->prenoms }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Nom de jeune fille</div>
                                    <div class="input">{{ $apply->user->nom_fille ? $apply->user->nom_fille :'' }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Date de naissance</div>
                                    <div class="input">{{ $apply->user->datenaiss ? $apply->user->datenaiss :'' }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Matricule</div>
                                    <div class="input">{{ $apply->user->matricule }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Emploi</div>
                                    <div class="input">{{ $apply->user->emploi ? $apply->user->emploi :'' }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Direction Régionale</div>
                                    <div class="input">{{ $apply->odren }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Inspection d'enseignement Primaire</div>
                                    <div class="input">{{ $apply->oiep }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="label">Etablissement ou Service</div>
                                    <div class="input">{{ $apply->oschool }}</div>
                                </div>

                                <div class="form-group">
                                    <div class="label">Fonction exercée</div>
                                    <div class="input">{{ $apply->user->fonction ? $apply->user->fonction :'' }}</div>
                                </div>
                            </div>
                            <div class="signature">Signature de l'interessé</div>
                        </div>
                        <div class="fiche-down">
                            <div>AVIS MOTIVE DU CHEF D'ETABLISSEMENT</div>
                            <div>AVIS DU DIRECTEUR REGIONAL</div>
                        </div>
                    </div>
                </div>
                <div class="down">
                    <div class="down-up">
                        <div>DECISION DU DIRECTEUR DES RESSOURCES HUMAINES</div>
                    </div>
                    <div class="down-main">
                        <div>Cachet et Signature</div>
                        <div>A................... le ..............20...... </div>
                    </div>
                    <div class="down-down">
                        NB la permutation se fait entre deux agents de la même qualification
                    </div>
                </div>
            </div>
        </div>
        <div class="button">
            <button class="download" onclick="window.print();">TELECHARGER</button>
        </div>
    </body>
</html>
