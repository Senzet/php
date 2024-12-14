<?php
include ("connect.php");
class data_user
{
    public function login($username, $password) {
        global $conn;
        $select = "SELECT * FROM username WHERE username= '$username' AND pass = '$password'";
        $run = mysqli_query($conn, $select);
        $count = mysqli_num_rows($run); // Đếm số dòng trả về
        return $count; // Trả về số lượng dòng
    }
    public function select(){
        global $conn;
        $sql = "SELECT*FROM username";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
   
    public function sl_username($name){
        global $conn;
        $sql = "SELECT*FROM username where username = '$name'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_account($name,$email,$pass){
        global $conn;
        $sql = "INSERT INTO username(username,email,pass)
                values('$name','$email','$pass')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
   
    public function update_pass($name, $newpass){
        global $conn;
        $sql = " UPDATE username  SET pass = '$newpass' WHERE username = '$name' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_profile($username, $email, $address, $gender){
        global $conn;
        $sql = "UPDATE username
                SET email = '$email', address = '$address',  gender = '$gender' 
                WHERE username = '$username'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    public function update_profile_id($id, $email, $address, $gender,$pass ){
        global $conn;
        $sql = "UPDATE username
                SET email = '$email',  address = '$address', gender = '$gender', pass = '$pass'
                WHERE uid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_user($id){
        global $conn;
        $sql = "delete from username
                WHERE uid = '$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}
class data_admin
{
    public function admin_log ($username ,$password)
    {
        global $conn;
        $select = "select * from admin where username= '$username' and pass = '$password'";
        $run = mysqli_query($conn,$select);
       return $run;
    }
    public function sl_id($id){
        global $conn;
        $sql = "SELECT * FROM admin where uid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    
}
?>