#Docker images
FROM ubuntu:16.04

#author
MAINTAINER SeongHo,Moon

#install
RUN apt-get update && apt-get -y -qq install build-essential
ADD http://download.redis.io/redis-stable.tar.gz /root/
RUN cd /root/ && tar xzvf redis-stable.tar.gz
RUN cd /root/redis-stable && make && make install

#cp
RUN cp /root/redis-stable/src/redis-server /usr/local/bin/
RUN cp /root/redis-stable/src/redis-cli /usr/local/bin/
RUN cp /root/redis-stable/src/redis-benchmark /usr/local/bin/
RUN cp /root/redis-stable/src/redis-check-aof /usr/local/bin/
RUN cp /root/redis-stable/src/redis-sentinel /usr/local/bin/

#chmod 
RUN chmod +x /usr/local/bin/redis-server

#server start
CMD /usr/local/bin/redis-server /etc/redis/6379.conf
EXPOSE 6379
