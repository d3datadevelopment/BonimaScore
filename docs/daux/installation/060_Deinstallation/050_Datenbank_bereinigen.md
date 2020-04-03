---
title: Datenbank bereinigen
---
  
Das Modul legt Informationen in der Datenbank ab. Sofern diese Daten nicht mehr benötigt werden, können diese gelöscht werden. 

> [!] Legen Sie sich vorab bitte unbedingt eine Sicherung an, um die Daten im Zweifelsfall wiederherstellen zu können.
    
Für das Modul **{$modulename}** sind dies die folgende Tabellen und Felder:

* die komplette Tabelle `d3bonimascore`
* die komplette Tabelle `d3bonimascoreresponse`
    
und diese Felder in bestehenden Tabellen:

* in Tabelle `oxpayments`:  
  * das Feld `d3bonimascoresafe`
* in Tabelle `oxuser`:  
  * das Feld `d3bonimascoreapproval`
  * das Feld `d3bonimascorecreditlimit`
  * das Feld `d3bonimacheckthreshold`
  * das Feld `d3bonimadontcheck`
* in Tabelle `oxgroups`:
  * das Feld `d3bonimadontcheck`
  
sowie diese Einträge in bestehenden Tabellen:

* in Tabelle `d3_cfg_mod`:  
  * den Eintrag `oxmodid = "{$modcfgident}"` **)

**) Diesen Eintrag gibt es ggf. für jeden Subshop. Entfernen Sie diesen nur für die Mandanten, in denen das Modul **nicht** mehr installiert ist. 