 <html>
<head>
<title>Perkalian Matriks</title>
</head>
<body>
    <h2 align="center">Perkalian Matriks Ordo 3x3</h2>
    <P>Kunjungi spirit221.blogspot.com</p>
    <?php
	$A = array();
    $A[0] = $_POST['A11'];
    $A[1] = $_POST['A12'];
    $A[2] = $_POST['A13'];
    $A[3] = $_POST['A21'];
    $A[4] = $_POST['A22'];
    $A[5] = $_POST['A23'];
    $A[6] = $_POST['A31'];
    $A[7] = $_POST['A32'];
    $A[8] = $_POST['A33'];
	
	//menjumlahkan matrik a
	$TA = array();
    $TA[0] = $A[0]+$A[3]+$A[6];
	$TA[1] = $A[1]+$A[4]+$A[7];
	$TA[2] = $A[2]+$A[5]+$A[8];

	//matrik b
    $B = array();
    $B[0] = $_POST['B11'];
    $B[1] = $_POST['B12'];
    $B[2] = $_POST['B13'];
    $B[3] = $_POST['B21'];
    $B[4] = $_POST['B22'];
    $B[5] = $_POST['B23'];
    $B[6] = $_POST['B31'];
    $B[7] = $_POST['B32'];
    $B[8] = $_POST['B33'];
	
	//menjumlahkan matrik b
	$TB = array();
    $TB[0] = $B[0]+$B[4]+$B[6];
	$TB[1] = $B[1]+$B[4]+$B[7];
	$TB[2] = $B[2]+$B[5]+$B[8];
	
	//mencari konsistensi antara matrik a dan matrik b
	$C = array();
    $C[0] = (($A[0]*$TB[0])+($A[1]*$TB[1])+($A[2]*$TB[2]))/$TB[0];
	$C[1] = (($A[3]*$TB[0])+($A[4]*$TB[1])+($A[5]*$TB[2]))/$TB[1];
	$C[2] = (($A[6]*$TB[0])+($A[7]*$TB[1])+($A[8]*$TB[2]))/$TB[2];
    ?>
<table border="1" align="left" width="200" padding-right="20">
<?php
    echo "<tr>";
    for($t=0; $t<=2; $t+=1)
    {
        echo "<td>$A[$t]</td>";
    }
    echo "</tr><tr>";
    for($t=3; $t<=5; $t+=1)
    {
         echo "<td>$A[$t]</td>";
    }
    echo "</tr><tr>";
    for($t=6; $t<=8; $t+=1)
    {
         echo "<td>$A[$t]</td>";
    }
    echo "</tr><tr>";
    for($tmb=0; $tmb<=2; $tmb+=1)
    {
        echo "<td>$TA[$tmb]</td>";
    }
    echo "</tr>";
    ?>
</table>

<table border="1" align="left" width="200" >
<?php
    echo "<tr>";
    for($t=0; $t<=2; $t+=1)
    {
        echo "<td>$B[$t]</td>";
    }
    echo "</tr><tr>";
    for($t=3; $t<=5; $t+=1)
    {
         echo "<td>$B[$t]</td>";
    }
    echo "</tr><tr>";
    for($t=6; $t<=8; $t+=1)
    {
         echo "<td>$B[$t]</td>";
    }
    echo "</tr><tr>";
    for($tmb=0; $tmb<=2; $tmb+=1)
    {
        echo "<td>$TB[$tmb]</td>";
    }
	echo "</tr><tr>";
    for($cc=0; $cc<=2; $cc+=1)
    {
        echo "<td>$C[$cc]</td>";
    }
    echo "</tr>";
    ?>
</table>
</body>
</html>
