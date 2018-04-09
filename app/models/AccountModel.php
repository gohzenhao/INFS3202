<?php
class AccountModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

}