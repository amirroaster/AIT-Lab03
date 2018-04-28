<style>
<?php include 'styles.css'; ?>
</style>

<?php
include 'connector.php';

$connectorObject = new Connector;
$connectorObject->connect('root', 'root', 'test', 'localhost', 8889);
$connectorObject->chooseDB('ait');
$connectorObject->queryDB("SELECT * FROM users");
$connectorObject->close();
