@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../sminnee/phpunit/phpunit
php "%BIN_TARGET%" %*
