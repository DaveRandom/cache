<?php

namespace Amp\Cache;

class CacheFactory
{
    /**
     * Get an instance of the best available caching back-end that does not have any dependencies
     *
     * @return Cache
     */
    public function select()
    {
        if (extension_loaded('apc') && ini_get("apc.enabled") && @apc_cache_info()) {
            return new APCCache;
        }

        return new MemoryCache;
    }
}
