---
title: Entscheidungsmatrix
---

# Die Entscheidungsmatrix verstehen

Boniversum liefert einen ganzen Strauss an Informationen. Aus diesem sind für uns 3 Werte in dieser Reihenfolge wichtig:

- Adressvalidierung
- Personenvalidierung
- Score

## Adressvalidierung

### Erklärung
Hiermit definiert Boniversum, ob die eingegebene Adresse bekannt ist. Boniversum kennt mit Sicherheit den allergrößten Teil aller Adressen. 

### Gründe für Versagen
Schlägt diese Prüfung fehl (liefert also "nicht validiert"), handelt es sich wohl um eine Fakeadresse. Neubaugebiete dürften ebenfalls in die Gruppe fallen, jedoch wahrscheinlich schnell hinzugefügt werden, weshalb man dies sicher außer Acht lassen kann.

### Zuordnung in der Entscheidungsmatrix
Die Zuordnung der Zahlungsarten auf Grund der Adressvalidierung können Sie innerhalb der Matrix in der ersten Spalte einsehen. 
Die erste Zeile behandelt alle, deren Adresse nicht bekannt ist. Alle Personen mit erkannten Adressen werden in den Folgezeilen behandelt.

### Schlüsse
Bei unvalidierter Adresse werden keine weiteren Prüfungen durchgeführt. Dieser Personengruppe sollten Sie keine ausfallkritischen Zahlungsarten anbieten, da Fakeadresen sicher auf Betrugsverdacht hindeuten.


## Personenvalidierung

### Prüfhistorie
Die angegeben Adresse muss erkannt worden sein.

### Erklärung
Boniversum hat Informationen zu allen Personen, die irgendeine Kredithistorie haben. Dazu reicht schon ein Handyvertrag oder eine Kontoeröffnungsanfrage bei einer Bank. Auch Ratenzahlungsvereinbarungen und Kreditkartenbesitz fließen in die Datenbank ein. Geschätzt dürften mehr als 3/4 der gesamten Bevölkerung in diesen Daten zu finden sein.

### Gründe für das Versagen
Wer als Person der Schufa / Boniversum nicht bekannt ist, ist entweder zu jung, dass sie noch keine schufarelevanten Transaktionen getätigt hat oder diese Person gibt es tatsächlich nicht (Fakeaccount).

### Zuordnung in der Entscheidungsmatrix
Das Ergebnis der Personenvalidierung finden Sie in der Matrix in Spalte 2. Das untere Drittel der Liste beschäftigt sich mit nicht identifizierbaren Personen. Die oberen 2 Drittel der Liste zeigen Einstellungen zu identifizierten Personen.

### Schlüsse
Boniversum gibt Empfehlungen auf Basis vorhandener Erkenntnisse sowie auch auf weichen Kriterien ab. Kann eine Person nicht identfiziert werden, fehlen jegliche historischen Daten. Hier können nur allgemeine Daten (z.B. Wohnort, Wohngegend, geschätztes Alter) als Kriterium herhalten. Dementsprechend schwierig wird auch eine Bonitätsaussage zu treffen sein. Daher sollten Sie alle nicht identfizierten Personen unabhängig ihres Scores misstrauisch betrachten. In dieser Gruppe dürften sich die meisten Betrugsversuche finden. Die angegeben Untereinträge mit verschiedenen Ausfallwahrscheinlichkeiten sind nur Feinabstufungen, die in dieser Gruppe kaum relevant sein dürften.


## Score

### Prüfhistorie
Die angegeben Adresse muss erkannt worden sein. Die Personenidentifizierung ist egal, da für beide Gruppen ein Score geliefert wird.

### Erklärung
Boniversum versucht die Ausfallwahrscheinlichkeit auf Grund der vorliegenden Daten zu schätzen.
Hierzu werden generische Daten (z.B. Wohnort, Wohngegend, geschätztes Alter) herangezogen. Sofern der Benutzer identifiziert werden konnte, fließen auch Daten zur persönliche Kredithistorie in den Score mit ein. Je nach Datenlagen (Person identifiziert / nicht identifiziert) können Sie einschätzen, wie verlässlich der Score sein wird.

