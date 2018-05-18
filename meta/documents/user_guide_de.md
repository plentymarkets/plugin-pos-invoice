# User Guide für das Plugin POS Kauf auf Rechnung<a id="10." name="10.">

Mit diesem Plugin binden Sie die Zahlungsart **Rechnung** in Ihre plentymarkets POS Kassen ein. Wenn Sie das Plugin aktivieren, können Sie Bestandskunden, die Artikel über Ihre plentymarkets POS Kasse kaufen, die Möglichkeit anbieten, ihren Kauf auf Rechnung zu tätigen.

## Wichtiger Hinweis zu Retouren<a id="05." name="05.">

<div class="alert alert-warning" role="alert">
   Aufträge mit Kauf auf Rechnung können bis zum nächsten Tagesabschluss wie gewohnt storniert werden. Mit der aktuellen Version des Plugins sind Retouren von nicht oder nur teilweise bezahlten Aufträgen Rechnungskauf jedoch noch nicht möglich. Vollständig bezahlte Aufträge können nur über das plentymarkets Backend retourniert werden.
</div>

## Inhaltsverzeichnis

* <a href="#05."><b>Wichtiger Hinweis zu Retouren</b></a>
* <a href="#10."><b>Voraussetzungen</b></a>
* <a href="#20."><b>Zahlungsziel festlegen</b></a>
* <a href="#30."><b>Zahlungsart in Kundenklasse erlauben</b></a>
* <a href="#40."><b>Hinweise zur Rechnungsvorlage</b></a>

## Voraussetzungen<a id="10." name="10.">

Das Plugin POS Kauf auf Rechnung wird im plentymarkets Backend bereitgestellt. Um von der Kasse aus Rechnungen im DIN-A4-Format zu drucken, benötigen Sie jedoch außerdem das Plugin [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). plentyBase stellt eine Verbindung zwischen der plentymarkets App, dem plentymarkets Backend und lokalen Endgeräten her. Für den Kauf auf Rechnung über plentymarkets POS gelten daher die folgenden technischen Voraussetzungen:

* plentyBase muss auf einem Rechner im Netzwerk installiert sein. <br>
→ Die Installationsdatei laden Sie im [plentyMarketplace](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053)  herunter.
* plentyBase muss auf dem Rechner konfiguriert sein. <br>
→ Die Konfigurationsanleitung finden Sie in der Beschreibung des Plugins [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). <br>
***Hinweis:*** Aktivieren Sie bei der Konfiguration die Option *HTTP-Server*. Nur so kann plentymarkets POS mit plentyBase kommunizieren.
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
2. Klicken Sie auf das Plugin **POS Kauf auf Rechnung**.
3. Wechseln Sie in die Ansicht **Konfiguration » Grundeinstellungen**.
2. Wählen Sie ein Zahlungsziel aus der Dropdown-Liste **Zahlungsziel**. Mögliche Zahlungsziele sind **14 Tage**, **28 Tage**, **30 Tage** und **60 Tage**. <br>
***Hinweis:*** Für plentymarkets POS Rechnungen wird das Zahlungsziel der Kundenklasse nicht berücksichtigt. Das im Plugin gespeicherte Zahlungsziel greift also für alle plentymarkets POS Rechnungen.
3. **Speichern** Sie die Einstellung. <br>
→ Das Zahlungsziel wird gespeichert und gilt für alle Rechnungen, die über die Kasse erstellt werden.

## Zahlungsart in Kundenklasse erlauben<a id="30." name="30.">

Aktivieren Sie nun die Zahlungsart in den Kundenklassen, für die Sie den Rechnungskauf über die Kasse erlauben möchten.

##### Zahlungsart in Kundenklasse erlauben:

1. Öffnen Sie das Menü **System » CRM » Kundenklassen**.
2. Klappen Sie die Kundenklasse für plentymarkets POS Aufträge auf.
3. Klicken Sie mit der Maus auf die Zahlungsart, um sie zu aktivieren.
4. **Speichern** Sie die Einstellungen.

## Hinweise zur Rechnungsvorlage<a id="40." name="40.">

Die Rechnungsvorlage für plentymarkets POS Rechnungen ist nicht anpassbar. Die Unternehmensdaten werden aus den folgenden Menüs des plentymarkets Backend aufgefüllt:

| Unternehmensdaten | Menü |
|---|---|
| Adressdaten | **System » Mandant » Mandant öffnen » POS » Kasse öffnen** |
| Umsatzsteuer-ID | **System » Mandant » Mandant öffnen » Standorte » Buchhaltung » Tab: Umsatzsteuersätze** |
| Bankdaten | **System » Einstellungen » Bank** |
