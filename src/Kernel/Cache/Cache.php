<?php

namespace Pkg6\cloudPrint\Kernel\Cache;

use DateInterval;
use DateTime;
use DateTimeInterface;
use Opis\Closure\SerializableClosure;

trait Cache
{
    /**
     * 序列化数据
     * @access protected
     * @param  mixed $data 缓存数据
     * @return string
     */
    protected function serialize($data): string
    {
        $serialize = $this->options['serialize'][0] ?? function ($data) {
                SerializableClosure::enterContext();
                SerializableClosure::wrapClosures($data);
                $data = \serialize($data);
                SerializableClosure::exitContext();
                return $data;
            };

        return $serialize($data);
    }

    /**
     * 反序列化数据
     * @access protected
     * @param  string $data 缓存数据
     * @return mixed
     */
    protected function unserialize(string $data)
    {
        $unserialize = $this->options['serialize'][1] ?? function ($data) {
                SerializableClosure::enterContext();
                $data = \unserialize($data);
                SerializableClosure::unwrapClosures($data);
                SerializableClosure::exitContext();
                return $data;
            };

        return $unserialize($data);
    }

    protected function getExpireTime($expire): int
    {
        if ($expire instanceof DateTimeInterface) {
            $expire = $expire->getTimestamp() - time();
        } elseif ($expire instanceof DateInterval) {
            $expire = DateTime::createFromFormat('U', (string) time())
                    ->add($expire)
                    ->format('U') - time();
        }
        return (int) $expire;
    }
}