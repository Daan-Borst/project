<script>
var songslist = [];
var selected = "";

</script>
<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/controllers/getsongs.php");
$allsongs = getsongs(); 
foreach($allsongs as $als)
{
    $name = $als['songname'];
    $author = $als['author'];
    $genre = $als['genre'];
    $description = $als['description'];
    $image = $als['image'];
    $upload = $als['upload'];
    $uploadid = $als['uploaded_by'];
    $songid = $als['id'];

?>
<div class="nummer" style="background: black center/100% no-repeat; background-size: auto% 100%;">
        <button id="button<?php echo $uploadid.$songid;?>" onclick="respond()" class="ppriority playbutton"></button>
        <div class="imgcontainer"><img class="imgcontent" src="<?php echo $image;?>"></div>
        <?php echo "<h6 style='color:white;'>".$name."</h6>";?>
        <script> 
        var playsong<?php echo $uploadid.$songid;?> = "<?php echo $upload;?>";
        songslist.push("button<?php echo $uploadid.$songid;?>");
        </script>

        <script>
        $('#button<?php echo $uploadid.$songid;?>').click(function(){
        $('#sourcecontroll').attr('src', playsong<?php echo $uploadid.$songid;?>);

        var upload<?php echo $uploadid.$songid;?> = "<?php echo $upload;?>";
        var sliced<?php echo $uploadid.$songid;?> = upload<?php echo $uploadid.$songid;?>.slice(-4);
        var img<?php echo $uploadid.$songid?> = "<?php echo $image;?>";
        var songname<?php echo $uploadid.$songid?> = "<?php echo $name?>";
        var author<?php echo $uploadid.$songid?> = "<?php echo $author?>";

        
        if(sliced<?php echo $uploadid.$songid;?> == ".mp3"){
            var type<?php echo $uploadid.$songid;?> = "audio/mpeg";
        } else if(sliced<?php echo $uploadid.$songid;?> == ".ogg"){
            var type<?php echo $uploadid.$songid;?> = "audio/ogg";
        } else if(sliced<?php echo $uploadid.$songid;?> == ".wav"){
            var type<?php echo $uploadid.$songid;?> = "audio/wav";
        }
        $('#audioimg').attr('src', img<?php echo $uploadid.$songid;?>);
        $('#sourcecontroll').attr('type', type<?php echo $uploadid.$songid;?>);
        $('#audiocontrol').load();
        $('#audiocontrol')[0].play();
        $('#pause').attr('class', 'none far fa-pause-circle');
        $('#pause').attr('onclick', 'pause(1)');
        
        document.getElementById('songname').innerHTML = songname<?php echo $uploadid.$songid?>;
        document.getElementById('author').innerHTML = author<?php echo $uploadid.$songid?>;
        selected = "button<?php echo $uploadid.$songid;?>"
        
        });
    </script>
</div>
<?php
}?>