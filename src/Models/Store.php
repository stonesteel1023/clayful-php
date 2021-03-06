<?php
namespace Clayful;

use Clayful\Clayful;

class Store {

	public static $name = 'Store';
	public static $path = 'store';

	public static $apis = array(
		'get' => array(
			'modelName'      => 'Store',
			'methodName'     => 'get',
			'httpMethod'     => 'GET',
			'path'           => '/v1/store',
			'params'         => array(),
		),
		'pushToMetafield' => array(
			'modelName'      => 'Store',
			'methodName'     => 'pushToMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/store/meta/{field}/push',
			'params'         => array('field', ),
		),
		'pullFromMetafield' => array(
			'modelName'      => 'Store',
			'methodName'     => 'pullFromMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/store/meta/{field}/pull',
			'params'         => array('field', ),
		),
		'increaseMetafield' => array(
			'modelName'      => 'Store',
			'methodName'     => 'increaseMetafield',
			'httpMethod'     => 'POST',
			'path'           => '/v1/store/meta/{field}/inc',
			'params'         => array('field', ),
		),
		'deleteMetafield' => array(
			'modelName'      => 'Store',
			'methodName'     => 'deleteMetafield',
			'httpMethod'     => 'DELETE',
			'path'           => '/v1/store/meta/{field}',
			'params'         => array('field', ),
		),
	);

	public static function __callStatic($name, $arguments) {

		$detail = self::$apis[$name];

		return Clayful::callAPI(array(
			'modelName'      => $detail['modelName'],
			'methodName'     => $detail['methodName'],
			'httpMethod'     => $detail['httpMethod'],
			'path'           => $detail['path'],
			'params'         => $detail['params'],
			'usesFormData'   => array_key_exists('usesFormData', $detail),
			'withoutPayload' => array_key_exists('withoutPayload', $detail),
			'args'           => $arguments
		));

	}

}