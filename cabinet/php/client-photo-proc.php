<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey = $_GET['varIdKey'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 2 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 1 )
{
  if ( is_dir( $strDirPhoto . '/' . $strIdKey ) == false )
  {
    mkdir( $strDirPhoto . '/' . $strIdKey );
  }

  $blnResult = true;

  for( $intCounter = 0; $intCounter < 5; $intCounter++ )
  {
    if ( $_FILES['varPhoto']['name'][$intCounter] != '' )
    {
      $strFileName = $strDirPhoto . '/' . $strIdKey . '/' . sprintf( "%01d", $intCounter + 1 ) . '.jpg';

      if ( is_file( $strFileName ) )
      {
        unlink( $strFileName );
      }

      $strResultUpload = $_FILES['varPhoto']['error'][$intCounter];
      $strResultMove = move_uploaded_file( $_FILES['varPhoto']['tmp_name'][$intCounter], $strFileName );

      if ( $strResultUpload == '0' && $strResultMove == '1' )
      {
        $arrExif = exif_read_data( $strFileName );
        $imgImageSrc = imagecreatefromjpeg( $strFileName );

        list( $intWidthSrc, $intHeightSrc ) = getimagesize( $strFileName );

        if ( $arrExif['Orientation'] == 6 || $arrExif['Orientation'] == 8 )
        {
          $intWidthDst = 640;
          $intHeightDst = (int) ( $intWidthDst * $intHeightSrc / $intWidthSrc );
        }
        else
        {
          $intHeightDst = 640;
          $intWidthDst = (int) ( $intHeightDst * $intWidthSrc / $intHeightSrc );
        }

        $imgImageDst = imagecreatetruecolor( $intWidthDst, $intHeightDst );
        imagecopyresampled( $imgImageDst, $imgImageSrc, 0, 0, 0, 0, $intWidthDst, $intHeightDst, $intWidthSrc, $intHeightSrc );

        if ( $arrExif['Orientation'] == 3 )
        {
          $imgImageDst = imagerotate( $imgImageDst, 180, 0 );
        }
        if ( $arrExif['Orientation'] == 6 )
        {
          $imgImageDst = imagerotate( $imgImageDst, -90, 0 );
        }
        else if ( $arrExif['Orientation'] == 8 )
        {
          $imgImageDst = imagerotate( $imgImageDst, 90, 0 );
        }

        imagejpeg( $imgImageDst, $strFileName, 60 );
      }

      if ( $strResultUpload == '0' && $strResultMove == '1' )
      {
        $blnResult = $blnResult & true;
      }
      else
      {
        $blnResult = $blnResult & false;
      }
    }
  }

  if ( $blnResult )
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/client-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/client-photo-passed.html' );
  }
  else
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/client-photo-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/client-photo-failed.html' );
  }
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
