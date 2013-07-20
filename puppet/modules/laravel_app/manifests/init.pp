class laravel_app 
{

	package { 'git-core':
    	ensure => present,
    }

   	exec { 'install composer':
	    command => 'curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin',
	    require => Package['php5-cli'],
	}

	exec { 'global composer':
		command => "sudo mv /usr/local/bin/composer.phar /usr/local/bin/composer",
		require => Exec['install composer'],
	}

	# exec { 'get laravel packages':
	# 	command => "composer install'",
	# 	cwd => '/var/www/',
	# 	require => [Exec['global composer'], Package['git-core']],
	# 	timeout => 900,
	# }

	exec { 'get laravel packages':
		command => "/bin/sh -c 'cd /var/www/ && composer install'",
		require => [Exec['global composer'], Package['git-core']],
		creates => "/var/www/composer.lock",
		timeout => 900,
	}

	exec { 'remove optimized class loader':
		command => "/bin/sh -c 'rm /var/www/bootstrap/compiled.php'",
		onlyif => "[ -f /var/www/bootstrap/compiled.php ]"
	}

	exec { 'get laravel updates':
        command => "/bin/sh -c 'cd /var/www/ && composer update'",
        require => [Exec['get laravel packages'], Exec['remove optimized class loader'], Package['git-core']],
        timeout => 900,
	}


	file { '/var/www/app/storage':
		mode => 0777
	}
}
