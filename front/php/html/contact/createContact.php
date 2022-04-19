<!DOCTYPE html>
<html lang="en">
    <?php include "../head.php"; ?>

<body>
    <?php include "../navbar.php"; ?>
    <h1>Create Contact</h1>


    <?php
        require_once 'HTTP/Request2.php';
        $request = new HTTP_Request2();
        $request->setUrl('http://exercice-tpa/rest-api/contact/create.php');
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'Content-Type' => 'application/json'
        ));
        $request->setBody('{
        \n"firstname": "testtesttest",
        \n"lastname": "test",
        \n"age":"9",
        \n"email":"test@test.ch",
        \n"tel_number": "2012132434"
        \n}');
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    ?>
</body>

<footer>
    <?php include "../footer.php"; ?>
</footer>

</html>