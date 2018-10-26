SUPERSEDED by https://github.com/kaihendry/geotag-image


# EXIF information is stripped from IOS Safari image uploads

Tested on:

	"Mozilla/5.0 (iPhone; CPU iPhone OS 8_4 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12H143 Safari/600.1.4"

Example:

	jhead exif.jpg
	File name    : exif.jpg
	File size    : 1425446 bytes
	File date    : 2015:07:26 15:10:07
	Resolution   : 3264 x 2448
	Orientation  : rotate 90
	JPEG Quality : 93
	======= IPTC data: =======

Notice GPS Latitude, GPS Longitude, GPS Altitude etc. **missing**.

# Android Chrome works

Tested on:

	 "Mozilla/5.0 (Linux; Android 5.1.1; Nexus 7 Build/LMY48G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.93 Safari/537.36"
