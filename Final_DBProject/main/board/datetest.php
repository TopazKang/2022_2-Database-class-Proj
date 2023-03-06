<?php
$db = '
(DESCRIPTION=
    (ADDRESS_LIST=
        (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
        )
    (CONNECT_DATA=
    (SID=orcl)
    )
)';
$username = "DBA2022G2";
$password = "test1234";
$connect = oci_connect($username, $password, $db);

if (!$connect) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);

}

$query = "select * from tpbd order by ptime desc";
$result = oci_parse($connect, $query);
$success = oci_execute($result);
echo "ppp;";
echo "<table width='300' border='1' cellpadding='0' cellspacing='0'>\n";

while ($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    echo "pppa";
    $time1 = $row['ptime'];
    echo "$time1";
    foreach ($row as $item) {
        $time = $item['ptime'];
        echo "(pppv)";
        echo "<script>alert('$time');</script>";
    }
    echo "</tr>\n";
}
echo "</table>\n";

oci_free_statement($stid);
oci_close($connect);


?>