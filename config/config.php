<?php


class Config{
    private $HOST="localhost";
    private $USERNAME="root";
    private $PASSWRD="root";
    private $DB_NAME="php_my_admin";
 public $conn;
public function connect(){
  $this->conn=  mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWRD,$this->DB_NAME);
  return $this->conn;

}
public function insert($name, $age, $course){
  $this->connect();
  $query="INSERT INTO students(name,age,course)VALUES('$name',$age,'$course');";
  $res= mysqli_query($this->conn,$query);
return $res;
}

public function fetch_all_record(){
  $this->connect();
  $query="SELECT * FROM students";
  $res= mysqli_query($this->conn,$query);
  return $res;
}

public function delete_record($id){
  $this->connect();
  $query="DELETE FROM students WHERE id=$id";
  $res=mysqli_query($this->conn,$query);
  return $res;
}

public function fetch_single_student($id){
  $this->connect();
  $query="SELECT * FROM students WHERE id=$id";
  $res= mysqli_query($this->conn,$query);
  return $res;
}

public function update($name, $age, $course,$id){
  $this->connect();
  $query="UPDATE students SET name='$name',age=$age,course='$course' WHERE id=$id;";
  $res= mysqli_query($this->conn,$query);
return $res;
}

}

?>