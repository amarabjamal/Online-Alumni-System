<?php
if(isset($_GET["id"]) && $_GET["condition"]=='approve')
{
    $id = $_GET['id'];
    try {
        // begin a transaction
        $conn->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "update users set status_id=2 where id=$id";
        $conn->query($sql);//run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        echo "shit approved";
        $conn->commit();
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $conn->rollback();
      }

    
}

if(isset($_GET["id"]) && $_GET["condition"]=='deny')
{
    $id = $_GET['id'];
    try {
        // begin a transaction
        $conn->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "update users set status_id=3 where id=$id";
        $conn->query($sql);//run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        echo "shit denied";
        $conn->commit();
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $conn->rollback();
      }

    
}
?>