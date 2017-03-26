 <html>
<head>
<title>Pencarian Sistem Pendukung Keputusan Menggunakan Metode AHP Sederhana</title>
</head>
<body>
    <h2 align="center">Pencarian Sistem Pendukung Keputusan Menggunakan Metode AHP Sederhana</h2>
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
	
	//Mencari bobot Prioritas Kriteria
	$BPK = array();
    $BPK[0] = $A[0]/$TA[0];
	$BPK[1] = $A[1]/$TA[1];
	$BPK[2] = $A[2]/$TA[2];
	$BPK[3] = $A[3]/$TA[0];
	$BPK[4] = $A[4]/$TA[1];
	$BPK[5] = $A[5]/$TA[2];
	$BPK[6] = $A[6]/$TA[0];
	$BPK[7] = $A[7]/$TA[1];
	$BPK[8] = $A[8]/$TA[2];
	
	//Mencari bobot Prioritas Kriteria 2
	$BPK2 = array();
    $BPK2[0] = (($BPK[0]+$BPK[1]+$BPK[2]))/3;
	$BPK2[1] = (($BPK[3]+$BPK[4]+$BPK[5]))/3;
	$BPK2[2] = (($BPK[6]+$BPK[7]+$BPK[8]))/3;
	
	//mencari konsistensi antara matrik a dan matrik b
	$C = array();
    $C[0] = (($A[0]*$BPK2[0])+($A[1]*$BPK2[1])+($A[2]*$BPK2[2]))/$BPK2[0];
	$C[1] = (($A[3]*$BPK2[0])+($A[4]*$BPK2[1])+($A[5]*$BPK2[2]))/$BPK2[1];
	$C[2] = (($A[6]*$BPK2[0])+($A[7]*$BPK2[1])+($A[8]*$BPK2[2]))/$BPK2[2];
	
	//mencari CI
	$ci1= $BPK2[0]/$C[0];
	$ci2= $BPK2[1]/$C[1];
	$ci3= $BPK2[2]/$C[2];
	$ci4= (($ci1+$ci2+$ci3))/3;
	$ci5= ($ci4-3)/(3-1);
	
	//mencari RI
	$RI= $ci5/0.58;
    ?>
	
	<p>Matriks Perbandingan Kriteria</p>
<table border="1" align="left" width="600">
<?php
	echo "<th>MPK</th>";
	echo "<th>C1</th>";
	echo "<th>C2</th>";
	echo "<th>C3</th>";
    echo "<tr>";
	echo "<th>C1</th>";
    for($t=0; $t<=2; $t+=1)
    {
        echo "<td>$A[$t]</td>";
    }
    echo "</tr><tr>";
	echo "<th>C2</th>";
    for($t=3; $t<=5; $t+=1)
    {
         echo "<td>$A[$t]</td>";
    }
    echo "</tr><tr>";
	echo "<th>C3</th>";
    for($t=6; $t<=8; $t+=1)
    {
         echo "<td>$A[$t]</td>";
    }
    echo "</tr><tr>";
	echo "<th>Jumlah</th>";
    for($tmb=0; $tmb<=2; $tmb+=1)
    {
        echo "<td>$TA[$tmb]</td>";
    }
    echo "</tr><tr>";
    echo "</tr>";
    ?>
</table>
<br /><br /><br /><br /><br /><br /><br /><br />
	<p>Matriks Bobot Prioritas Kriteria</p>
<table border="1" align="left" width="600">
<?php
	echo "<th>MBPK</th>";
	echo "<th>C1</th>";
	echo "<th>C2</th>";
	echo "<th>C3</th>";
    echo "<tr>";
	echo "<th>C1</th>";
    for($bpkk=0; $bpkk<=2; $bpkk+=1)
    {
        echo "<td>$BPK[$bpkk]</td>";
    }
    echo "</tr><tr>";
	echo "<th>C2</th>";
    for($bpkk=3; $bpkk<=5; $bpkk+=1)
    {
         echo "<td>$BPK[$bpkk]</td>";
    }
    echo "</tr><tr>";
	echo "<th>C3</th>";
    for($bpkk=6; $bpkk<=8; $bpkk+=1)
    {
          echo "<td>$BPK[$bpkk]</td>";
    }
    echo "</tr><tr>";
	echo "<th>Bobot P</th>";
    for($tmbbb=0; $tmbbb<=2; $tmbbb+=1)
    {
        echo "<td>$BPK2[$tmbbb]</td>";
    }
    echo "</tr><tr>";
    echo "</tr>";
    ?>
</table>
<br /><br /><br /><br /><br /><br /><br /><br />
<p>Matriks Konsistensi Kriteria</p>
<table border="1" align="left" width="600">
<?php
	echo "<th>MKK</th>";
	echo "<th>C1</th>";
	echo "<th>C2</th>";
	echo "<th>C3</th>";
    echo "<tr>";
	echo "<th>C1</th>";
    for($bpkk=0; $bpkk<=2; $bpkk+=1)
    {
        echo "<td>$BPK[$bpkk]</td>";
    }
    echo "</tr><tr>";
	echo "<th>C2</th>";
    for($bpkk=3; $bpkk<=5; $bpkk+=1)
    {
         echo "<td>$BPK[$bpkk]</td>";
    }
    echo "</tr><tr>";
	echo "<th>C3</th>";
    for($bpkk=6; $bpkk<=8; $bpkk+=1)
    {
          echo "<td>$BPK[$bpkk]</td>";
    }
    echo "</tr><tr>";
	echo "<th>Bobot</th>";
    for($tmbbbb=0; $tmbbbb<=2; $tmbbbb+=1)
    {
        echo "<td>$C[$tmbbbb]</td>";
    }
    echo "</tr><tr>";
    echo "</tr>";
    ?>
</table>
<br /><br /><br /><br /><br /><br /><br /><br />
<p>Pencarian Ordo Matrik</p>
<table border="1" align="left" width="600">
<?php
    echo "<tr>";
	echo "<th>Ordo matriks</th>";
    {
        echo "<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>";
    }
    echo "</tr><tr>";
	echo "<th>Ratio Index</th>";
    {
         echo "<td>0</td><td>0</td><td>	0.58</td><td>0.9</td><td>1.12</td><td>1.24</td><td>1.32</td><td>1.41</td><td>1.46</td><td>1.49</td>";
    }
    echo "</tr>";
    ?>
</table>
<br /><br /><br /><br />
<?php
echo "Consistency Index: $ci5<br />";
echo "Ratio Index: 0.58<br />";
echo "Consistency Ratio: $RI<br />";
?>
<br /><br /><br /><br /><br /><br /><br /><br />
</body>
</html>
