<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey  = $_GET['varIdKey'];
$intForm  = $_GET['varForm'];
$intFields  = $_GET['varFields'];

#---------------------------------------------------------------------------------------------------

$strRedirect = '';

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 2 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 1 )
{
  $strQueryDelete = "delete from aa_form_" . sprintf( "%02d", $intForm ) . " where idkey = '$strIdKey';";
  $strQueryInsert = "insert into aa_form_" . sprintf( "%02d", $intForm ) . " values ( '$strIdKey', ";

  for ( $intCounter = 1; $intCounter <= $intFields; $intCounter++ )
  {
    $strVar = sprintf( "var%02d%02d", $intForm, $intCounter );

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

  mysqli_close( $objConnection );

  if ( $objResult1 && $objResult2 && $objResult3 && $objResult4 )
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/client-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/client-form-passed.html' );
  }
  else
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/client-form-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/client-form-failed.html' );
  }
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
