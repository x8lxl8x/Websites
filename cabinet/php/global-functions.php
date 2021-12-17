<?php
#---------------------------------------------------------------------------------------------------

function fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey )
{
  if ( $strIdKey === '' )
  {
    $intResult = 0;
  }
  else
  {
    $strQuery = "select idkey, admin from aa_client where idkey = '$strIdKey'";
    $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
    mysqli_query( $objConnection, "set character set 'utf8'" );
    mysqli_query( $objConnection, "set names utf8" );
    mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );
    $objResult = mysqli_query( $objConnection, $strQuery );
    $intNumberOfRows = mysqli_num_rows( $objResult );

    if ( $intNumberOfRows == 0 )
    {
      $intResult = 0;
    }
    else
    {
      $arrValues = mysqli_fetch_row( $objResult );
      $strAdmin = $arrValues[1];

      if ( $strAdmin === 'N' )
      {
        $intResult = 1;
      }
      elseif ( $strAdmin === 'Y' )
      {
        $intResult = 2;
      }
    }

    mysqli_free_result( $objResult );
    mysqli_close( $objConnection );
  }

  return $intResult;
}

#---------------------------------------------------------------------------------------------------

function fncCheckAdminRights()
{
  global $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey;

  $strQuery = "select admin from aa_client where idkey = '$strIdKey' and admin = 'Y'";
  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );

  if ( $intNumberOfRows == 1 )
  {
    $intResult = 1;
  }
  else
  {
    $intResult = 0;
  }

  mysqli_free_result( $objResult );
  mysqli_close( $objConnection );

  return $intResult;
}

#---------------------------------------------------------------------------------------------------

function fncGetFile( $strFileName )
{
  $strContent = "";
  $objFilePointer = fopen( $strFileName, "r" );

  while( ! feof( $objFilePointer ) )
  {
    $strContent .= fgets( $objFilePointer, 4096 );
  }

  fclose( $objFilePointer );

  return $strContent;
}

#---------------------------------------------------------------------------------------------------

function fncGetTemplate( $strFileName )
{
  $strContent = "";
  $objFilePointer = fopen( $strFileName, "r" );

  while( ! feof( $objFilePointer ) )
  {
    $strContent .= fgets( $objFilePointer, 4096 );
  }

  fclose( $objFilePointer );

  $strContent = preg_replace("/\"/", "'", $strContent );

  return $strContent;
}

#---------------------------------------------------------------------------------------------------

