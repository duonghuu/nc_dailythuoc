<?php
class breadcrumb{
	public $link;
	
	public function add($name,$link){
		$this->link[] = array("name"=>$name,"link"=>$link);
	}
	public function display(){
		$str = '<div id="breadcrumb"><div class="container"><ul class="breadcrumb">';
		foreach($this->link as $k=>$v){
			$cls = '';
			if($k==(count($this->link) -1)){
				$cls = "class='active'";
			}
			if($cls != '' || $v['name']==_sanpham){
				$str.="<li ".$cls."><span style='z-index:".(10-$k)."'>".$v['name']."</span></li>";
			}else{
				$str.="<li ".$cls."><a  style='z-index:".(10-$k)."' href='".$v['link']."'>".$v['name']."</a></li>";
			}	
			
		
		}
		$str.="</ul></div></div>";
		return $str;
	
	}
}