<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

$sLangName  = "Deutsch";

$aLang = array(
    'charset'                                      => 'UTF-8',
    'd3bonimascore'                                => '<i class="fa fa-balance-scale"></i> BonimaScore',
    'd3bonimascore_manage'                         => 'Entscheidungsmatrix',
    'd3bonimascore_matrix'                         => 'Entscheidungsmatrix',
    'd3bonimascore_payments'                       => 'Sichere Zahlungsarten',
    'd3bonimascore_support'                        => 'Support',
    'd3bonimascore_mypayments'                     => 'Sichere Zahlungsarten',
    'd3bonimascore_config'                         => 'Moduleinstellungen',
    'd3bonimascore_myconfig'                       => 'Moduleinstellungen',

    'D3BONIMASCORE_TRANSL'                         => 'Boniversum Bonitätsprüfung',

    'D3BONIMASCORE_CONFIGVARS_SADDTITLE'           => 'Modul-Edition:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT1'         => 'Standard-Edition:',
    'D3BONIMASCORE_CONFIGVARS_FEATUREBIT2'         => 'Premium-Edition:',

    'D3_BONIMASCORE_ADMIN_ADDRVAL'                 => 'Adressvalidierung',
    'D3_BONIMASCORE_ADMIN_PERSIDENT'               => 'Personidentifizierung',
    'D3_BONIMASCORE_ADMIN_SCORECLASS'              => 'Score-Klasse',
    'D3_BONIMASCORE_ADMIN_SCOREFROM'               => 'Scorewert von',
    'D3_BONIMASCORE_ADMIN_SCORETO'                 => 'Scorewert bis',
    'D3_BONIMASCORE_ADMIN_NEGPOS'                  => 'Negativ-Wahrscheinlichkeit',
    'D3_BONIMASCORE_ADMIN_PAYMENTTYPE'             => 'zusätzlich verfügbare Zahlungsarten',
    'D3_BONIMASCORE_ADMIN_CREDITLIMIT'             => 'Kreditlimit',
    'D3_BONIMASCORE_ADMIN_CREDITLIMIT_DESC'        => 'Angabe in Shopstandardwährung',
    'D3_BONIMASCORE_ADMIN_'                        => 'keine Validierung definiert',
    'D3_BONIMASCORE_ADMIN_1,2'                     => 'validiert / korrigiert',
    'D3_BONIMASCORE_ADMIN_0,3'                     => 'nicht validiert',

    'D3_BONIMASCORE_ADMIN_SCORE_'                  => 'keine Scoreklasse definiert',
    'D3_BONIMASCORE_ADMIN_SCORE_99000'             => 'negative Kontodaten',
    'D3_BONIMASCORE_ADMIN_SCORE_98000'             => 'Inkasso',
    'D3_BONIMASCORE_ADMIN_SCORE_97000'             => 'negative Kontodaten, Inkasso',
    'D3_BONIMASCORE_ADMIN_SCORE_96000'             => 'Gericht',
    'D3_BONIMASCORE_ADMIN_SCORE_95000'             => 'negative Kontodaten, Gericht',
    'D3_BONIMASCORE_ADMIN_SCORE_94000'             => 'Inkasso, Gericht',
    'D3_BONIMASCORE_ADMIN_SCORE_93000'             => 'negative Kontodaten, Inkasso, Gericht',

    'D3_BONIMASCORE_ADMIN_IDENTIFICATION'          => 'fehlende Angabe',
    'D3_BONIMASCORE_ADMIN_IDENTIFICATION1'         => 'Identifiziert',
    'D3_BONIMASCORE_ADMIN_IDENTIFICATION0'         => 'Nicht identifiziert',
    'D3_BONIMASCORE_ADMIN_IDENTIFICATION0,1'       => 'Identifiziert / Nicht identifiziert',

    'D3_BONIMASCORE_ADMIN_SAVE'                    => 'Einstellungen speichern',

    'D3_BONIMASCORE_ADMIN_MATRIXINFO'              => 'Die Zahlungsartenlisten enthalten ausschließlich Zahlungsarten, die nicht in den "sicheren Zahlungsarten" hinterlegt sind. Sichere Zahlungsarten werden dem Kunden in jeder Bonitätskonstellation angeboten.<br>Für eine Mehrfachauswahl der Zahlungsarten, bitte die Strg Taste gedrückt halten.',
    'D3_BONIMASCORE_ADMIN_SAFEPAYMENTINFO'         => 'Die sicheren Zahlungsarten werden berücksichtigt, wenn in der zutreffenden Scorekategorie der Warenkorbwert das Kreditlimit übersteigt oder keine Prüfung möglich ist. Außerdem sind sie bei allen Scorewerten automatisch als verfügbare Zahlungsarten enthalten.<br>Wenn Sie Zahlungsarten aus dieser Liste entfernen, prüfen Sie bitte in der Entscheidungsmatrix, ob diese dort passend zugeordnet sind.',

    'D3_BONIMASCORE_ADMIN_DEBUGACTIVE_DESC'        => 'Mit dem Debug-Modus wird der komplette Ablauf des Moduls in der Datenbank (Tabelle "d3log") protokolliert. Deaktivieren Sie diese Option im Live-Modus, da hierbei sehr viele Daten mitgeschrieben werden.',
    'D3_BONIMASCORE_ADMIN_HLMAINCONFIG'            => 'Grundeinstellungen',
    'D3_BONIMASCORE_ADMIN_SOAPCONFIG'              => 'Boniversum SOAP - Zugangsdaten',
    'D3_BONIMASCORE_ADMIN_PRODID'                  => 'ProdID',
    'D3_BONIMASCORE_ADMIN_PRODID_DESC'             => 'Tragen Sie hier die Produkt-ID ein, welche Sie von Boniversum erhalten haben.',
    'D3_BONIMASCORE_ADMIN_USER'                    => 'Benutzername',
    'D3_BONIMASCORE_ADMIN_USER_DESC'               => 'Tragen Sie hier den Benutzernamen ein, welchen Sie von Boniversum erhalten haben.',
    'D3_BONIMASCORE_ADMIN_PASS'                    => 'Passwort',
    'D3_BONIMASCORE_ADMIN_PASS_DESC'               => 'Tragen Sie hier das Passwort ein, welches Sie von Boniversum erhalten haben.',
    'D3_BONIMASCORE_ADMIN_COUNTRY_DE'              => 'Zu prüfendes Land',
    'D3_BONIMASCORE_ADMIN_COUNTRY_DE_DESC'         => 'Stellen Sie hier das Land ein, dessen Benutzer von Boniversum geprüft werden sollen. Ausschlaggebend ist die Rechnungsadresse des Kunden. Kunden anderer Länder werden nicht geprüft.',

    'D3_BONIMASCORE_ERROR_1001'                    => 'Parameter "geschaeftszeichen" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1002'                    => 'Parameter "berechtigtesinteresse" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1003'                    => 'Parameter "geschlecht" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1004'                    => 'Parameter "nachname" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1005'                    => 'Parameter "vorname" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1006'                    => 'Parameter "strasse" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1007'                    => 'Parameter "hausnr" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1008'                    => 'Parameter "plz" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1009'                    => 'Parameter "ort" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1010'                    => 'Parameter "einwilligungsklausel" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1011'                    => 'Parameter "prodid" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1012'                    => 'Parameter "strasse2" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1013'                    => 'Parameter "hausnr2" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1014'                    => 'Parameter "plz2" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_1015'                    => 'Parameter "ort2" nicht vorhanden/ungefüllt/ungültiger Inhalt',
    'D3_BONIMASCORE_ERROR_UNKNOWN'                 => 'Unbekannter Fehlercode %1$s zurückgegeben.',

    'D3_BONIMASCORE_ERROR_2000'                    => 'Bitte Anfrage erneut senden oder Boniversum Helpdesk kontaktieren.',
    'D3_BONIMASCORE_ERROR_3000'                    => 'Bitte Boniversum Helpdesk kontaktieren.',

    "tbcluser_bonimascore"                         => "BonimaScore",
    "tbclusergroup_bonimascore"                    => "BonimaScore",
    "D3_BONIMASCORE_USER_NOTING_FOUND"             => "keine Bonima Adressvalidierung gefunden",
    "D3_BONIMASCORE_USER_TITLE"                    => "Letzte Validierung",
    "D3_BONIMASCORE_USER_PERSON_STATUS"            => "Status Person",
    "D3_BONIMASCORE_USER_PERSON_EXIST"             => "Existenz Person",
    "D3_BONIMASCORE_USER_ADRESS_STATUS"            => "Status Adresse",
    "D3_BONIMASCORE_USER_CHECKTIME"                => "Zeitpunkt",
    "D3_BONIMASCORE_USER_NEXTCHECK"                => "nächste Prüfung",
    "D3_BONIMASCORE_USER_NEXTCHECK_FROM"           => "frühestens ab",
    "D3_BONIMASCORE_USER_HOUR"                     => "Uhr",
    "D3_BONIMASCORE_USER_ADRRESSTITLE"             => "Validierte Adressdaten",
    "D3_BONIMASCORE_USER_SCOREVALUE"               => "Scorewert",
    "D3_BONIMASCORE_USER_SCORECLASS"               => "Scoreklasse",
    "D3_BONIMASCORE_USER_SCORECREDITLIMIT"         => "Kreditlimit (aus Score)",
    "D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT"     => "Kreditlimit (kundenspezifisch)",
    "D3_BONIMASCORE_USER_SCOREUSERCREDITLIMIT_DESC"=> "Die Option ist lizenzabhängig verfügbar.<br><br>Ist 0 eingetragen, wird das Kreditlimit aus der Scoreklasse verwendet. Ansonsten hat (scoreunabhängig) dieses kundenspezifische Kreditlimit Vorrang.",

    "D3_BONIMASCORE_ADMIN_HLVALIDPERIOD"           => 'Lizenzoption "Gültigkeitsdauer des Scores anpassen"',
    "D3_BONIMASCORE_ADMIN_VALIDPERIOD"             => "Bonität erneut nach X Tagen prüfen",
    "D3_BONIMASCORE_ADMIN_VALIDPERIOD_DESC"        => "Frühere Bonitätsprüfungen werden nach 1 Tag verworfen und eine erneute Prüfung durchgeführt. Sollen ältere Prüfungen länger Bestand haben, tragen Sie hier die Anzahl der Tage ein, nach denen erneut geprüft werden soll. Ist kein Wert oder 0 eingetragen, wird die Standardeinstellung verwendet.",
    "D3_BONIMASCORE_ADMIN_HLCHECKDELADDR"          => 'Lizenzoption "eingeschränkte Zahlungsarten bei abweichender Lieferadresse"',
    "D3_BONIMASCORE_ADMIN_CHECKDELADDRFIELDS"      => "Lieferadressprüfung aktiv",
    "D3_BONIMASCORE_ADMIN_CHECKDELADDRFIELDS_DESC" => "Erst mit Aktivierung dieser Checkbox wird die Lieferadresse mit der Rechnungsadresse vergleichen und bei entsprechenden Abweichungen die verfügbaren Zahlungsarten geprüft.",
    "D3_BONIMASCORE_ADMIN_DELADDRFIELDS"           => "Prüffelder (pipe-getrennt)",
    "D3_BONIMASCORE_ADMIN_DELADDRFIELDS_DESC"      => 'Alle diese Felder werden auf abweichende Inhalte geprüft. Beachten Sie bitte, dass die genannten Felder am Kundenkonto und auch an der Lieferadresse vorkommen müssen. <br><br>Tragen Sie hier den genauen Feldnamen der jeweiligen Eingabefeldes ein (z.B. "oxfname" für den Vornamen). Sollen mehrere Felder definiert werden, trennen Sie die Namen mit einem Pipe-Zeichen "|".<br><br>Standardeinstellung sind die Felder <ul><li>oxcountryid (Land)</li><li>oxstreet (Straße)</li><li>oxstreetnr (Hausnummer)</li><li>oxzip (PLZ)</li><li>oxcity (Stadt)</li></ul>Unterschiedliche Schreibweisen (z.B. "Str." und "Straße") werden als abweichende Adresse gewertet.',
    "D3_BONIMASCORE_ADMIN_DELADDRFORBPAYMENTS"     => "nicht erlaubte Zahlart(en) (pipe-getrennt)",
    "D3_BONIMASCORE_ADMIN_DELADDRFORBPAYMENTS_DESC"=> 'Alle die hier angegebenen Zahlarten werden bei abweichender Lieferadresse nicht verfügbar gemacht. Bei identischer oder nicht gesetzter Lieferadresse entscheidet das Boniversum-Modul über die Verfügbarkeit.<br><br>Tragen Sie hier die ID der jeweiligen Zahlart ein. Sollen mehrere Zahlarten definiert werden, trennen Sie die IDs mit einem Pipe-Zeichen "|".',
    "D3_BONIMASCORE_ADMIN_HLBASKETVALUE"           => 'Lizenzoption "Score erst ab definiertem Warenkorbwert abfragen"',
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUE"        => "Mindestwarenkorbwert für Bonitätsprüfung aktiv",
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUE_DESC"   => "Ist dieser Haken gesetzt, wird die Bonitätsprüfung für alle Benutzer und Zahlarten ab dem definierten Warenkorbwert vorgenommen. Der Wert kann global im folgenden Eingabefeld eingestellt werden. Alternativ kann diese Einstellung mit dem Wert am Kundenkonto überschrieben werden (Benutzer verwalten -> Benutzer -> BonimaScore -> minimaler Warenkorbwert für Boniversum-Prüfung). Der Wert am Kundenkonto hat Vorrang.",
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUETHRESHOLD"        => "Mindestwert des Warenkorb (globale Einstellung)",
    "D3_BONIMASCORE_ADMIN_CHECKBASKETVALUETHRESHOLD_DESC"   => "Sofern am Kundenkonto keine Einstellung definiert ist, wird diese Schwelle verwendet.",
    'D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD'    => 'minimaler Warenkorbwert für Boniversum-Prüfung',
    'D3_BONIMASCORE_CHECKBASKETVALUE_THRESHOLD_DESC'        => 'Die Option ist lizenzabhängig verfügbar.<br><br>Ist 0 eingetragen, wird der globale Wert verwendet (einstellbar unter "D3 Module -> BonimaScore -> Moduleinstellungen -> Mindestwert des Warenkorb (globale Einstellung)"). Ansonsten hat dieser kundenspezifische Mindestwarenkorbwert Vorrang.',
    "D3_BONIMASCORE_ADMIN_HLEXCLUDEUSERS"          => 'Lizenzoption "Benutzer oder Benutzergruppen von Prüfung ausschließen"',
    'D3_BONIMASCORE_ADMIN_EXCLUDEUSERS'            => 'markierte Kunden und Kundengruppen werden von Bonitätsprüfung ausgenommen',
    'D3_BONIMASCORE_ADMIN_EXCLUDEUSERS_DESC'       => 'Ist dieser Haken gesetzt, wird die Bonitätsprüfung für alle markierten Benutzer und Kundengruppen ausgenommen. Diese Kunden sehen alle verfügbaren Zahlungsarten. Die Markierung setzen Sie am jeweiligen Kundenkonto oder an der Kundengruppe.',
    'D3_BONIMASCORE_EXCLUDEFROMCHECK'              => 'Kunde wird durch Boniversum nicht geprüft',
    'D3_BONIMASCORE_EXCLUDEGROUPFROMCHECK'         => 'alle Kunden dieser Gruppe werden durch Boniversum nicht geprüft',
    'D3_BONIMASCORE_ADMIN_HLOPTIONNOTACTIVE'       => '(Option nicht aktiv)',
    'D3_BONIMASCORE_PAYMENTS_PLEASE_CHOOSE'        => 'Bitte wählen Sie',
);
