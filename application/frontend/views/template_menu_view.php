<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$categories = $this->SHOP_Model->ShopCategoriesParent();

//print_r($cha);
$mod = $this->uri->segment(1);		
if($mod=="" || $mod=='Welcome'){
	$class='class="ui-menu-categories"';
}else{
	$class='class="ui-hmenu-categories"';
}

echo'
	<ul '.$class.'>
	<li>DANH MỤC SẢN PHẨM<i class="fa fa-bars"></i></li>';
	for($c=0; $c < sizeof($categories); $c++)
	{
		echo'<li class="h">
        <span><img src="'.base_url().'uploads/modules/categories/'.$categories[$c]['icon'].'"></span>
        <a href="'.base_url().'index.php/shop/module/'.$categories[$c]['mva'].'">'.$categories[$c]['title'].'<i class="fa fa-angle-right hidden-xs"></i></a>';
		$child = $this->SHOP_Model->ShopCategoriesChild($categories[$c]['mva']);
		
		if(sizeof($child)!=0)
		{
			echo'<ul>';
			for($n=0; $n < sizeof($child); $n++)
			{
				echo'<li><span><img src="'.base_url().'uploads/modules/categories/'.$child[$n]['icon'].'"></span>
			<a href="'.base_url().'index.php/shop/category/'.$child[$n]['mva'].'">'.$child[$n]['title'].'<i class="hidden-xs"></i></a></li>';
				
			}
			echo'</ul>';
		}
        echo'</li>';
	}
echo'</ul>';


?>