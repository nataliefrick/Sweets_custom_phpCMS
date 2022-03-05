<?php

class User {

    // variables
    private $username;
    private $password;
    private $users = array();

    // methods
    function __construct() {
        // log in to database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0) {
            die("Error connecting to database: " . $this->db->connect_error);
        }
    }

    // set-method
    function setUsername(string $username) : bool { // : bool ... return false returns false if username is not a string

        // check to see is string variable has content
        if(strlen($username) > 0) {
            $this->username = $username;
            return true;
        }

        return false;
    }

    function setPassword(string $password) : bool { // : bool ... return false returns false if password is not a string

        // check to see is string variable has content
        if(strlen($password) > 0) {
            $this->password = $password;
            return true;
        }

        return false;
    }


    public function addUser() : bool {
 
        // get current registered users
        $sql = "SELECT * FROM user;";
        $result = mysqli_query($this->db, $sql); //(send query: database connection, query)
        $regUsers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $usernameAlreadyReg = false; 
        // check arrat of registered users for same name
        foreach($regUsers as $regUser) {
            if($this->username == $regUser['username']) {
                //username already in database
                $usernameAlreadyReg = true; 
            } 
        }   

        // if username is not already registered, i.e. new user, insert into database
        if($usernameAlreadyReg == false) { 
            $sql = "
                INSERT INTO user 
                    (username, password)
                VALUES
                    (
                    '" . $this->username . "', 
                    '" . password_hash($this->password, PASSWORD_DEFAULT) . "' 
                    );
                "; 
                // . password_hash($this->password, PASSWORD_DEFAULT) .
                // password_verify($this->password, $user['password'])

            $result = mysqli_query($this->db, $sql); //(send query: database connection, query)
            
            return true; 

        } else { return false; } 
        
    }
    


    /** login user
     *  @param string $username, string $password
     *  @return boolean
    */ 
    function loginUser() : bool {
        // hard login
        // if($this->username == "natalie" && $this->password == "password") {
        //     // fill variable with content, i.e. user is logged in.
        //     $_SESSION['username'] = $this->username; 
        //     return true;
        // } else { return false; }

        // get registered users
        $sql = "SELECT * FROM user;";
        $result = mysqli_query($this->db, $sql); //(send query: database connection, query)
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $usernameSuccess = false; 
        $passwordSuccess = false; 
        // check in database of registered users
        foreach($users as $user) {
            if($this->username == $user['username']) {
                $usernameSuccess = true; // if username matches
                if (password_verify($this->password, $user['password'])) {
                    // fill variable with content, i.e. user is logged in.
                    $_SESSION['username'] = $this->username;
                    $passwordSuccess = true;
                } 
            } 
        } 
        
        if($usernameSuccess == true && $passwordSuccess == true) {
            return true;
        } elseif ($usernameSuccess == true && $passwordSuccess != true) { 
            $_SESSION['msg'] = "Incorrect password. ";
            return false; 
        } elseif ($usernameSuccess != true) {
            $_SESSION['msg'] = "Unrecognized username. ";
            return false; 
        }
    }

    /** check to see if user is logged in
     *  @return boolean
    */ 
    function isLoggedIn() : bool {
        // if $_SESSION['username'] variable holds content, i.e. user is logged in.
        if(isset($_SESSION['username'])) {
            return true;
        } else { return false; }
    }    

        // get list of registered users
    function getRegisteredUsers() : array {
            //SQL Query
            $sql = "SELECT * FROM user;";
            $users = mysqli_query($this->db, $sql); //(send query: database connection, query)
            return mysqli_fetch_all($users, MYSQLI_ASSOC);
    }
       

    /** check to see if user is logged in
     *  redirect for not logged in
    */ 
    function restrictPage() : bool {
        // if $_SESSION['username'] variable is empty, i.e. user is not logged in.
        if(!isset($_SESSION['username'])) {
            // if 'false' write out error msg 
            $_SESSION['msg'] = "You need to be logged in for access.";
            header("Location: login.php"); // load login_form.php
            exit;
        } else {
            return true;
        }
        
    }     

    function logoutUser() {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    
}