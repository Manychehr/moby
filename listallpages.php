<?php

function globall($pattern, $flags = 0)
{
    $files = [];
    $dirname = dirname($pattern);
    $dirs = glob($dirname . '/*', GLOB_ONLYDIR)?? [];
    foreach ($dirs as $dir) {
        echo "<li><a href=\"\">{$dir}</a><ol class=\"sublist\">";
        globall($dir . '/' . basename($pattern, $flags));
        echo "</ol></li>";
    }

    foreach (glob($pattern, $flags)?? [] as $item) {
        echo "<li><a href=\"\">{$item}</a></li>";
    }
}

?>

<style>
ol {
   counter-reset: li;
   list-style: none;
   color: #0F2240;
}
.list a {
   font-family: 'Roboto', sans-serif;
   display: block;
   text-decoration: none;
   padding: 5px;
   margin-bottom: 5px;
   background: #8BB4D2;
   border-radius: 5px;
   border: 2px solid #8BB4D2;
   color: #0F2240;
}
/* .list a:before {
   counter-increment: li;
   content: counters(li, ".") ". ";
   display: inline-block;
   margin-right: 5px;
   font-weight: bold;
} */
.sublist a {
   background-color: white;
   background-image: radial-gradient(#8BB4D2 .5px, rgba(255, 255, 255, 0) 1px);
   background-size: 6px 6px;
}
.sublist2 a {
   background: white;
}
</style>

<ol class="list">
    <?php globall('./*.html'); ?>
</ol>
