<?php
include './config/connection.php';
if(isset($_post['delete'])){
    $id = $_post['deleteid'];
    $deletedata = "DELETE FROM loginform WHERE id=$id;";
    $result=mysqli_query($conn,$deletedata);
    if($result){
        echo "deleted successfully";
    }else{
        die(mysqli_connect_error($conn));
    }
}
?>