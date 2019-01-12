namespace App;

use Illuminate\Support\Facades\DB;

trait Singleton {
	
	private static $_instance;
	private        $_arg;
	private		   $_table;
	private        $_where;
	
	protected function __construct() {}
	private   function __clone()     {}
	
	public static function getInstance() {
		return self::$_instance ?? (self::$_instance = new self());
	}
	
	protected function _table($table) {
		$this->_table = \DB::table($table);
		return $this;
	}
	
	protected function _bindArg(&$arg) {
		$this->_arg =& $arg;
		return $this;
	}
	
	protected function _where($params = array()) {
    if(!isset($this->_table))
        throw new \Exception("Cannot query where when table is not set.");
        
		$this->_where = $this->_table->where($params);
		return $this;
	}
	
	protected function _save() {
		if(isset($this->_where)) {
			$q = $this->_where->update((array)$this->_arg);
			unset($this->_where);
			return $q;
		}
		
		return $this->_table->insert((array)$this->_arg);
	}
	
	protected function _fetch() {
		return isset($this->_where) ? $this->_where->get() : $this->_table->get();
	}
	
}

class IezonHelper {
	
	use Singleton {
		_table as public setTable;
		_bindArg as public setReference;
		_save as public saveModel;
		_where as public where;
		_fetch as public fetch;
	}
	
}
