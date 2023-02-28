<?php

namespace alekciy\ffd\tags;

use alekciy\ffd\BaseTag;
use alekciy\ffd\DocumentInterface;
use alekciy\ffd\documents\Good;
use Exception;

/**
 * Дата и время формирования фискального документа (ФД).
 *
 * Указывает реальное время в месте (по адресу) осуществления расчетов, указанному в Отчете о регистрации ККТ. Часовой
 * пояс зависит от часового пояса этого места.
 */
class Tag1059 extends BaseTag
{
    /** @var integer|string */
    public $value = [];

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function init(array &$init)
    {
        $code = static::getCode();

        if (isset($init[$code])) {
            $this->value = $init[$code];

            foreach ($this->value as &$good) {
                $good = new Good($this->documentVersion, $this->documentForm, $good);
            }
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function getRuleList(): array
    {
        if ($this->documentForm == DocumentInterface::FORMAT_PRINT) {
            return [
                'value' => ['required', ['array']],
            ];
        } elseif ($this->documentForm == DocumentInterface::FORMAT_ELECTRONIC) {
            return [
                'value' => ['required', ['array']],
            ];
        }
        throw new Exception('Неизвестный формат документа');
    }
}