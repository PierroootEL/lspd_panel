<?php

    namespace LSPD\App\Core\Account\Password;

    class Password
    {

        public function checkPassword(string $password1, string $password2)
        {

            return ($password1 == $password2);

        }

        public function hashPassword(string $password)
        {

            return password_hash($password, PASSWORD_BCRYPT, array("cost" => 16));

        }

        public function passwordCheck(string $password, string $hashed_password)
        {

            return password_verify($password, $hashed_password);

        }

    }

?>