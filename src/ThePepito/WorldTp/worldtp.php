<?php

namespace ThePepito\WorldTp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use ThePepito\WorldTp\Commands\naviguationCommand;
use ThePepito\WorldTp\forms\worldForm;
use pocketmine\Player;

class worldtp extends PluginBase{
    public function onEnable()
    {
        $this->getLogger()->info("Le plugin a bien été activé");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Le plugin a bien été desactivé");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()){
            case "naviguation";
                if ($sender instanceof Player) {
                    worldForm::open($sender);
                }
            break;
        }
        return true;
    }



}