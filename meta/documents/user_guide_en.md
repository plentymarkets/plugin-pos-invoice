# User guide for the plentyPOS Invoice plugin<a id="10." name="10.">

With this plugin, you integrate the payment method **Invoice** into your plentymarkets POS points of sale. When you activate the plugin, you can allow existing customers buying items via plentymarkets POS to pay for their purchase on account.

## Return information<a id="05." name="05.">

<div class="alert alert-warning" role="alert">
   Orders with the payment method POS invoice can be cancelled until the next z report is generated. In version 1.8 and higher, you can also accept returns for items bought on account. If an invoice has been partially paid, the amount to be refunded to the customer is calculated automatically.
</div>

## Contents

* <a href="#05."><b>Return information</b></a>
* <a href="#10."><b>Requirements</b></a>
* <a href="#20."><b>Selecting the payment due date</b></a>
* <a href="#30."><b>Permitting the payment method in a customer class</b></a>
* <a href="#40."><b>Customising the invoice template</b></a>
* <a href="#50."><b>Emailing invoices to existing customers</b></a>

## Requirements<a id="10." name="10.">

Provision the plugin plentyPOS Invoice in the plentymarkets back end. However, to print invoices in A4/letter format, you also need the plugin [plentyBase](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053). plentyBase establishes a connection between the plentymarkets app, the printer configuration in the plentymarkets back end and local printers. As such, the following technical requirements apply for invoice purchases via plentymarkets POS:

* plentyBase must be installed on the network computer. <br/>
→ To download the installation file, go to the [plentyMarketplace](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053).
* plentyBase must be configured on the computer. <br/>
→ Find out how to configure plentyBase in the plugin description of the plugin [plentyBase](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053). <br/>
***Note:*** During configuration, activate the option **HTTP server**. This ensures that plentymarkets POS can communicate with plentyBase.
* plentyBase must be running on the computer. <br/>
***Recommendation:*** Configure plentyBase to run automatically when the computer is started up.
* The plentyBase connection details must be saved in the plentymarkets app. <br/>
→ Find out how to save the plentyBase connection data in the plugin description of the plugin [plentyBase](https://marketplace.plentymarkets.com/en/plugins/integration/plentyBase_5053#140).
* A printer for printing the invoices must be configured in the plentymarkets back end menu **System » Settings » Printers**.
* The [printer for printing the invoices](https://knowledge.plentymarkets.com/en/omni-channel/pos/pos-einrichten#1020) must be selected in the printer settings of plentymarkets POS.

## Selecting the payment due date<a id="20." name="20.">

Select a payment due date for invoices created for POS orders in the plugin settings. When an invoice is created, any payment due date saved for the customer takes priority. If no payment due date is saved for the customer, the payment due date saved for the customer class applies. If no payment due date for the customer class exists, the payment due date you set in the plugin takes effect.

##### Selecting the payment due date:

1. Go to **Plugins » Plugin overview**. <br/>
→ The plugin overview will open.
2. Click on the **plentyPOS Invoice** plugin.
3. Open the **Configuration » Basic settings** view.
4. Enter a **Payment due (in days)**.
5. **Save** the settings. <br/>
→ The payment due date is saved and applied to all invoices created at points of sale. <br/>
→ The payment due date takes effect for all customers for which no other payment due date is saved in the customer data or the customer class.

## Permitting the payment method in a customer class<a id="30." name="30.">

If you work with customer classes, activate the payment method for all customer classes for which you want to allow invoice purchases at points of sale.

##### Permitting the payment method in a customer class:

1. Go to **System » CRM » Customer classes**.
2. Expand the customer class for plentymarkets POS orders.
3. Right-click the payment method to activate it.
4. **Save** the settings.

## Customising the invoice template<a id="40." name="40.">

The information shown on the invoices is prefilled from the following menus of the plentymarkets back end:

| Company details | Menu |
|---|---|
| Address details | **System » Client » Open client » POS » Open POS » Tab: Basic settings » Area: Location** |
| Telephone, telefax, email, hotline | **System » Settings » Master data** |
| Bank details | **System » Settings » Bank** |
| VAT number | **System » Client » Open client » Locations » Open location » Accounting » Tab: VAT rates** |

You cannot customise the invoice template that is used for plentyPOS invoices. However, you can hide the footer if you want to print POS invoices on pre-printed stationery that already contains your company details.

##### Hiding the footer on invoice documents:

1. Go to **Plugins » Plugin overview**. <br/>
→ The plugin overview will open.
2. Click on the **plentyPOS Invoice** plugin.
3. Activate the checkbox **Hide footer on invoice document**.
5. **Save** the settings. <br/>
→ The footer is not printed on invoice documents.


## Emailing invoices to existing customers<a id="50." name="50.">

plentymarkets allows you to set up an event procedure that automatically emails plentymarkets POS invoices to the email address saved for a customer record. You can utilise the default email template for invoices for this purpose or create a custom email template. After you have decided on an email template, create an event procedure. Note that for POS orders created in offline mode, the event procedure only takes effect once the POS order is uploaded to the plentymarkets back end. Before setting up automatic emails for sending invoices, check current legal restrictions regarding emailing customers.

#### Creating an email template

You need an [email template](https://knowledge.plentymarkets.com/crm/sending-emails#1200) that is sent when an invoice is generated. You can use the existing [email template](https://knowledge.plentymarkets.com/crm/sending-emails#1200) for sending invoices. Alternatively, proceed as described below to create a custom email template.

##### Creating an email template:

1. Go to **System » Client » Select client » Email » Templates**.
2. Click on **New email template**. <br/>
→ The **New email template** window will open.
3. Enter a name for the template.
4. Select an owner or the setting **All** from the drop-down list **Owner**.
5. Click on **Save**. <br/>
→ The email template is created and saved in one of the three folders based on the owner you selected.
6. Select the PDF attachment **Invoice**.
7. Carry out the additional settings. Pay attention to the information on [creating a new email template](https://knowledge.plentymarkets.com/crm/sending-emails#1200).
8. **Save** the settings.


### Creating an event procedure

Now, create an event procedure that triggers an email to the customer when an invoice is generated in plentymarkets POS.

##### Setting up an event procedure

1. Go to **System » Orders » Events**.
2. Click on **Add event procedure**. <br/>
→ The **Create new event procedure** window will open.
3. Enter a name.
4. Select the **event** listed in table 2.
5. **Save** the settings.
6. Configure the settings as described in table 2.
7. Place a check mark next to the option **Active**.
8. **Save** the settings.

| Setting | Option | Selection |
|---|---|---|
| **Event** | **Documents: Invoice generated** | |
| **Filter** | **Order &gt; Referrer** | Select the POS for which you want to email invoices. |
| **Procedure** | **Customer &gt; Send email** | **Template**: Select the email template you set up for sending invoices. **Recipient**: Select the option **Customer**. |
