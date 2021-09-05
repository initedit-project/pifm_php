## Raspberry pi FM in PHP

# How to run pifm_php with docker ?

```
docker build -t pifm_php -f pifm.Dockerfile .

docker run -d -p 8001:80 --privileged pifm_php
```

# config.php

"allowedFiles"=>array("wav")

"radio"=>"/var/www/html/pi_fm_rds"

"brand_name"=>"pifm_php"
  
# Warning and Disclaimer

pifm_php is an experimental program, designed only for experimentation. It is in no way intended to become a personal media center or a tool to operate a radio station, or even broadcast sound to one's own stereo system.

In most countries, transmitting radio waves without a state-issued licence specific to the transmission modalities (frequency, power, bandwidth, etc.) is illegal.

Refrences:
1. https://github.com/ChristopheJacquet/PiFmRds