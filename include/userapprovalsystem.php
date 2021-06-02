<?php
if(isset($_GET["id"]) && $_GET["condition"]=='approve')
{
    $id = $_GET['id'];
    try {
        // begin a transaction
        $pdo->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "update user set userstatus='Approved' where userid=$id";
        $pdo->query($sql);//run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        echo "shit approved";
        $pdo->commit();
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $pdo->rollback();
      }

    
}

if(isset($_GET["id"]) && $_GET["condition"]=='deny')
{
    $id = $_GET['id'];
    try {
        // begin a transaction
        $pdo->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "update user set userstatus='Denied' where userid=$id";
        $pdo->query($sql);//run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        echo "shit denied";
        $pdo->commit();
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $pdo->rollback();
      }

    
}
?>