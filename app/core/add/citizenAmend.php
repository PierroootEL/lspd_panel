<?php

    namespace LSPD\App\Core\Add;

    require_once 'app/core/database/request.php';

    class CitizenAmend extends \LSPD\App\Core\Database\Request
    {

        /**
         * @var int $_citizenID Citizen ID to connect amend and entry
         */
        private $_citizenID;

        /**
         * @var string Reason of the current amend
         */
        private $_reason;

        public function newAmend(int $citizenID, string $reason)
        {

            $this->_citizenID = $citizenID;
            $this->_reason = $reason;

            $this->addNewAmend($this->_citizenID, $this->_reason);

        }

        public function addAmendSelectMenu()
        {

            foreach ($this->returnAllCityEntries() as $citizen){
                print "<option name='citizenID' value='{$citizen['id']}'>{$citizen['nom']} {$citizen['prenom']}</option>";
            }

        }

    }

?>