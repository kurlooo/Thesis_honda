## shellcheck disable=SC2164
#cd /home/bendelorm/backup_honda/
#./backup2.sh
# shellcheck disable=SC2046
mysqldump -uroot -phcno1234 --all-databases | gzip > /home/bendelorm/backup_honda/allDatabases.sql_$(date +%m.%d.%Y_%H:%M:%S).gz

