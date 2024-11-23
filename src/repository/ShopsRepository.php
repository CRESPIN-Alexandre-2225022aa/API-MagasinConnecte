<?php
require_once '/home/api-magasinconnecte/www/src/models/Shop.php';
require_once '/home/api-magasinconnecte/www/src/connector/JsonConnector.php';

class ShopsRepository {
    private $connector;

    public function __construct() {
        $this->connector = new JsonConnector('/home/api-magasinconnecte/www/src/data/shop.json');
    }

    public function getAllShops() {
        return $this->connector->read();
    }

    public function addShop($name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek): void {
        $shops = $this->connector->read();
        $id = count($shops) ? $shops[count($shops) - 1]['id'] + 1 : 1;
        $shop = new Shop($id, $name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek);
        $shops[] = $shop->toArray();
        $this->connector->write($shops);
    }

    public function updateShop($id, $name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek): void {
        $shops = $this->connector->read();
        foreach ($shops as &$s) {
            if ($s['id'] == $id) {
                $shop = new Shop($id, $name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek);
                $s = $shop->toArray();
                break;
            }
        }
        $this->connector->write($shops);
    }

    public function deleteShop($id): void {
        $shops = $this->connector->read();
        $shops = array_filter($shops, function($s) use ($id) {
            return $s['id'] != $id;
        });
        $this->connector->write($shops);
    }
}
?>