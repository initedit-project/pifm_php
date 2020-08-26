## Raspberry pi FM in PHP

# How to run pifm_php ?

`wget https://raw.githubusercontent.com/koolwithk/pifm_php/master/pifm_php.sh && sed -i 's/\r//' pifm_php.sh`

`bash pifm_php.sh`

You will get the URL at the end http://your_IP/pifm_php/

# config.php

"allowedFiles"=>array("wav")

"radio"=>"/var/www/html/pifm_php/pi_fm_rds"

"brand_name"=>"pifm_php"
  
# Warning and Disclaimer

pifm_php is an experimental program, designed only for experimentation. It is in no way intended to become a personal media center or a tool to operate a radio station, or even broadcast sound to one's own stereo system.

In most countries, transmitting radio waves without a state-issued licence specific to the transmission modalities (frequency, power, bandwidth, etc.) is illegal.
