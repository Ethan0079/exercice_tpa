<!DOCTYPE html>
<html lang="en">
    <?php include "../head.php"; ?>

<body>
    <?php include "../navbar.php"; ?>
    <div class="container">
        <h1>Create Contact</h1>

        <form method="post">  
            
            <br />  
            <label>Firstname</label>  
            <input type="text" name="firstname" class="form-control" /><br />

            <label>Lastname</label>  
            <input type="text" name="lastname" class="form-control" /><br />

            <label>Age</label>  
            <input type="number" name="age" class="form-control" /><br />

            <label>Email</label>  
            <input type="text" name="email" class="form-control" /><br />

            <label>Tel number</label>  
            <input type="number" name="telnumber" class="form-control" /><br />

            <input type="submit" name="submit" value="Submit" class="btn btn-info" /><br />

            <?php  
            if(isset($message))  
            {  
                echo $message;  
            }  
            ?>
        </form>  

        <?php
            $message = '';  
            $error = '';

            if(isset($_POST["submit"]))  
            {  
                if(empty($_POST["firstname"]))  
                {  
                    $error = "<label class='text-danger'>Enter firstname</label>";  
                }
                else if(empty($_POST["lastname"]))  
                {  
                    $error = "<label class='text-danger'>Enter lastname</label>";  
                }
                else if(empty($_POST["age"]))  
                {  
                    $error = "<label class='text-danger'>Enter age</label>";  
                }
                else if(empty($_POST["email"]))  
                {  
                    $error = "<label class='text-danger'>Enter email</label>";  
                }
                else if(empty($_POST["telnumber"]))  
                {  
                    $error = "<label class='text-danger'>Enter tel number</label>";  
                } else {  
                    
                    // API URL
                    $url = 'http://exercice-tpa/rest-api/contact/create';

                    // Create a new cURL resource
                    $ch = curl_init($url);

                    // Setup request to send json via POST
                    $data = array(
                        'firstname' => 'codexworld',
                        'lastname' => 'codexworld',
                        'age' => '27',
                        'email' => 'asdasd',
                        'tel_number' => '123123'
                    );
                    // $payload = json_encode($data);

                    // $payload = "{
                    //     'firstname':'codexworld',
                    //     'lastname':'codexworld',
                    //     'age':'27',
                    //     'email':'asdasd',
                    //     'tel_number':'123123'
                    // }";
                    // $payload = json_encode($payload);
                    $payload2 = json_encode(array("contact" => $data));

                    // Attach encoded JSON string to the POST fields
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload2);

                    // Set the content type to application/json
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

                    // Return response instead of outputting
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    // Execute the POST request
                    $result = curl_exec($ch);

                    // Close cURL resource
                    curl_close($ch);
                    
                    echo  "Contact created successfully !";
                    // echo $result;
                }
                
                if(isset($error))  
                {  
                    echo $error;
                }
            } else {
                echo "Problème !";
            }
        ?> 

    </div>
</body>

<footer>
    <?php include "../footer.php"; ?>
</footer>

</html>