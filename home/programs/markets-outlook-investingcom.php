<?php
#------------------------------------------------------------------------------------------------------------

include("./global-objects.php");
include("./simple-html-dom.php");

#------------------------------------------------------------------------------------------------------------

$page_title         = "Markets Outlook";
$apps_area          = "fn";

$url_cbrates          = 'https://www.investing.com/central-banks/';
$url_bonds            = 'https://www.investing.com/rates-bonds/';
$url_indices          = 'https://www.investing.com/indices/major-indices/';
$url_commodities      = 'https://www.investing.com/commodities/';

$url_wdg_currencies   = 'https://www.widgets.investing.com/live-currency-cross-rates?theme=darkTheme&cols=last,change,changePerc&pairs=PAIRS';
$url_wdg_commodities  = 'https://www.widgets.investing.com/live-commodities?theme=darkTheme&cols=last,change,changePerc&pairs=PAIRS';
$url_wdg_indicies     = 'https://www.widgets.investing.com/live-indices?theme=darkTheme&cols=last,change,changePerc&pairs=PAIRS';

$url_bonds_us         = 'https://www.investing.com/rates-bonds/usa-government-bonds?maturity_from=40&maturity_to=290';
$url_bonds_de         = 'https://www.investing.com/rates-bonds/germany-government-bonds?maturity_from=40&maturity_to=290';
$url_bonds_sw         = 'https://www.investing.com/rates-bonds/switzerland-government-bonds?maturity_from=10&maturity_to=310';
$url_bonds_uk         = 'https://www.investing.com/rates-bonds/uk-government-bonds?maturity_from=40&maturity_to=310';

$array_currencies =
[
    ['EUR/USD'      ,   '1']
];

$array_cbrates =
[
    'FED'
  , 'ECB'
  , 'BOE'
#  , 'SNB'
];

$array_indices =
[
    ['S&P 500'      ,   '166']
  , ['DAX'          ,   '172']
  , ['S&P 500 VIX'  , '44336']
  , ['FTSE 100'     ,    '27']
#  , ['SMI'          ,   '176']
];

#  , ['STOXX 600'    , '40823']

$array_commodities =
[
    ['Brent Oil'    , '8849']
  , ['Crude Oil WTI', '8833']
  , ['Gold'         , '8830']
  , ['Silver'       , '8836']
];

$array_bonds_us =
[
    'U.S. 2Y'
  , 'U.S. 10Y'
  , 'U.S. 30Y'
];

$array_bonds_de =
[
    'Germany 2Y'
  , 'Germany 10Y'
  , 'Germany 30Y'
];

$array_bonds_sw =
[
    'Switzerland 2Y'
  , 'Switzerland 10Y'
  , 'Switzerland 30Y'
];

$array_bonds_uk =
[
    'U.K. 2Y'
  , 'U.K. 10Y'
  , 'U.K. 30Y'
];

#------------------------------------------------------------------------------------------------------------

$template_html    = "../{$dir_templates}/global_template.html";

#------------------------------------------------------------------------------------------------------------

function get_items(&$items_array, $url_link_template)
{
  $strPairs = '';

  for ($item_counterer = 0; $item_counterer < count($items_array); $item_counterer++)
  {
    $strPairs .= $items_array[$item_counterer][1] . ",";
  }

  $strPairs = rtrim($strPairs, ",");
  $url_link = str_replace("PAIRS", $strPairs, $url_link_template);

  $url_content = get_url($url_link);
  $html_objects = str_get_html($url_content);
  $output_content = "<table>\n";

  foreach($items_array as $item_entry)
  {
    foreach($html_objects->find('article[id^=pair]') as $html_objects_block)
    {
      $item_name = $html_objects_block->find("div[class*=js-col-pair_name] a", 0)->innertext ?? "";
      if ($item_entry[0] == $item_name)
      {
        $matches_array = array();
        $return_value = preg_match("/<article id=\"pair_(.*)\">/iU", $html_objects_block, $matches_array);
        $item_number = $matches_array[1];
        unset($matches_array);

        $item_link    = $html_objects_block->find("a", 0)->href;
        $item_bid     = $html_objects_block->find("div[class*=pid-{$item_number}-last]", 0)->innertext ?? "";
        $item_change  = $html_objects_block->find("div[class*=pid-{$item_number}-pc]", 0)->innertext   ?? "";
        $item_percent = $html_objects_block->find("div[class*=pid-{$item_number}-pcp]", 0)->innertext  ?? "";
        $item_color   = $html_objects_block->find("div[class*=pid-{$item_number}-pc]");

        $item_link_exploded = explode('?', $item_link);
        $item_link = $item_link_exploded[0];

        $matches_array = array();
        $return_value = preg_match("/(\w*)Font/iU", $item_color[0], $matches_array);
        $item_color_name = $matches_array[1];
        unset($matches_array);

        $output_content .= "<tr>";
        $output_content .= "<td>{$item_name}</td>";
        $output_content .= "<td class='right'>{$item_bid}</td>";
        $output_content .= "<td class='{$item_color_name} right'>{$item_change}</td>";
        $output_content .= "<td class='{$item_color_name} right'>{$item_percent}</td>";
        $output_content .= "</tr>\n";

      }
    }
  }

  $html_objects->clear();
  unset($html_objects);

  $output_content .= "</table>\n";
  return $output_content;
}

#------------------------------------------------------------------------------------------------------------

