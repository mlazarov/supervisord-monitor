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

1.Clone supervisord-monitor to your vhost/webroot:
```
git clone https://github.com/mlazarov/supervisord-monitor.git
```

2.Copy application/config/supervisor.php.example to application/config/supervisor.php
```
cp application/config/supervisor.php.example application/config/supervisor.php
```

3.Enable/Uncomment inet_http_server (found in supervisord.conf) for all your supervisord servers.
```ini
[inet_http_server]
port=*:9001
username="yourusername"
password="yourpass"
```
Do not forget to restart supervisord service after changing supervisord.conf

4.Edit supervisord-monitor configuration file and add all your supervisord servers
```
vim application/config/supervisor.php
```

5.Configure your web server to point one of your vhosts to 'public_html' directory.
6.Open web browser and enter your vhost url.


## Redmine integration
1.Open configuration file:
```
vim application/config/supervisor.php
```
2.Change this lines with your redmine url and auto assigne id:

```php
// Path to Redmine new issue url
$config['redmine_url'] = 'http://redmine.url/path_to_new_issue_url';
// Default Redmine assigne ID
$config['redmine_assigne_id'] = '69';
```

## Thanks to ##
@stvnwrgs - added authentication functionality to supervisord monitor
@rk295 - added handling of non authenticated servers

## Who uses Supervisord Monitor? ##

[EasyWpress - wordpress hosting company](http://easywpress.com)


If you've used Supervisord Monitor Tool send me email to martin@lazarov.bg to add your project/company to this list.

## License

MIT License

Copyright (C) 2013 Martin Lazarov

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
