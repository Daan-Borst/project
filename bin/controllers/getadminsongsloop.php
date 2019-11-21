<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/controllers/getadminsongs.php");
$allsongs = getsongs(); 
foreach($allsongs as $als)
{
    $upl = $als['uploaded_by'];
    $name = $als['songname'];
    $img = $als['image'];
    $author = $als['author'];
    $genre = $als['genre'];
    $desc = $als['description'];
    $upload = $als['upload'];
    $id = $als['id'];
    $upl_date = $als['upload_date'];

?>
<tr>
    <td><?php echo $upl;?></td>
    <td><?php echo $name;?></td> 
    <td><img src="<?php echo $img;?>" width="100px" height="auto"></td>
    <td><?php echo $author;?></td>
    <td><?php echo $genre;?></td>
    <td><?php echo $desc;?></td>
    <td><a href="<?php echo $upload;?>">Link</a></td>
    <td><?php echo $id;?></td>
    <td><?php echo $upl_date;?></td>
    <td><a href="/admin/deleteplaylist?id=<?php echo $id;?>">Delete</a></td>
</tr>
<?php
}?>
