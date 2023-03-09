FROM mysql:8.0

COPY scripts/init_db.sh /docker-entrypoint-initdb.d/init_db.sh
COPY scripts/ttt_dump.sql /docker-entrypoint-initdb.d/ttt_dump.sql

RUN chmod -R 755 /docker-entrypoint-initdb.d