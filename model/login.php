<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captcha
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LebCeYUAAAAACFjD9pC3ITr7Cq1s6ADRxy-QrDh',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo  '<script>
                  window.alert("Make sure you check the security CAPTCHA box")
               </script>';
    } else {
        // username and password sent from form
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = getUser($login, $password);

        // The result must contain only one row
        if ($result->num_rows != 1) {
            $error = "Your Login Name or Password is invalid";
            console_log($error);
            return;
        }

        $row = $result->fetch_assoc();
        $user = readUser($row['id']);
        $_SESSION['user'] = serialize($user);

        if (isAdmin()) {
            header("location: /?page=managerPanel");
        } else {
            header("location: /");
        }
    }
}
