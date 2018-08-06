From huti/yara_for_cuckoo

MAINTAINER huti <runandlove@gmail.com>

ENV VOL_VERSION 2.6

RUN apt-get -y update && apt-get install -y automake build-essential git ipython libbz2-dev libc6-dev libfreetype6-dev libgdbm-dev libjansson-dev libjpeg8-dev libmagic-dev libreadline-gplv2-dev libtool python2.7 python-dev python-pillow python-pip tar unzip wget zlib1g zlib1g-dev && ln -fs /usr/bin/python2.7 /usr/bin/python 

#Install additional dependencies
RUN pip install distorm3 openpyxl pycrypto pytz

#Install volatility
RUN cd /tmp/ && git clone --recursive --branch $VOL_VERSION https://github.com/volatilityfoundation/volatility.git
RUN cd /tmp/volatility && python setup.py build install 
RUN pip install lxml && mkdir /plugins && cd /plugins && git clone https://github.com/volatilityfoundation/community.git
RUN cd /plugins/community && git reset --hard 29b07e7223f55e3256e3faee7b712030676ecdec && rm -rf /plugins/community/AlexanderTarasenko && rm -rf /plugins/community/MarcinUlikowski && mv /tmp/volatility/contrib/plugins contrib && cd /tmp && git clone --recursive --branch v0.2.2 https://github.com/mandiant/ioc_writer.git && cd ioc_writer && python setup.py install 

RUN cd /plugins/community/YingLi \
  && touch __init__.py \
  && cd /plugins/community/StanislasLejay/linux \
  && touch __init__.py \
  && cd /plugins/community/DatQuoc \
  && touch __init__.py \
  && cd /plugins/community/DimaPshoul \
  && sed -i 's/import volatility.plugins.malware.callstacks as/import/' malthfind.py
