<?php

class Bidder
{
    public $bidderid;
    public $lastname;
    public $firstname;
    public $address;
    public $phone;

    function __construct($bidderid, $lname, $fname, $address, $phone)
    {
        $this->bidderid = $bidderid;
        $this->lastname = $lname;
        $this->firstname = $fname;
        $this->address = $address;
        $this->phone = $phone;
    }

    function __toString()
    {
        $output = "<h2>Bidder Number: $this->bidderid</h2>\n" .
            "<h2>$this->lastname, $this->firstname</h2>\n" .
            "<h2>$this->address</h2>\n" .
            "<h2>$this->phone</h2>\n";
        return $output;
    }

    function saveBidder()
    {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "INSERT INTO bidders VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issss", $this->bidderid, $this->lastname,
            $this->firstname, $this->address, $this->phone);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function updateBidder()
    {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "UPDATE bidders SET bidderid = ?, lastname = ?, " .
            "firstname = ?, address= ?, phone= ? " .
            "WHERE bidderid = $this->bidderid";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issss", $this->bidderid, $this->lastname,
            $this->firstname, $this->address, $this->phone);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function removeBidder()
    {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "DELETE FROM bidders WHERE bidderid = $this->bidderid";
        $result = $db->query($query);
        $db->close();
        return $result;
    }

    static function getBidders()
    {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "SELECT * FROM bidders";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $bidders = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $bidder = new Bidder($row['bidderid'], $row['lastname'],
                    $row['firstname'], $row['address'], $row['phone']);
                array_push($bidders, $bidder);
                unset($bidder);
            }
            $db->close();
            return $bidders;
        } else {
            $db->close();
            return NULL;
        }
    }

    static function findBidder($bidderid)
    {
        $db = new mysqli("localhost", "root", "root", "auction");
        $query = "SELECT * FROM bidders WHERE bidderid = $bidderid";
        $result = $db->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($row) {
            $bidder = new Bidder($row['bidderid'], $row['lastname'],
                $row['firstname'], $row['address'], $row['phone']);
            $db->close();
            return $bidder;

        } else {
            $db->close();
            return NULL;
        }
    }
}

