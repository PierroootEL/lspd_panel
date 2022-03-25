<?php

    namespace LSPD\App\Core\Account;

    require_once 'app/core/database/request.php';

    class LoginManager extends \LSPD\App\Core\Database\Request
    {

        /**
         * @var string Username attempt given by the user
         */
        private $_username;

        /**
         * @var string Password attempt given by the user
         */
        private $_password;

        public function __construct(string $username, string $password)
        {

            $this->_username = $username;
            $this->_password = $password;

            if ($this->checkAccount($this->_username) == 1) {
                require 'app/core/account/password/manager.php';
                $p = new \LSPD\App\Core\Account\Password\Password();

                if($p->passwordCheck($this->_password, $this->getUserInfos($this->_username)['password'])){
                    require 'app/core/account/session/manager.php';
                    $s = new \LSPD\App\Core\Account\Session\SessionManager();
                    $s->sessionStart($this->getUserInfos($this->_username));
                }else{
                    header('Location: /login.php?e=1');
                }
            }else{
                header('Location: /login.php?e=1');
            }

        }

    }

?>