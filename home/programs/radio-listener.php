<?php
#---------------------------------------------------------------------------------------------------

include("./global-objects.php");
include("./simple-html-dom.php");

#---------------------------------------------------------------------------------------------------

$app_title      = "Radio";
$apps_area      = "tc";

$dir_apps       = "apps";
$dir_area       = "tc";
$app_name       = "radio-listener";

$page_title     = $app_title;
$page_content   = "<h1>{$page_title}</h1>\n\n";

#---------------------------------------------------------------------------------------------------

# https://www.radio-uk.co.uk/

$array_news_en =
[
    ['Skynews'           , 'https://video.news.sky.com/snr/news/snrnews.mp3'                       ]
  , ['News Radio UK'     , 'http://s1.rss-streaming.co.uk:8008/stream'                             ]
  , ['LBC News'          , 'http://media-ice.musicradio.com/LBC1152'                               ]
  , ['LBC'               , 'https://media-ssl.musicradio.com/LBCUK'                                ]
  , ['Times Radio'       , 'https://timesradio.wireless.radio/stream'                              ]
  , ['Bloomberg'         , 'https://tunein.streamguys1.com/bloomberg991'                           ]
];

$array_news_fr =
[
    ['franceinfo'        , 'https://icecast.radiofrance.fr/franceinfo-midfi.mp3'                                               ]
  , ['RFI Monde'         , 'https://rfimonde64k.ice.infomaniak.ch/rfimonde-64.mp3'                           ]
  , ['BFM Business'      , 'https://audio.bfmtv.com/bfmbusiness_128.mp3?aw_0_1st.aggregator=unknow_from_dvmr']
  , ['Europe 1'          , 'https://stream.europe1.fr/europe1.mp3?aw_0_1st.playerid=lgrdrnwsradio-en-lignefr']
  , ['RTL'               , 'https://streamer-01.rtl.fr/rtl-1-44-128?listen=webDQcCCwwIBwMFBgUABAwDDg']
];

$array_news_bg =
[
    ['Darik Radio'       , 'https://darikradio.by.host.bg:8000/S2-128'                             ]
  , ['Nova News'         , 'http://stream.radioreklama.bg/novanews.mp3'                            ]
  , ['Focus Radio'       , 'http://online.focus-radio.net:8100/sofia'                              ]
];

$url_bnt         = 'https://bnr.bg';
$url_podcasts_01 = 'https://www.radio-uk.co.uk/podcasts/bloomberg-businessweek';
$url_podcasts_02 = 'https://www.radio-uk.co.uk/podcasts/bloomberg-surveillance';
$url_podcasts_03 = 'https://www.radio-uk.co.uk/podcasts/ft-news-briefing';
$url_podcasts_04 = 'https://www.radio-uk.co.uk/podcasts/economist-radio';

#---------------------------------------------------------------------------------------------------

$template_html    = "../{$dir_templates}/{$app_name}.html";

#---------------------------------------------------------------------------------------------------

function set_news($item_array, $div_title, $div_number)
{
  global $dir_templates, $app_title, $page_content;

  $page_content .= "<p class='clMediaName'><a href='javascript:fncShowHideWithMemory(&quot;idDiv{$div_number}&quot;)'>{$div_title}</a></p>\n";
  $page_content .= "<div id='idDiv{$div_number}'>";

  foreach($item_array as $item_entry)
  {
    $page_content .= "<p class='clMediaName'><a href='{$item_entry[1]}'>{$item_entry[0]}</a></p>\n";
  }

  $page_content .= "</div>\n";
}

#---------------------------------------------------------------------------------------------------