### Gründe für das Versagen
Den Score gibt es in 2 Ausprägungen: 
- als 5-stellig Zahl. Dann wurde in der Vergangenheit schon einmal der Rechtsweg beschritten, um Zahlungen einzufordern. Wenn Pfändungen, Urteile oder Gerichtsvollzieher im Spiel sind, sollten Sie auf das Anbieten kritischer Zahlungsarten verzichten. Diese Scores kann es nur bei identifizierten Personen geben.
- als 3- bis 4-stellige Zahl. Wir prüfen den Bereich von 563 bis 1079. Je höher der Score des Benutzers liegt, umso weniger Zahlungsausfall ist zu befürchten. Ein niedriger Score lässt auf Zahlungsschwierigkeiten in der Vergangenheit schließen. Es kann aber auch der Rest eines beendeten Insolvenzverfahrens sein, welches selbst nach Abschluss noch mehrere Jahre in der Historie verwendet wird (Löschfrist dafür aktuell: 3 Jahre). Selbst ungünstige Wohnadressen haben Einfluss auf den Score. Personen mit Scorehöchstwerten sind reine Theorie und kommen praktisch nicht vor.

### Zuordnung in der Entscheidungsmatrix
Die Scorewertzuordnung finden Sie in Spalte 3 mit von-/bis-Gruppen bzw. absoluten Werten. Diese Werte gibt es meistens doppelt in der Liste. Einmal für validierte Personen und auch für unvalidierte Personen. Je nach Ergebnis der Personenvalidierung verwenden Sie bitte den jeweils passenden Eintrag.

### Schlüsse
Unvalidierten Personen sollten Sie unabhängig vom Score keine kritischen Zahlungsarten erlauben. Bei validierten Personen entscheiden Sie anhand der Scoregruppe, welches Vertrauen Sie den jeweiligen Kunden entgegenbringen. Hier können Sie Abstufungen zwischen den einzelnen Gruppen machen.

## Konfiguration
Haben Sie anhand der 3 Kriterien den passenden Eintrag in der Matrix finden können, markieren Sie dort alle nutzbaren Zahlungsarten und das verfügbare Kreditlimit.

### Kreditlimit
Erlauben Sie Kunden die ausgewählten Zahlungsarten nur, wenn deren Warenkorbhöhe einen bestimmten Betrag nicht überschreitet. Beachten Sie bitte, dass ein mit 0 (null) eingestelltes Kreditlimit diese Prüfung deaktiviert. Dann wird die Warenkorbhöhe nicht überprüft.
Das Kreditlimit können Sie am Matrixeintrag setzen. Lizenzabhängig können Sie das Limit zusätzlich am Kundenkonto setzen und damit den Wert der Matrix überstimmen.

## Weitere Filtermöglichkeiten
Unabhäng der Entscheidungsmatrix können Sie auch an den Zahlungsarten selbst weitere Bedingungen definieren, ab wann eine Bezahlart zur Verfügung stehen soll. So können Sie auch Kunden mit mittelmäßigem Score eine kritische Zahlungsart anbieten, wenn diese z.B. nur auf kleine Warenkörbe angewendet werden kann. Oder Sie Sie bieten Zahlungsarten z.B. erst ab der 2. Bestellung an (Kundengruppe kleiner, mittlerer, großer Umsatz). Damit reduzieren Sie das Ausfallrisiko weiter.

## Weitere Anmerkungen
Wenn dem Kunden eine unsichere Zahlungsart auf Grund der Boniversummatrix verwehrt wird, stehen diesem meist noch sichere Zahlungsarten zur Verfügung (Vorauskasse, Nachnahme, Kreditkarte). Dass jemand wegen einer nicht optimalen Bonität überhaupt nicht bestellen kann, kommt im Alltag kaum vor. Das sollte also kein Grund sein, als Händler zu viel Risiko auf sich zu nehmen.
