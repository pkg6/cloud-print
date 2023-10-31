<?php

namespace Pkg6\cloudPrint\Kernel\Cache;

use Psr\SimpleCache\CacheInterface;

class FileCache implements CacheInterface
{
    use Cache;
    /**
     * 配置参数
     * @var array
     */
    protected $options = [
        'expire'        => 0,
        'cache_subdir'  => true,
        'prefix'        => '',
        'path'          => '',
        'hash_type'     => 'md5',
        'data_compress' => false,
        'tag_prefix'    => 'tag:',
        'serialize'     => [],
    ];
    public function __construct($options =[])
    {

        $this->options= array_merge($this->options,$options);
        if (empty( $this->options["path"])){
            $this->options["path"]='./runtime' . DIRECTORY_SEPARATOR ."cache".DIRECTORY_SEPARATOR;
        }
    }

    /**
     * 有效期
     * @var int|\DateTime
     */
    protected $expire;

    /**
     * @param $name
     * @param $default
     * @return mixed|null
     */
    public function get($name, $default = null)
    {
        $filename = $this->getCacheKey($name);

        if (!is_file($filename)) {
            return $default;
        }

        $content      = file_get_contents($filename);
        $this->expire = null;

        if (false !== $content) {
            $expire = (int) substr($content, 8, 12);
            if (0 != $expire && time() > filemtime($filename) + $expire) {
                //缓存过期删除缓存文件
                $this->unlink($filename);
                return $default;
            }

            $this->expire = $expire;
            $content      = substr($content, 32);

            if ($this->options['data_compress'] && function_exists('gzcompress')) {
                //启用数据压缩
                $content = gzuncompress($content);
            }
            return $this->unserialize($content);
        } else {
            return $default;
        }
    }

    /**
     * @param $name
     * @param $value
     * @param $expire
     * @return bool
     */
    public function set($name, $value, $expire = null)
    {
        if (is_null($expire)) {
            $expire = $this->options['expire'];
        }
        $expire   = $this->getExpireTime($expire);
        $filename = $this->getCacheKey($name);

        $dir = dirname($filename);

        if (!is_dir($dir)) {
            try {
                mkdir($dir, 0755, true);
            } catch (\Exception $e) {
                // 创建失败
            }
        }
        $data = $this->serialize($value);
        if ($this->options['data_compress'] && function_exists('gzcompress')) {
            //数据压缩
            $data = gzcompress($data, 3);
        }
        $data   = "<?php\n//" . sprintf('%012d', $expire) . "\n exit();?>\n" . $data;
        $result = file_put_contents($filename, $data);

        if ($result) {
            clearstatcache();
            return true;
        }

        return false;
    }

    /**
     * @param $name
     * @return bool
     */
    public function delete($name)
    {


        try {
            return $this->unlink($this->getCacheKey($name));
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function clear()
    {
        $files = (array) glob($this->options['path'] . ($this->options['prefix'] ? $this->options['prefix'] . DIRECTORY_SEPARATOR : '') . '*');
        foreach ($files as $path) {
            if (is_dir($path)) {
                $matches = glob($path . DIRECTORY_SEPARATOR . '*.php');
                if (is_array($matches)) {
                    array_map('unlink', $matches);
                }
                rmdir($path);
            } else {
                unlink($path);
            }
        }
        return true;
    }

    /**
     * @param $keys
     * @param $default
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getMultiple($keys, $default = null)
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $this->get($key, $default);
        }
        return $result;
    }

    /**
     * @param $values
     * @param $ttl
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setMultiple($values, $ttl = null)
    {
        foreach ($values as $key => $val) {
            $result = $this->set($key, $val, $ttl);

            if (false === $result) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $keys
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function deleteMultiple($keys)
    {
        foreach ($keys as $key) {
            $result = $this->delete($key);

            if (false === $result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $name
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function has($name)
    {
        return false !== $this->get($name) ? true : false;
    }

    /**
     * @param string $name
     * @return string
     */
    private function getCacheKey(string $name): string
    {
        $name = hash($this->options['hash_type'], $name);
        if ($this->options['cache_subdir']) {
            // 使用子目录
            $name = substr($name, 0, 2) . DIRECTORY_SEPARATOR . substr($name, 2);
        }
        if ($this->options['prefix']) {
            $name = $this->options['prefix'] . DIRECTORY_SEPARATOR . $name;
        }
        return $this->options['path'] . $name . '.php';
    }

    /**
     * @param string $path
     * @return bool
     */
    private function unlink(string $path): bool
    {
        return is_file($path) && unlink($path);
    }
}