<?php

namespace App\Controller;

use App\Manager\CharacterManager;
use App\Model\Character;

class HomeController
{
    private CharacterManager $characterManager;

    public function __construct()
    {
        $this->characterManager = new CharacterManager();
    }

    public function homePage(?string $name, ?string $type)
    {
        $characters = [];

        //Récuperer les voitures
        if ($name != null) {

            $characters = $this->characterManager->selectByName($name);
        } else if ($type != null) {
            $characters = $this->characterManager->selectByType($type);
            //Afficher les voitures dans la template
        } else {
            $characters = $this->characterManager->selectAll();
            //Afficher les voitures dans la template


        }
        require_once("./templates/home.php");
    }

    public function detailPage(?int $id)
    {
        if ($id != null) {

            $characters = $this->characterManager->selectById($id);
            //Afficher les voitures dans la template
            require_once("./templates/detail.php");
        } else {
            $characters = $this->characterManager->selectAll();
            require_once("./templates/home.php");
        }
    }
}
