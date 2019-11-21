<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/controllers/getadminplaylists.php");
$allplaylists = getplaylists(); 
foreach($allplaylists as $als)
{
    $upl = $als['id'];
    $img = $als['image'];
    $author = $als['author'];
    $genre = $als['genre'];
    $desc = $als['description'];
    $crt_date = $als['creation_date'];

?>
<tr>
    <td><?php echo $upl;?></td>
    <td><img src="<?php echo $img;?>" width="100px" height="auto"></td>
    <td><?php echo $author;?></td> 
    <td><?php echo $genre;?></td>
    <td><?php echo $desc;?></td>
    <td><?php echo $crt_date;?></td>
    <td><a href="/admin/deleteplaylist?id=<?php echo $upl;?>">Delete</a></td>
</tr>
<?php
}?>
