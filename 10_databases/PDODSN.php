<?php
// MySQL expects parameters in the string
$mysql = new PDO('mysql:host=db.example.com', $user, $password);
// Separate multiple parameters with ;
$mysql = new PDO('mysql:host=db.example.com;port=31075', $user, $password);
$mysql = new PDO('mysql:host=db.example.com;port=31075;dbname=food', $user, $password);
// Connect to a local MySQL Server
$mysql = new PDO('mysql:unix_socket=/tmp/mysql.sock', $user, $password);

// PostgreSQL also expects parameters in the string
$pgsql = new PDO('pgsql:host=db.example.com', $user, $password);
// Separate multiple parameters with ' ' or ;
$pgsql = new PDO('pgsql:host=db.example.com port=31075', $user, $password);
$pgsql = new PDO('pgsql:host=db.example.com;port=31075;dbname=food', $user, $password);
// You can put the user and password in the DSN if you like.
$pgsql = new PDO("pgsql:host=db.example.com port=31075 dbname=food user=$user password=$password");

// Oracle
// If a database name is defined in tnsnames.ora, just put that in the DSN
// as the value of the dbname parameter
$oci = new PDO('oci:dbname=food', $user, $password);
// Otherwise, specify an Instant Client URI
$oci = new PDO('oci:dbname=//db.example.com:1521/food', $user, $password);

// Sybase (If PDO is using Sybase's ct-lib library)
$sybase = new PDO('sybase:host=db.example.com;dbname=food', $user, $password);
// Microsoft SQL Server (If PDO is using MS SQL Server libraries)
$mssql = new PDO('mssql:host=db.example.com;dbname=food', $user, $password);
// DBLib (for FreeTDS)
$dblib = new PDO('dblib:host=db.example.com;dbname=food', $user, $password);

// ODBC -- a predefined connection
$odbc = new PDO('odbc:food');
// ODBC -- an ad-hoc connection. Provide whatever the underlying driver needs
$odbc = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb)};DBQ=C:\\data\\food.mdb;Uid=Chef');

// SQLite just expects a filename -- no user or password
$sqlite = new PDO('sqlite:/usr/local/zodiac.db');
$sqlite = new PDO('sqlite:c:/data/zodiac.db');
// SQLite can also handle in-memory, temporary databases
$sqlite = new PDO('sqlite::memory:');
// SQLite v2 DSNs look similar to v3
$sqlite2 = new PDO('sqlite2:/usr/local/old-zodiac.db');
