<?php
include  "auth.php";
include  "Register.php";
class Login extends Register
{
    
    public $error ;
    
    public function __construct($username, $userpassword, $output,$connect)
    {
        parent::__construct($username, "",$userpassword,$output, $connect);
        // $this->LoggedIn();
    }
    // public function output()
    // {
    //     $output = "";
    //     if (isset($this->error['e'])) {
    //         $output = $this->error['e'];
    //     } else {
    //         $output = "";
    //     }
    //     return $output;
    // }
    
    public function LoggedIn()
    {
        $this->error=array();
        if (count($this->error) < 1) {
            $pdo = $this->connect->prepare("SELECT * FROM users WHERE username = ?");
            $pdo->execute([$this->username]);
            $userData = $pdo->fetch(PDO::FETCH_ASSOC);
            
            // var_dump($this->connect);
            if ($userData) {
                if (password_verify($this->userpassword, $userData["userpassword"])) {
                    // var_dump($userData);
                    // $this->output = "<p class='alert alert-success text-center'>Logged in successfully.</p>";
                    $_SESSION['userName']=$userData['username'];
                    echo "<script>alert('Loggedin Successfully');
                        location.assign('panel.php');
                    </script>";
                } else {
                    $this->error['e'] = "<p class='alert alert-danger text-center'>Invalid password.</p>";
                }
            } else {
                $this->error['e'] = "<p class='alert alert-danger text-center'>Invalid account.</p>";
            }
        }
        
        // Return either the output or error message
        return isset($this->error['e']) ? $this->error['e'] : $this->output;
    // }
    
}
    }

?>