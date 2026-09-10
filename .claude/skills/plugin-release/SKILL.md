---
name: plugin-release
description: Bump the version and write release notes for the PosInvoice plentymarkets plugin. Use whenever the user asks to "release", "cut a version", "bump the version", "prepare a release", or "update the changelog" for this plugin — three files must change together (plugin.json + two changelog files) and the changelog format has quirks (leading "v." prefix, language-specific section headers) that are easy to get wrong or forget.
---

# Plugin release

A release touches three files together. Missing one leaves the marketplace
listing inconsistent with the installed version.

1. **`plugin.json`** — bump `"version"` (semver, no `v` prefix here: `"1.3.1"`).
2. **`meta/documents/changelog_en.md`** — add a new section at the top (above
   `## v.1.2.5`, i.e. right after the title line).
3. **`meta/documents/changelog_de.md`** — add the matching section at the top,
   translated.

## Changelog format quirks

- Version heading is `## v.X.Y.Z` — note the **dot after `v`**. Every existing
  entry uses `v.1.3.0`, `v.1.2.5`, etc., not `v1.3.0`.
- The category header depends on what kind of change it is, and the wording
  differs per language:

  | Kind of change | English header | German header |
  |---|---|---|
  | Behavior/logic change to something existing | `### Changed` | `### Geändert` |
  | New capability | `### Functions` | `### Funktionen` |
  | Bug fix | `### Fixes` | `### Fixes` (same in both) |

  A release can use more than one category if it contains both, e.g. a fix
  and a new function — add both `### ...` blocks under the same version
  heading, in the same order in both files.
- Each bullet is a plain `-` list item, one sentence, describing the
  user-visible effect (not the implementation). Compare recent entries in the
  file for tone before writing new ones.
- Leave one blank line between the last bullet of a section and the next
  `## v.` heading (matches existing spacing).

## Steps

1. Decide the new version number and whether it's a patch/minor bump.
2. Edit `plugin.json`, field `version`.
3. Insert the new `## v.X.Y.Z` section at the top of `changelog_en.md`,
   choosing category header(s) per the table above.
4. Insert the matching, translated section at the top of `changelog_de.md`,
   same category header(s), same order.
5. Show the three diffs to the user before doing anything else (do not
   commit/branch/tag on your own — that follows the user's normal git
   workflow, which requires an explicit ask per the global git rules).
