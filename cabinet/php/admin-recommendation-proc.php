<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey    = $_GET['varIdKey'];
$strClientIdKey  = $_GET['varClientIdKey'];
$intForm    = $_GET['varForm'];
$intFields    = $_GET['varFields'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $strQueryDelete = "delete from aa_recommendation_" . sprintf( "%02d", $intForm ) . " where idkey = '$strClientIdKey';";
  $strQueryInsert = "insert into aa_recommendation_" . sprintf( "%02d", $intForm ) . " values ( '$strClientIdKey', ";

  for ( $intCounter = 1; $intCounter <= $intFields; $intCounter++ )
  {
    $strVar = sprintf( "var%02d%03d", $intForm, $intCounter );

    if ( isset( $_POST[$strVar] ) )
    {
      if ( $_POST[$strVar] == 'on' )
      {
        $strFieldValue = '1';
      }
      else
      {
        $strFieldValue = trim( $_POST[$strVar] );
      }

      $strQueryInsert = $strQueryInsert . "'" . $strFieldValue  . "'";
    }
    else
    {
      $strQueryInsert = $strQueryInsert . "''";
    }

    if ( $intCounter < $intFields )
    {
      $strQueryInsert = $strQueryInsert . ", ";
    }
  }

  $strQueryInsert = $strQueryInsert . " );";

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $objResult1 = mysqli_query( $objConnection, $strQueryDelete );
  $objResult2 = mysqli_query( $objConnection, 'commit;' );
  $objResult3 = mysqli_query( $objConnection, $strQueryInsert );
  $objResult4 = mysqli_query( $objConnection, 'commit;' );

  if ( $objResult1 && $objResult2 && $objResult3 && $objResult4 )
  {
    $strRedirect = "<meta http-equiv='refresh' content='0;url=$strRoot/php/admin-client-show-page.php?varIdKey=$strIdKey&amp;varClientIdKey=$strClientIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-recommendation-passed.html' );
  }
  else
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-client-show-page.php?varIdKey=$strIdKey&amp;varClientIdKey=$strClientIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-recommendation-failed.html' );
  }

  mysqli_close( $objConnection );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
