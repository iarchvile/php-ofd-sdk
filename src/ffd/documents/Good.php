<?php

namespace alekciy\ffd\documents;

use alekciy\ffd\DocumentInterface;
use alekciy\ffd\tags\Tag1012;
use alekciy\ffd\tags\Tag1020;
use alekciy\ffd\tags\Tag1023;
use alekciy\ffd\tags\Tag1030;
use alekciy\ffd\tags\Tag1037;
use alekciy\ffd\tags\Tag1040;
use alekciy\ffd\tags\Tag1041;
use alekciy\ffd\tags\Tag1059;
use alekciy\ffd\tags\Tag1084;
use Exception;

/**
 * Фискальный документ: кассовый чек (Кассовый чек).
 */
class Good implements DocumentInterface
{
    /** @var int Тип документа */
    public $type = self::TYPE_CHECK_GOOD;

    /** @var Tag1041 Заводской номер ФН */
    public $fnFactoryNumber;

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function __construct(string $version, string $format, array &$init)
    {
        $this->qty = new Tag1023($this->type, $format, $version, $init);
        $this->title = new Tag1030($this->type, $format, $version, $init);
    }
}
