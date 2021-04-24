<?php

namespace ThePepito\WorldTp\Commands;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use ThePepito\WorldTp\forms\worldForm;
use ThePepito\WorldTp\worldtp;

class naviguationCommand extends PluginCommand{
    public function __construct(worldtp $plugin)
    {
        parent::__construct("naviguation", $plugin);
        $this->setAliases(["nav"]);
        $this->setDescription("Permet d'ouvrir un page avec la liste de tout les mondes! §4-Arcaniaxe");
        $this->setUsage("/nav");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player) return;
        worldForm::open($sender);
    }
}
