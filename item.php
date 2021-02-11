<?php


class item
{
    public $itemid;
    public $name;
    public $description;
    public $resaleprice;
    public $winbidder;
    public $winprice;

    function __construct($itemid, $name, $description, $resaleprice, $winbidder, $winprice) {
        $this->itemid = $itemid;
        $this->name = $name;
        $this->description = $description;
        $this->resaleprice = $resaleprice;
        $this->winbidder = $winbidder;
        $this->winprice = $winprice;
    }

    function __toString() {
        $output = "<h2>Item : $this->itemid</h2>" .
            "<h2>Name: $this->name</h2>\n";
        "<h2>Description: $this->description</h2>\n";
        "<h2>Resale Price: $this->resaleprice</h2>\n";
        "<h2>Winning bid: $this->winbid at $this->winprice</h2>\n";
        return $output;
    }

    function saveItem() {
        $db = new mysqli("localhost","root","root","auction");
        $query = "INSERT INTO items VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issdid", $this->itemid, $this->name,
            $this->description, $this->resaleprice,
            $this->winbidder, $this->winprice);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function updateItem() {
        $db = new mysqli("localhost","root","root","auction");
        $query = "UPDATE items SET name= ?, description= ?, resaleprice= ?, " .
            "winbidder= ?, winprice= ? WHERE itemid = $this->itemid";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssdid", $this->name, $this->description,
            $this->resaleprice, $this->winbidder, $this->winprice);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function removeItem() {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "DELETE FROM items WHERE itemid = $this->itemid";
        $result = $db->query($query);
        $db->close();
        return $result;
    }

    static function getItems() {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "SELECT * FROM items";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $items = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $item = new Item($row['itemid'], $row['name'],
                    $row['description'], $row['resaleprice'],
                    $row['winbidder'], $row['winprice']);
                array_push($items, $item);
            }
            $db->close();
            return $items;
        } else {
            $db->close();
            return NULL;
        }
    }

    static function getItemsbyBidder($bidderid) {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "SELECT * FROM items WHERE winbidder = $bidderid";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $items = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $item = new Item($row['itemid'], $row['name'],
                    $row['description'], $row['resaleprice'],
                    $row['winbidder'], $row['winprice']);
                array_push($items, $item);
            }
            $db->close();
            return $items;
        } else {
            $db->close();
            return NULL;
        }
    }

    static function findItem($itemid) {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "SELECT * FROM items WHERE itemid = $itemid";
        $result = $db->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row) {
            $item = new Item($row['itemid'], $row['name'], $row['description'],
                $row['resaleprice'], $row['winbidder'], $row['winprice']);
            $db->close();
            return $item;
        } else {
            $db->close();
            return NULL;
        }
    }

}