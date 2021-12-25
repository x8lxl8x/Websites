<?php
#---------------------------------------------------------------------------------------------------

include("./global-objects.php");

#---------------------------------------------------------------------------------------------------

$app_title      = $_GET['varAppTitle'     ] ?? "";
$app_area       = $_GET['varAppArea'      ] ?? "";
$app_dir        = $_GET['varAppDir'       ] ?? "";
$file_name      = $_GET['varFileName'     ] ?? "";

$app_name       = 'verb-forms';
$audio_on     = "";

#---------------------------------------------------------------------------------------------------

$file_template = "../{$dir_templates}/{$app_name}.html";
$page_title = rawurldecode($file_name);
$file_path = "../{$dir_apps}/{$app_area}/{$app_dir}/{$dir_texts}/{$file_name}.{$ext_text}";

$local_css = "<link rel='stylesheet' type='text/css' media='screen' href='../{$dir_apps}/{$app_area}/{$app_dir}/styles/local.css'>";

$page_content = file_get_contents($file_path);
$page_content = get_markdown($page_content);

$page_html = get_file_template($file_template);

eval("\$page_content = \"{$page_content}\";");
eval("\$page_html = \"{$page_html}\";");
echo $page_html;

#---------------------------------------------------------------------------------------------------
?>
