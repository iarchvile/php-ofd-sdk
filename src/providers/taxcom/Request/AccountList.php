<?php

namespace alekciy\ofd\providers\taxcom\Request;

use alekciy\ofd\providers\taxcom\RequestPage;
use alekciy\ofd\providers\taxcom\Status;

/**
 * Список торговых точек.
 */
final class AccountList extends RequestPage
{
	public $method = 'GET';
	protected $path = '/API/v2/AccountList';

	/** @var string Идентификатор */
	public $id = '';

	/** @var string Статус */
	public $status = '';

	public $agreements = '';

	/**
	 * @inheritDoc
	 */
	public function getPropertyMap(): array
	{
        return [
            'agreements'      => ['query' => 'currentSession'],
        ];
	}

	/**
	 * @inheritDoc
	 */
	public function getRuleList(): array
	{
		return array_merge(parent::getRuleList(), [
			'id' => [['lengthMin', 1], ['lengthMax', 36]],
			'status' => [['in', [
				Status::OK,
				Status::PROBLEM,
				Status::WARNING,
			]]]
		]);
	}
}
