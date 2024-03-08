FROM postgres:16

RUN rm -rf /var/lib/postgresql/data

COPY ./postgres/init.sql /docker-entrypoint-initdb.d/

#ENTRYPOINT ["psql", "-U","postgres", "-f", "/docker-entrypoint-initdb.d/init.sql"]