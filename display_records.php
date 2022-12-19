<html>
    <head>
        <title>Displaying Records</title>
        <style>
            body{
                background-color: teal;
            }
            table{
                background-color: white;
            }
        </style>
    </head>

    
<?php
include("connect.php");

$SELECT_QUERY = "SELECT `salutation`, `fname`, `lname`, `designation`, `affiliation`,
 `gender`, `candidature`, `registratonfees`, `contactdetails`, `emailId`,
  `mobileNum`, `food`, `accomodation` FROM `ss_form`";

$display_data = mysqli_query($connection, $SELECT_QUERY);


$total_rows = mysqli_num_rows($display_data);

if($total_rows != 0)
{
    ?>

    <h2 align="center">Displaying All Records from Database</h2>
    <table border="2" cellspacing="8" width="100%">
        <tr>
        <th width="1%">Salutation</th>
        <th width="10%">First Name</th>
        <th width="10%">Last Name</th>
        <th width="8%">Designation</th>
        <th width="8%">Affiliation</th>
        <th width="4%">Gender</th>
        <th width="6%">Candidature</th>
        <th width="2%">Registration Fees</th>
        <th width="12%">Contact Details</th>
        <th width="20%">Email Id</th>
        <th width="10%">Phone Number</th>
        <th width="5%">Food</th>
        <th width="4%">Accomodation</th>
        </tr>
    

<?php

    while($result = mysqli_fetch_assoc($display_data))
    {
        echo "<tr>
                <td>".$result['salutation']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['designation']."</td>
                <td>".$result['affiliation']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['candidature']."</td>
                <td>".$result['registratonfees']."</td>
                <td>".$result['contactdetails']."</td>
                <td>".$result['emailId']."</td>
                <td>".$result['mobileNum']."</td>
                <td>".$result['food']."</td>
                <td>".$result['accomodation']."</td>
            </tr>";
    }
}
else{
    echo "No records Found.....";
}

?>

</table>
</html>