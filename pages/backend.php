
	<div class="block12 opts flexbox space3">
		<div class="block1 fl grey-bg white menu">
			<div id="form_categories_list">
          <?php
			$i=$j=0;
            global $wpdb;
          $theme_panel = $wpdb->get_results("SELECT * FROM ".theme_option_db_name." ");

              foreach($theme_panel as $label=>$results)
              {
                $res_url = preg_replace('/[\s-_]/','',$results->option_name);
                $res_url = strtolower($res_url);
                ?>
                  <div id="<?php echo $res_url;?>" class="title category_list" data-id="<?php echo $i?>"><h4><?php echo $results->option_name?></h4></div>
                <?php
                $i++;
              }
			?>
            </div>
            <div onclick="add_category_list_button(); return false;" class="title text-center"><div class="dashicons-before dashicons-plus"></div></div>
		</div>


		<style>
			.block {display:block;}
			.lightgrey-bg {
				background-color: #e0e0e0;
			}
			.adminopts tr td > div:first-child {
				color: #0073aa;
				font-size: 15px;
				padding: 10px 0;
			}
			.adminopts tr td > div:nth-child(2) {padding:5px 1em;}
			.adminopts tr td > div.clear {padding:0;}

			.adminopts tr td select {min-width:50%;}
			.adminopts tr td span:first-child {height: 41px; display: inline-block; position: absolute; margin-left: -20px; margin-top: 5px;}
			.adminopts tr td span:first-child input[type=checkbox] {margin: 2px; width: auto}
			.adminopts tr td input[type="range"] + span {
				border: 1px solid;
				display: inline-block;
				font-size: 16px;
				height: 24px;
				left: auto;
				padding: 0;
				position: relative;
				right: 0;
				text-align: center;
				top: -10px;
				min-width: 38px;
			}

		</style>
		<div class="fl contents adminopts">

			<table width="auto" border="0" cellspacing="0">
				<?php

                foreach($theme_panel as $label=>$results) {
                 ?>
                    <tr id="content_<?php echo $j?>">
                        <?php if(empty($results->option_value)){
                            ?>
                          <td width="100%" class="block">
                              <div class="text-center block12">
                                  <br><br><br><br>
                                  <h2 class="title">Add Your First Content</h2>
                                  <button id="add_content_<?php echo $j?>" class="button open-dialog" data-dialig-id="#optiondialogpanel" style="width: 120px;height:120px;text-align: center; position: relative;text-indent: 10px;"><i class="dashicons dashicons-welcome-add-page f110" style="width: 100%; position: absolute; top:0; left:0"></i></button>
                              </div>
                          </td>
                          <?php
                        }else{
                            ?>
                        <td>
                            <button id="add_content_<?php echo $j?>" class="button open-dialog" data-dialig-id="#optiondialogpanel" style="width: 120px;height:120px;text-align: center; position: relative;text-indent: 10px;"><i class="dashicons dashicons-welcome-add-page f110" style="width: 100%; position: absolute; top:0; left:0"></i></button>
                        </td>
                        <?php
                        } ?>
                    </tr>
                <?php
                  $j++;
                }

//				foreach($theme_panel as $label=>$results)
//				{
//					?>
<!--					<tr id="content_--><?php //echo $j?><!--">-->
<!---->
<!--						--><?php
//						foreach($results as $result)
//						{
//							?>
<!--							<td width="100%" height="100%" class="block" style="background-color: rgb(250, 250, 250); padding: 10px;">-->
<!---->
<!--								--><?php
//								if($result[0]=='tab_group'){
//									?>
<!--									<h3>--><?php //echo $result['content'];?><!--</h3>-->
<!--								--><?php //}else{?>
<!---->
<!--									<div style="width:12em" class="fl">-->
<!--										--><?php //echo $result[0]?>
<!--									</div>-->
<!---->
<!--									<div class="block7 fl">-->
<!--										--><?php //echo $result['content']?>
<!--									</div>-->
<!---->
<!--								--><?php //}?>
<!--								<div class="clear"></div>-->
<!--							</td>-->
<!--							--><?php
//						}
//
//						?>
<!--					</tr>-->
<!--					--><?php
//					$j++;
//				}

				?>
			</table>

		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<input type="hidden" name="save_theme_opts" value="1">
	<button type="submit" name="submit" class="button button-primary fr" data-hideform="false" data-load-text="Saving..." value="1">Save Changes</button>