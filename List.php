<?php
include 'NewFile.php';

class pickList
{
}

function createList()
{
    if (isset($_POST['SubmitList'])) {
        $listPartNum = $_POST['PartNumber'];
        $listQty = $_POST['Quantity'];
        $listLine = $_POST['Line'];
        echo "<tr>";
        echo "<td>" . $listPartNum . "</td>";
        echo "<td>" . $listQty . "</td>";
        echo "<td>" . $listLine . "</td>";
        echo "</tr>";
    }
}
?>

<html>

<body style='background-color: gray;'>


<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<h1>Hine Inventory Application</h1>
<h2>Create Pick List</h2>

<div class='centering'>

	<form method='post'>
		<input type='text' name='PartNumber' placeholder="Part Number"> <input
			type='text' name='Quantity' placeholder='Quantity'> <input
			type='text' name='Line' placeholder='Line'> <input type='submit'
			name='SubmitList'>
	</form>
	<table>
		<tbody>
		<tr>
		<th>Part Number</th>
		<th>Quantity</th>
		<th>Line</th>
		</tr>
	<?php createList(); ?>
	</tbody>
	</table>
</div>

</body>


</html>