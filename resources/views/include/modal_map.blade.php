<div id="modal_map" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="loader hidden">
    </div>
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" id="closebutton" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center alert alert-success hidden" id="block-ok">SAUVEGARDE DES COORDONNEE GEOGRAPHIQUE REUSSIES</p>
                <p class="text-center hidden" id="delete_div">ETES VOUS SURE DE SUPRIMER CETTE LOCALISATION</p>
            <form class="form-horizontal"  method="POST" role="form" id="form-store" >
                        {{ csrf_field() }}
                        <input id="map_id" type="number" class="hidden" name="map_id" >
                        <div class="form-group" id="map_name-div">
                            <label for="name" class="control-label col-sm-2">Nom du local</label>

                            <div class="col-sm-10">
                                <input id="map_name" type="text" class="form-control" name="map_name" value="{{ old('map_name') }}" required autofocus>
                                <span class="help-block text-center hidden" id="map_name-error"></span>                               
                            </div>
                        </div>
                      

                        <div class="form-group">
                            <label for="map_ville"class="control-label col-sm-2">Ville map</label>

                            <div class="col-sm-10">
                                <select class="form-control"  required name="map_ville" id="map_ville">
                                <option>Douala</option>
                                <option>Yaounde</option>
                                <option>Garoua</option>
                                <option>Ngaoundere</option>
                                </select>
                                                           </div>
                        </div>
                        <div class="form-group" >
                            <label for="map_type"class="control-label col-sm-2">Type map</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="map_type" id="map_type"  required>
                                <option>Mosquée</option>
                                <option>Restaurant</option>
                                <option>Ecole islamique</option>
                                </select>
                                                           </div>
                        </div>
                        <div class="form-group" id="map_long-div">
                            <label for="map_long" class="control-label col-sm-2">Longitude</label>

                            <div class="col-sm-10">
                                <input id="map_long" type="number" class="form-control" name="map_long" value="{{ old('map_long') }}" required autofocus>
                                <span class="help-block text-center hidden" id="map_long-error"></span>                               
                            </div>
                        </div>
                        <div class="form-group" id="map_lat-div">
                            <label for="name" class="control-label col-sm-2">Latitude</label>

                            <div class="col-sm-10">
                                <input id="map_lat" type="number" class="form-control" name="map_lat" value="{{ old('map_lat') }}" required autofocus>
                <span class="help-block text-center hidden" id="map_lat-error"></span>                               
                            
                        </div>
                    </form>
             
            </div>
            <div class="modal-footer">
          
                            <button  class="btn btn-success" id="save_map">
                                ENREGISTRER
                            </button>
                            <button  class="btn btn-info hidden" id="modif_map">
                              MODIFIER
                            </button>
                            <button type="button"   class="btn btn-danger hidden" id="delete_map" >
                                SUPRIMER
                            </button>
                            <button type="button"   class="btn btn-warning"  data-dismiss="modal" >
                                RETOUR
                            </button>
                            <a href="/geolocalisation"  class="btn btn-info hidden" id="retour_map">
                                OK
                            </a>
                          
                </div>
                </div>
    </div>
</div>