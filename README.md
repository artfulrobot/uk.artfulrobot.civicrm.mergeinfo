# uk.artfulrobot.civicrm.mergeinfo

![Screenshot](/images/screenshot.png)

CiviCRM allows [subtypes of contacts](https://docs.civicrm.org/user/en/latest/organising-your-data/contacts/#contact-subtypes) and you can define custom data against these subtypes.

Now if you merge contact B into contact A, the remaining contact (A) keeps its subtype(s). So B's subtypes are lost, along with any data that was pinned to it.

There is no warning about this potential for dataloss in the merge interface, and this extension fixes that.

It won't stop you proceeding, but it will inform you.

The extension is licensed under [GPL-3.0+](LICENSE.txt).

## Requirements

* PHP v5.6+
* CiviCRM 4.7

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl uk.artfulrobot.civicrm.mergeinfo@https://github.com/artfulrobot/uk.artfulrobot.civicrm.mergeinfo/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/artfulrobot/uk.artfulrobot.civicrm.mergeinfo.git
cv en mergeinfo
```

## Usage

The warning is automatic; you don't have to do anything. You can check the extension is doing something by beginnining a contact merge - look at the bottom of the table and you should see a sentence like "*Note: Original contact has types 'X, Y'. Duplicate contact has types 'Z'.*" - where X, Y, Z depend on the contacts you selected. (they could be blank).

See issue queue for any issues.
