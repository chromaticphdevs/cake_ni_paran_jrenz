<?php

    class Database{


        protected $dbhost = DBHOST;
        protected $dbuser = DBUSER;
        protected $dbpass = DBPASS;
        protected $dbname = DBNAME;


        protected $dbh;//database handler
        protected $stmt; //holds the stamement;
        protected $errors = [];//holds the database errors;

        public function __construct(){
            //create dsn
            $dsn = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname;
            //set database options

            $options = [
                PDO::ATTR_PERSISTENT => true , 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            //create PDO INSTANCE
            try{
                $this->dbh = new PDO($dsn , $this->dbuser , $this->dbpass , $options);
            }catch(PDOException $e){
                $this->errors = $e->getMessage();

                die('Error connecting via database'.$this->errors);
            }
        }

        //create query
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }
        //Bind Values
        public function bind($param , $value , $type = null){
            if(is_null($type)) {
                switch(true){
                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_INT;
                }
            }
        }
        //execute statement
        public function execute(){
            return $this->stmt->execute();
        }
        public function lastInsertId()
        {
            return $this->dbh->lastInsertId();
        }

        public function insert()
        {
            $this->stmt->execute();
            return $this->dbh->lastInsertId();
        }

        public function update()
        {
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        //get result set
        public function resultSet($fetch_type = 'OBJ'){
            $this->execute();

            switch(strtoupper($fetch_type))
            {
                case 'OBJ':
                    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
                break;
                case 'ARR':
                    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                break;

                default:
                return $this->stmt->fetchAll(PDO::FETCH_OBJ);
            }
            
        }
        //get result as single
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }


        public function multiple($table_name , $fields = array() , $value)
        {
            
        }

        public function errors()
        {
            return $this->errors;
        }
    }