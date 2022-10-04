 <?php
// $myName = $_POST['myName'];
// $myEmail = $_POST['myEmail'];
// $myNumber = $_POST['myNumber'];
// $myService = $_POST['myService'];
// $myExperience = $_POST['myExperience'];
// $yourself = $_POST['yourself'];

// if(!empty($myName)|| !empty($myEmail) || !empty($myNumber) || !empty($myService) || !empty($myExperience) || !empty($yourself)  ){

//     $host = "localhost";
//     $dbmyName="root";
//     $dbmyEmail="";
//     $dbname="serviceprovider";
// }
// $conn=new mysqli($host,$dbmyName,$dbmyEmail,$dbname);
// if(mysqli_connect_error()){
//   die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
// }else{
//     $SELECT="SELECT myEmail From NSP where myEmail=?Limit 1";
//     $INSERT="INSERT Into NSP (myName,myEmail,myNumber,myService,myExperience,yourself) values(?,?,?,?,?,?)";
//     $stmt=$conn->prepare($SELECT);
//     $stmt->bind_param("s",$myEmail);
//     $stmt->execute();
//     $stmt->bind_result($myEmail);
//     $stmt->store_result();
//     $rnum=$stmt->num_rows;
//     if($rnum==0){
//         $stmt->close();
//         $stmt->$conn->prepare($INSERT);
//         $stmt->bind_param("ssisis",$myName,$myEmail,$myNumber,$myService,$myExperience,$yourself);
//         $stmt->execute();
//         echo "New record inserted successfully";
//     } else{
//         echo "Someone already registered using this email";
//     }
//     $stmt->close();
//     $conn->close();
// }

// else {
//     echo "All field are required";
//     die();
// }

if (isset($_POST['Register'])) {
    if (isset($_POST['myName']) && isset($_POST['myEmail']) &&
        isset($_POST['myNumber']) && isset($_POST['myService']) &&
        isset($_POST['myExperience']) && isset($_POST['yourself'])) {
        
        $myName = $_POST['myName'];
        $myEmail = $_POST['myEmail'];
        $myNumber = $_POST['myNumber'];
        $myService = $_POST['myService'];
        $myExperience = $_POST['myExperience'];
        $yourself = $_POST['yourself'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "serviceprovider";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT myEmail FROM nsp WHERE myEmail = ? LIMIT 1";
            $Insert = "INSERT INTO nsp(myName, myEmail, myNumber, myService, myExperience, yourself) values(?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $myEmail);
            $stmt->execute();
            $stmt->bind_result($myEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssisis",$myName, $myEmail, $myNumber, $myService, $myExperience, $yourself);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}



?> 