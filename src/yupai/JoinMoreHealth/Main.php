<?php

namespace yupai\JoinMoreHealth;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

    public function OnEnable(){
        $this->saveDefaultConfig();
        $this->reloadConfig();
        $this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(TextFormat::GREEN . "JoinMoreHealth by Yupai Enable!");
    }

    public function OnDisable(){
        $this->getLogger()->info(TextFormat::RED . "JoinMoreHealth by Yupai Disable!");
    }
    public function onRespawn(PlayerRespawnEvent $event) {
    $jmh = $this->getConfig();
    $hearts = $jmh->get("Number-of-Hearts");
    $player = $event->getPlayer();

    $player->setMaxHealth($hearts);
    $player->setHealth($hearts);
    $player->sendTip("§b§l≥ §r§eYou have " . $hearts . " §cHearts §b§l≤");
}
}