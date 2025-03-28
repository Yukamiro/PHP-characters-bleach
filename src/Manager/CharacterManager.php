<?php

namespace App\Manager;


use App\Manager\DatabaseManager;
use App\Model\Character;
use App\Model\Power;
use App\Service\FileUploader;
use PDO;
use PDOException;

class   CharacterManager extends DatabaseManager
{
    public function selectAll()
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM `character`");
        $requete->execute();

        $charactersArray = $requete->fetchAll();
        $charactersObjects = [];
        foreach ($charactersArray as $characterArray) {

            $charactersObject = new Character($characterArray["id"], $characterArray["name"], $characterArray["type"], $characterArray["zanpakuto"], $characterArray["letter"], $characterArray["fullbring_type"], $characterArray["image"], []);

            $requete = self::getConnexion()->prepare("SELECT * FROM powers WHERE character_id = :id");
            $requete->execute([
                "id" => $charactersObject->getId()
            ]);


            $powers = $requete->fetchAll();
            foreach ($powers as $power) {

                $charactersObject->addPower(new Power($power["id"], $power["character_id"], $power["power_name"]));
            }
            $charactersObjects[] = $charactersObject;
        }


        return $charactersObjects;
    }

    public function selectById(int $id)
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM `character` WHERE `id`= :id;");
        $requete->execute([
            "id" => $id
        ]);
        $character = $requete->fetch();




        $characterObject = new Character($character["id"], $character["name"], $character["type"], $character["zanpakuto"], $character["letter"], $character["fullbring_type"], $character["image"], []);

        $requete = self::getConnexion()->prepare("SELECT * FROM powers WHERE character_id = :id");
        $requete->execute([
            ":id" => $characterObject->getId()
        ]);


        $powers = $requete->fetchAll();
        foreach ($powers as $power) {

            $characterObject->addPower(new Power($power["id"], $power["character_id"], $power["power_name"]));
        }


        return $characterObject;
    }

    public function selectByType(string $type): array
    {

        $requete = self::getConnexion()->prepare("SELECT * FROM `character` WHERE `type`= :type;");
        $requete->execute(
            [
                ':type' => $type
            ]
        );
        $characters = $requete->fetchAll();

        $charactersObjects = [];
        foreach ($characters as $character) {

            $charactersObject = new Character($character["id"], $character["name"], $character["type"], $character["zanpakuto"], $character["letter"], $character["fullbring_type"], $character["image"], []);

            $requete = self::getConnexion()->prepare("SELECT * FROM powers WHERE character_id = :id");
            $requete->execute([
                ":id" => $charactersObject->getId()
            ]);


            $powers = $requete->fetchAll();
            foreach ($powers as $power) {

                $charactersObject->addPower(new Power($power["id"], $power["character_id"], $power["power_name"]));
            }
            $charactersObjects[] = $charactersObject;
        }
        return $charactersObjects;
    }

    public function insert(Character $character): bool
    {
        $requete = self::getConnexion()->prepare(
            "INSERT INTO `character` (name, type, zanpakuto,letter,fullbring_type,image)
        VALUES (:name, :type, :zanpakuto, :letter, :fullbring_type, :image);"
        );

        $requete->execute([
            "name" => $character->getName(),
            "type" => $character->gettype(),
            "zanpakuto" => $character->getZanpakuto(),
            "letter" => $character->getLetter(),
            "fullbbring_type" => $character->getFullbring_type(),
            "image" => $character->getImage(),

        ]);
        return $requete->rowCount() > 0;
    }

    public function update(Character $character)
    {
        $requete = self::getConnexion()->prepare("
            UPDATE character 
            SET name = :name, type = :type, zanpakuto = :zanpakuto, 
                letter = :letter, fullbring_type = :fullbring_type, image = :image
            WHERE id = :id;
        ");

        $requete->execute([
            ":name" => $character->getname(),
            ":type" => $character->gettype(),
            ":zanpakuto" => $character->getZanpakuto(),
            ":letter" => $character->getLetter(),
            ":fullbring_type" => $character->getFullbring_type(),
            ":image" => $character->getImage(),

        ]);
        return $requete->rowCount() > 0;
    }

    public function deleteById(int $id)
    {
        $character = $this->selectById($id);
        if (!$character) {
            return false;
        } else {
            try {
                $requete = self::getConnexion()->prepare("DELETE FROM `character` WHERE id = :id;");
                $requete->execute([":id" => $id]);
                if ($requete->rowCount() > 0) {
                    $fileUploader = new FileUploader();
                    $fileUploader->delete($character->getImage());
                    return true;
                } else {
                    return false;
                }
            } catch (\PDOException $e) {
                return false;
            }
        }
    }
}
