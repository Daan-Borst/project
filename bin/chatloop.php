<?php
require($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
include($_SERVER['DOCUMENT_ROOT']."/bin/chatcontroller.php");
$messages = getmessages(); 
foreach($messages as $msg)
{
    $text = $msg['text'];
    $name = $msg['name'];
    $flagged = false;
    if (strpos($text, '<?php') !== false) {
        $text = 'Tried an PHP execution!';
        $flagged = true;
    }

?>
<div class="message" style="<?php if($flagged == true){echo "color:red;";} if($_SESSION['username'] == $name){echo "float:right;";}?>">
    <label class="name"><?php echo $name;?>:</label>
    <?php echo $text;?>
</div>
<?php
}?>