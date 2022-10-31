<?php

namespace Dread\Htdocs\Core;

class Dictionary implements \Iterator, \ArrayAccess, \Countable, \Serializable
{
    private bool $readonly = false;
    private array $keys;
    private array $values;
    public function __construct(array $array, $readonly = false)
    {
        $this->setValues($array);
        $this->readonly = $readonly;
    }

    protected function generateHash($value): string
    {
        if (is_object($value)) {
            if ($value instanceof \Closure) {
                throw new \InvalidArgumentException("Closure cannot be Dictionary key.");
            }
            return 'object:' . spl_object_hash($value);
        } elseif (is_string($value)) {
            return 'string:' . $value;
        } elseif (is_int($value)) {
            return 'int:' . $value;
        } elseif (is_float($value)) {
            return 'float:' . $value;
        } elseif (is_bool($value)) {
            return 'bool:' . ((int)$value);
        } elseif (is_null($value)) {
            throw new \InvalidArgumentException("Dictionary key mustn't be null.");
        } else {
            throw new \InvalidArgumentException("Invalid Dictionary key.");
        }
    }

    public function current()
    {
        return current($this->values);
    }

    public function next()
    {
        next($this->keys);
        next($this->values);
    }

    public function key()
    {
        return current($this->keys);
    }

    public function valid()
    {
        return null !== key($this->values);
    }

    public function rewind()
    {
        reset($this->values);
        reset($this->keys);
    }

    public function offsetExists($offset)
    {
        $hash = $this->generateHash($offset);
        return isset($this->values[$hash]);
    }

    public function &offsetGet($offset)
    {
        $hash = $this->generateHash($offset);
        if ($this->readonly == true)
        {
            $temp = $this->values[$hash];
            return $temp;
        }
            return $this->values[$hash];

    }

    public function offsetSet($offset, $value)
    {
        if ($this->readonly)
            throw new \LogicException("Dictionary is readonly");
        $hash = $this->generateHash($offset);
        if (!isset($this->keys[$hash])) {
            $this->keys[$hash] = $offset;
        }
        $this->values[$hash] = $value;
    }

    public function offsetUnset($offset)
    {
        if ($this->readonly)
            throw new \LogicException("Dictionary is readonly");
        $hash = $this->generateHash($offset);
        unset($this->values[$hash]);
        unset($this->keys[$hash]);
    }

    public function serialize()
    {
        $pairs = [];
        foreach ($this as $key => $value) {
            $pairs[] = [$key, $value];
        }
        return serialize($pairs);
    }

    public function unserialize($data)
    {
        if ($this->readonly)
            throw new \LogicException("Dictionary is readonly");
        $pairs = unserialize($data);
        foreach ($pairs as $pair) {
            $this[$pair[0]] = $pair[1];
        }
    }

    public function count()
    {
        return count($this->values);
    }

    public function get($name){
        return $this[$name];
    }

    public function set($name, $value){
        if ($this->readonly)
            throw new \LogicException("Dictionary is readonly");
        $this[$name] = $value;
    }

    public function clear()
    {
        $this->keys = array();
        $this->values = array();
    }
    public function getValues()
    {
        return array_values($this->values);
    }
    public function setValues($array)
    {
        if ($this->readonly)
            throw new \LogicException("Dictionary is readonly");
        foreach ($array as $key => $value)
        {
            $this[$key] = $value;
        }
    }
}