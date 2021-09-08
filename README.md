## Raspberry pi FM in PHP

### How to run pifm_php with docker ?(May work on raspberry pi 1,2,3 - not tested)
GPIO=4
```
#build
docker buildx create --use --name insecure-builder --buildkitd-flags '--allow-insecure-entitlement security.insecure'

DOCKER_BUILDKIT=1 docker buildx build --allow security.insecure --load -t pifm -f pifm.Dockerfile .

#run
docker run -d -p 8001:80 --privileged pifm_php
```

### Raspberry Pi 4 (https://github.com/markondej/fm_transmitter#raspberry-pi-4)
GPIO=21 (Works only for freqency below 93Mhz)
```
#build
docker buildx create --use --name insecure-builder --buildkitd-flags '--allow-insecure-entitlement security.insecure'

DOCKER_BUILDKIT=1 docker buildx build --allow security.insecure --load -t fm_transmitter -f fm_transmitter.Dockerfile .

#run
echo "performance"| sudo tee /sys/devices/system/cpu/cpu0/cpufreq/scaling_governor

docker run -d -p 8001:80 --privileged fm_transmitter

```

### config.php
```
"allowedFiles"=>array("wav")

"radio"=>"/var/www/html/pi_fm_rds"

"brand_name"=>"pifm_php"
```
  
# Warning and Disclaimer

pifm_php is an experimental program, designed only for experimentation. It is in no way intended to become a personal media center or a tool to operate a radio station, or even broadcast sound to one's own stereo system.

In most countries, transmitting radio waves without a state-issued licence specific to the transmission modalities (frequency, power, bandwidth, etc.) is illegal.

# Refrences:
1. https://github.com/ChristopheJacquet/PiFmRds
2. https://github.com/ChristopheJacquet/PiFmRds/issues/134 - Raspberrpi 4 PiFmRds issue
3. https://github.com/markondej/fm_transmitter#raspberry-pi-4 - Raspberrpi 4 workaround
4. https://github.com/moby/moby/issues/1916
