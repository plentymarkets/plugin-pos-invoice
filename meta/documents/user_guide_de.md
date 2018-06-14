# User Guide für das Plugin plentyPOS Kauf auf Rechnung<a id="10." name="10.">

Mit diesem Plugin binden Sie die Zahlungsart **Rechnung** in Ihre plentymarkets POS Kassen ein. Wenn Sie das Plugin aktivieren, können Sie Bestandskunden, die Artikel über Ihre plentymarkets POS Kasse kaufen, die Möglichkeit anbieten, ihren Kauf auf Rechnung zu tätigen.

## Wichtiger Hinweis zu Retouren<a id="05." name="05.">

<div class="alert alert-warning" role="alert">
   Aufträge mit Kauf auf Rechnung können bis zum nächsten Tagesabschluss wie gewohnt storniert werden. Mit der aktuellen Version des Plugins sind Retouren von nicht oder nur teilweise bezahlten Aufträgen mit Rechnungskauf jedoch noch nicht möglich. Vollständig bezahlte Aufträge können retourniert werden. Die plentymarkets App ermöglicht es Ihnen jedoch nicht zu prüfen, ob ein Auftrag vollständig bezahlt wurde. Deshalb muss vor einer Retoure im plentymarkets Backend geprüft werden, dass der Auftrag tatsächlich vollständig bezahlt wurde.
</div>

## Inhaltsverzeichnis

* <a href="#05."><b>Wichtiger Hinweis zu Retouren</b></a>
* <a href="#10."><b>Voraussetzungen</b></a>
* <a href="#20."><b>Zahlungsziel festlegen</b></a>
* <a href="#30."><b>Zahlungsart in Kundenklasse erlauben</b></a>
* <a href="#40."><b>Hinweise zur Rechnungsvorlage</b></a>
* <a href="#50."><b>Rechnung per E-Mail an Bestandskunden senden</b></a>


## Voraussetzungen<a id="10." name="10.">

Das Plugin plentyPOS Kauf auf Rechnung wird im plentymarkets Backend bereitgestellt. Um von der Kasse aus Rechnungen im DIN-A4-Format zu drucken, benötigen Sie jedoch außerdem das Plugin [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). plentyBase stellt eine Verbindung zwischen der plentymarkets App, der Druckerkonfiguration im plentymarkets Backend und lokalen Druckern her. Für den Kauf auf Rechnung über plentymarkets POS gelten daher die folgenden technischen Voraussetzungen:

