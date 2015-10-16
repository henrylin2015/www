<?php
/***
 *
 *this is tool connect mysql
*/
class SqlHelper{
     public $conn;
     private $db_host = "127.0.0.1";
     private $db_name = "test";
     private $db_user = "root";
     private $db_pwd  = "henry";
     private $db_port = "3306";
     private $db_charset = "utf8";
     public function __construct(){
                  $this->conn = mysqli_connect( $this->db_host ,$this->db_user ,$this->db_pwd );
                  if( !$this->conn ){
                       die( "mysql datatable error:".mysql_error(  ) );
                  }
                  mysqli_select_db( $this->db_name ,$this->conn );
                  mysqli_query("set names '".$this->db_charset."' ");
             }
     //execute dql sql
     public function execute_dql( $sql ){
                 $arr = array(  );
                 $res = mysqli_query( $sql,$this->conn ) or die( mysql_error(  ) );
                 while( $rows = mysqli_fetch_assoc( $res ) ){
                      $arr[  ] = $rows;
                 }
                 //mysql_free_result
                 mysqli_free_result( $res );
                 return $arr;
            }
     //execute dml sql
     public function execute_dml( $sql ){
                 $b = mysqli_query( $sql, $this->conn ) or die( mysql_error(  ) );
                 if( !$b ){
                      return 0; //error
                 }else{
                      if( mysqli_affected_rows( $this->conn ) > 0 ){
                           return 1; //success
                      }else{
                           return 2; //not affected
                      }
                 }
            }
     //close connect
     public function close_connect(  ){
                 if( !$this->conn )
                      mysqli_close( $this->conn );
            }
}