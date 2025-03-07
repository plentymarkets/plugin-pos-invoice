# User Guide für das Plugin POS Kauf auf Rechnung<a id="10." name="10.">

Mit diesem Plugin bindest du die Zahlungsart **Rechnung** in deine POS Kassen ein. Wenn du das Plugin aktivierst, haben Bestandskunden, die Artikel über deine POS Kasse kaufen, die Möglichkeit zum Kauf auf Rechnung.

## Hinweis zu Retouren<a id="05." name="05.">

<div class="alert alert-warning" role="alert">
  Aufträge mit Kauf auf Rechnung können bis zum nächsten Tagesabschluss wie gewohnt storniert werden. Auch die Retoure von auf Rechnung gekauften Artikeln ist ab Version 1.8 der POS App möglich. Bei Teilzahlung errechnet die Kasse automatisch, welchen Betrag Kunden zurückbekommen.
</div>

## Inhaltsverzeichnis

* <a href="#05."><b>Hinweis zu Retouren</b></a>
* <a href="#10."><b>Voraussetzungen</b></a>
* <a href="#20."><b>Zahlungsziel festlegen</b></a>
* <a href="#30."><b>Zahlungsart in Kundenklasse erlauben</b></a>
* <a href="#40."><b>Hinweise zur Rechnungsvorlage</b></a>
* <a href="#50."><b>Rechnung per E-Mail an Bestandskunden senden</b></a>
* <a href="#60."><b>Anzahlungen über POS entgegennehmen</b></a>


## Voraussetzungen<a id="10." name="10.">

Das Plugin POS Kauf auf Rechnung wird im PlentyONE Backend bereitgestellt. Um von der Kasse aus Rechnungen im DIN-A4-Format zu drucken, benötigst du zusätzlich das Plugin [Base](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). Base stellt eine Verbindung zwischen der POS App, der Druckerkonfiguration im PlentyONE Backend und lokalen Druckern her. Für den Kauf auf Rechnung über POS gelten daher die folgenden technischen Voraussetzungen:

* Base muss auf einem Rechner im Netzwerk installiert sein. <br>
→ Die Installationsdatei lädst du im [plentyMarketplace](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053) herunter.
* Base muss auf dem Rechner konfiguriert sein. <br>
→ Die Konfigurationsanleitung findest du in der Beschreibung des Plugins [Base](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). <br>
  *_Hinweis:_* Aktiviere bei der Konfiguration die Option **HTTP-Server**. Nur so kann POS mit Base kommunizieren.
* Base muss auf dem Rechner gestartet sein. <br>
  *_Tipp:_* Konfiguriere Base so, dass Base beim Starten des Rechners automatisch gestartet wird.
