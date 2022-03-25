<?php

    namespace LSPD\App\Core\Database;

    class Database
    {

        /**
         * @var string Host used for the database connection
         */
        private $_host;

        /**
         * @var string Database used for the database connection
         */
        private $_database;

        /**
         * @var string Username used for the database connection
         */
        private $_username;

        /**
         * @var string Password used for the database connection
         */
        private $_password;

        /**
         * @var array Options used for the database connection
         */
        private $_options = [];

        private function startTransaction()
        {
            $this->_host = json_decode(file_get_contents('/etc/lspd/db.json'), true)['host'];
            $this->_database = json_decode(file_get_contents('/etc/lspd/db.json'), true)['database'];
            $this->_username = json_decode(file_get_contents('/etc/lspd/db.json'), true)['username'];
            $this->_password = json_decode(file_get_contents('/etc/lspd/db.json'), true)['password'];
            $this->_options = [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ];
        }

        private function endTransaction()
        {
            $this->_host = null;
            $this->_database = null;
            $this->_username = null;
            $this->_password = null;
            $this->_options = null;
        }

        public function Request(string $sql_req, array $sql_opt = null): \PDOStatement
        {
            $this->startTransaction();

            $dbh = new \PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_database . ';charset=UTF8', $this->_username, $this->_password, $this->_options);

            $r = $dbh->prepare($sql_req);
            $r->execute($sql_opt);

            $this->endTransaction();

            return $r;
        }
    }

?>