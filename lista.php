<div id="page-wrapper">
    <div id="page-inner">
<?php
include("baza.php");
include("userid.php");
$query = mysqli_query($connection,"SELECT * FROM logi WHERE user_id = $userId  ORDER BY id DESC;");

?>
        <h2> Historia Twoich logowań</h2>
<table border="1px black solid">
    <thead><td><b>Nr wpisu</b></td><td><b>Data i godzina logowania</b></td><td><b>Nazwa użytkownika</b></td><td><b>Przeglądarka, system operacyjny</b></td></thead>
    <?php while ($row = mysqli_fetch_array($query)){
        $usId = $row['user_id'];
        $query2 = mysqli_query($connection,"SELECT nazwa FROM uzytkownicy WHERE id=$usId;");
        if($query2){$row_min = mysqli_fetch_row($query2); }
        ?>
        <tr><td><?php echo $row['id']; ?> </td> <td><?php echo $row['godzina_data']; ?> </td><td><?php echo $row_min[0];?></td><td><?php echo $row['przegl_os']; ?></td>  </tr>
        <?php
    } ?>

</table>
</div>
    </div>