import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route} from 'react-router-dom'
import Input from "react-validation/build/input";
import Form from "react-validation/build/form";
import Axios from 'axios';


class Crime extends Component {
    constructor(props) {
        super(props);
        this.state = {
            pays: [],
            pays_appréhension:''
        }
        this.pays_appréhension=this.pays_appréhension.bind(this)
    }
    componentDidMount() {
        axios.get('crimes/create').then(response=> {
            // console.log(response.data.pays)
            this.setState({
                pays:response.data.pays,
            })
        });

    }
    pays_appréhension(e){
        this.setState({pays_appréhension:e.target.value})
    }
render () {
    console.log(this.state.pays);

    return (

        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Default Form Wizard</h3>
                </div>
                <div class="card-body">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Informations générales</a></li>
                            <li><a href="#step-2">Information sur le produit</a></li>
                            <li><a href="#step-3">Information sur le trafiquant</a></li>
                        </ul>
                        <div>
                            <div id="step-1" class="">
                                <Form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>  Espèce trafiquée  <span class="text-danger">*</span></label>
                                                <select name="espece" id="" class="form-control custom-select select2">
                                                    <option value="" disabled selected> Sélectionnez</option>
                                                  <option value="animal">Espèce animale</option>
                                                  <option value="vegetal">Espèce végétale</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>   Pays d'appréhension  <span class="text-danger">*</span></label>
                                                <select onChange={this.pays_appréhension} name="pays_appréhension" id="" class="form-control custom-select select2" onChange>
                                                    <option value="" selected disabled> Séléctionnez un pays</option>

                                                {
                                                        this.state.pays.map((item, i) => {
                                                            return <option key={i} value={item.id}>{item.nom}  </option>
                                                        })

                                                }


                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>   Date d'apprehension  <span class="text-danger">*</span></label>
                                                <Input type="date" onChange={this.onChange.date_apprehension} id="" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Localité d'aprrehension <span class="text-danger">*</span></label>
                                                <Input type="text" name="localite_aprrehension" id="" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Longitude  <span class="text-danger"></span></label>
                                                <Input type="text" name="longitude" id="longitude" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Latitude <span class="text-danger"></span></label>
                                                <Input type="text" name="latitude" id="latitude" class="form-control" autocomplete="og" />
                                            </div>
                                        </div>
                                    </div>
                                </Form>
                            </div>

                            <div id="step-2" class="">
                                 <form action="" method="post">
                                     <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                                            <select name="" id="" class="form-control select2">
                                                <option value="" disabled selected> Sélectionnez</option>
                                                {/* @forelse ($pays as $pays_origine)
                                            <option value="{{$pays_origine->id}}">{{$pays_origine->nom}}</option>
                                                @empty
                                                Aucun pays
                                                @endforelse */}
                                            </select>
                                            </div>
                                     </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite"> Pays de destination du produit <span class="text-danger">*</span> </label>
                                            <select name="" id="" class="form-control select2">
                                                <option value="" disabled selected> Sélectionnez</option>
                                                {/* @forelse ($pays as $pays_destination)
                                            <option value="{{$pays_destination->id}}">{{$pays_destination->nom}}</option>
                                                @empty
                                                Aucun pays
                                                @endforelse */}
                                            </select>
                                            </div>
                                     </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite"> Aires protégées d'origine du produits <span class="text-danger">*</span> </label>
                                            <select name="" id="" class="form-control select2">
                                                {/* <option value="" disabled selected> Sélectionnez</option>
                                                @forelse ($unites as $unite_origine)
                                            <option value="{{$unite_origine->id}}">{{$unite_origine->nom}}</option>
                                                @empty
                                                Aucun pays
                                                @endforelse */}
                                            </select>
                                            </div>
                                     </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite">Date d’abattage/capture <span class="text-danger">*</span> </label>
                                            <input type="date" name="" id="" class="form-control" />
                                     </div>
                                     </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite"> Gestion des saisis <span class="text-danger">*</span> </label>
                                            <select name="" id="" class="form-control select2">
                                                <option value="" disabled selected> Sélectionnez</option>
                                                <option value="detruit"> Détruit</option>
                                                <option value="stocke"> Stocké</option>
                                            </select>
                                            </div>
                                         </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite">Arme légère à petit calibre utilisée<span class="text-danger">*</span> </label>
                                            <input type="text" name="" id="" class="form-control" />
                                     </div>
                                     </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite"> Pénalité <span class="text-danger">*</span> </label>
                                            <select name="" id="" class="form-control select2">
                                                <option value="" disabled selected> Sélectionnez</option>
                                                <option value="amende"> Amende</option>
                                                <option value="emprisonnement"> Emprisonnement</option>
                                            </select>
                                            </div>
                                     </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="quantite">Arme légère à petit calibre utilisée<span class="text-danger">*</span> </label>
                                            <input type="text" name="" id="" class="form-control" />
                                     </div>
                                     </div>
                                     </div>
                                 </form>
                            </div>
                            <div id="step-3" class="">
                                <Form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom <span class="text-danger">*</span> </label>
                                                <Input type="text" class="form-control" name="nom" id="inputtext3" placeholder="Nom du trafiquant" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prenom <span class="text-danger">*</span></label>
                                                <Input type="text" class="form-control" name="prenom" id="inputtext3" placeholder="Nom du trafiquant" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sexe <span class="text-danger">*</span></label>
                                                <select name="genre" id="" class="form-control select2">
                                                    <option value="maxculin"> Maxculin </option>
                                                    <option value="feminin"> Feminin </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Age <span class="text-danger">*</span> </label>
                                                <Input type="text" class="form-control" name="age" id="inputtext3" placeholder="Nom du trafiquant" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nationalité <span class="text-danger">*</span> </label>
                                                <Input type="text" class="form-control" name="nationalite"   placeholder="Nationalité du trafiquant" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> <span class="text-danger"></span> </label>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        Education
                                                        <div class="material-switch pull-right">
                                                            <Input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
                                                            <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> <span class="text-danger"></span> </label>

                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        Voyageur international
                                                        <div class="material-switch pull-right">
                                                            <Input id="someSwitchOptionSuccess" name="voyageur_international" type="checkbox" />
                                                            <label for="someSwitchOptionSuccess" class="label-primary"></label>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Revenue <span class="text-danger">*</span> </label>
                                                <Input type="number" class="form-control" name="Revenue"   placeholder="Nationalité du trafiquant" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Nombre de complice <span class="text-danger">*</span> </label>
                                                <Input type="number" name="" id="" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Intention <span class="text-danger">*</span> </label>
                                                <select name="" id="" class="form-control select2">
                                                    <option value="" disabled selected> Sélectionnez</option>
                                                    <option value="" > Prêt à abondonner </option>
                                                    <option value=""> mordu du braconnage ou du trafic</option>
                                                </select>
                                             </div>
                                        </div>
                                    </div>
                                </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    )
}
}
export default Crime
