stundenplan
==========

stundenplan is a command line client for the ZHAW course schedule. It makes use of the ZHAW CampusInfo API (v. 1.5) by Andreas Ahlenstorf. You need a valid ZHAW-username.

``` sh
$ php stundenplan.php aebersim

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

Usage / Installation
--------------------

 * make sure you have a `php` executable in your shell.
 * download to a directory, probably something like `/usr/local/lib/stundenplan`.
 * run it by `php stundenplan.php username`.
 * PROTIP: alias that to something like `alias today='php stundenplan.php username'`.


Requirements
------------

* PHP >= 5.3.0 with curl enabled


License
-------

Copyright (C) 2014 Simon Aebersold [@saebersold](https://twitter.com/saebersold)

stundenplan is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

stundenplan is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.