<?php

    namespace LSPD\App\Core\Database;

    require_once '/var/www/pierre/lspd/app/core/database/main.php';

    class Request extends \LSPD\App\Core\Database\Database
    {

        public function returnAllCityEntries()
        {

            return $this->Request(
                'SELECT * FROM cityEntries'
            )->fetchAll();

        }

        public function returnAllAmend()
        {

            return $this->Request(
                'SELECT * FROM cityAmend LEFT JOIN cityEntries ON cityAmend.entryID = cityEntries.id'
            )->fetchAll();

        }

        public function getCitizenInformation(int $citizenID)
        {

            return $this->Request(
                'SELECT * FROM cityEntries WHERE id = :id',
                array(
                    ':id' => $citizenID
                )
            )->fetch();

        }

        public function getAmendInformation(int $amendID)
        {

            return $this->Request(
                'SELECT * FROM cityAmend LEFT JOIN cityEntries ON cityAmend.entryID = cityEntries.id WHERE amendID = :amendID',
                array(
                    ':amendID' => $amendID
                )
            )->fetch();

        }

        public function addNewEntry(string $nom, string $prenom, string $birthdate, string $sex)
        {
            return $this->Request(
              'INSERT INTO cityEntries (nom, prenom, birthdate, sex) VALUES (:nom, :prenom, :birthdate, :sex)',
              array(
                  ':nom' => $nom,
                  ':prenom' => $prenom,
                  ':birthdate' => $birthdate,
                  ':sex' => strtoupper($sex)
              )
            );
        }

        public function addNewAmend(int $citizenID, string $reason)
        {

            return $this->Request(
                'INSERT INTO cityAmend (entryID, reason) VALUES (:entryID, :reason)',
                array(
                    ':entryID' => $citizenID,
                    ':reason' => $reason
                )
            );

        }

        public function checkAccount(string $username)
        {

            return $this->Request(
                'SELECT username FROM dashboardUsers WHERE username = :username',
                array(
                    ':username' => $username
                )
            )->rowCount();

        }

        public function getUserInfos(string $username)
        {

            return $this->Request(
                'SELECT * FROM dashboardUsers WHERE username = :username',
                array(
                    ':username' => $username
                )
            )->fetch();

        }

        public function addSessionLogs(string $username, string $ip, string $type, string $uri)
        {

            return $this->Request(
                'INSERT INTO sessionLogs (username, ip, type, uri) VALUES (:username, :ip, :type, :uri)',
                array(
                    ':username' => $username,
                    ':ip' => $_SERVER['REMOTE_ADDR'],
                    ':type' => $type,
                    ':uri' => $uri
                )
            );

        }

        public function createAccount(string $nom, string $prenom, string $username, string $password, string $perms)
        {

            return $this->Request(
                'INSERT INTO dashboardUsers (prenom, nom, username, password, token, perms) VALUES (:prenom, :nom, :username, :password, :token, :perms)',
                array(
                    ':prenom' => $prenom,
                    ':nom' => $nom,
                    ':username' => $username,
                    ':password' => $password,
                    ':token' => bin2hex(random_bytes(30)),
                    ':perms' => $perms
                )
            );

        }

    }

?>