function set_bnt($url_source, $div_title, $div_number)
{
  global $dir_templates, $app_title, $page_content;

  $url_content = get_url("{$url_source}/play/");
  $html_objects = str_get_html($url_content);

  $page_content .= "<p class='clMediaName'><a href='javascript:fncShowHideWithMemory(&quot;idDiv{$div_number}&quot;)'>{$div_title}</a></p>\n";
  $page_content .= "<div id='idDiv{$div_number}'>";

  foreach($html_objects->find('source') as $audio_source)
  {
    $audio_source_src = $audio_source->src;
    if (strpos($audio_source_src, 'news') !== false)
    {
      $data_fields = explode("-", $audio_source_src);
      $data_fields_count = count($data_fields);
      $audio_year    = $data_fields[$data_fields_count - 5];
      $audio_month   = $data_fields[$data_fields_count - 4];
      $audio_day     = $data_fields[$data_fields_count - 3];
      $audio_hour    = $data_fields[$data_fields_count - 2];
      $audio_minute  = trim($data_fields[$data_fields_count - 1], ".mp3");

      $page_content .= "<p class='clMediaName'><a href='{$url_source}{$audio_source_src}'>{$audio_hour}:{$audio_minute}</a></p>\n";
    }
  }

  $date_bnt = "{$audio_day}.{$audio_month}.{$audio_year}";

  $page_content = str_replace("{$div_title}", "Новини - БНТ {$date_bnt}", $page_content);

  $page_content .= "</div>\n";
}

#----------------------------------------------------------------------------------------------------

function set_podcats($url_source, $div_title, $div_number)
{
  global $dir_templates, $app_title, $page_content;

  $url_content = get_url("{$url_source}");
  $html_objects = str_get_html($url_content);

  $page_content .= "<p class='clMediaName'><a href='javascript:fncShowHideWithMemory(&quot;idDiv{$div_number}&quot;)'>{$div_title}</a></p>\n";
  $page_content .= "<div id='idDiv{$div_number}'>";

  foreach($html_objects->find("div[id^=podcast_item_]") as $podcast_items)
  {
    $podcast_episode_date = $podcast_items->find("div[class=mdc-list-item__text-secondary secondary-span-color]", 0)->innertext ?? "";
    $podcast_episode_date = preg_replace("/^...\, /", "", $podcast_episode_date);

    $podcast_episode_name = $podcast_items->find("div[id^=episode_]", 0)->innertext ?? "";
    $podcast_episode_name = preg_replace("/(.*?)<div class=\"mdc-list-item__text-secondary secondary-span-color\"(.*)/", "$1", $podcast_episode_name);
    $podcast_episode_name = preg_replace("/&nbsp/", " ", $podcast_episode_name);
    $podcast_episode_name = preg_replace("/^(\d*?) - /", "", $podcast_episode_name);
    $podcast_episode_name = preg_replace("/^Surveillance:/", "", $podcast_episode_name);
    $podcast_episode_name = trim($podcast_episode_name);

    $podcast_episode_url  = $podcast_items->find("svg", 0) ?? "";
    $podcast_episode_url = preg_replace("/(.*?)data-url=\"(.*?)\"(.*)/", "$2", $podcast_episode_url);

    $page_content .= "<p class='clMediaName'><a href='{$podcast_episode_url}'>{$podcast_episode_date} - {$podcast_episode_name}</a></p>\n";
  }

  $page_content .= "</div>\n";
}

#----------------------------------------------------------------------------------------------------

set_news($array_news_en       , 'News - English'                      , '01');
set_news($array_news_bg       , 'Новини - Български'                  , '02');
set_bnt($url_bnt              , 'БНТ-DATE'                            , '03');
set_news($array_news_fr       , 'Actualites - Français'               , '04');
set_podcats($url_podcasts_01  , 'Podcasts - Bloomberg Businessweek'   , '05');
set_podcats($url_podcasts_02  , 'Podcasts - Bloomberg Surveillance'   , '06');
set_podcats($url_podcasts_03  , 'Podcasts - Financial Times'          , '07');
set_podcats($url_podcasts_04  , 'Podcasts - The Economist'            , '08');

#----------------------------------------------------------------------------------------------------

$page_html = get_file_template($template_html);

#----------------------------------------------------------------------------------------------------

eval("\$page_content = \"{$page_content}\";");
eval("\$page_html = \"{$page_html}\";");
echo $page_html;

#---------------------------------------------------------------------------------------------------
?>
