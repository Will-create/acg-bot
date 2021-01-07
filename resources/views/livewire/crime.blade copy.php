<div>
    <div id="smartwizard">
        <ul>
            <li><a href="#step-1">Informations générales</a></li>
            <li><a href="#step-2">Information sur le produit</a></li>
            <li><a href="#step-3">Autres informations</a></li>
        </ul>
        <div>
            <div id="step-1" class="">
            <form  method="POST" id="form_setp_1">
                @csrf
                <input type="hidden" name="step" value="1">
                <input type="hidden" name="uuid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>   Type de crime  <span class="text-danger">*</span></label>
                                <select name="type_id"  class="form-control custom-select select2">
                                    <option value="" selected disabled> Séléctionnez un type de crime</option>
                                    @forelse ($typeCrimes as $typeCrime)
                                <option value="{{$typeCrime->id}}"> {{$typeCrime->nom}}</option>
                                    @empty
                                    Aucun pays disponible
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        @livewire('regne-espece')

                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>   Pays d'appréhension  <span class="text-danger">*</span></label>
                                <select name="pays_apprehension"  class="form-control custom-select select2">
                                    <option value="" selected disabled> Séléctionnez un pays</option>
                                    @forelse ($pays as $pays_apprehension)
                                <option value="{{$pays_apprehension->id}}"> {{$pays_apprehension->nom}}</option>
                                    @empty
                                    Aucun pays disponible
                                    @endforelse
                                </select>
                            </div>
                        </div> --}}



                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>   Date d'apprehension  <span class="text-danger">*</span></label>
                                <input type="date" name="date_apprehension"  class="form-control">
                            </div>
                        </div>

                                                    <div class="col-md-6">
                            <div class="form-group">
                                <label> Localité d'aprrehension <span class="text-danger">*</span></label>
                                <input type="text" name="localite_apprehension"  class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Longitude  <span class="text-danger"></span></label>
                                <input type="text" name="longitude" id="longitude" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Latitude <span class="text-danger"></span></label>
                                <input type="text" name="latitude" id="latitude" class="form-control" autocomplete="og">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                    <a href="{!! URL::previous() !!}" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                        <button type="submit" id="submit1" class="btn btn-primary"> Suivant</button>

                    </div>
                </form>
            </div>

            <div id="step-2" class="">
                <form  method="POST" id="form_setp_2">
                    @csrf
                <input type="hidden" name="step" value="2">
                <input id="uuid2" type="hidden" name="uuid">

                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="pays_origine_produit"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                            <select name="pays_origine_produit"  class="form-control select2">
                                <option value="" disabled selected> Sélectionnez</option>
                                @forelse ($pays as $pays_origine)
                            <option value="{{$pays_origine->id}}">{{$pays_origine->nom}}</option>
                                @empty
                                Aucun pays
                                @endforelse
                            </select>
                            </div>
                     </div>
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="pays_destination"> Pays de destination du produit <span class="text-danger">*</span> </label>
                            <select name="pays_destination"  class="form-control select2">
                                <option value="" disabled selected> Sélectionnez</option>
                                @forelse ($pays as $pays_destination)
                            <option value="{{$pays_destination->id}}">{{$pays_destination->nom}}</option>
                                @empty
                                Aucun pays
                                @endforelse
                            </select>
                            </div>
                     </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="quantite"> Aires protégées d'origine du produits <span class="text-danger">*</span> </label>
                            <select name="aire_protegee_id"  class="form-control select2">
                                <option value="" disabled selected> Sélectionnez</option>
                                @forelse ($aires as $aire)
                            <option value="{{$aire->id}}">{{$aire->libelle}}</option>
                                @empty
                                Aucun pays
                                @endforelse
                            </select>
                            </div>
                     </div>
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="date_abattage">Date d’abattage/capture <span class="text-danger">*</span> </label>
                            <input type="date" name="date_abattage"  class="form-control">
                     </div>
                     </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="gestion_des_saisies"> Gestion des saisis <span class="text-danger">*</span> </label>
                            <select name="gestion_des_saisies"  class="form-control select2">

                                <option value="crime_type_reglement" disabled selected> Sélectionnez</option>
                                <option value="Détruit">Détruit</option>
                                <option value="Stocké">Stocké</option>
                             </select>
                            </div>
                         </div>

                     </div>


                   <div class="text-right">
                    <a href="{!! URL::previous() !!}" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                    <button type="submit" id="submit2" class="btn btn-primary"> Suivant</button>
                   </div>
                    </form>
                    </div>
            <div id="step-3" class="">
                <form  method="POST" id="form_setp_3">
                    @csrf
                <input type="hidden" name="step" value="3">
                <input type="hidden" name="uuid" id="uuid3" value="3">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="lien_terrorisme"> Lien térrorisme <span class="text-danger">*</span> </label>
                            <select name="lien_terrorisme"  class="form-control select2">

                                <option value="" disabled selected> Sélectionnez</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                             </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                            <label for="veto"> Veto <span class="text-danger">*</span> </label>
                            <select name="veto"  class="form-control select2">

                                <option value="" disabled selected> Sélectionnez</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                             </select>
                            </div>
                         </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Revenue <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="victime"   placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{!! URL::previous() !!}" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                        <button type="submit" id="submit3" class="btn btn-primary"> Suivant</button>
                       </div>
                </form>
            </div>
        </div>
    </div>
</div>
