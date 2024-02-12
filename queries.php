<?php
    include 'db_connection.php';

    function fetch_all($table, $latest = false, $where  = null, $limit = null){
        $conn = OpenCon();
        $sql = "SELECT * FROM " . $table . ($where != null ? (" WHERE " . $where) : "") . ($latest == true ? " ORDER BY created_at" : "") . ($limit != null ? (" LIMIT " . $limit) : "");
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }
    function fetch($sql){
        $conn = OpenCon();
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }

    function fetch_user($condition){
        $conn = OpenCon();
        $sql = "SELECT * FROM user WHERE " . $condition;
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }

    function update($update, $id){
        $conn = OpenCon();
        $sql = "UPDATE user SET $update WHERE id = $id";
        echo $sql;
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }

    function create_user($username, $password, $email, $phone , $birthdate){
        $conn = OpenCon();
        $options =[
            'cost'=> 12
        ];
        $hashedPwd= password_hash($password,PASSWORD_BCRYPT,$options);
        $sql="INSERT INTO user (username, pwd, email, phone, birthdate) VALUES ('$username', '$hashedPwd', '$email', '$phone', '$birthdate')";
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }

    function delete($id){
        $conn = OpenCon();
        $sql="DELETE FROM user WHERE id = $id";
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }
?>