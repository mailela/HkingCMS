<?php
/**
 *  cache_factory.class.php 缓存工厂类
 *
 * @author           麦乐
 * @license          http://www.hkingcms.cn
 * @lastmodify       2018-05-05
 */

final class cache_factory {
	
	public static $instances = null;
	public static $class = null;
	public static $config = null;
	public static $cache_instances = null;
	

	private function __construct() {
	}
	
	/**
	 * 返回当前终级类对象的实例
	 * @return object
	 */
	public static function get_instance() {
		if(self::$instances==null){
			self::$instances = new self();
			switch(C('cache_type')) {
				case 'file' :
					hg_base::load_sys_class('cache_file','',0);
					self::$class = 'cache_file';
					self::$config = C('file_config');
					break;
				case 'redis' : 
					hg_base::load_sys_class('cache_redis','',0);
					self::$class = 'cache_redis';
					self::$config = C('redis_config');
					break;
				case 'memcache' : 
					hg_base::load_sys_class('cache_memcache','',0);
					self::$class = 'cache_memcache';
					self::$config = C('memcache_config');
					break;
				default :
					hg_base::load_sys_class('cache_file','',0);
					self::$class = 'cache_file';
					self::$config = C('file_config');
			}
		}
		
		return self::$instances;
	}

	
	/**
	 * 获取缓存对象实例
	 * @return object
	 */
	public function get_cache_instances() {
		if(self::$cache_instances==null){
			self::$cache_instances = new self::$class(self::$config);
		}
		
		return self::$cache_instances;
	}

}
?>