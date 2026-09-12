<?php

class ThreadSafe
{
    private static ?ThreadSafe $instance = null;

    private function __construct() {}

    public static function getInstance(): ThreadSafe
    {
        if (self::$instance === null) {
            $lock = fopen(sys_get_temp_dir() . '/singleton_thread_safe.lock', 'c+');

            if ($lock && flock($lock, LOCK_EX)) {
                try {
                    if (self::$instance === null) {
                        self::$instance = new self();
                    }
                } finally {
                    flock($lock, LOCK_UN);
                    fclose($lock);
                }
            } else {
                if (self::$instance === null) {
                    self::$instance = new self();
                }
            }
        }

        return self::$instance;
    }
}
