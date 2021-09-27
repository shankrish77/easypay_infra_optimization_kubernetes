FROM mysql:5.7
ENV MYSQL_DATABASE wallet_db
COPY ./sql_scripts/ /docker-entrypoint-initdb.d/
