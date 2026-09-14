<?php

interface Observer
{
    public function update(string $location): void;
}
