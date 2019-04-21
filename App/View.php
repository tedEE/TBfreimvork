<?php

namespace tbf\App;


class View implements \Countable, \Iterator
{
    /**
     * @var array данные передоваемые для отображения
     */
    protected $data = [];

    /**
     * заполняет массив передаваемыми данными
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }


    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * реализация интерфейса \Countable дает возможность считать поля объекта
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * реализация интерфейса \Iterator
     */

    public function current()
    {
        return current($this->data);
    }


    public function next()
    {
        return next($this->data);
    }


    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
       $key = key($this->data);
       return ($key !== null && $key !== false);
    }


    public function rewind()
    {
        reset($this->data);
    }
}