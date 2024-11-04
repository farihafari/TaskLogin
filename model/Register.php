<?php
// include "auth.php"  ;
class Register
{

    public $username;
    public $userpassword;
    public $useremail;
    public $connect;
    public $output;
    public $error = array();

    public function __construct($username, $useremail, $userpassword, $output, $connect)
    {
        $this->username = $username;
        $this->useremail = $useremail;
        $this->userpassword = $userpassword;
        $this->output = $output;
        $this->connect = $connect;


        // methods invoking

        $this->Checkusername();
        $this->Checkuseremail();
        $this->Registration();
    }

    // username

    public function Checkusername()
    {

        $pdo = $this->connect->prepare("select * from users where username = ?");
        $array = array($this->username);
        $pdo->execute($array);
        $row = $pdo->fetchAll();
        if (count($row) > 0) {
            $this->error['e'] = "<p class='alert alert-danger text-center'>Namealready Exist</p>";
        }
    }
    // user email

    public function Checkuseremail()
    {

        $pdo = $this->connect->prepare("select * from users where useremail = ?");
        $array = array($this->useremail);
        $pdo->execute($array);
        $row = $pdo->fetchAll();
        if (count($row) > 0) {
            $this->error['e'] = "<p class='alert alert-danger text-center'>Email Address already exist</p>";
        }
    }


    public function output()
    {
        $output = "";
        if (isset($this->error['e'])) {
            $output = $this->error['e'];
        } else {
            $output = "";
        }
        return $output;
    }

    public function Registration()
    {
        if (count($this->error) < 1) {

            $query = $this->connect->prepare("insert into users(username,useremail,userpassword) values(?,?,?)");
            $hashPassword = password_hash($this->userpassword, PASSWORD_DEFAULT);
            $input = array($this->username, $this->useremail, $hashPassword);
            $success = $query->execute($input);
            if ($success) {
                echo "<script>alert('account registered successfully');
                location.assign('login.php');
                </script>";
            }
        }
    }
}
