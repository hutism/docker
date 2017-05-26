FROM ubuntu:16.04
MAINTAINER Seongho,Moon

#install Memcached
RUN DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get -y -qq install build-essential libsasl2-2 sasl2-bin libsasl2-dev libsasl2-modules
RUN mkdir /root/memcached
ADD http://monkey.org/~provos/libevent-1.3e.tar.gz /root/memcached/
RUN cd /root/memcached/ && tar xzvf /root/memcached/libevent-1.3e.tar.gz && cd /root/memcached/libevent-1.3e && ./configure && make && make install && ldconfig -v
ADD http://memcached.org/files/memcached-1.4.20.tar.gz /root/memcached/
RUN cd /root/memcached/ && tar xzvf /root/memcached/memcached-1.4.20.tar.gz && cd /root/memcached/memcached-1.4.20 && ./configure --enable-sasl && make && make install 

#run.sh 
ADD run.sh /run.sh
RUN chmod +x /run.sh
RUN chown daemon:daemon /etc/sasldb2

#start
ENTRYPOINT ["/run.sh"]
CMD [""]
EXPOSE 11211
