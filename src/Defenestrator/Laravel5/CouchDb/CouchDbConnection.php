<?php namespace Defenestrator\Laravel5\CouchDb;
use \Doctrine\CouchDB\CouchDBClient;
use \Illuminate\Database\Connection;

class CouchDbConnection extends Connection {
    /**
     * The CouchDB database handler.
     *
     * @var resource
     */
    protected $db;
    /**
     * Create a new database connection instance.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->db = CouchDBClient::create($config);
    }
    /**
     * Get the CouchDB database object.
     *
     * @return \Doctrine\CouchDB\CouchDBClient
     */
    public function getCouchDB()
    {
        return $this->db;
    }
    /**
     *
     * @return string
     */
    public function getDriverName()
    {
        return 'couchdb';
    }
    /**
     * Dynamically pass methods to the connection.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array(array($this->db, $method), $parameters);
    }
}

