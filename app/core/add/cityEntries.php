<?php

    namespace LSPD\App\Core\Add;

    require_once 'app/core/database/request.php';

    class CityEntries extends \LSPD\App\Core\Database\Request
    {

        /**
         * @var string Lastname of the new entry
         */
        private $_nom;

        /**
         * @var string Firstname of the new entry
         */
        private $_prenom;

        /**
         * @var \DateTime Birth date of the new entry
         */
        private $_birthdate;

        /**
         * @var string Sex of the new entry
         */
        private $_sex;

        public function __construct(string $lastname, string $firstname, string $birthdate, string $sex)
        {
            $this->_nom = htmlspecialchars(trim($lastname));
            $this->_prenom = htmlspecialchars(trim($firstname));
            $this->_birthdate = $birthdate;
            $this->_sex = htmlspecialchars($sex);

            $this->addNewEntry($lastname, $firstname, $birthdate, $sex);

            header('Location: /');
        }

    }

?>