<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey      = $_GET['varIdKey'];
$strClientIdKey    = $_GET['varClientIdKey'];
$strClientNameLast  = $_GET['varClientNameLast'];
$strClientNameFirst  = $_GET['varClientNameFirst'];
$intForm      = $_GET['varForm'];
$intFields      = $_GET['varFields'];

#---------------------------------------------------------------------------------------------------

$strFormsCompleted   = '';

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $strForm =   sprintf( "%02d", $intForm );

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select * from aa_form_$strForm where idkey = '$strClientIdKey';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );

  if ( $intNumberOfRows == 1 )
  {
    $arrValues = mysqli_fetch_row( $objResult );
  }

  mysqli_free_result( $objResult );
  mysqli_close( $objConnection );

  $strFuncOnLoad = 'fncOnLoadFormAdmin( ' . $intForm . ', ' . $intFields . ' );';
  $strContent = fncGetTemplate( $strDirForms . '/' . $strForm . '.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
