<?php
$db = new SQLite3("db_writeoff.db3");   // อ้างโดยสคริปต์ที่อยู๋ในโฟลเดอร์

$db->busyTimeout(10000);
// WAL mode has better control over concurrency.
// Source: https://www.sqlite.org/wal.html
$db->exec('PRAGMA journal_mode = wal;');


// ปลดปล่อย database
//$db->close();
//unset($db);

?>







