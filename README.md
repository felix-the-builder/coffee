# coffee
## Control a coffee-machine using a Raspberry-Pi
## Steuerung einer Kaffeemaschine mir Raspberry Pi und Web-Applikation


## Programmcode
coffee2.php: CSS, HTML für Tabelle des Coffee-Schedule, ruft PHP Code aus filerw-php auf
filerw.php Hilfsfunktionen: 
- rfcron liest die Zeiten aus der Datei "coffee-schedule" in ein zurückgeliefertes Array
- wfcron wird durch Drücken des Buttons "Änderungen übernehmen" aufgerufen; schreibt die Werte aller Eingabefelder in die Datei "coffee-				schedule"; vorher wir der letzte Stand von "coffee-schedule" in 					"coffee-before" gesichert
- createcron sichert den letzten Stand der crontab in "crontab.old" und erstellt eine neue crontab aus der Werten aus coffee-schedule
				
ergebnis.php: schreibt Ergebnis. Meldet Vollzug und ermöglicht Rückkehr zur Tabelle

## Config und Logdateien
- coffee-schedule: enthält die numerischen Start- und Stopzeiten, h- und min-Werte sequenziell in 	jeweils neuer Zeile
- coffee-before: enthält die Kopie der Datei "coffee-schedule" vor deren letzer	Änderung
- crontab: die programmatisch erstellte crontab Datei, welche die Original crontab ersetzen wird

## Deployment auf Zielsystem
- coffee2.php, filerw.php und ergebnis.php und mvct.sh müssen in das Document Root Verzeichnis einen PHP-fähigen Webservers kopiert werden
- coffee-schedule muss ebenfalls mit beliebigen Startwerten in das ./tmp Verzeichnis unter dem Document Root Verzeichnis einen PHP-fähigen Webservers kopiert werden

__* Achtung *__ *: das Kopieren der /etc/crontab ist mittels einer Web-Application nicht direkt möglich, da dies root Rechte erfordern würde und dies dem unter non-root laufenden Web Server verboten ist!*

Daher muss die neu geschriebene crontab im Web Server Verzeichnis von einem unter root laufenden Shell-Skript in /etc automatisiert kopiert werden, sobald sie geändert wurde. Dazu kann folgendes Rezept verwendet werden:

## Shellscript (mvct.sh) zum Kopieren der /etc/crontab:

C&#35;!/bin/bash
mv /etc/crontab /etc/crontab.old
cd /var/www/html/tmp
cp ./crontab /etc/crontab

ausführbar machen:
sudo chmod 777 mvct.sh

in /etc/systemd/system müssen zwei Dateien erstellt werden:

copy.service Datei erstellen (sudo geany copy.service):

<p>[Unit]
Description=/etc/crontab austauschen (coffee-schedule Daten)

[Service]
Type=oneshot
ExecStart=/var/www/html/mvct.sh

copy.path Datei erstellen (sudo geany copy.path): 

[Unit]
Description=Startet copy.service wenn eine Datei in /var/www/html/tmp

[Path]
PathModified=/var/www/html/tmp

[Install]
WantedBy=multi-user.target </p>

Nun habe ich mittels 
systemctl start copy.path 
das ganze einmalig gestartet. Da keine Problem auftraten, kann das permanent geschaltet werden.
Automatisierung scharf schalten, so dass sie auch einen Systemstart überlebt:
pi@raspimp:/etc/systemd/system $ sudo systemctl enable copy.path
