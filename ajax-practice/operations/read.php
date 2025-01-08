<?php

require('../configuration/config.php');

class Read
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function read()
    {
        $readQuery = "SELECT * FROM `student_details`";
        $runQuery = mysqli_query($this->connection, $readQuery);

        if ($runQuery && mysqli_num_rows($runQuery) > 0) {
            echo '
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact info.</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
            
            ';
            foreach($runQuery as $data){
                echo '
                 <tr>
                    <th scope="row">' . $data['id'] . '</th>
                    <td>' . $data['name'] . '</td>
                    <td>' . $data['contact_number'] . '</td>
                    <td>' . $data['email'] . '</td>
                </tr>
                ';
            }
        } else {
            echo "No records found.";
        }
    }
}

$reader = new Read($connection);
$reader->read();
mysqli_close($connection);
