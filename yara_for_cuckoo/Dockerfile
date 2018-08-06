From ubuntu:16.04

MAINTAINER huti <runandlove@gmail.com>

#install python libraries
RUN apt-get update && apt-get install -y python python-pip python-dev libffi-dev libssl-dev
RUN apt-get install -y python-virtualenv python-setuptools
RUN apt-get install -y libjpeg-dev zlib1g-dev swig

#install KVM
RUN export DEBIAN_FRONTEND=nointeractive
RUN apt-get install -yq --no-install-recommends qemu-kvm libvirt-bin ubuntu-vm-builder bridge-utils python-libvirt

#install XenAPI
RUN pip install XenAPI

#install tcpdump
RUN apt-get install -y tcpdump apparmor-utils libcap2-bin
RUN setcap cap_net_raw,cap_net_admin=eip /usr/sbin/tcpdump
RUN chmod +x /usr/sbin/tcpdump

#install yara
ENV YARA_VERSION 3.7.1
RUN apt-get install -y git automake autoconf libtool flex make gcc build-essential 
RUN apt-get install -y -m cmake libboost-all-dev libjansson-dev autoconf-archive libc-dev libmagic-dev libssl-dev bison
RUN cd /tmp/ && git clone --recursive --branch v$YARA_VERSION https://github.com/VirusTotal/yara.git 
RUN cd /tmp/yara && ./bootstrap.sh 
RUN /tmp/yara/configure --with-crypto --enable-magic --enable-cuckoo --enable-dotnet && make && make install

#install yara_python
ENV YARA_PY_VERSION 3.7.0
RUN cd /tmp/ && git clone --recursive --branch v$YARA_PY_VERSION https://github.com/VirusTotal/yara-python
RUN cd /tmp/yara-python && python setup.py build --dynamic-linking && python setup.py install
