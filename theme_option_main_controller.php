<?php
//Wordpress Admin Theme Option Panels
function key_combine($array)
{
	$arr = array();
		
		foreach($array as $output)
		{	$vals = array();
			$varr2 = array();
						
			foreach($array as $v)
			{
				if($v[0]==$output[0]){
					
				if(count($v[1])==1)
				{
				$vals[] = $v[1];			
				}else
				{
				$vals[] = $v[1];
				}
												
				}
			}
			
		$arr[$output[0]] = $vals;
		}
		
	return $arr;
}


class theme_option_stuff
{
	public $output;
	
	public function __construct()
	{
		$this->output = array();
	}
	
	
	public function register($label=NULL,$value=NULL,$name=NULL)
	{	
	
		$this->output[] = array($label,$value,$name);
	}
	
	
	public function result()
	{
		global $wpdb;
		

		
		if(isset($_POST['save_theme_opts']))
		{	
			foreach($_POST as $key=>$val)
			{	
				$checkdb = $wpdb->get_var("select option_name from ".theme_option_db_name." where option_name='$key'");	
				
				if($checkdb==$key)
				{	
					//Field already exists = update!
					$wp = $wpdb->update(theme_option_db_name,array('option_name'=>$key, 'option_value'=>$val), array('option_name'=>$key));
				}else
				{
					//New field, insert!
					$wp = $wpdb->insert(theme_option_db_name,array('option_name'=>$key, 'option_value'=>$key));
				}
				
			}
			?>
            <script>window.location='<?php echo current_page?>';</script>
            <?php
		}
		
		

		return key_combine($this->output);
	}
	
}



/*********INIT**********/

$theme_panel = new theme_option_stuff;



