<?php 
$T1_RESP=$_GET['t1_response']; 
$T2_RESP=$_GET['t2_response']; 
$T3_RESP=$_GET['t3_response']; 
$T1_RT=$_GET['t1_rt']; 
$T2_RT=$_GET['t2_rt']; 
$T3_RT=$_GET['t3_rt']; 
$ans = array($T1_RESP,$T2_RESP,$T3_RESP);
$rt = array($T1_RT,$T2_RT,$T3_RT);
$corAns = array("diff", "diff", "same");
$AC = 0;

for ($i=0;$i<count($corAns);$i++){
    if ($ans[$i] == $corAns[$i]){
        $AC++;
    }
}
$ACC = round($AC*100/count($corAns));
$ART = array_sum($rt)/count($rt);

echo "Your accuracy is ",$ACC,"%<br>",
    "Your average response time is ",$ART,"ms";
exec("echo $ACC, $ART >> data.csv");  // append to data.txt


// Create a new database, if the file doesn't exist and open it for reading/writing.
// The extension of the file is arbitrary.
$db = new SQLite3('results.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);


// Create a table.

$db->query('CREATE TABLE IF NOT EXISTS "data" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "T1_RESP" REAL,
    "T1_RT" REAL,
    "T2_RESP" REAL,
    "T2_RT" REAL,
    "T3_RESP" REAL,
    "T3_RT" REAL,
    "ACC" REAL,
    "ART" REAL
)');


$db->exec('BEGIN');
$db->query("INSERT INTO 'data' ('T1_RESP', 'T1_RT', 'T2_RESP','T2_RT','T3_RESP','T3_RT','ACC','ART') 
    VALUES ('$T1_RESP','$T1_RT','$T2_RESP','$T2_RT','$T3_RESP','$T3_RT','$ACC','$ART')");
$db->exec('COMMIT');

$db->close();



?>