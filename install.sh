#!/bin/bash

database='quizdb'

if [[ $1 == '-h' ]] || [[ -z "$1" ]] 
then
  printf "Uso/Usage: ./install.sh dbuser dbpass hostname \n"
  exit
else
printf "--Gerando pendências do PHP--\n"
composer dump-autoload
printf "--Gerando banco de dados--\n"
mysql -h $3 --user $1 --password=$2 $database < ./Database/Create.sql
printf "--Inserindo dados no banco--\n"
mysql -h $3 --user $1 --password=$2 $database < ./Database/Insert.sql
printf "--Processo finalizado!--\n"
fi
exit