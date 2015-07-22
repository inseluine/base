<?php

interface Reader
{
    public function read();
}

interface Writer
{
    public function Write($value);
}

class Configure implements Reader,Writer
{
    public function write($value)
    {
    //process
    }

    public function read()
    {
    //process
    }
