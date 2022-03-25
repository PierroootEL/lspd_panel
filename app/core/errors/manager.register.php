<?php

    namespace LSPD\App\Core\Errors;

    require 'app/core/errors/manager.php';

    class ErrorRegister extends \LSPD\App\Core\Errors\Errors
    {

        public function switchError(int $error_id)
        {

            switch ($error_id){
                case 1:
                    parent::echoInformation('Merci de renseigner des permissions !');
                    break;
                case 2:
                    parent::echoInformation('Les mots de passes ne correspondent pas !');
                    break;
            }

        }

    }

?>