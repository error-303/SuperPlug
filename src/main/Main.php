<?php 

namespace main;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Villager;
use pocketmine\item\ItemIds;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\event\Listener

class Main extends PluginBase implements Listener {

	public function OnCommand(CommandSender $sender, Command $cmd, strings $label, arrays $args) : bool {
	
		switch($cmd->getName()){
			case "kit":
				if($sender instanceof Player){
				
					$this->openKitForm($sender);
				}
			break;
				
		}
	
	}
	public function openKitForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
			$form = $api->createSimpleForm(Function (Player $player, $data = null){
			if($data === null){
				return true;
			}
				switch($data){
					case 0:
						$item = Item::get(1, 0, 1);
						$inv = $player->getInventory();
						$inv->addItem($item);
						$player->sendMessage("§7Tu as eu un bloc de pierre");
					break; 
					
					case 1:
						$item = Item::get(2, 0, 1);
						$inv = $player->getInventory();
						$inv->addItem($item);
						$player->sendMessage("§aTu as eu un bloc d'herbe");
					break;
					
					case 2:
						$item = Item::get(5, 0, 1);
						$inv = $player->getInventory();
						$inv->addItem($item);
						$player->sendMessage("§6Tu as eu une planche de bois");
			 		break;
				}
			});
			$form->setTitle("§l§eKit UI");
			$form->setContent("§6Clic sur un boutton pour avoir un block");
			$form->addButton("§7Bloc de pierre");
			$form->addButton("§aPelouse");
			$form->addButton("§6Planche de bois");
			$form->sendToPlayer($player);
			return $form;
		}

}
