# User guide for the plentyPOS Invoice plugin<a id="10." name="10.">

With this plugin, you integrate the payment method **Invoice** into your plentymarkets POS points of sale. When you activate the plugin, you can allow existing customers buying items via plentymarkets POS to pay for their purchase on account.

## Important return information<a id="05." name="05.">

<div class="alert alert-warning" role="alert">
   Orders with the payment method plentyPOS Invoice can be cancelled until the next z report is generated. However, you cannot return partially or fully unpaid orders with the payment method plentyPOS Invoice with the current version of this plugin. Fully paid orders can be returned. The plentymarkets app does not allow you to check if an order has been paid. As such, you need to open the plentymarkets back end to check if an order has been paid in full.
</div>

## Contents

* <a href="#05."><b>Important return information</b></a>
* <a href="#10."><b>Requirements</b></a>
* <a href="#20."><b>Selecting the payment due date</b></a>
* <a href="#30."><b>Permitting the payment method in a customer class</b></a>
* <a href="#40."><b>Invoice template information</b></a>

## Requirements<a id="10." name="10.">

Provision the plugin plentyPOS Invoice in the plentymarkets back end. However, to print invoices in A4/letter format, you also need the plugin [plentyBase](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053). plentyBase establishes a connection between the plentymarkets app, the printer configuration in the plentymarkets back end and local printers. As such, the following technical requirements apply for invoice purchases via plentymarkets POS:

* plentyBase must be installed on the network computer. <br/>
→ To download the installation file, go to the [plentyMarketplace^](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053).
* plentyBase must be configured on the computer. <br/>
→ Find out how to configure plentyBase in the plugin description of the plugin [plentyBase^](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053). <br/>
***Note:*** During configuration, activate the option **HTTP server**. This ensures that plentymarkets POS can communicate with plentyBase.
* plentyBase must be running on the computer. <br/>
***Recommendation:*** Configure plentyBase to run automatically when the computer is started up.
* The plentyBase connection details must be saved in the plentymarkets app. <br/>
→ Find out how to save the plentyBase connection data in the plugin description of the plugin [plentyBase^](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053#140).
* A printer for printing the invoices must be configured in the plentymarkets back end menu **System » Settings » Printers**.
* The [printer for printing the invoices](https://knowledge.plentymarkets.com/en/omni-channel/pos/pos-einrichten#1020) must be selected in the printer settings of plentymarkets POS.

## Selecting the payment due date<a id="20." name="20.">

Select the payment due date for all invoices created for POS orders in the plugin settings. Because the payment due date of the customer class is not considered for plentyPOS invoices, the payment due date saved in the plugin settings is applied to all plentyPOS invoices.

##### Selecting the payment due date:

1. Go to **Plugins » Plugin overview**. <br/>
→ The plugin overview will open.
2. Click on the **plentyPOS Invoice** plugin.
3. Open the **Configuration » Basic settings** view.
2. Select a payment due date from the drop-down list **Payment due date**. You can select a payment due date of **14 days**, **28 days**, **30 days** or **60 days**. <br/>
***Note:*** The payment due date of the customer class is not considered for plentyPOS invoices. As such, the payment due date saved in the plugin settings is applied to all plentyPOS invoices.
3. **Save** the settings. <br/>
→ The payment due date is saved and applied to all invoices created at points of sale.

## Permitting the payment method in a customer class<a id="30." name="30.">

Now activate the payment method for all customer classes for which you want to allow invoice purchases at points of sale.

##### Permitting the payment method in a customer class:

1. Go to **System » CRM » Customer classes**.
2. Expand the customer class for plentymarkets POS orders.
3. Right-click the payment method to activate it.
4. **Save** the settings.

## Invoice template information<a id="40." name="40.">

You cannot customise the invoice template that is used for plentyPOS invoices. The information shown on the invoices is prefilled from the following menus of the plentymarkets back end:

| Company details | Menu |
|---|---|
| Address details | **System » Client » Open client » POS » Open POS » Tab: Basic settings » Area: Location** |
| Telephone, telefax, email, hotline | **System » Settings » Master data** |
| Bank details | **System » Settings » Bank** |
| VAT number | **System » Client » Open client » Locations » Open location » Accounting » Tab: VAT rates** |
