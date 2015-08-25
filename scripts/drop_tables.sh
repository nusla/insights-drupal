#!/bin/bash
DRUPAL_ROOT="$1"
 
# Detect paths
DRUSH=$(which drush)
AWK=$(which awk)
GREP=$(which grep)
 
if [ $# -ne 1 ]
then
	echo "Usage: $0 <drupal home>"
	echo "Drops all tables from Drupal database"
	exit 1
fi
 
TABLES=$(echo 'show tables' | $DRUSH -r $DRUPAL_ROOT sql-cli | $AWK '{ print $1}' | $GREP -v '^Tables' )
 
for t in $TABLES
do
	echo "Deleting $t table from $MDB database..."
	echo "drop table $t" | $DRUSH -r $DRUPAL_ROOT sql-cli
done