//
///*=============Header==================*/
//$theme_panel->register('Header',array('content'=>'Header Options','tab_group'));
//
//$headbgcolor = get_theme_option('header_bg_color');
//$theme_panel->register('Header',array('content'=>'
//<input id="headbgcolor" type="text" name="header_bg_color" style="margin-top: 0px;" value="'.$headbgcolor.'"> &nbsp;
//<a href="" data-id="headbgcolor" class="button color_picker_plate">Colours</a>
//','Header Solid colour'));
//
//$header_bg_image = get_theme_option('header_bg_image');
//$theme_panel->register('Header',array('content'=>'
//<input id="header_bg_image" type="text" name="header_bg_image" style="margin-top: 0px;" value="'.$header_bg_image.'"> &nbsp;
//<a href="" data-id="header_bg_image" class="browse-btn button">Browse</a> &nbsp;
//','Header Image'));
//
//$header_bg_tabphone = get_theme_option('header_bg_tabphone');
//$theme_panel->register('Header',array('content'=>'
//<input id="header_bg_tabphone" type="text" name="header_bg_tabphone" style="margin-top: 0px;" value="'.$header_bg_tabphone.'"> &nbsp;
//<a href="" data-id="header_bg_tabphone" class="browse-btn button">Browse</a> &nbsp;
//','Image for Tab|Phone'));
//
//$header_bg_linkhome = get_theme_option('header_bg_linkhome');
//
//$theme_panel->register('Header',array('content'=>'
//<div style="display:inline-block">
//<input type="radio" name="header_bg_linkhome" value="0" data-checked="'.$header_bg_linkhome.'"> No
//</div>
//<div style="display:inline-block">
//<input type="radio" name="header_bg_linkhome" value="1" data-checked="'.$header_bg_linkhome.'"> Yes
//</div>
//','Link banner to Home?'));
//
//
///*=================Navigation==================*/
//$theme_panel->register('Navigation',array('content'=>'Top Navigation','tab_group'));
//
//$nav_text_transform = get_theme_option('nav_text_transform');
//$theme_panel->register('Navigation',array('content'=>'
//<select name="nav_text_transform" id="nav_text_transform" data-value="'.$nav_text_transform.'">
//	<option value="none">none</option>
//	<option value="uppercase">UPPERCASE</option>
//	<option value="lowercase">lowercase</option>
//	<option value="capitalize">Capitalize</option>
//</select>
//','Text Transform'));
//
//$nav_font_color = get_theme_option('nav_font_color');
//$theme_panel->register('Navigation',array('content'=>'
//<input id="nav_font_color" type="text" name="nav_font_color" style="margin-top: 0px;" value="'.$nav_font_color.'"> &nbsp;
//<a href="" data-id="nav_font_color" class="button color_picker_plate">Colours</a>
//','Font colour'));
//
//$nav_background = get_theme_option('nav_background');
//$theme_panel->register('Navigation',array('content'=>'
//<input id="nav_background" type="text" name="nav_background" style="margin-top: 0px;" value="'.$nav_background.'"> &nbsp;
//<a href="" data-id="nav_background" class="button color_picker_plate">Colours</a>
//','Background colour'));
//
//$nav_space = get_theme_option('nav_space');
//$theme_panel->register('Navigation',array('content'=>'
//<input type="number" name="nav_space" value="'.$nav_space.'">
//','Margin(px)'));
//
///*=================Home Page==================*/
//$theme_panel->register('Homepage',array('content'=>'Default Home Page','tab_group'));
//
//$home_heading_text = get_theme_option('home_heading_text');
//$theme_panel->register('Homepage',array('content'=>'
//<textarea id="home_heading_text" name="home_heading_text" rows="3">'.$home_heading_text.'</textarea>
//','Heading Text'));
//
//$home_featured_postamt = get_theme_option('home_featured_postamt');
//$home_featured_postamt = $home_featured_postamt=='' ? 3:$home_featured_postamt;
//$theme_panel->register('Homepage',array('content'=>'
//<input type="range" step="1" value="'.$home_featured_postamt.'" name="home_featured_postamt">
//','Featured Post Blocks<br>(0 for all posts)'));
//
//
//$home_ft_cat = get_theme_option('home_ft_cat');
//
//$ftcatsid = '<select data-value="'.$home_ft_cat.'" id="home_ft_cat" name="home_ft_cat">';
// $ftcatsid .= '<option value="0">none</option>';
//foreach(get_categories() as $get_post_cat):
//    $ftcatsid .= '<option value="'.$get_post_cat->term_id.'">';
//    $ftcatsid .= $get_post_cat->name;
//    $ftcatsid .= '</option>';
//endforeach;
//$ftcatsid .= '</select>';
//
//$theme_panel->register('Homepage',array('content'=>$ftcatsid,'Blocks Category'));
//
//
//$home_ft_cat_text = get_theme_option('home_ft_cat_text');
//
//$ftcatstxtid = '<select data-value="'.$home_ft_cat_text.'" id="home_ft_cat_text" name="home_ft_cat_text">';
//
//$ftcatstxtid .= '<option value="0">none</option>';
//foreach(get_categories() as $post_cateogry):
//    $ftcatstxtid .= '<option value="'.$post_cateogry->term_id.'">';
//    $ftcatstxtid .= $post_cateogry->name;
//    $ftcatstxtid .= '</option>';
//endforeach;
//$ftcatstxtid .= '</select>';
//
//
//$theme_panel->register('Homepage',array('content'=>$ftcatstxtid,'Latest post category'));
//
//$home_footer_text = get_theme_option('home_footer_text');
//$theme_panel->register('Homepage',array('content'=>'
//<textarea id="home_footer_text" name="home_footer_text" rows="3">'.$home_footer_text.'</textarea>
//','Footer Text'));
//
//
//
///*=================Posts==================*/
//if(!isset($_GET['postcat'])) {
//$theme_panel->register('Posts',array('content'=>'Post Settings','tab_group'));
//}
//if(isset($_GET['postcat'])) {
//$postcat = $_GET['postcat'];
//$posts_cat =  get_category_by_slug($postcat);
//
//$theme_panel->register('Posts',array('content'=>'Post Settings for category '.$posts_cat->name,'tab_group'));
//
//$post_meta_title = get_theme_option($postcat.'_meta_title');
//$theme_panel->register('Posts',array('content'=>'
//<input type="text" name="'.$postcat.'_meta_title" value="'.$post_meta_title.'">
//','Meta Title'));
//
//$post_meta_description = get_theme_option($postcat.'_meta_description');
//$theme_panel->register('Posts',array('content'=>'
//<textarea name="'.$postcat.'_meta_description" rows="3">'.$post_meta_description.'</textarea>
//','Meta Description'));
//
//$post_heading = get_theme_option($postcat.'_heading');
//$theme_panel->register('Posts',array('content'=>'
//<textarea name="'.$postcat.'_heading" rows="3">'.$post_heading.'</textarea>
//','Heading Text'));
//
//$time = jdmonthname(date('m'),1).' '.date('d, Y');
//$post_heading_style = get_theme_option($postcat.'_heading_style');
//
//$theme_panel->register('Posts',array('content'=>'
//<div>
//<input style="width:auto; float:left;" type="radio" title="Big Heading" data-checked="'.$post_heading_style.'" value="text_only" name="'.$postcat.'_heading_style">
//<div class="clearfix"></div><span style="width:auto; float:left;"><h1 style="font-size: 42px;">Heading</h1></span>
//
//<div class="clearfix"></div>
//</div>
//<div>
//<input  style="width:auto; float:left;" type="radio" title="Heading with Date" data-checked="'.$post_heading_style.'" value="text_date" name="'.$postcat.'_heading_style">
//<div class="clearfix"></div>
//<span style="width:auto; float:left;"><h3 style="font-size: 24px;">Heading</h3><br>'.$time.'/ leave comment</span>
//<div class="clearfix"></div>
//</div>
//','Heading Text Style'));
//
//
//$post_list_style = get_theme_option($postcat.'_list_style');
//$theme_panel->register('Posts',array('content'=>'
//<div>
//<input style="width:auto; float:left;" type="radio" title="Text above image" data-checked="'.$post_list_style.'" value="style_1" name="'.$postcat.'_list_style">
//<div class="clearfix"></div>
//<span style="width:auto; float:left;"><img width="180" src="'.template_url.'admin/images/post_style1.png"></span>
//<div class="clearfix"></div>
//</div>
//<div>
//<input  style="width:auto; float:left;" type="radio" title="Columns" data-checked="'.$post_list_style.'" value="style_2" name="'.$postcat.'_list_style">
//<div class="clearfix"></div>
//<span style="width:auto; float:left;"><img width="230" src="'.template_url.'admin/images/post_style2.png"></span>
//<div class="clearfix"></div>
//</div>
//','Post List Style'));
//
//
//$post_title_size = get_theme_option($postcat.'_title_size');
//$theme_panel->register('Posts',array('content'=>'
//<input type="range" min="1" max="100" step="1" name="'.$postcat.'_title_size" value="'.$post_title_size.'">
//','Title size'));
//
//$post_title_style = get_theme_option($postcat.'_title_style');
//$theme_panel->register('Posts',array('content'=>'
//<select name="'.$postcat.'_title_style" data-value="'.$post_title_style.'">
//	<option value="none">Default</option>
//	<option value="uppercase">UPPERCASE</option>
//	<option value="lowercase">lowercase</option>
//	<option value="capitalize">Capitalize</option>
//</select>
//','Title style'));
//
//
//$post_paracolumn = get_theme_option($postcat.'_paracolumn');
//$theme_panel->register('Posts',array('content'=>'
//<input type="number" min="1" max="4" step="1" name="'.$postcat.'_paracolumn" value="'.$post_paracolumn.'">
//','Post Text Columns'));
//
//$post_parawidth = get_theme_option($postcat.'_parawidth');
//$theme_panel->register('Posts',array('content'=>'
//<input type="range" min="1" max="12" step="1" name="'.$postcat.'_parawidth" value="'.$post_parawidth.'">
//','Post Text Width'));
//
//
//$post_list_limit = get_theme_option($postcat.'_list_limit');
//$theme_panel->register('Posts',array('content'=>'
//<input type="number" min="1" max="100" step="1" name="'.$postcat.'_list_limit" value="'.$post_list_limit.'">
//','Post List Limit<br>(0 to show all, disable load more)'));
//
//
//$post_list_load = get_theme_option($postcat.'_list_load');
//$theme_panel->register('Posts',array('content'=>'
//<input type="number" min="1" max="100" step="1" name="'.$postcat.'_list_load" value="'.$post_list_load.'">
//','Post Limit on Load more'));
//
//
//
//}else
//{
//$theme_panel->register('Posts',array('content'=>'Select a post category:','tab_group'));
//
//$posts_cats = get_categories(array('type'=>'post'));
//
//foreach($posts_cats as $pcats)
//{
//$theme_panel->register('Posts',array('content'=>'','<a class="button button-primary" href="?page=theme-options&postcat='.$pcats->slug.'#posts">'.$pcats->name.'</a>'));
//}
//}
//
//
///*=================Contact==================*/
//
//$theme_panel->register('Footer',array('content'=>'Contact Links','tab_group'));
//
//$footer_instagram = get_theme_option('footer_instagram');
//$theme_panel->register('Footer',array('content'=>'
//<input type="text" name="footer_instagram" value="'.$footer_instagram.'">
//','Instagram'));
//
//$footer_pinterest = get_theme_option('footer_pinterest');
//$theme_panel->register('Footer',array('content'=>'
//<input type="text" name="footer_pinterest" value="'.$footer_pinterest.'">
//','Pinterest'));
//
//$footer_twitter = get_theme_option('footer_twitter');
//$theme_panel->register('Footer',array('content'=>'
//<input type="text" name="footer_twitter" value="'.$footer_twitter.'">
//','Twitter'));
//
//$footer_linkedin = get_theme_option('footer_linkedin');
//$theme_panel->register('Footer',array('content'=>'
//<input type="text" name="footer_linkedin" value="'.$footer_linkedin.'">
//','LinkedIn'));
//
//$footer_copyright = get_theme_option('footer_copyright');
//$theme_panel->register('Footer',array('content'=>'
//<input type="text" name="footer_copyright" value="'.$footer_copyright.'">
//','Copyright Text'));


?>