# Supervisord Multi Server Monitoring Tool

![Screenshot] (https://raw.github.com/mlazarov/supervisord-monitor/master/supervisord-monitor.png)

## Features

* Monitor unlimited supervisord servers and processes
* Start/Stop process
* Read stderr log
* Start new Redmine ticket when stderr occurs
* Sound alert when stderr occurs
* Mute sound alerts (after some time auto resume)
* Monitor process uptime status

## Install

1. Clone supervisord-monitor to your vhost/webroot:
```
git clone https://github.com/mlazarov/supervisord-monitor.git
```
2. Enable/Uncomment inet_http_server (found in supervisord.conf) for all your supervisord servers.
```
[inet_http_server]
port=*:9001
```
Do not forget to restart supervisord service after changing supervisord.conf

3. Edit supervisord-monitor configuration file and add all your supervisord servers
```
vim application/config/supervisor.php
```

4. Configure your web server to point one of your vhosts to 'public_html' directory.
5. Open web browser and enter your vhost url.


## Redmine integration
1. Open configuration file:
```
vim application/config/config.php
```
2. Change this lines with your redmine url and auto assigne id:

```php
<?php
// Path to Redmine new issue url
$config['redmine_url'] = 'http://redmine.url/path_to_new_issue_url';
// Default Redmine assigne ID
$config['redmine_assigne_id'] = '69';
?>
```

## License

MIT License

Copyright (C) 2013 Martin Lazarov

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
