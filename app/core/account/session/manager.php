<?php

    namespace LSPD\App\Core\Account\Session;

    require_once 'app/core/database/request.php';

    class SessionManager extends \LSPD\App\Core\Database\Request
    {

        public function sessionStart(array $userinfos)
        {
            session_start();

            foreach ($userinfos as $key => $value){
                if ($key == 'password'){
                    continue;
                }
                $_SESSION[$key] = $value;
            }

            header('Location: /');
        }

        public function checkRight()
        {

            session_start();

            if (empty($_SESSION['token'])){
                $this->addSessionLogs('session_was_not_open', $_SERVER['REMOTE_ADDR'], 'no_session', $_SERVER['REQUEST_URI']);

                header('Location: /login.php');
            }

        }

        public static function sessionEnd()
        {

            session_start();

            session_unset();

            session_destroy();

            header('Location: /login.php');

        }

    }

?>