function fncGetWiki( $strFileName )
{
  global $strRecommendationsWebImages, $strMdImages;

  $strContent = "<p>\n";
  $blnTableStartTh = false;
  $blnTableStartTd = false;
  $blnLineWithNoTd = true;

  $objFilePointer = fopen( $strFileName, "r" );

  while( ! feof( $objFilePointer ) )
  {
    $strLine = fgets( $objFilePointer, 4096 );

    if ( trim( $strLine ) === "" ) { $strLine = "</p>\n<p>"; }

    $strLine = preg_replace( "/\“(.*)\”/sU",            "«$1»", $strLine );
    $strLine = preg_replace( "/\"(.*)\"/sU",            "«$1»", $strLine );
    $strLine = preg_replace( "/\'(.*)\'/sU",            "«$1»", $strLine );

    $strLine = preg_replace( "/\@\[(.*?)\]/",           "<img alt='$1' title='$1' src='" . "$strRecommendationsWebImages/$1" . "' />", $strLine );
    $strLine = preg_replace( "/\!\[(.*?)\]/",           "<a target='_blank' class='clLink' href='$1'>$1</a>", $strLine );

    $strLine = preg_replace( "/\*{2,2}(.*)\*{2,2}/sU",  "<b>$1</b>", $strLine );
    $strLine = preg_replace( "/\_{2,2}(.*)\_{2,2}/sU",  "<b>$1</b>", $strLine );

    $strLine = preg_replace( "/\*{1,1}(.*)\*{1,1}/sU",  "<i>$1</i>", $strLine );
    $strLine = preg_replace( "/\_{1,1}(.*)\_{1,1}/sU",  "<i>$1</i>", $strLine );
    $strLine = preg_replace( "/\`(.*)\`/sU",            "<pre><code>$1</code></pre>", $strLine );

    $strLine = preg_replace( "/######(.*)$/sU",         "<h6>$1</h6>", $strLine );
    $strLine = preg_replace( "/#####(.*)$/sU",          "<h5>$1</h5>", $strLine );
    $strLine = preg_replace( "/####(.*)$/sU",           "<h4>$1</h4>", $strLine );
    $strLine = preg_replace( "/###(.*)$/sU",            "<h3>$1</h3>", $strLine );
    $strLine = preg_replace( "/##(.*)$/sU",             "<h2>$1</h2>", $strLine );
    $strLine = preg_replace( "/#(.*)$/sU",              "<h1>$1</h1>", $strLine );

    $strLine = preg_replace( "/-{3,}?/sU",              "<hr />", $strLine );

    $strLine = preg_replace( "/^\>(.*)/s",              "<blockquote>$1</blockquote>", $strLine );

    $strLine = preg_replace( "/^    \* (.*)/s",         "<li class='clLiUl_2'>$1</li>", $strLine );
    $strLine = preg_replace( "/^  \* (.*)/s",           "<li class='clLiUl_1'>$1</li>", $strLine );
    $strLine = preg_replace( "/^\* (.*)/s",             "<li class='clLiUl_1'>$1</li>", $strLine );

    $strLine = preg_replace( "/^   \- (.*)/s",          "<li class='clLiUl_2'>$1</li>", $strLine );
    $strLine = preg_replace( "/^  \- (.*)/s",           "<li class='clLiUl_1'>$1</li>", $strLine );
    $strLine = preg_replace( "/^\- (.*)/s",             "<li class='clLiUl_1'>$1</li>", $strLine );

    $strLine = preg_replace( "/^   \+ (.*)/s",          "<li class='clLiUl_2'>$1</li>", $strLine );
    $strLine = preg_replace( "/^  \+ (.*)/s",           "<li class='clLiUl_1'>$1</li>", $strLine );
    $strLine = preg_replace( "/^\+ (.*)/s",             "<li class='clLiUl_1'>$1</li>", $strLine );

    $strLine = preg_replace( "/^  \d\. (.*)/s",         "<lk class='clLiOl_1'>$1</lk>", $strLine );

    $strLine = preg_replace( "/^\^/s",                  "<tr><th>", trim( $strLine ) );
    $strLine = preg_replace( "/\^$/s",                  "</th></tr>", trim( $strLine ) );
    $strLine = preg_replace( "/\^/s",                   "</th><th>", $strLine );

    $strLine = preg_replace( "/^\|/s",                  "<tr><td>", trim( $strLine ) );
    $strLine = preg_replace( "/\|$/s",                  "</td></tr>", trim( $strLine ) );
    $strLine = preg_replace( "/\|/s",                   "</td><td>", $strLine );

    $strContent = $strContent . $strLine . "";
  }

  fclose( $objFilePointer );

  $strContent = preg_replace( "/<p><h1>/s",              "\n<h1>", $strContent );
  $strContent = preg_replace( "/<p><h2>/s",              "\n<h2>", $strContent );
  $strContent = preg_replace( "/<p><h3>/s",              "\n<h3>", $strContent );
  $strContent = preg_replace( "/<p><h4>/s",              "\n<h4>", $strContent );
  $strContent = preg_replace( "/<p><h5>/s",              "\n<h5>", $strContent );

  $strContent = preg_replace( "/<\/h1><\/p>/s",          "</h1>", $strContent );
  $strContent = preg_replace( "/<\/h2><\/p>/s",          "</h2>", $strContent );
  $strContent = preg_replace( "/<\/h3><\/p>/s",          "</h3>", $strContent );
  $strContent = preg_replace( "/<\/h4><\/p>/s",          "</h4>", $strContent );
  $strContent = preg_replace( "/<\/h5><\/p>/s",          "</h5>", $strContent );
  $strContent = preg_replace( "/<p><tr><th>/s",          "<p><div class='clWikiTable'><table><tr><th>", $strContent );
  $strContent = preg_replace( "/<p><tr><td>/s",          "<p><div class='clWikiTable'><table><tr><td>", $strContent );
  $strContent = preg_replace( "/<\/th><\/tr><\/p>/s",    "</th></tr></table></div></p>\n", $strContent );
  $strContent = preg_replace( "/<\/td><\/tr><\/p>/s",    "</td></tr></table></div></p>\n", $strContent );

  $strContent = preg_replace( "/<p><li /s",              "<p><ul><li ", $strContent );
  $strContent = preg_replace( "/<\/li><\/p>/s",          "</li></ul></p>", $strContent );
  $strContent = preg_replace( "/\n<\/li>/s",             "</li>", $strContent );

  $strContent = preg_replace( "/<p><lk /s",              "<p><ol><li ", $strContent );
  $strContent = preg_replace( "/<\/lk><\/p>/s",          "</li></ol></p>", $strContent );
  $strContent = preg_replace( "/\n<\/lk>/s",             "</li>", $strContent );
  $strContent = preg_replace( "/<lk /s",                 "<li ", $strContent );
  $strContent = preg_replace( "/<\/lk>/s",               "</li>", $strContent );

  $strContent = preg_replace( "/<p><\/p>/s",             "", $strContent );

  $strContent = $strContent . "</p>\n";

  return $strContent;
}

#---------------------------------------------------------------------------------------------------
?>