* In der POS App müssen die Base Verbindungsdaten gespeichert sein. <br>
→ Wie du die Base Verbindungsdaten in der App speicherst, erfährst du in der Beschreibung des Plugins [Base](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053#140).
* Im PlentyONE Backend muss im Menü **System » Einstellungen » Drucker** ein Drucker konfiguriert sein, über den die Rechnung gedruckt wird.
* In den Druckereinstellungen von POS muss [der Drucker für den Rechnungsdruck](https://knowledge.plentymarkets.com/de-de/manual/main/pos/pos-einrichten.html#1020) gewählt werden.

## Zahlungsziel festlegen<a id="20." name="20.">

In den Plugin-Einstellungen wählst du ein Zahlungsziel für Rechnungen von Kassenaufträgen. Bei der Erstellung der Rechnung hat ein am Datensatz des Kunden gespeicherte Zahlungsziel oberste Priorität. Ist kein kundenspezifisches Zahlungsziel festgelegt, wird geprüft, ob für die Kundenklasse ein Zahlungsziel gespeichert ist. Erst wenn es auch für die Kundenklasse kein Zahlungsziel gibt, wird das im Plugin gespeicherte Zahlungsziel herangezogen.

##### Zahlungsziel festlegen:

1. Öffne das Menü **Plugins » Plugin-Übersicht**. <br>
→ Die Plugin-Übersicht wird geöffnet.
1. Klicke auf das Plugin **POS Kauf auf Rechnung**.
2. Wechsle in die Ansicht **Konfiguration » Grundeinstellungen**.
3. Gib in das Feld **Zahlungsziel (in Tagen)** ein Zahlungsziel ein.
4. **Speichere** die Einstellung. <br>
→ Das Zahlungsziel wird gespeichert. <br>
→ Das Zahlungsziel gilt für alle Kunden, für die kein abweichendes Zahlungsziel im Kundendatensatz oder der Kundenklasse gespeichert ist.

## Zahlungsart in Kundenklasse erlauben<a id="30." name="30.">

Wenn du mit Kundenklassen arbeitest, aktiviere nun die Zahlungsart in den Kundenklassen, für die du den Rechnungskauf über die Kasse erlauben möchtest.

##### Zahlungsart in Kundenklasse erlauben:

1. Öffne das Menü **Einrichtung » CRM » Klassen**.
2. Klappe die Kundenklasse für POS Aufträge auf.
3. Klicke mit der Maus auf die Zahlungsart, um sie zu aktivieren.
4. **Speichere** die Einstellungen.

## Rechnungsvorlage anpassen<a id="40." name="40.">

Die Unternehmensdaten auf der Rechnungsvorlage werden aus den folgenden Menüs des PlentyONE Backend aufgefüllt:

| Unternehmensdaten | Menü                                                                                                            |
|---|-----------------------------------------------------------------------------------------------------------------|
| Adressdaten | **Einrichtung » POS » Mandant öffnen » Kasse öffnen » Tab: Grundeinstellungen » Bereich: Standort**             |
| Telefon, Telefax, E-Mail, Hotline | **Einrichtung » Einstellungen » Stammdaten**                                                                    |
| Bankdaten | **Einrichtung » Einstellungen » Bank**                                                                          |
| Umsatzsteuer-ID | **Einrichtung » Mandant » Mandant öffnen » Standorte » Standort öffnen » Buchhaltung » Tab: Umsatzsteuersätze** |

Die Rechnungsvorlage für POS Rechnungen ist nicht anpassbar. Du kannst allerdings die Fußzeile unterdrücken, wenn du Rechnungen auf vorgedrucktem Briefpapier drucken möchtest, das bereits deine Unternehmensdaten enthält.

##### Fußzeile auf Rechungsdokument unterdrücken:

1. Öffne das Menü **Plugins » Plugin-Übersicht**. <br>
→ Die Plugin-Übersicht wird geöffnet.
1. Klicke auf das Plugin **POS Kauf auf Rechnung**.
2. Wechsle in die Ansicht **Konfiguration » Grundeinstellungen**.
3. Aktiviere die Option **Fußzeile auf Rechungsdokument unterdrücken**.
4. **Speichere** die Einstellung. <br>
→ Die Fußzeile wird nicht auf das Rechnungsdokument gedruckt.

## Rechnung per E-Mail an Bestandskunden senden<a id="50." name="50.">

PlentyONE ermöglicht es dir, POS Rechnungen per Ereignisaktion automatisch an die am Kundendatensatz gespeicherte E-Mail-Adresse zu senden. Dazu nutzt du die E-Mail-Vorlage für den Rechnungsversand von PlentyONE oder erstellst eine eigene E-Mail-Vorlage. Wenn du eine E-Mail-Vorlage hast, mit der du arbeiten möchtest, erstelle eine Ereignisaktion. Für Kassenaufträge, die im Offline-Modus erstellt werden, wird die Ereignisaktion jedoch erst ausgeführt, wenn die Kassenaufträge in das PlentyONE Backend hochgeladen werden. Prüfe vor der Einrichtung des automatischen Rechnungsversands die aktuellen gesetzlichen Bestimmungen zum Versand von E-Mails an Kunden.

#### E-Mail-Vorlage erstellen

Damit Rechnungen automatisch versendet werden können, benötigst du eine [E-Mail-Vorlage](https://knowledge.plentymarkets.com/de-de/manual/main/crm/e-mails-versenden.html#1200). Du kannst die vorhandene E-Mail-Vorlage von PlentyONE für den Rechnungsversand verwenden. Alternativ gehe wie unten beschrieben vor, um eine eigene E-Mail-Vorlage zu erstellen.

##### E-Mail-Vorlage erstellen:

1. Öffne das Menü **Einrichtung » Mandant » Mandant wählen » E-Mail » Vorlagen**.
2. Klicke auf **Neue E-Mail-Vorlage**. <br>
→ Das Fenster **Neue E-Mail-Vorlage** wird geöffnet.
3. Gib einen Namen für die Vorlage ein.
4. Wähle einen Eigner oder **Alle** aus der Dropdown-Liste **Eigner**.
5. Klicke auf **Speichern**. <br>
→ Die E-Mail-Vorlage wird erstellt und je nach gewähltem Eigner in einem der drei Ordner gespeichert.
6. Wähle den PDF-Anhang **Rechnung**.
7. Nimm de die weiteren Einstellungen vor. Beachte die Erläuterungen unter [Neue E-Mail-Vorlage erstellen](https://knowledge.plentymarkets.com/de-de/manual/main/crm/e-mails-versenden.html#1200).
8. **Speichere** die Einstellungen.


### Ereignisaktion erstellen

Erstelle nun eine Ereignisaktion, über die die E-Mail-Vorlage versendet wird, wenn eine Rechnung über POS generiert wird.

##### Ereignisaktion einrichten

1. Öffne das Menü **Einrichtung » Aufträge » Ereignisse**.
2. Klicke auf **Ereignisaktion hinzufügen**. <br>
→ Das Fenster **Neue Ereignisaktion erstellen** wird geöffnet.
3. Gib einen Namen ein.
4. Wähle das **Ereignis** gemäß Tabelle 2.
5. **Speichere** die Einstellungen.
6. Nimm die Einstellungen gemäß Tabelle 2 vor.
7. Setze ein Häkchen bei **Aktiv**.
8. **Speichere** die Einstellungen.


| Einstellung | Option | Auswahl |
|---|---|---|
| **Ereignis** | **Dokumente: Rechnung generiert** | |
| **Filter** | **Auftrag &gt; Herkunft** | Kasse wählen, für die Rechnungen per E-Mail versendet werden sollen. |
| **Aktion** | **Kunde &gt; E-Mail versenden** | **Vorlage**: Die E-Mail-Vorlage für Rechnung wählen. **Empfänger**: Option **Kunde** wählen. |

Tabelle 2: Ereignisaktion zum automatischen E-Mail-Versand der Rechnung

## Anzahlungen über POS entgegennehmen<a id="60." name="60.">

Mit POS kannst du unkompliziert Anzahlungen entgegennehmen. Dies ist zum Beispiel bei Artikeln mit hohen Verkaufspreisen oder bei Ware, die speziell für Kunden angefertigt wird, sinnvoll. Zur Abwicklung von Anzahlungen muss das Plugin POS Kauf auf Rechnung aktiviert sowie bereits ein Kontaktdatensatz für den betreffenden Kunden vorhanden sein. In unserem [Handbuch](https://knowledge.plentymarkets.com/de-de/manual/main/pos/pos-kassenbenutzer.html#440) findest du eine Anleitung zum Umgang mit Anzahlungen.