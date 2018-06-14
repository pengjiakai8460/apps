<style type="text/css">
	img{height: 50px !important;}
</style>
<table class="table table-bordered">
  	<caption>购物车</caption>
  	<thead>
	    <tr>
	    	<th><input type="checkbox" name="all" />全选/全不选</th>
	      	<th>商品名称</th>
	      	<th>商品图片</th>
	      	<th>单价</th>
	      	<th>商品数量</th>
	      	<th>总价</th>
	    </tr>
  	</thead>
  	<tbody>
	    <tr>
	    	<td><input type="checkbox" name="select" /></td>
	      	<td>电脑1</td>
	      	<td><img src="https://img11.360buyimg.com/n2/jfs/t20854/209/576912103/353020/83a2acb6/5b114aceNfc47efbc.jpg!q90.jpg" class="img-responsive"></td>
	      	<td><b class="text-danger">￥8299.00</b></td>
	      	<td class="nums">1</td>
	      	<td class="total"><b class="text-danger">￥8299.00</b></td>
	    </tr>
	    <tr>
	    	<td><input type="checkbox" name="select" /></td>
	      	<td>电脑2</td>
	      	<td><img src="https://img10.360buyimg.com/n2/jfs/t20626/303/592395319/158641/a3736e8f/5b10fccdNf7ea4008.jpg!q90.jpg" class="img-responsive"></td>
	      	<td><b class="text-danger">￥36999.50</b></td>
	      	<td class="nums">1</td>
	      	<td class="total"><b class="text-danger">￥36999.50</b></td>
	    </tr>
	    <tr>
	    	<td><input type="checkbox" name="select" /></td>
	      	<td>键盘1</td>
	      	<td><img src="https://img13.360buyimg.com/n2/jfs/t4567/252/4069686973/138038/bad9ee0f/590983c4N82c195eb.jpg!q90.jpg" class="img-responsive"></td>
	      	<td><b class="text-danger">￥289.00</b></td>
	      	<td class="nums">1</td>
	      	<td class="total"><b class="text-danger">￥289.00</b></td>
	    </tr>
  	</tbody>
  	<thead>
	    <tr>
	    	<th colspan="6">总计选择了 <span class="text-danger">0</span>件商品        总价<b class="text-danger">￥<span>0</span></b></th>
	    </tr>
  	</thead>
</table>
<script type="text/javascript">
	function getTotal(){
		$("input[name=select]").each(function(){
			var totalnums = 0;
			var nums = 0;
			var price = 0;
			var totalprice = 0;
			if($(this)).prop("checked"){

			}
		})
	}
</script>