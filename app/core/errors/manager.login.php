<?php

    namespace LSPD\App\Core\Errors;

    require 'app/core/errors/manager.php';

    class ErrorLogin extends \LSPD\App\Core\Errors\Errors
    {

        public function __construct(int $error_id)
        {

            switch ($error_id){
                case 1:
                    parent::echoInformation('Erreur identifiants ou mot de passe');
                    break;
            }

        }

    }

?>