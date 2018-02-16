<div id="optiondialogpanel" class="hidden" title="Make your choice">
	<table class="primary-options" width="100%" cellpadding="5" cellspacing="0" class="centered">
        <tbody>
            <tr align="center">
                <td><a id="<?=plugin_name?>_text_input" href="" class="option"> <i class="dashicons dashicons-editor-textcolor"></i><h3>Text</h3> </a></td>

                <td><a id="<?=plugin_name?>_text_number" href="" class="option"> <i class="dashicons dashicons-image-filter"></i><h3>Number</h3> </a></td>
            </tr>
            <tr>
                <td><a id="<?=plugin_name?>_text_url" href="" class="option"> <i class="dashicons dashicons-admin-links"></i><h3>Url</h3> </a></td>

                <td><a id="<?=plugin_name?>_date_input" href="" class="option"> <i class="dashicons dashicons-calendar-alt"></i><h3>Date</h3>  </a></td>

            </tr>
            <tr>
                <td><a id="<?=plugin_name?>_datetime_input" href="" class="option"> <i class="dashicons dashicons-clock"></i><h3>Date-Time</h3>  </a></td>

                <td><a id="<?=plugin_name?>_select_list" href="" class="option"> <i class="dashicons dashicons-list-view"></i><h3>Select</h3> </a></td>

            </tr>
            <tr>
                <td><a id="<?=plugin_name?>_textarea" href="" class="option"> <i class="dashicons dashicons-text"></i><h3>Textarea</h3>  </a></td>

                <td><a id="<?=plugin_name?>_radio_btn" href="" class="option"> <i class="dashicons dashicons-marker"></i><h3>Radio</h3> </a></td>
            </tr>
        <tr>
            <td><a id="<?=plugin_name?>_checkbox_btn" href="" class="option"> <i class="dashicons dashicons-yes"></i><h3>Checkbox</h3> </a></td>

            <td><a id="<?=plugin_name?>_colorpicker" href="" class="option"> <i class="dashicons dashicons-art"></i><h3>Color Picker</h3> </a></td>
        </tr>
        <tr>
            <td><a id="<?=plugin_name?>_gallery_input" href="" class="option"> <i class="dashicons dashicons-format-gallery"></i><h3>Gallery Input</h3> </a></td>
        </tr>
        </tbody>
    </table>
    <div class="sub_options">

            <ul>
                <li class="content_<?=plugin_name?>_text_input">
                    <form class="sub_options_form" method="post">
                    <div>
                        <label>Field name</label>
                        <input type="text" name="field_name">
                    </div>
                    <div>
                        <label>ID</label>
                        <input type="text" name="field_id">
                    </div>
                    <div>
                        <label>Default Value</label>
                        <input type="text" name="field_default">
                    </div>

                    <div class="footer">
                        <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                        <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
                    </div>
                    </form>
                </li>

                <li class="content_<?=plugin_name?>_text_url">
                    <form class="sub_options_form" method="post">
                    <div>
                        <label>Field name</label>
                        <input type="text" name="field_name">
                    </div>
                    <div>
                        <label>ID</label>
                        <input type="text" name="field_id">
                    </div>
                    <div>
                        <label>Default Value</label>
                        <input type="text" name="field_default">
                    </div>

                    <div class="footer">
                        <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                        <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
                    </div>
                    </form>
        </li>

        <li class="content_<?=plugin_name?>_date_input">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>

        <li class="content_<?=plugin_name?>_datetime_input">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>

        <li class="content_<?=plugin_name?>_select_list">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>

        <li class="content_<?=plugin_name?>_radio_btn">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>

        <li class="content_<?=plugin_name?>_checkbox_btn">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>

        <li class="content_<?=plugin_name?>_gallery_input">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>

        <li class="content_<?=plugin_name?>_colorpicker">
            <form class="sub_options_form" method="post">
            <div>
                <label>Field name</label>
                <input type="text" name="field_name">
            </div>
            <div>
                <label>ID</label>
                <input type="text" name="field_id">
            </div>
            <div>
                <label>Default Value</label>
                <input type="text" name="field_default" class="color-field">
            </div>

            <div class="footer">
                <button class="button button-primary" onclick="wp_instantopt_addoption(event)">Save</button>
                <button class="button button-link-delete" onclick="init_option_submenu_close(event)">Cancel</button>
            </div>
            </form>
        </li>


        </ul>

    </div>
</div>