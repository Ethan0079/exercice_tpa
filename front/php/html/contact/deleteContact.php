<!DOCTYPE html>
<html lang="en">
    <?php include "../head.php"; ?>

<body>
    <?php 
        include "../navbar.php"; 

        function isNotEmpty($value) {
            if(empty($value)){
                return false;
            } else {
                return true;
            }
        }
        
    ?>
    <div class="container">
        <h1>Delete Contact</h1>

        <form id="formContact" method="post">

            <div class="form-group-input">
                <label>ID or Email</label>  
                <input type="number" name="id" 
                    value="<?php echo  isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>"
                    class="form-control
                        <?php 
                        if(isset($_POST["id"])){
                            if(isNotEmpty($_POST["id"])){
                                echo "";
                            } else {
                                echo "input-error";
                            }
                        }
                    ?>" 
                    required
                />
            </div>

            <div class="form-group-input">
                <label></label>
                <input type="submit" name="submit" value="Submit" class="btn btn-info mx-auto form-control" />
            </div>
                        
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
                $id = $_POST["id"];

                if(empty($id))  
                {  
                    $error = "<label class='text-danger'>Enter id</label>";  
                } else {  
                    
                    // API URL
                    $url = 'http://exercice-tpa/rest-api/contact/delete';

                    // Update a new cURL resource
                    $ch = curl_init($url);

                    // Setup request to send json via POST
                    $data = array(
                        'id' => $_POST["id"]
                    );

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
                    
                    echo  "Contact deleted successfully !";
                    // echo $result;
                }
                
                if(isset($error))  
                {  
                    echo $error;
                }
            } else {
                // echo "Problème !";
            }
        ?> 

    </div>
</body>

<footer>
    <?php include "../footer.php"; ?>
</footer>

</html>