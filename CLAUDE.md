# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

`PosInvoice` — a plentymarkets plugin (PHP, plugin type `payment`) that adds a "buy on invoice" payment method for the plentyPOS point-of-sale system. It has no build tooling of its own: there is no `composer.json`, no test suite, and no CI workflow in this repo. It is built, installed, and deployed through the plentymarkets plugin system (Plugin Set Manager in the plentymarkets backend), which reads `plugin.json`/`config.json` and compiles the plugin against the plentymarkets core (`Plenty\...` classes) at deploy time — there is nothing to `build`/`lint`/`test` locally in this repo.

## Architecture

Standard plentymarkets plugin layout, wired together as follows:

- `plugin.json` — plugin manifest (name, namespace `PosInvoice`, version, marketplace metadata). `serviceProvider` points at `PosInvoice\Providers\PosInvoiceServiceProvider`, the plugin's entry point.
- `src/Providers/PosInvoiceServiceProvider.php` — on `boot()`: calls `PosInvoiceHelper::createMopIfNotExist()` to ensure a method-of-payment (MOP) record exists in plentymarkets, then registers `PosInvoicePaymentMethod` with the core `PaymentMethodContainer` under key `plenty_pos_invoice::POS-INVOICE`. Also registers `PosInvoiceRouteServiceProvider`.
- `src/Providers/PosInvoiceRouteServiceProvider.php` — maps the plugin's only API route: `GET pos/invoice/settings` (v1, `oauth` middleware) → `SettingsController@loadSettings`.
- `src/Methods/PosInvoicePaymentMethod.php` — implements the core `PaymentMethodService` contract (backend visibility/searchability flags for this payment method). `isActive()` is hardcoded `false`; activation for the POS frontend is driven through `SettingsController`/config rather than this method.
- `src/Helper/PosInvoiceHelper.php` — the business logic hub. Holds the plugin's key constants (`PLUGIN_KEY = plenty_pos_invoice`, `PAYMENT_KEY = POS-INVOICE`). Key methods:
  - `getPaymentMethodId()` — looks up the MOP id for this plugin via `PaymentMethodRepositoryContract`, memoized in `$paymentMethodId`.
  - `isAllowedForContact($contactId)` — eligibility check with a **priority order that is not obvious from a single method**: (1) if the contact's *customer class* explicitly allows this payment method id, that wins outright, ignoring contact-level settings; (2) otherwise, fall back to the contact's own `allowedMethodsOfPayment` record for method-of-payment id `2` (hardcoded — this is the "invoice" MOP id in plentymarkets core, not this plugin's own MOP id). No record at either level ⇒ not allowed. This priority was a deliberate v1.3.0 change (see changelog) — customer class now overrides contact settings, previously it was the other way around.
  - `getContactPaymentTarget($contactId, $companyName)` — resolves the payment due date (days), also with a priority chain: per-account override (matched by `companyName`, only if `timeForPaymentAllowedDays > 0`) → customer class `payableDueWithin` → plugin-wide config fallback (`pos.invoice.paymentTarget`).
- `src/Services/ContactService.php` — thin wrapper around `ContactRepositoryContract`/`ContactClassRepositoryContract`; swallows not-found exceptions and returns `null` instead.
- `src/Controllers/SettingsController.php` — the plugin's single HTTP entry point, used by the POS frontend to fetch MOP id/key, display name (localized), footer/removeFooter config, and (when `contactId` is passed) eligibility + payment target for that contact.
- `config.json` + `resources/lang/{de,en}/Config.properties` — defines the backend settings form (`pos.invoice.paymentTarget`, `pos.invoice.removeFooter`) and its localized labels; read at runtime via `ConfigRepository` using keys prefixed with the plugin name (e.g. `PosInvoice.pos.invoice.removeFooter`).
- `meta/documents/changelog_{de,en}.md` — the changelog shown on the plentymarkets marketplace; update this alongside `plugin.json`'s `version` when releasing.
