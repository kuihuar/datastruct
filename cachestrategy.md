### MYSQL 查询缓存
mysql的query cache属于FIFO策略，即队列清除。
query cache由 query_cache_size参数为了决定

命中率
show global status
Qcache_free_blocks     Query Cache中空闲状态的block
Qcache_free_memary     Query Cache中空闲状态的内存总量
Qcache_hits            Query Cache命中次数
Qcache_inserts         向Query Cache中插入新的Query Cache次数，即没有命中
Qcache_lowmem_runes    当Query Cache内存不够，需要从中删除旧的Query
                       Cache以给新的Cache对象使用的次数
Qcache_not_cached
Qcache_queryies_in_cache 在Query Cache 中的数量
hit rate=Qchache_queries_in_cache/Com_select
memcached的最大数据量由操作系统决定默认为64M，每次最大可申请内存2M

### 文件缓存
Secache

### Opcode 缓存

A. eAccelerator

### 客户端缓存

Last-Modified 文档最后修改时间
 Expires ETag
header('Cache-Control:max-age=86400, must-revalidate');
header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
header('Expires:'.gmdate('D, d M Y H:i:s', time()+86400)."GMT");
header('Cache-Control:no-cache, must-revalidate');
header('Pragma:no-cache');


### Apache缓存
mod_expires
LoadModule expires_module modules/mod_expires.so
<ifmodule mod_expires.c>
	<filesmatch "\.jpg|gif|png|css|js">
		ExpiresActive on
		ExpiresDefault "access plus 1 year"
	</filesmatch>
</ifmodule>

### nginx 缓存

proxy_cache_path /path/to/cache levels=1:2 keys_zone=AME;10m inactive=5m max_size=2m clean_name=1m

location /{
	proxy_pass http://www.abc.com/;
	proxy_cache NAME;
	proxy_cache_valid 100 302 1h;
	proxy_cache_valid 301 1d;
	proxy_cache_valid any 1m;
}

### memcached 缓存
memcache key最大长度250字节

Memcache::connect($host, $post, $timeout);
Memcache::addServer($host, $port, $persistent, $weight, $timeout, $rety_interval, $status, $failure_callback);
Memcache::add(string $key, mixed $var, int $flag, int $expire)
$var 最大1M
Memcache::replace(string $key, mixed $var, int $flag, nt $expire)
Memcache::getServerStatus();
Memcache::getStats()

memecached -t 指定线程数（CPU数）


一致性哈希
class FlexiHash{
	private $serverList;
	private $isSorted=false;
	function addServer($server){
		$hash = mhash(MHASH_MD5, $host);
		if(!isset($this->serverList[$hash])){
			$this->serverList[$hash] = $server;
		}
		$this->isSorted = false;
		return true;
	}
	function removeServer($server){
		$hash = mhash(MHASH_MD5, $host);
		if(!isset($this->serverList[$hash])){
			unset($this->serverList[$hash]);
		}
		$this->isSorted = false;
		return true;
	}
	
	function lookup($key){
		if(!$this->isSorted){
			krsort($this->serverList, SORT_NUMERIC);
			$this->isSorted = true;
		}
		$hashKey = mhash(MHASH_MD5, $key);
		foreach($this->serverList as $pos=>$server){
			if($hash >= $pos){
				Memcache::set($key, 'xxxx');
			}
		}


	}
	
	

	foreach($this->serverList as $pos=>$server){

	}
}

### redis 缓存
redis是单线程
内存快照 snapshotting
save <seconds><changes>
save 900 1 表示经过900秒或1次修改就进行一次内存快照操作
日志追加 append-only file
将增加修改命令通过write命令追加到文件尾部appendonly.aof
Master禁止持久化
注释save配置
主从同步原来
Master启动一个后台进程将内存数据以快照方式写入文件，同时Master开始收集新的写命令并且缓存起来，Master后台进程完成内存快照操作后把数据文件发给slave， slave将文件保存到磁盘上，然后把数据加载到内存中。
slave主动连接 master
slave发送SYNC到MASTER请求同步
master备份数据到RDB文件。
MASTER传输RDB文件给SLAVE
SLAVE把文件将文件存盘（把RDB导入数据库），并将数据加载到内存

MYSQL 简单表操作插件handlerSocker

主从复制原理
1. 主服务器将用户对数据库更新的操作以二掉格式保存到binary
   log日志文件中，然后由binalog dump线程将binary log日志文件传输给从服务器
2. 从服务器通过一个I/O线程将主服务器的binary log日志文件中的操作复制到一个叫
   relay log的中继日志文件中
3. 从服务器通过另一个SQL线程将relay log中继日志文件中操作依次在本地执行，从而
   实现主从同步

从库配置
replicate_wild_ignore_table
mysql>change master to master_host='192.168.1.141', master_user='slave',
master_password='xxx',
master_port=3306,
master_log_file='ufo.000063',
master_log_pos=159164526
start slave;