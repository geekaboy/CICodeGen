<h5><i class="fa fa-dot-circle-o"></i> Project folder structure</h5>
<pre>
    <code class="language-plaintext" data-lang="plaintext">
your-project/
├── appjs/
│   └── your-view/
│       └── app.js
├── application/
│   ├── views/
│   │   └── theme/
│   │       ├── header.php
│   │       ├── navbar.php
│   │       └── footer.php
│   └── your-view/
│       └── main_view.php
└── assets/
    ├── plugins/
    └── theme/
    </code>
</pre>
<h5><i class="fa fa-dot-circle-o"></i> your-project/application/config/autoload.php</h5>
<pre class="language-php line-numbers" data-start="85">
    <code>
    /*
    | -------------------------------------------------------------------
    |  Auto-load Helper Files
    | -------------------------------------------------------------------
    | Prototype:
    |
    |	$autoload['helper'] = array('url', 'file');
    */
    $autoload['helper'] = array('url', 'plugin');
    </code>
</pre>

<h5><i class="fa fa-dot-circle-o"></i> your-project/application/config/database.php</h5>
<pre class="language-php line-numbers" data-start="73">
    <code>
    $active_group = 'default';
    $query_builder = TRUE;

    $db['default'] = array(
    	'dsn'	=> '',
    	'hostname' => 'localhost',
    	'username' => 'database username',
    	'password' => 'database password',
    	'database' => 'database name',
    	'dbdriver' => 'database driver',
    	'dbprefix' => '',
    	'pconnect' => FALSE,
    	'db_debug' => (ENVIRONMENT !== 'production'),
    	'cache_on' => FALSE,
    	'cachedir' => '',
    	'char_set' => 'utf8',
    	'dbcollat' => 'utf8_general_ci',
    	'swap_pre' => '',
    	'encrypt' => FALSE,
    	'compress' => FALSE,
    	'stricton' => FALSE,
    	'failover' => array(),
    	'save_queries' => TRUE
    );
    </code>
</pre>
