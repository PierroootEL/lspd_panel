<?php

    namespace LSPD\App\Core\Account;

    require_once 'app/core/database/request.php';

    class RegisterManager extends \LSPD\App\Core\Database\Request
    {

        /**
         * @var string Lastname of the account creation attempt
         */
        private $_nom;

        /**
         * @var string Firstname of the account creation attempt
         */
        private $_prenom;

        /**
         * @var string Username of the account creation attempt
         */
        private $_username;

        /**
         * @var array Password and password confirmation of the account creation attempt
         */
        private $_passwords = [];

        /**
         * @var string Hashed password of the account creation attempt
         */
        private $_hashed_password;

        /**
         * @var string Permissions given to the user
         */
        private $_perms;

        public function __construct(string $nom, string $prenom, string $password, string $password_conf, string $perms)
        {

            $this->_nom = $nom;
            $this->_prenom = $prenom;
            $this->_username = strtolower($prenom) . '.' . strtolower($nom);
            $this->_passwords = [
                0 => $password,
                1 => $password_conf
            ];
            $this->_perms = $perms;

            require '/var/www/pierre/lspd/app/core/account/password/manager.php';
            $p = new Password\Password();

            if ($p->checkPassword($this->_passwords[0], $this->_passwords[1])){
                $this->_hashed_password = $p->hashPassword($this->_passwords[0]);

                $this->createAccount($this->_nom, $this->_prenom, $this->_username, $this->_hashed_password, $this->_perms);

                header('Location: /');

            }else{
                header('Location: /register.php?e=2');
            }

        }

    }

?>