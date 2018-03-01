<?php /* Smarty version 3.1.27, created on 2017-09-15 11:48:35
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\static\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2318159bba1f3cfff68_55558168%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3eb5bf300aa1520a7bfecd429009e54ff8fd533' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\static\\footer.tpl',
      1 => 1503582531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2318159bba1f3cfff68_55558168',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59bba1f3d1b4e1_43924986',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59bba1f3d1b4e1_43924986')) {
function content_59bba1f3d1b4e1_43924986 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2318159bba1f3cfff68_55558168';
?>
</body>
<!--[if !IE]> -->


<!-- <![endif]-->

<!--[if IE]>
	<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/jquery-1.11.3.min.js');?>
"><?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<?php echo '<script'; ?>
 src='<?php echo siteUrl('public/admin/assets/js/jquery.mobile.custom.min.js');?>
'>"+"<"+"/script>");
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
<?php if (getUrl(1) != 'category') {?>
<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/jquery.dataTables.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/dataTables.responsive.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/jquery.dataTables.bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = 
		$('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			responsive: true,
			"order": [[ 0, "desc" ]]
			
			
			//"bProcessing": true,
	        //"bServerSide": true,
	        //"sAjaxSource": "http://127.0.0.1/table.php"	,
	
			//,
			//"sScrollY": "200px",
			//"bPaginate": false,
	
			//"sScrollX": "100%",
			//"sScrollXInner": "120%",
			//"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element
	
			//"iDisplayLength": 50

	    });
	
		
		
		/*$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
		
		new $.fn.dataTable.Buttons( myTable, {
			buttons: [
			  {
				"extend": "colvis",
				"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
				"className": "btn btn-white btn-primary btn-bold",
				columns: ':not(:first):not(:last)'
			  },
			  {
				"extend": "copy",
				"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "csv",
				"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "excel",
				"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "pdf",
				"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "print",
				"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
				"className": "btn btn-white btn-primary btn-bold",
				autoPrint: false,
				message: 'This print was produced using the Print button for DataTables'
			  }		  
			]
		} );
		myTable.buttons().container().appendTo( $('.tableTools-container') );*/
		
		
	
	})
<?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/ace-elements.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/ace.min.js');?>
"><?php echo '</script'; ?>
>
<?php }
}
?>