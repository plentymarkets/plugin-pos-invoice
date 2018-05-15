# User Guide für das Plugin POS Invoice<a id="10." name="10.">

Mit diesem Plugin binden Sie die Zahlungsart **Rechnung** in Ihre plentymarkets POS Kassen ein. Wenn Sie das Plugin aktivieren, können Sie Bestandskunden, die Artikel über Ihre plentymarkets POS Kasse kaufen, die Möglichkeit anbieten, ihren Kauf auf Rechnung zu tätigen.

## Voraussetzungen<a id="10." name="10.">

Um Rechnungskauf über plentymarkets POS anbieten zu können, gelten die folgenden technischen Voraussetzungen:

* plentyBase muss auf einem Rechner im Netzwerk installiert sein. <br>
→ Die Installationsdatei laden Sie im [plentyMarketplace](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053)  herunter.
* plentyBase muss auf dem Rechner konfiguriert sein. <br>
→ Die Konfigurationsanleitung finden Sie in der Beschreibung des Plugins [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053). <br>
***Hinweis:*** Aktivieren Sie bei der Konfiguration die Option *HTTP-Server*. Nur so kann plentymarkets POS mit plentyBase kommunizieren.
* plentyBase muss auf dem Rechner gestartet sein. <br>
***Empfehlung:*** Konfigurieren Sie plentyBase so, dass plentyBase beim Starten des Rechners automatisch gestartet wird.
* Die Verbindungsdaten von plentyBase müssen in der plentymarkets App gespeichert sein. <br>
→ Wie Sie die plentyBase Verbindungsdaten in der App speichern, erfahren Sie in der Beschreibung des Plugins [plentyBase](https://marketplace.plentymarkets.com/plugins/integration/plentyBase_5053#140).
* Für den Rechnungsdruck muss ein Drucker im plentymarkets Backend im Menü **System » Einstellungen » Drucker** konfiguriert sein.
* In den Druckereinstellungen von plentymarkets POS muss [der Drucker für den Rechnungsdruck](https://knowledge.plentymarkets.com/omni-channel/pos/pos-einrichten#1020) gewählt werden.

## Inhaltsverzeichnis

* <a href="#10."><b>Voraussetzungen</b></a>
* <a href="#20."><b>Zahlungsziel festlegen</b></a>
* <a href="#30."><b>Zahlungsart in Kundenklasse erlauben</b></a>
* <a href="#40."><b> </b></a>
* <a href="#50."><b> </b></a>
* <a href="#60."><b> </b></a>
* <a href="#70."><b> </b></a>
* <a href="#80."><b> </b></a>


## Zahlungsziel festlegen<a id="20." name="20.">




##### Zahlungsziel festlegen:

1. Öffnen Sie das Menü **Plugins » Plugin-Übersicht**. <br>
  → Die Plugin-Übersicht wird geöffnet.
2. Klicken Sie auf das Plugin **POS Invoice**.
3. Wechseln Sie in die Ansicht **Konfiguration » Grundeinstellungen**.
2. Wählen Sie ein Zahlungsziel aus der Dropdown-Liste **Zahlungsziel**. <br>
→ Mögliche Zahlungsziele sind **14 Tage**, **28 Tage**, **30 Tage** und **60 Tage**.
3. **Speichern** Sie die Einstellung. <br>
→ Das Zahlungsziel wird gespeichert und gilt für alle Rechnungen, die über die Kasse erstellt werden.

## Zahlungsart in Kundenklasse erlauben<a id="30." name="30.">

Aktivieren Sie nun die Zahlungsart in den Kundenklassen, für die Sie den Rechnungskauf über die Kasse erlauben möchten.

##### Zahlungsart in Kundenklasse erlauben:

1. Öffnen Sie das Menü **System » CRM » Kundenklassen**.
2. Klappen Sie die Kundenklasse für plentymarkets POS Aufträge auf.
3. Aktivieren Sie die Zahlungsart.
4. **Speichern** Sie die Einstellungen.


Rechnungsvorlage: Footer ergibt sich aus Stammdaten.
