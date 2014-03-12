<?php

namespace Tdt\Triples\Repositories;

use Tdt\Triples\Repositories\Interfaces\SparqlSourceRepositoryInterface;
use Tdt\Triples\Repositories\BaseSourceRepository;

class SparqlSourceRepository extends BaseSourceRepository implements SparqlSourceRepositoryInterface
{

    protected $rules = array(
        'endpoint' => 'required',
        'depth' => 'integer|min:1|max:10',
    );

    public function __construct(\SparqlSource $model)
    {
        $this->model = $model;
    }

    /**
     * Update a turtle source configuration
     *
     * @param array $input
     * @return array Model
     */
    public function update(array $input)
    {

    }

    /**
     * Return an array of create parameters with info attached
     * e.g. array( 'create_parameter' => array(
     *              'required' => true,
     *              'description' => '...',
     *              'type' => 'string',
     *              'name' => 'pretty name'
     *       ), ...)
     *
     * @return array
     */
    public function getCreateParameters(){
        return array(
            'endpoint' => array(
                'required' => true,
                'name' => 'SPARQL endpoint',
                'description' => 'The uri of the SPARQL end-point (e.g. http://foobar:8890/sparql).',
                'type' => 'string',
            ),
            'endpoint_user' => array(
                'required' => false,
                'name' => 'SPARQL endpoint user',
                'description' => 'Username of the user that has sufficient rights to query the sparql endpoint.',
                'type' => 'string',
            ),
            'endpoint_password' => array(
                'required' => false,
                'name' => "SPARQL endpoint user's password",
                'description' => 'Password of the provided user to query a sparql endpoint.',
                'type' => 'string',
            ),
            'depth' => array(
                'required' => false,
                'name' => 'The depth that a URI can go to be a valid triple subject, so that it can be part of the collection of triples that are derefenced by the requested URI.',
                'description' => 'Username of the user that has sufficient rights to query the sparql endpoint.',
                'type' => 'integer',
                'default_value' => 3
            ),
        );
    }
}
