<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

use \BITM\SEIP12\Slider;
use \BITM\SEIP12\Utility\Utility;

$filename = $_FILES['picture']['name']; // if you want to keep the name as is
$filename = uniqid() . "_" . $_FILES['picture']['name']; // if you want to keep the name as is
$target = $_FILES['picture']['tmp_name'];
$destination = $uploads . $filename;

$src = null;
if (upload($target, $destination)) {
    $src = $filename;
}

$alt = Utility::sanitize($_POST['alt']);
$title = Utility::sanitize($_POST['title']);
$caption = Utility::sanitize($_POST['caption']);

$slider = new Slider();
$slide =  $slider->prepare($src,$title, $caption, $alt);


$result = $slider->store($slide);

if($result){
    redirect("slider_index.php");
}

