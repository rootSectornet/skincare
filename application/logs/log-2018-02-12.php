<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2018-02-12 17:45:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:45:09 --> No URI present. Default controller set.
DEBUG - 2018-02-12 17:45:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:45:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 17:45:11 --> Total execution time: 1.4701
DEBUG - 2018-02-12 17:45:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:45:16 --> No URI present. Default controller set.
DEBUG - 2018-02-12 17:45:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:45:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2018-02-12 17:45:16 --> Severity: Notice --> Undefined variable: pass C:\xamppz\htdocs\skin_care\application\controllers\Auth.php 26
DEBUG - 2018-02-12 17:45:16 --> Total execution time: 0.4212
DEBUG - 2018-02-12 17:46:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:46:10 --> No URI present. Default controller set.
DEBUG - 2018-02-12 17:46:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:46:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 17:46:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:46:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:46:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 17:46:11 --> Total execution time: 0.3900
DEBUG - 2018-02-12 17:46:37 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:46:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:46:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2018-02-12 17:46:37 --> Severity: Notice --> Undefined variable: pasien C:\xamppz\htdocs\skin_care\application\views\pendaftaran\table.php 39
ERROR - 2018-02-12 17:46:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xamppz\htdocs\skin_care\application\views\pendaftaran\table.php 39
DEBUG - 2018-02-12 17:46:37 --> Total execution time: 0.5148
DEBUG - 2018-02-12 17:57:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:57:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:57:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2018-02-12 17:57:03 --> Query error: Column 'is_create' in where clause is ambiguous - Invalid query: SELECT *
FROM `pendaftaran`
INNER JOIN `mst_pegawai` ON `mst_pegawai`.`id_mst_pegawai` = `pendaftaran`.`id_mst_pegawai`
INNER JOIN `mst_pasien` ON `mst_pasien`.`id_mst_pasien` = `pendaftaran`.`id_mst_pasien`
INNER JOIN `kelurahan` ON `kelurahan`.`id_kel` = `mst_pasien`.`id_kel`
INNER JOIN `kecamatan` ON `kecamatan`.`id_kec` = `kelurahan`.`id_kec`
INNER JOIN `kabupaten` ON `kabupaten`.`id_kab` = `kecamatan`.`id_kab`
INNER JOIN `provinsi` ON `provinsi`.`id_prov` = `kabupaten`.`id_prov`
WHERE `is_create` = '2018-02-12 17:57:03'
DEBUG - 2018-02-12 17:57:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:57:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:57:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 17:57:16 --> Total execution time: 0.0936
DEBUG - 2018-02-12 17:57:38 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:57:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:57:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 17:57:38 --> Total execution time: 0.2184
DEBUG - 2018-02-12 17:57:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 17:57:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 17:57:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 17:57:39 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:07:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:04 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:07:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 18:07:08 --> 404 Page Not Found: pendaftaran/Create/index
DEBUG - 2018-02-12 18:07:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:10 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:07:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:12 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:07:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:13 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:07:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:19 --> Total execution time: 0.0936
DEBUG - 2018-02-12 18:07:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:22 --> Total execution time: 0.1872
DEBUG - 2018-02-12 18:07:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:23 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:07:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:07:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:07:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:07:26 --> Total execution time: 0.0468
DEBUG - 2018-02-12 18:08:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:02 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:08:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:05 --> Total execution time: 0.0650
DEBUG - 2018-02-12 18:08:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:06 --> Total execution time: 0.0970
DEBUG - 2018-02-12 18:08:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:06 --> Total execution time: 0.0590
DEBUG - 2018-02-12 18:08:33 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:33 --> Total execution time: 0.0780
DEBUG - 2018-02-12 18:08:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:35 --> Total execution time: 0.0570
DEBUG - 2018-02-12 18:08:36 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:08:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:08:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:08:36 --> Total execution time: 0.0700
DEBUG - 2018-02-12 18:10:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:10:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:10:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2018-02-12 18:10:19 --> Severity: Notice --> Undefined variable: kode_pendaftaran C:\xamppz\htdocs\skin_care\application\views\pendaftaran\create.php 25
ERROR - 2018-02-12 18:10:19 --> Severity: Notice --> Undefined variable: kode_pendaftaran C:\xamppz\htdocs\skin_care\application\views\pendaftaran\create.php 26
DEBUG - 2018-02-12 18:10:19 --> Total execution time: 0.0780
DEBUG - 2018-02-12 18:10:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:10:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:10:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:10:30 --> Total execution time: 0.1092
DEBUG - 2018-02-12 18:10:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:10:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:10:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:10:35 --> Total execution time: 0.0560
DEBUG - 2018-02-12 18:10:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:10:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:10:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:10:35 --> Total execution time: 0.0570
DEBUG - 2018-02-12 18:10:36 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:10:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:10:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:10:36 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:11:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:11:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:11:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:11:12 --> Total execution time: 0.0780
DEBUG - 2018-02-12 18:11:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:11:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:11:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:11:15 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:12:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:12:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 18:12:05 --> Severity: Compile Error --> Cannot use isset() on the result of a function call (you can use "null !== func()" instead) C:\xamppz\htdocs\skin_care\application\controllers\Pendaftaran\Pendaftaran.php 28
DEBUG - 2018-02-12 18:12:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:12:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:12:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:12:49 --> Total execution time: 0.0780
DEBUG - 2018-02-12 18:12:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:12:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:12:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:12:53 --> Total execution time: 0.0570
DEBUG - 2018-02-12 18:12:55 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:12:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:12:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:12:55 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:15:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:15:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:15:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:15:57 --> Total execution time: 0.0624
DEBUG - 2018-02-12 18:16:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:16:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:16:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:16:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:16:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:16:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:16:08 --> Total execution time: 0.0936
DEBUG - 2018-02-12 18:16:36 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:16:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:16:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:16:36 --> Total execution time: 0.1092
DEBUG - 2018-02-12 18:16:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:16:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:16:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:16:53 --> Total execution time: 0.1092
DEBUG - 2018-02-12 18:17:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:17:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:17:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:17:14 --> Total execution time: 0.0780
DEBUG - 2018-02-12 18:17:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:17:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:17:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:17:25 --> Total execution time: 0.1248
DEBUG - 2018-02-12 18:18:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:18:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:18:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:18:22 --> Total execution time: 0.1248
DEBUG - 2018-02-12 18:18:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:18:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:18:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:18:25 --> Total execution time: 0.1570
DEBUG - 2018-02-12 18:18:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:18:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:18:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:18:26 --> Total execution time: 0.1350
DEBUG - 2018-02-12 18:18:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:18:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:18:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:18:45 --> Total execution time: 0.0936
DEBUG - 2018-02-12 18:19:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:19:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:19:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:21:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:21:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:21:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:22:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:22:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:22:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:22:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:22:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:22:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:23:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:23:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:23:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:24:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:24:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:24:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:24:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:24:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:24:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:25:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:25:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:25:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:26:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:26:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:26:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:27:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:27:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:27:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:28:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:28:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:28:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:29:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:29:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:29:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:30:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:30:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:30:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:30:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:30:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:30:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:30:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:30:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:30:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:30:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:30:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:30:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:30:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:30:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:30:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:31:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:31:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:31:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:31:38 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:31:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:31:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:32:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:32:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:32:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:33:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:33:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:33:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:33:36 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:33:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:33:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:37:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:37:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 18:37:18 --> Severity: Parsing Error --> syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) C:\xamppz\htdocs\skin_care\application\controllers\Pendaftaran\Pendaftaran.php 63
DEBUG - 2018-02-12 18:37:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:37:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:37:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:38:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:38:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:38:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:38:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:38:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:38:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:38:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:38:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:38:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 18:38:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 18:38:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 18:38:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:16:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:16:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:16:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:16:51 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:16:51 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:16:51 --> 404 Page Not Found: pendaftaran/Create/index
DEBUG - 2018-02-12 19:16:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:16:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:16:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:50 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:17:52 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:17:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:17:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:21:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:21:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:21:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:21:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:27:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:27:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:27:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:27:37 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:39 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:27:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:27:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:30:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:30:39 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:30:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:30:39 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:31:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:40 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:40 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:31:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:31:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:32:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:32:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:32:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:33:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:33:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:34:25 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:34:26 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:34:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:34:26 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:01 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:01 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:35:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:18 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:35:18 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:35:19 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:35:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:35:19 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:17 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:31 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:32 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:32 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:48 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:48 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:48 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:48 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:36:49 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:36:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:36:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:39:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:39:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:39:54 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:55 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:55 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:55 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:55 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:55 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:39:55 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:55 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:55 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:55 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:39:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:39:55 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:39:55 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:39:55 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:40:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:09 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:40:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:40:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:40:10 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:58:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:04 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:04 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:04 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:58:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:58:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:58:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:59:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:59:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 19:59:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 19:59:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:01:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:41 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:42 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:49 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:01:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:01:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:01:59 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:00 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:08 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:15 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:02:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:02:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:21 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:02:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:02:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:02:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:02:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:28 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:29 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:05:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:05:43 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:06:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:06:56 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:11 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:11 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:11 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:12 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:07:12 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:07:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:07:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:07:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:07:51 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:07:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:07:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:08:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:08:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:08:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:10:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:10:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:10:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:10:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:10:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:10:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:10:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:10:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:10:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:10:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:10:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:10:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:10:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:10:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:10:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:08 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:09 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:09 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:09 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:11:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:23 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:57 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:57 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:57 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:11:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:11:58 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:12:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:12:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:12:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:12:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:12:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:12:21 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:07 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:07 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:08 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:08 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:08 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:46 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:19:47 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:19:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:19:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:19:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:20:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:20:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:20:20 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:20:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:20:20 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:20:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:20:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:20:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:21:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:27 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:27 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:21:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:21:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:34 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:34 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:34 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:34 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:21:34 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:34 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:34 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:21:34 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:21:35 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:21:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:21:35 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:22:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:22:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:22:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:22:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:22:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:22:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:22:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:22:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:22:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:23:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:23:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:23:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:23:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:23:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:23:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:23:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:23:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:23:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:23:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:23:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:23:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:23:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:23:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:23:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:29:05 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:29:06 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:29:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:29:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:29:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:29:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:31:52 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:31:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:31:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:31:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:31:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:31:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:31:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:31:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:31:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:31:58 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:31:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:31:58 --> 404 Page Not Found: pendaftaran/Pendaftaran/detailP00001
DEBUG - 2018-02-12 20:32:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:32:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:32:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:33:44 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:33:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:33:45 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:34:52 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:34:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:34:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:34:52 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:34:52 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:34:52 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:34:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:34:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-12 20:34:53 --> 404 Page Not Found: pendaftaran/Dist/img
DEBUG - 2018-02-12 20:36:37 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:36:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:36:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:38:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:38:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:38:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:38:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:38:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:38:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:41:26 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:41:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:41:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:41:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:41:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:41:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-12 20:41:51 --> UTF-8 Support Enabled
DEBUG - 2018-02-12 20:41:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-12 20:41:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
