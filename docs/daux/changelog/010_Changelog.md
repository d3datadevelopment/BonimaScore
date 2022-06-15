---
title: Changelog
---

## 3.2.0.0 - 2022-06-15
### Added
- Nachbehandlung des Scores auf Basis der verwendeten Top Level Domain möglich

---

## 3.1.1.0 - 2021-06-21
### Added
- installierbar in OXID 6.2.3 und 6.2.4

### Changed
- Templateblöcke für einfachere Überladung eingefügt
- Scoreanfragen werden als Info zur einfacheren Nachvollziehbarkeit mitgeschrieben

### Fixed
- falscher Score Startwert in der Entscheidungsmatrix korrigiert
- verdrehte Score Ranges im Status 3 für statistische Abfragen korrigiert

---

## 3.1.0.0 - 2021-03-12
### Added
- erforderliche Felder, die im Shop keine Pflichtfelder sind, werden an der zu prüfenden Zahlart zusätzlich abgefragt
  - funktioniert für alle Boniversum-Pflichtfelder
  - wenn die Felder unabhängig vom Pflichtfeld schon ausgefüllt sind, erfolgt keine zusätzliche Abfrage

### Changed
- Templates für Verwendung in Flow- und Wave-Theme aktualisiert

### Fixed
- Geburtsdatumauswahl zeigt komplette Monatsnamen anstelle der Ziffern

---

## 3.0.2.1 - 2020-10-16
### Changed
- Titellogo auf statischen Asset umgestellt
- Dokumentation aktualisiert

---

## 3.0.2.0 - 2020-04-08
### Added
- installierbar in OXID 6.2

---

## 3.0.1.0 - 2020-04-03
### Changed
- Erweiterbarkeit verbessert für Rückleitung im Falle des nicht gesetzten Geburtstages
- Dokumentation ergänzt

### Fixed
- vermeidet Bonima-Check, wenn Bestellung im Admin geändert oder neu berechnet wird
- Geburtstagsprüfung bei nicht ladbarem Kundenkonto korrigiert

---

## 3.0.0.0 - 2018-11-26
### Changed
- Refaktorisierung für OXID 6.0
- Vorabprüfung entfernt - Scorewert wird (wenn nicht vorhanden) erst bei Auswahl einer relevanten Zahlungsart angefordert
- Zahlenangaben werden in Shop-Standardwährung konvertiert
- zusätzliche Prüfungen eingefügt
- Optionen sind über Lizenzschlüssel aktivierbar
- Übersetzungen ergänzt und aktualisiert

**Minor version upgrade notice: there are some backward-incompatible changes to this release.**

---

## 2.0.0.1 - 2018-10-30
### Added
- fehlende Übersetzung eingefügt

### Changed
- PostPaymentCheck: Zahlarten werden nur geprüft, wenn diese keine "sicheren Zahlarten" sind
- Fehlerbehandlung im Fall von Falscheingaben korrigiert

---

## 2.0.0.0 - 2018-10-11
### Added
- umfangreiches Logging eingefügt
- Lizenzverwendung integriert

### Changed
- Basis auf D3 Modul Connector umgestellt
- Abfragen werden nur noch max. 1x pro Tag durchgeführt, kürzere Abfragen werden aus der Speicherung in der Shopdatenbank bedient
- informatorische Fehlermeldungen werden bei Validierungsproblemen auch im Frontend gezeigt
- Refactoring des gesamten Moduls

---

## 1.1.2.0 - 2018-08-21
### Added
- Check-Ausschluss für Kunden und Kundengruppen eingefügt (erfordert zusätzliches Plugin)
- Bonitätsprüfung auf Basis des Mindestwarenkorbwertes eingefügt (erfordert zusätzliches Plugin)

---

## 1.1.1.0 - 2017-12-07
### Added
- kundenspezifisches Kreditlimit eingefügt
- Testpersonenmatrix eingefügt

### Changed
- gecachter Response erkennt Adressänderung
- Precheck

---

## 1.1.0.3 - 2017-10-16
### Added
- nachgelagerte Bonitätsprüfung (#6777)

---

## 1.1.0.2 - 2016-07-04
### Added
- Prüfung der Lieferadresse (erfordert AddOn)

### Changed
- veralteten Code korrigiert
- fehlerhafte Admindarstellung bei nicht gesetzten Safe-Payments korrigiert

---

## 1.1.0.1 - 2016-06-10
### Added
- Precheck

### Changed
- WSDL-Adresse angepasst
