<?php
$title=urlencode('Title of Your iFrame Tab');
$url=urlencode('http://www.visitayucatan.com');
$summary=urlencode('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');
$image=urlencode('http://www.visitayucatan.com/imagenes/hoteles/2P5zfn0o2E_10785218.jpg.1024x0.jpg');
?>

<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">Insert text or an image here.</a>