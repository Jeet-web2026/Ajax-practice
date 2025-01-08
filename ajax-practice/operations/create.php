<?php
require('../configuration/config.php');
$cname = $_POST['c-name'];
$cnum = $_POST['c-no'];
$cmail = $_POST['c-mail'];

class create
{
    private $canName;
    private $Cannum;
    private $Canmail;

    public function __construct($name, $num, $mail)
    {
        $this->canName = $name;
        $this->Cannum = $num;
        $this->Canmail = $mail;
    }

    public function Create()
    {
        global $connection;
        $createQuery = "INSERT INTO `student_details`(`name`, `contact_number`, `email`) VALUES ('$this->canName','$this->Cannum','$this->Canmail')";
        $runQuery = mysqli_query($connection, $createQuery);

        if ($runQuery) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

$data = new create($cname, $cnum, $cmail);
$data->Create();
