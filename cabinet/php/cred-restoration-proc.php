<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strClientEmail = $_POST['varClientEmail'];

#---------------------------------------------------------------------------------------------------

$objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
mysqli_query( $objConnection, "set character set 'utf8'" );
mysqli_query( $objConnection, "set names utf8" );
mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

$strQuery = "select idkey, email, name_last, name_first from aa_client where email = '$strClientEmail';";
$objResult = mysqli_query( $objConnection, $strQuery );
$intNumberOfRows = mysqli_num_rows( $objResult );

if ( $intNumberOfRows == 1 )
{
  $arrValues = mysqli_fetch_row( $objResult );
  $strIdKey = $arrValues[0];
  $strClientNameLast = $arrValues[2];
  $strClientNameFirst = $arrValues[3];

  $strMailTo    = $strClientEmail;
  $strMailSubject  = "=?UTF-8?B?" . base64_encode( "Ключ для входа в личный кабинет" ) . "?=";

  $strMailData = fncGetTemplate( $strDirMailData . '/cred-restoration.html' );
  eval( "\$strMailData = \"$strMailData\";" );

  ini_set( 'sendmail_from', $strConsultantEmailFull );
  mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );
  ini_restore( 'sendmail_from' );

  $strContent = fncGetTemplate( $strDirResponses . '/cred-restoration-passed.html' );
}
else
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-restoration-failed.html' );
}

mysqli_free_result( $objResult );
mysqli_close( $objConnection );

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
