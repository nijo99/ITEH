<?php
// connect to db




include "dbEmisije.php";
$db = new Dbe();

$result = $db->connect()->query("SELECT Naziv, Vreme, 
                                CASE WHEN RadniDan='1' 
                                    THEN 'DA' 
                                    ELSE 'NE'
                                END AS RadniDan
 FROM emisija ORDER BY Vreme");
?>

<?php while ($data = $result->fetch_assoc()): ?>

    <tr>
        <td><?php echo $data['Naziv'] ?></td>
        <td><?php echo $data['Vreme'] ?></td>
        <td><?php echo $data['RadniDan'] ?></td>
    </tr>
<?php endwhile; ?>
