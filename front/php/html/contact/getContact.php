<!DOCTYPE html>
<html lang="en">
    <?php include "../head.php"; ?>

<body>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="\html\contact\ajax\ajax-script.js"></script> -->

    <?php include "../navbar.php"; ?>
    <div class="container text-center my-2">
        <!-- <button id="fetchContact" type="button" class="btn btn-outline-warning mt-2">Get Contact</button> -->
        <!-- <div id="table-container"></div> -->
        <!-- <table id="table-container">
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel number</th>
            </tr>
        </table> -->

        <?php
            $json = file_get_contents("http://exercice-tpa/rest-api/contact/read.php");
            $data =  json_decode($json, true);
            // print_r($data);

            /*Initializing temp variable to design table dynamically*/
            $temp = "<table class=\"table table-hover\">";
            
            /*Defining table Column headers depending upon JSON records*/
            $temp .= "<tr><th scope=\"col\">ID</th>";
            $temp .= "<th scope=\"col\">Firstname</th>";
            $temp .= "<th scope=\"col\">Lastname</th>";
            $temp .= "<th scope=\"col\">Age</th>";
            $temp .= "<th scope=\"col\">Email</th>";
            $temp .= "<th scope=\"col\">Tel number</th></tr>";
            
            /*Dynamically generating rows & columns*/
            for($i = 0; $i < sizeof($data["contact"]); $i++)
            {
                $temp .= "<tr>";
                    $temp .= "<th scope=\"row\">" . $data["contact"][$i]["id"] . "</th>";
                    $temp .= "<td>" . $data["contact"][$i]["firstname"] . "</td>";
                    $temp .= "<td>" . $data["contact"][$i]["lastname"] . "</td>";
                    $temp .= "<td>" . $data["contact"][$i]["age"] . "</td>";
                    $temp .= "<td>" . $data["contact"][$i]["email"] . "</td>";
                    $temp .= "<td>" . $data["contact"][$i]["tel_number"] . "</td>";
                $temp .= "</tr>";
            }
            
            /*End tag of table*/
            $temp .= "</table>";
            
            /*Printing temp variable which holds table*/
            echo $temp;
        ?>
    </div>
    
</body>

<footer>
    <?php include "../footer.php"; ?>
</footer>

</html>