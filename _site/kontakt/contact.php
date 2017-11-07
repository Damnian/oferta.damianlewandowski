<?php
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ld8SjEUAAAAAG2OW_TwzjbXj-S-yIvD2f_9UZwx',
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
        echo '<p>Zaznacz proszę, że nie jesteś robotem!</p><br>';
    } else {
        //definicja zmiennych z formularza
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        //zdefiniowanie adresu docelowego i tytulu
        $dokogo = "kontakt@damianlewandowski.pl";
        $tytul = "Wiadomość ze strony www.oferta.damianlewandowski.pl";
        // jak będzie wyglądał mail u mnie
        $wiadomosc = "";
        $wiadomosc .= "Imię i nazwisko: " . $name . "\n";
        $wiadomosc .= "E-mail: " . $email . "\n";
        $wiadomosc .= "Treść wiadomości: " . $message . "\n";
        //wysłanie
        $sukces = mail($dokogo, $tytul, $wiadomosc, "od: <$email");
        echo '<p>Wysłano poprawnie!<br>Zaraz nastąpi przekierowanie.</p><br>';
        header("Refresh: 2; URL=http://www.oferta.damianlewandowski.pl/kontakt/");
    }
?>


