
## Install
```
composer install
cp .env.example .env
```
In .env, update value for `HOST_MACHINE_PATH`

## Run Behat with Step-Through
```
bin/behat --profile node --step-through --tags @login
```

## Run Behat as Headless
```
bin/behat --profile headless
bin/behat --profile headless --tags @login
```

## Run Selenium for Headless Testing
```
java -jar -Dwebdriver.chrome.driver="/path/to/chromedriver" path/to/selenium-server-standalone-2.53.1.jar -debug
```

## Run Selenium as Node Hub for Browser Step-Through
```
# from guest machine
java -jar path/to/selenium-server-standalone-2.53.1.jar -role hub

# from host machine 
java -jar path/to/selenium-server-standalone-2.53.1.jar -role node -hub http://[guest-machine-ip]:4444/grid/register -Wdriver.chrome.driver=path/to/chromedriver

# kill selinium instances (in host browser)
http://[guest-machine-ip]:4444/selenium-server/driver/?cmd=shutDownSeleniumServer
```

## Requirements

Java

Selenium Server Standalone 2.53.1

Selenium Chrome Driver