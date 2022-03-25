<?php

namespace AzelCH;

use pocketmine\Server;
use pocketmine\player\Player;
//plugin
use pocketmine\plugin\PluginBase;
//events
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\entity\EntityExplodeEvent;

class AntiGrief extends PluginBase implements Listener{
  
  //onEnable
  public function onEnable(): void{
    $this->saveResource("config.yml");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  //onDropItems
  public function onDropItems(PlayerDropItemEvent $event){
    $player = $event->getPlayer();
    if(!$player->hasPermission("antigrief.bypass")){
      if($this->getConfig()->get("enable-antidropitems") === true){
        $event->cancel();
        $player->sendMessage($this->getConfig()->get("message"));
      }
    }
  }
  
  //onBreakBlocks
  public function onBreakBlocks(BlockBreakEvent $event){
    $player = $event->getPlayer();
    if(!$player->hasPermission("antigrief.bypass")){
      if($this->getConfig()->get("enable-antibreakblocks") === true){
        $event->cancel();
        $player->sendMessage($this->getConfig()->get("message"));
      }
    }
  }
  
  //onPlaceBlocks
  public function onPlaceBlocks(BlockPlaceEvent $event){
    $player = $event->getPlayer();
    if(!$player->hasPermission("antigrief.bypass")){
      if($this->getConfig()->get("enable-antiplaceblocks") === true){
        $event->cancel();
        $player->sendMessage($this->getConfig()->get("message"));
      }
    }
  }
  
  //onExplode
  public function onExplode(EntityExplodeEvent $event){
      if($this->getConfig()->get("enable-antiexplode") === true){
        $event->cancel();
      }
    }

  }
}
