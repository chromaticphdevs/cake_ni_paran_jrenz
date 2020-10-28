<?php 

 	abstract class Base_model{

 		public function __construct(){

 			$this->db = new Database(DBVENDOR , DBHOST , DBNAME , DBUSER , DBPASS);
 		}
 	}