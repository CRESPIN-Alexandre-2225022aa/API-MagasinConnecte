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

    public function getShopByNumber($number) {
        $shops = $this->connector->read();
        foreach ($shops as $shop) {
            if ($shop['number'] == $number) {
                return $shop;
            }
        }
        return null;
    }

    public function addShop($weeks): void {
        $shops = $this->connector->read();
        $shop = new Shop($weeks);
        $shops[] = $shop->toArray();
        $this->connector->write($shops);
    }

    public function updateShop($weeks): void {
        $shops = $this->connector->read();
        foreach ($shops as &$s) {
            if ($s['number'] == $weeks['number']) {
                $s = $weeks;
            }
        }
        $this->connector->write($shops);
    }

    public function deleteShop($number): void {
        $shops = $this->connector->read();
        $shops = array_filter($shops, function($s) use ($number) {
            return $s['number'] != $number;
        });
        $this->connector->write($shops);
    }
}
?>