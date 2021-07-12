#!/bin/bash

database='quizdb'

if [[ $1 == '-h' ]] || [[ -z "$1" ]] 
then
  echo "Uso/Usage: ./install.sh dbuser dbpass hostname"
  exit
else
echo ""
echo "--Gerando pendências do PHP--"
echo ""
composer dump-autoload
echo ""
echo "--Gerando banco de dados--"
echo ""
mysql -h $3 --user $1 --password=$2 $database < ./Database/Create.sql
echo ""
echo "--Inserindo dados no banco--"
echo ""
mysql -h $3 --user $1 --password=$2 $database < ./Database/Insert.sql
echo ""
echo "--Processo finalizado!--"
echo ""
fi
exit