* plentyBase muss auf einem Rechner im Netzwerk installiert sein. <br>
→ Die Installationsdatei laden Sie im [plentyMarketplace](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053) herunter.
* plentyBase muss auf dem Rechner konfiguriert sein. <br>
→ Die Konfigurationsanleitung finden Sie in der Beschreibung des Plugins [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). <br>
***Hinweis:*** Aktivieren Sie bei der Konfiguration die Option **HTTP-Server**. Nur so kann plentymarkets POS mit plentyBase kommunizieren.
* plentyBase muss auf dem Rechner gestartet sein. <br>
***Empfehlung:*** Konfigurieren Sie plentyBase so, dass plentyBase beim Starten des Rechners automatisch gestartet wird.
* In der plentymarkets App müssen die plentyBase Verbindungsdaten gespeichert sein. <br>
→ Wie Sie die plentyBase Verbindungsdaten in der App speichern, erfahren Sie in der Beschreibung des Plugins [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053#140).
* Im plentymarkets Backend muss im Menü **System » Einstellungen » Drucker** ein Drucker konfiguriert sein, über den die Rechnung gedruckt wird.
* In den Druckereinstellungen von plentymarkets POS muss [der Drucker für den Rechnungsdruck](https://knowledge.plentymarkets.com/omni-channel/pos/pos-einrichten#1020) gewählt werden.

## Zahlungsziel festlegen<a id="20." name="20.">

Das Zahlungsziel für alle Rechnungen für Kassenaufträge wählen Sie in den Plugin-Einstellungen. Da für plentymarkets POS Rechnungen das Zahlungsziel der Kundenklasse nicht berücksichtigt wird, gilt das im Plugin gespeicherte Zahlungsziel für alle plentymarkets POS Rechnungen.

##### Zahlungsziel festlegen:

1. Öffnen Sie das Menü **Plugins » Plugin-Übersicht**. <br>
  → Die Plugin-Übersicht wird geöffnet.
2. Klicken Sie auf das Plugin **plentyPOS Kauf auf Rechnung**.
3. Wechseln Sie in die Ansicht **Konfiguration » Grundeinstellungen**.
4. Wählen Sie ein Zahlungsziel aus der Dropdown-Liste **Zahlungsziel**. Mögliche Zahlungsziele sind **14 Tage**, **28 Tage**, **30 Tage** und **60 Tage**.
5. **Speichern** Sie die Einstellung. <br>
→ Das Zahlungsziel wird gespeichert und gilt für alle Rechnungen, die über die Kasse erstellt werden.

## Zahlungsart in Kundenklasse erlauben<a id="30." name="30.">

Wenn Sie mit Kundenklassen arbeiten, aktivieren Sie nun die Zahlungsart in den Kundenklassen, für die Sie den Rechnungskauf über die Kasse erlauben möchten.

##### Zahlungsart in Kundenklasse erlauben:

1. Öffnen Sie das Menü **System » CRM » Kundenklassen**.
2. Klappen Sie die Kundenklasse für plentymarkets POS Aufträge auf.
3. Klicken Sie mit der Maus auf die Zahlungsart, um sie zu aktivieren.
4. **Speichern** Sie die Einstellungen.

## Hinweise zur Rechnungsvorlage<a id="40." name="40.">

Die Rechnungsvorlage für plentymarkets POS Rechnungen ist nicht anpassbar. Die Unternehmensdaten werden aus den folgenden Menüs des plentymarkets Backend aufgefüllt:

| Unternehmensdaten | Menü |
|---|---|
| Adressdaten | **System » Mandant » Mandant öffnen » POS » Kasse öffnen » Tab: Grundeinstellungen » Bereich: Standort** |
| Telefon, Telefax, E-Mail, Hotline | **System » Einstellungen » Stammdaten** |
| Bankdaten | **System » Einstellungen » Bank** |
| Umsatzsteuer-ID | **System » Mandant » Mandant öffnen » Standorte » Standort öffnen » Buchhaltung » Tab: Umsatzsteuersätze** |


## Rechnung per E-Mail an Bestandskunden senden<a id="50." name="50.">

plentymarkets ermöglicht es Ihnen, plentymarkets POS Rechnungen per Ereignisaktion automatisch an die am Kundendatensatz gespeicherte E-Mail-Adresse zu senden. Dazu nutzen Sie die E-Mail-Vorlage für den Rechnungsversand von plentymarkets oder erstellen eine eigene E-Mail-Vorlage. Wenn Sie eine E-Mail-Vorlage haben, mit der Sie arbeiten möchten, erstellen Sie eine Ereignisaktion. Für Kassenaufträge, die im Offline-Modus erstellt werden, wird die Ereignisaktion jedoch erst ausgeführt, wenn die Kassenaufträge in das plentymarkets Backend hochgeladen werden. Prüfen Sie vor der Einrichtung des automatischen Rechnungsversands die aktuellen gesetzlichen Bestimmungen zum Versand von E-Mails an Kunden.

#### E-Mail-Vorlage erstellen

Damit Rechnungen automatisch versendet werden können, benötigen Sie eine [E-Mail-Vorlage](https://knowledge.plentymarkets.com/crm/e-mails-versenden#1200). Sie können die vorhandene [E-Mail-Vorlage](https://knowledge.plentymarkets.com/crm/e-mails-versenden#1200) von plentymarkets für den Rechnungsversand verwenden. Alternativ gehen Sie wie unten beschrieben vor, um eine eigene E-Mail-Vorlage zu erstellen.

##### E-Mail-Vorlage erstellen:

1. Öffnen Sie das Menü **System » Mandant » Mandant wählen » E-Mail » Vorlagen**.
2. Klicken Sie auf **Neue E-Mail-Vorlage**. <br>
→ Das Fenster **Neue E-Mail-Vorlage** wird geöffnet.
3. Geben Sie einen Namen für die Vorlage ein.
4. Wählen Sie einen Eigner oder **Alle** aus der Dropdown-Liste **Eigner**.
5. Klicken Sie auf **Speichern**. <br>
→ Die E-Mail-Vorlage wird erstellt und je nach gewähltem Eigner in einem der drei Ordner gespeichert.
6. Wählen Sie den PDF-Anhang **Rechnung**.
7. Nehmen Sie die weiteren Einstellungen vor. Beachten Sie die Erläuterungen unter [Neue E-Mail-Vorlage erstellen](https://knowledge.plentymarkets.com/crm/e-mails-versenden#1200).
8. **Speichern** Sie die Einstellungen.


### Ereignisaktion erstellen

Erstellen Sie nun eine Ereignisaktion, über die die E-Mail-Vorlage versendet wird, wenn eine Rechnung über plentymarkets POS generiert wird.

##### Ereignisaktion einrichten

1. Öffnen Sie das Menü **System » Aufträge » Ereignisse**.
2. Klicken Sie auf **Ereignisaktion hinzufügen**. <br>
→ Das Fenster **Neue Ereignisaktion erstellen** wird geöffnet.
3. Geben Sie einen Namen ein.
4. Wählen Sie das **Ereignis** gemäß Tabelle 2.
5. **Speichern** Sie die Einstellungen.
6. Nehmen Sie die Einstellungen gemäß Tabelle 2 vor.
7. Setzen Sie ein Häkchen bei **Aktiv**.
8. **Speichern** Sie die Einstellungen.


| Einstellung | Option | Auswahl |
|---|---|---|
| **Ereignis** | **Dokumente: Rechnung generiert** | |
| **Filter** | **Auftrag &gt; Herkunft** | Kasse wählen, für die Rechnungen per E-Mail versendet werden sollen. |
| **Aktion** | **Kunde &gt; E-Mail versenden** | **Vorlage**: Die E-Mail-Vorlage für Rechnung wählen. **Empfänger**: Option **Kunde** wählen. |

Tabelle 2: Ereignisaktion zum automatischen E-Mail-Versand der Rechnung
