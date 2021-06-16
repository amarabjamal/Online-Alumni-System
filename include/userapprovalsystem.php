<?php
if(isset($_GET["id"]) && isset($_GET["condition"]) && $_GET["condition"]=='approve')
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
        $conn->commit();
        header("Location: approved.php?action=acc_approved");
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $conn->rollback();
      }

    
}

if(isset($_GET["id"]) && isset($_GET["condition"]) && $_GET["condition"]=='deny')
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
        $conn->commit();
        header("Location: denied.php?action=acc_denied");
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $conn->rollback();
      }

    
}
?>