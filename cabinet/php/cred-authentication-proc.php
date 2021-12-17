<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strContent = '';

#---------------------------------------------------------------------------------------------------

if ( isset( $_POST['varIdKey'] ) )
{
  $strIdKey  = $_POST['varIdKey'];
}
else
{
  $strIdKey  = $_GET['varIdKey'];
}

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
  $strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );
}
else if ( $intResult == 1 )
{
  $strPage = fncGetTemplate( $strDirResponses . '/cred-authentication-passed-client.html' );
}
else if ( $intResult == 2 )
{
  $strPage = fncGetTemplate( $strDirResponses . '/cred-authentication-passed-admin.html' );
}

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
