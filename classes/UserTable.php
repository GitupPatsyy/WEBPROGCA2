<?php

/**
 * The class will insert users into the database and retrieve user data from the database
 *
 * @author rorypb
 */
//require the user class
require_once 'User.php';

class UserTable {

    private $link; //For connection to db

    //Constructor for a connection

    public function __construct($connection) {
        $this->link = $connection; //the link is equal to conneciton
    }

    //Insert function for user
    public function insert($user) {
        if (!isset($user)) {
            throw new Exception("User Required!");
        }
        //SQL query to insert into the users table
        $sqlq = "INSERT INTO web_users(username, password, role) "
                . "VALUES (:username, :password, :role)";

        //Parameters array for the data for the fields
        $params = array(
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        );
        //Statement to prepare the SQL query
        $stmt = $this->link->prepare($sqlq);
        //Status to make sure the fields are filled
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("User could not be saved: " . $errorInfo[2]);
        }

        //id of the user is updated
        $id = $this->link->lastInsertId('users');

        //return the id
        return $id;
    }

    //end of insert user function
    public function getUserByUn($username) {
        $sql = "SELECT * FROM web_users WHERE username = :username";
        $params = array('username' => $username);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }
        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $pwd = $row['password'];
            $role = $row['role'];
            $user = new User($id, $username, $pwd, $role);
        }
        return $user;
    }

    //Function for deleting a user
    public function delete($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User Id required");
        }
        $sql = "DELETE FROM web_users WHERE id = :id";
        $params = array('id' => $user->getId());
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete the user " . $errorInfo[2]);
        }
    }

    public function getUsers() {
        $sql = "SELECT * FROM web_users";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $users = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $username = $row['username'];
            $pwd = $row['password'];
            $role = $row['role'];
            $user = new User($id, $username, $pwd, $role);
            $users[$id] = $user;

            $row = $stmt->fetch();
        }
        return $users;
    }

    public function update($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }
        $sql = "UPDATE web_users SET password = :password WHERE id = :id";
        $params = array(
            'password' => $user->getPassword(),
            'id' => $user->getId()
        );
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update user: " . $errorInfo[2]);
        }
    }

}
