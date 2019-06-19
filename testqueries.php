<?php
include 'NewFile.php';

class TestQueries
{
    public $searchBarData;
}

$thisPage = new TestQueries();
?>


<html>
<body class='bodyBackground'>


<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<div style='height: 150px;'></div>
<div style='text-align: center;'>
<form method='post'>
	<input type='text' placeholder='search for part' name='search'> <input
		type='submit' value='Search' name='searchSubmit'>
</form>
</div>
<div style='text-align: center;'><?php
if (isset($_POST['searchSubmit'])) {
    
    $thisPage->searchBarData = preg_replace('(\s)', '', $_POST['search']);
    $query = "SELECT partNumber, description FROM partsmaster WHERE partNumber LIKE '%$thisPage->searchBarData%'";
    $result = mysqli_query(NewFile::establishConnection(), $query);
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>Part Number</th>";
        echo "<th>Description</th>";
        echo "</tr>";
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['partNumber'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    }
}
?></div>

<div style='height: 200px;'></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'HomeSecond.php';">Home Screen</button>
</div>
</body>
</html>