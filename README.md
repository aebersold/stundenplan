stundenplan
==========

stundenplan is a command line client for the ZHAW course schedule. It makes use of the ZHAW CampusInfo API (v. 1.5) by Andreas Ahlenstorf. You need a valid ZHAW-username.

```
$ stundenplan aebersim

Today's timetable for aebersim
+-------+-------+-----------+--------+
| Start | End   | Course    | Room   |
+-------+-------+-----------+--------+
| 08:00 | 09:35 | t.PHIT-V  | TP 408 |
| 10:00 | 11:35 | t.PHIT-P  | TP 212 |
| 10:00 | 11:35 | t.CTIT1-P | TE 507 |
| 12:50 | 14:45 | t.PHIT-P  | TP 212 |
| 12:50 | 14:45 | t.SWEN1-P | TH 553 |
+-------+-------+-----------+--------+
```

Installation
------------

You can install stundenplan with the composer dependency manager. This is very straightforward, if you have composer installed it's enough to type `composer global require 'aebersold/stundenplan:1.*'`. Here ist the step-for-step guide: 
 
* [Install Composer globally](https://getcomposer.org/doc/00-intro.md#globally).

* Make sure Composer's global executable directory is in your system's PATH:

        for FILE in $HOME/.bashrc $HOME/.bash_profile $HOME/.bash_login $HOME/.profile; \
        do if [ -f $FILE ]; then \
        printf '\nexport PATH="$HOME/.composer/vendor/bin:$PATH"' >> $FILE && . $FILE; \
        break; fi; done

* Install the latest stable version of the CLI:

        composer global require 'aebersold/stundenplan:1.*'

Usage
-----
You can run the stundenplan in your shell by typing `stundenplan`.

        stundenplan username

Optionally, you can specify a date.

        stundenplan username 2014-11-11

PROTIP: alias stundenplan to something like `alias today='stundenplan username'`.

Commands
--------
```
stundenplan: ZHAW course schedule for the command line.

Useage:
  stundenplan username [date]

  username:  zhaw username
  date:      date in format YYYY-MM-DD | tomorrow
```

Requirements
------------

* PHP >= 5.3.0 with curl enabled


License
-------

Copyright (C) 2014 Simon Aebersold [@saebersold](https://twitter.com/saebersold)

stundenplan is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

stundenplan is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