function get_cbrates(&$items_array, $url_link)
{
  $url_content = get_url($url_link);
  $html_objects = str_get_html($url_content);

  $output_content = "<table>\n";

  foreach($items_array as $item_entry)
  {
    foreach($html_objects->find('tr') as $html_objects_block)
    {
      $item_name = $html_objects_block->find("span[class=dirLtr]", 0)->innertext ?? "";
      $item_name = preg_replace("/\(|\)/is", "", $item_name);

      if ($item_entry == $item_name)
      {
        $matches_array = array();
        $return_value = preg_match("/<span class=\"dirLtr\">(.*)<\/span><\/td>(.*)<td>(.*)<\/td>(.*)<td>(.*)<\/td>(.*)<td>(.*)<\/td>/iU", $html_objects_block, $matches_array);
        $strRatePct  = $matches_array[3];
        $strDateNext = $matches_array[5];
        $strDateTmp  = $matches_array[7];
        unset($matches_array);

        $strDateNext = date('d.m.y', strtotime($strDateNext));
        $strDateTmp = preg_replace("/\)/is", "", $strDateTmp);
        list($strDateLast, $strRateChange) = explode('(', $strDateTmp);
        $strDateLast = date('d.m.y', strtotime($strDateLast));

        $strRateChange = preg_replace("/bp/is", "", $strRateChange);

        $output_content .= "<tr>";
        $output_content .= "<td>{$item_name}</td>";
        $output_content .= "<td class='right'>{$strRatePct}</td>";
        $output_content .= "<td class='right'>{$strDateNext}</td>";
        $output_content .= "<td class='right'>{$strDateLast}</td>";
        $output_content .= "<td class='right'>{$strRateChange}</td>";
        $output_content .= "</tr>\n";

        $output_content .= "</tr>\n";
      }
    }
  }

  $html_objects->clear();
  unset($html_objects);

  $output_content .= "</table>\n";
  return $output_content;
}

#------------------------------------------------------------------------------------------------------------

function get_bonds(&$items_array, $url_link)
{
  $url_content = get_url($url_link);
  $html_objects = str_get_html($url_content);
  $output_content = "";

  foreach ($items_array as $item_entry)
  {
    foreach ($html_objects->find('tr[id^=pair]') as $html_objects_block)
    {
      $item_name = $html_objects_block->find("td[class*=plusIconTd] a", 0)->innertext ?? "";

      if ($item_entry == $item_name)
      {
        $matches_array = array();
        $return_value = preg_match("/<td class=\"pid-(.*)-/iU", $html_objects_block, $matches_array);
        $item_number = $matches_array[1];
        unset($matches_array);

        $item_last      = $html_objects_block->find("td[class*=pid-{$item_number}-last]", 0)->innertext ?? "";
        $item_change    = $html_objects_block->find("td[class*=pid-{$item_number}-pc]", 0)->innertext   ?? "";
        $item_percent   = $html_objects_block->find("td[class*=pid-{$item_number}-pcp]", 0)->innertext  ?? "";
        $item_color     = $html_objects_block->find("td[class*=pid-{$item_number}-pc]");

        $matches_array = array();
        $return_value = preg_match("/(\w*)Font/iU", $item_color[0], $matches_array);
        $item_color_name = $matches_array[1];
        unset($matches_array);

        $output_content .= "<tr>";
        $output_content .= "<td>{$item_name}</td>";
        $output_content .= "<td class='right'>{$item_last}</td>";
        $output_content .= "<td class='{$item_color_name} right'>{$item_change}</td>";
        $output_content .= "<td class='{$item_color_name} right'>{$item_percent}</td>";
        $output_content .= "</tr>\n";
      }
    }
  }

  $html_objects->clear();
  unset($html_objects);

  return $output_content;
}

#------------------------------------------------------------------------------------------------------------

#date_default_timezone_set('Europe/Sofia');
#$time_current =  date('D M d, Y H:i:s') . ' EET';

date_default_timezone_set('UTC');
$time_current =  date('D M d, Y H:i:s') . ' UTC';

$page_content  = "<h1>{$page_title}</h1>\n";
$page_content .= "<h2>{$time_current}</h2>\n";

#$page_content = get_items($array_currencies, $page_content);

$page_content .= "<h3><a href='{$url_cbrates }' target='_blank' rel='noreferrer'>Central Banks Rates</a></h3>\n";
$page_content .= get_cbrates($array_cbrates, $url_cbrates);
$page_content = preg_replace("/0\.00\%-/is", "", $page_content);
$page_content = preg_replace("/(\d\d)\/(\d\d)\/(\d\d)/is", "$2/$1/$3", $page_content);


$page_content .= "<h3><a href='{$url_bonds}' target='_blank' rel='noreferrer'>Bonds</a></h3>\n";
$page_content .= "<table>\n";
$page_content .= get_bonds($array_bonds_us, $url_bonds_us);
$page_content .= get_bonds($array_bonds_de, $url_bonds_de);
$page_content .= get_bonds($array_bonds_uk, $url_bonds_uk);
$page_content .= "</table>\n";
$page_content = preg_replace("/Germany /is", "DE ", $page_content);

$page_content .= "<h3><a href='{$url_indices}' target='_blank' rel='noreferrer'>Indices</a></h3>\n";
$page_content .= get_items($array_indices, $url_wdg_indicies);
$page_content = preg_replace("/S&P 500 VIX/is", "VIX", $page_content);

$page_content .= "<h3><a href='{$url_commodities}' target='_blank' rel='noreferrer'>Commodities</a></h3>\n";
$page_content .= get_items($array_commodities, $url_wdg_commodities);
$page_content = preg_replace("/ WTI/is", "", $page_content);

#------------------------------------------------------------------------------------------------------------

$page_html = get_file_template($template_html);

#----------------------------------------------------------------------------------------------------

eval("\$page_content = \"{$page_content}\";");
eval("\$page_html = \"{$page_html}\";");
echo $page_html;

#------------------------------------------------------------------------------------------------------------
?>
