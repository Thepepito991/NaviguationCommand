<?php

namespace ThePepito\WorldTp\forms;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\block\Lever;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\Server;


class worldForm
{
    public static function open(Player $p)
    {
        {
            $world = [];

            foreach (Server::getInstance()->getLevels() as $level){
                array_push($world,$level->getName());
            }

            $form = new SimpleForm(
                function (Player $p, $data) use ($world){
                    if ($data === null){

                    } else {
                        var_dump($world[$data]);
                        $level = $world[$data];
                        if (Server::getInstance()->isLevelLoaded($level)){
                            Server::getInstance()->loadLevel($level);
                        }
                            $p->teleport(Server::getInstance()->getLevelByName($level)->getSpawnLocation());
                            $p->sendMessage("§3Vous avez été téléporter au monde §c$level");

                    }
                }
            );

            $form->setTitle("Liste des mondes !");
            $form->setContent("Cliquez sur un monde pour vous y téléporter!");
            foreach ($world as $level){
                if (Server::getInstance()->isLevelLoaded($level)) {

                    $form->addButton($level . "\n§l§aCHARGE");
                } else {
                    $form->addButton($level . "\n§l§cNON-CHARGE");
                }
            }
            $p->sendForm($form);
        }
    }
}