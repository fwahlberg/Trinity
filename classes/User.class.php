<?php
class User extends DB{
  private $userID = "";
  private $userAccountsIndex = array();
  private $userAccounts = array();
  private $activeAccount = "";


  public function __construct($userID) {
    $this->setUser($userID);
    $this->loadAccounts();
  }

  public function setUser($userID) {
    $accounts = self::query('SELECT clients FROM userclients WHERE userid = :id', array(':id' => $userID));
    $this->userAccountsIndex = explode(",", $accounts["clients"]);
    $this->activeAccount = Account::queryObject('SELECT * FROM clients WHERE clientID = :id LIMIT 1;', array(':id' => $this->userAccountsIndex[0]));
  }

  public function loadAccounts() {
    foreach ($this->userAccountsIndex as $key => $accountNumber) {
      // code..
      array_push($this->userAccounts, Account::queryObject('SELECT * FROM clients WHERE clientID = :id LIMIT 1;', array(':id' => $accountNumber)));
    }

    return $this->userAccounts;
  }
  public function activeAccount() {
    return $this->activeAccount;
  }

  public function getUserAccountsIndex() {
    return $this->userAccounts;
  }

  public function changeAccount($accountIndex) {
    $this->activeAccount = $this->userAccounts[$accountIndex];
  }
}
