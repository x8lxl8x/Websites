/*----------------------------------------------------------------------------------------------------------*/

var strDirectory = '../../00.Resources/';
var strFormat = 'mp3';

var intTimeout = 1000;
var intTimeoutInitial = 100;

var intCurrentSound = 0;
var intTotalSounds = 0;

var arrSounds = new Array();

/*----------------------------------------------------------------------------------------------------------*/

function funcPlayTrack( sPhoneme )
{
	intCurrentSound = 0;
	arrSounds = sPhoneme.split( ',' );
	intTotalSounds = arrSounds.length;

	setTimeout( 'funcPlayNextTrack();', intTimeoutInitial );
}

/*----------------------------------------------------------------------------------------------------------*/

function funcPlayNextTrack()
{
	var objAudio = document.getElementById( 'idTrack' );
	var strSound = strDirectory + strFormat + '/' + arrSounds[intCurrentSound] + '.' + strFormat;

	objAudio.setAttribute( 'src', strSound );
	objAudio.play();

	intCurrentSound++;

	if ( intCurrentSound < intTotalSounds)
	{
		setTimeout( 'funcPlayNextTrack();', intTimeout );
	}
}

/*----------------------------------------------------------------------------------------------------------*/
