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
        <h1>Update Contact</h1>

        <form id="formContact" method="post">

            <div class="form-group-input">
                <label>ID</label>  
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
                <label>Firstname</label>  
                <input type="text" name="firstname"
                    value="<?php echo  isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>"
                    class="form-control 
                    <?php 
                     if(isset($_POST["firstname"])){
                        if(isNotEmpty($_POST["firstname"])){
                            echo "";
                        } else {
                            echo "input-error";
                        }
                     }

                    ?>"
                    pattern="[a-zA-Z]{1,}"
                    required
                />
            </div>

            <div class="form-group-input">
                <label>Lastname</label>  
                <input type="text" name="lastname" 
                    value="<?php echo  isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>"
                    class="form-control 
                    <?php 
                     if(isset($_POST["lastname"])){
                        if(isNotEmpty($_POST["lastname"])){
                            echo "";
                        } else {
                            echo "input-error";
                        }
                     }

                    ?>"
                    pattern="[a-zA-Z]{1,}"
                    required
                    />
            </div>

            <div class="form-group-input">
                <label>Age</label>  
                <input type="number" name="age" max-lenght="3"
                    value="<?php echo  isset($_POST["age"]) ? $_POST["age"] : ''; ?>"
                    class="form-control 
                    <?php 
                     if(isset($_POST["age"])){
                        if(isNotEmpty($_POST["age"])){
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
                <label>Email</label>  
                <input type="email" name="email" 
                    value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" 
                    class="form-control 
                    <?php 
                     if(isset($_POST["email"])){
                        if(isNotEmpty($_POST["email"])){
                            echo "";
                        } else {
                            echo "input-error";
                        }
                     }
                    ?>"
                    placeholder="jean@outlook.com"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    required
                />
            </div>

            <div class="form-group-input">
                <label>Tel number</label>  
                <input type="tel" name="telnumber" 
                    value="<?php echo isset($_POST["telnumber"]) ? $_POST["telnumber"] : ''; ?>"
                    class="form-control
                     <?php if(isset($_POST["telnumber"])){
                        if(isNotEmpty($_POST["telnumber"])){
                            echo "";
                        } else {
                            echo "input-error";
                        }
                     }
                    ?>"
                    placeholder="+41 79 349 56 87"
                    pattern="^(?:0|\(?\+41\)?\s?|0041\s?)(21|22|24|26|27|31|32|33|34|41|43|44|51|52|55|56|58|61|62|71|74|76|77|78|79|81|91)(?:[\.\-\s]?\d\d\d)(?:[\.\-\s]?\d\d){2}$"
                    required
                />
            </div>

            <div class="form-group-input">
                <label></label>
                <input type="submit" name="formContact" value="Update" class="btn btn-info mx-auto form-control" />
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
                if(empty($_POST["id"]))  
                {  
                    $error = "<label class='text-danger'>Enter id</label>";  
                }
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
                    $url = 'http://exercice-tpa/rest-api/contact/update';

                    // Update a new cURL resource
                    $ch = curl_init($url);

                    // Setup request to send json via POST
                    $data = array(
                        'id' => $_POST["id"],
                        'firstname' => $_POST["firstname"],
                        'lastname' => $_POST["lastname"],
                        'age' => $_POST["age"],
                        'email' =>  $_POST["email"],
                        'tel_number' => $_POST["telnumber"]
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
                    
                    echo  "Contact updated successfully !";
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