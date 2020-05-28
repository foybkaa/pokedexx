<?php


class MainController extends CoreController{

    public function home() {

        $pokemonArray = $this->dbh->getPokemon();

        $this->show('home', $pokemonArray);
    }

    public function pokdetails($id) {

        $pokemonDetail = $this->dbh->getPokemonByNumber($id);
        

        $pokemonTypes = $this->dbh->getPokemonTypes($pokemonDetail[0]->getNumero());

        $arrayToView = [
            'pokemon' => $pokemonDetail,
            'types' => $pokemonTypes,
        ];

        $this->show('pokdetails', $arrayToView);
    }

    public function type() {

        $typeArray = $this->dbh->getType();

        $this->show('types', $typeArray);
    }

    public function pokType($type_id) {
        
        $arrayByType = $this->dbh->getTypeById($type_id);
        
        foreach($arrayByType as $key => $value) {
            $pokemonByType[] = $this->dbh->getPokemonByNumber($value->getPokemon_numero());
        }

        $this->show('poktype', $pokemonByType);
    }

    public function notFound() {

        $this->show('page404');
    }
  
}