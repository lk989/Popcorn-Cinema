<?php
    include 'db_connection.php';

    function fetch_all($table, $latest = false, $where  = null, $limit = null){
        $conn = OpenCon();
        $sql = "SELECT * FROM " . $table . ($where != null ? (" WHERE " . $where) : "") . ($latest == true ? " ORDER BY created_at" : "") . ($limit != null ? (" LIMIT " . $limit) : "");
        $result = $conn->query($sql);
        CloseCon($conn);
        return $result;
    }
?>