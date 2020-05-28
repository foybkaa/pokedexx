<?php

class CoreController {

    protected $staticUrl;
    protected $dbh;

    public function __construct($staticUrl) {

        $this->staticUrl = $staticUrl;
        $this->dbh = new DBData();

    }


    public function show($tpl, $arrayToView = []) {
        
        foreach ($arrayToView as $key => $value) {
           $$key = $value;
        }
        
        require __DIR__.'/../views/header.part.tpl.php';
        require __DIR__.'/../views/'.$tpl.'.tpl.php';
        require __DIR__.'/../views/footer.part.tpl.php';

    }

}