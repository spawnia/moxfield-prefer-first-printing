# Moxfield Prefer First Printing

Allows configuring [Moxfield](https://moxfield.com) to always use the first printing of a card.

1. Run `php first-printings.php`.
   If it gets stuck, copy-and-paste the URL of the last successful into `$nextPage` and rerun.
2. Run `php moxfield-collection.php`.
3. Head to https://www.moxfield.com/collection.
   Select `More -> Import from CSV`.
   Choose CSV Format `Moxfield`, upload `moxfield-collection.csv` and click `Import`.
4. Head to https://www.moxfield.com/account/settings/printings and click `Import from Collection`.

Now, newly added cards will always be their first printing.
You can update entire decks by selecting `Update to Preferred`.
