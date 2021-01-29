<?php
echo"<h2>".$title."</h2>";
echo"<div>".$text."</div>";
echo "<ul>";
foreach($cities as $c)
{
    echo "<li>".$c."</li>";
}
echo "</ul>";