<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/controllers/getusers.php");
$allusers = getusers(); 
foreach($allusers as $als)
{
    $name = $als['name'];
    $email = $als['email'];
    $birth = $als['birth'];
    $id = $als['id'];
    $date = $als['reg_date'];

?>
<tr>
    <td><?php echo $name;?></td>
    <td><?php echo $email;?></td> 
    <td><?php echo $birth;?></td>
    <td><?php echo $id;?></td>
    <td><?php echo $date;?></td>
    <td><a href="/admin/deleteuser?id=<?php echo $id;?>">Delete</a></td>
</tr>
<?php
}?>
